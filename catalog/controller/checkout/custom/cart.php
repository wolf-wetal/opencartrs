<?php
namespace Opencart\Catalog\Controller\Checkout\Custom;
/**
 * Class Cart
 *
 * @package Opencart\Catalog\Controller\Checkout\Custom
 */
class Cart extends \Opencart\System\Engine\Controller {

    /**
     * @param $setting
     * @return string
     */
	public function index($setting) : string {

		// Блок отображается
		if (isset($setting['status']) && (bool)$setting['status'] === true) {

			$this->document->addScript('extension/eroticshop/catalog/view/js/cart/cart.js');

			$this->load->language('checkout/cart');
			$this->load->language('checkout/custom/cart');

			$data['action'] = $this->url->link('checkout/custom/cart/edit', '', true);

			if ($this->config->get('config_cart_weight')) {
				$data['weight'] = $this->weight->format($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'));
			} else {
				$data['weight'] = '';
			}

			$this->load->model('tool/image');
			$this->load->model('tool/upload');

			$data['products'] = array();

			$products = $this->cart->getProducts();
			$products_total = 0;
			$products_quantity = 0;


			foreach ($products as $product) {
				$product_total = 0;

				foreach ($products as $product_2) {
					if ($product_2['product_id'] == $product['product_id']) {
						$product_total += $product_2['quantity'];
					}
				}

				if ($product['minimum'] > $product_total) {
					$data['error_warning'] = sprintf($this->language->get('error_minimum'), $product['name'], $product['minimum']);
				}

/*				if ($product['image']) {
					$image = $this->model_tool_image->resize($product['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_cart_height'));
				} else {
					$image = '';
				}*/

				$option_data = array();

				foreach ($product['option'] as $option) {
					if ($option['type'] != 'file') {
						$value = $option['value'];
					} else {
						$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

						if ($upload_info) {
							$value = $upload_info['name'];
						} else {
							$value = '';
						}
					}

					$option_data[] = array(
						'name'  => $option['name'],
						'value' => (oc_strlen($value) > 20 ? oc_substr($value, 0, 20) . '..' : $value)
					);
				}

				// Display prices
				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                    $price_status = true;
					$unit_price = $this->tax->calculate($product['price'], $product['tax_class_id'], $this->config->get('config_tax'));
					$price = $this->currency->format($unit_price, $this->session->data['currency']);
					$total = $this->currency->format($unit_price * $product['quantity'], $this->session->data['currency']);
					$products_total += $unit_price * $product['quantity'];
				} else {
					$price = false;
					$total = false;
                    $price_status = false;
				}

                $description = '';

                if ($product['subscription']) {
                    if ($product['subscription']['trial_status']) {
                        $trial_price = $this->currency->format($this->tax->calculate($product['subscription']['trial_price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
                        $trial_cycle = $product['subscription']['trial_cycle'];
                        $trial_frequency = $this->language->get('text_' . $product['subscription']['trial_frequency']);
                        $trial_duration = $product['subscription']['trial_duration'];

                        $description .= sprintf($this->language->get('text_subscription_trial'), $price_status ? $trial_price : '', $trial_cycle, $trial_frequency, $trial_duration);
                    }

                    $price = $this->currency->format($this->tax->calculate($product['subscription']['price'], $product['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

                    $cycle = $product['subscription']['cycle'];
                    $frequency = $this->language->get('text_' . $product['subscription']['frequency']);
                    $duration = $product['subscription']['duration'];

                    if ($duration) {
                        $description .= sprintf($this->language->get('text_subscription_duration'), $price_status ? $price : '', $cycle, $frequency, $duration);
                    } else {
                        $description .= sprintf($this->language->get('text_subscription_cancel'), $price_status ? $price : '', $cycle, $frequency);
                    }
                }

				$this->load->model('catalog/product');
				$product_info = $this->model_catalog_product->getProduct($product['product_id']);

				$data['products'][] = array(
					'cart_id'   => $product['cart_id'],
					'thumb'     => $product['image'],
					'name'      => $product['name'],
					'model'     => $product['model'],
					'sku'     	=> $product_info["sku"],
					'option'    => $option_data,
					'recurring' => $description,
					'quantity'  => $product['quantity'],
					'stock'     => $product['stock'] ? true : !(!$this->config->get('config_stock_checkout') || $this->config->get('config_stock_warning')),
					'reward'    => ($product['reward'] ? sprintf($this->language->get('text_points'), $product['reward']) : ''),
					'price'     => $price,
					'total'     => $total,
					'href'      => $this->url->link('product/product', 'product_id=' . $product['product_id'])
				);

				$products_quantity += $product['quantity']; 
			}

			foreach($setting['column'] as $column){
				$setting['columns'][$column] = $this->language->get('column_'.$column);
			}

			$data['setting'] = $setting;



            $data['totals_summ'] = $this->currency->format($products_total, $this->session->data['currency']);


			return $this->load->view('checkout/custom/cart', $data);

		} else {
			return '';
		}

	}

    /**
     * @return void
     */
	public function update() : void{
		$this->load->language('checkout/cart');

		$json = array();

		if (isset($this->request->post['key']) && isset($this->request->post['event'])) {

			// Method
			if ($this->request->post['event'] == 'update'){
				$this->cart->update($this->request->post['key'], $this->request->post['quantity']);
			} elseif ($this->request->post['event'] == 'remove'){
				$this->cart->remove($this->request->post['key']);
			}

			// Validate
			$this->load->model('checkout/custom_cart');
			$json['error'] = $this->model_checkout_custom_cart->validate();

			$result = $this->load->controller('checkout/custom/total.gettotals');
			$total = $result['total'];

			$countProducts = $this->cart->countProducts();

			if ($countProducts === 0) {
				$json['empty'] = true;
			}

			//$json['total'] = sprintf($this->language->get('text_items'), $countProducts + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total, $this->session->data['currency']));
            $json['total'] =$this->currency->format($total, $this->session->data['currency']);

        } else {
			$json['error'] = true;
		}

//        var_dump($json);
//        die();

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

    /**
     * @return void
     */
    public function remove() :void {
		$this->load->language('checkout/cart');

		$json = array();

		// Remove
		if (isset($this->request->post['key'])) {
			$this->cart->remove($this->request->post['key']);

			unset($this->session->data['vouchers'][$this->request->post['key']]);

			$json['success'] = $this->language->get('text_remove');

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);

			$result = $this->load->controller('extension/module/custom/total/gettotals');
			$total = $result['total'];
			
			$json['total'] = sprintf($this->language->get('text_items'), $this->cart->countProducts() + (isset($this->session->data['vouchers']) ? count($this->session->data['vouchers']) : 0), $this->currency->format($total, $this->session->data['currency']));
			
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

    /**
     * @return void
     */
    public function edit() : void{
		$json = array();

		// Update
		if (!empty($this->request->post['quantity'])) {
			foreach ($this->request->post['quantity'] as $key => $value) {
				$this->cart->update($key, $value);
			}

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['reward']);

			$this->response->redirect($this->url->link('checkout/custom'));
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

    /**
     * @return void
     */
    public function clear() : void{

		$json = array();

		// Clear
		$this->cart->clear();

		$json['empty'] = true;

		unset($this->session->data['shipping_method']);
		unset($this->session->data['shipping_methods']);
		unset($this->session->data['payment_method']);
		unset($this->session->data['payment_methods']);
		unset($this->session->data['reward']);

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}