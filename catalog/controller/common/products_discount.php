<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class ProductsDiscount extends \Opencart\System\Engine\Controller {

	/**
	 * @return string
	 */
	public function index(): string {

        $this->load->language('product/special');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $data['products'] = array();

        $data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

        $data['compare'] = $this->url->link('product/compare', 'language=' . $this->config->get('config_language'));


        $filter_data = [
            'start' => 0,
            'limit' => 8
        ];

        $results = $this->model_catalog_product->getSpecials($filter_data);

        foreach ($results as $result) {


            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 300, 300);
            } else {
                $image = $this->model_tool_image->resize('placeholder.png', 282, 352);
            }

            if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $price = false;
            }

            if ((float)$result['special']) {
                $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
            } else {
                $special = false;
            }

            if ($this->config->get('config_tax')) {
                $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
            } else {
                $tax = false;
            }


            $data['products'][] = array(
                'product_id'  => $result['product_id'],
                'thumb'       => $image,
                'name'        => $result['name'],
                'description' => oc_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, 200) . '..',
                'price'       => $price,
                'special'     => $special,
                'href'        => $this->url->addHtmlSuffixToUrls($this->url->link('product/product', 'product_id=' . $result['product_id']))
            );
        }

        $data['cart'] = $this->url->link('common/cart.info', 'language=' . $this->config->get('config_language'));

        $data['add_to_cart'] = $this->url->link('checkout/cart.add', 'language=' . $this->config->get('config_language'));

        $data['url_skidki'] = $this->url->link('product/products_discount', 'language=' . $this->config->get('config_language') ) . '.html';


        return $this->load->view('common/products_discount', $data);
    }
}
