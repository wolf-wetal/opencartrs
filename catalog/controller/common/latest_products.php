<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class LatestProducts extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
        $data['latest_products'] = [];

        $data['ahref_novinki'] = '';

        $currency = $this->session->data['currency'];


        $this->load->model('catalog/product');

        $this->load->model('tool/image');

        $data['products'] = array();

        $filter_data = array(
            'sort'  => 'p.date_added',
            'order' => 'DESC',
            'start' => 0,
            'limit' => 12
        );

        $results = $this->model_catalog_product->getProducts($filter_data);

        if ($results) {
            foreach ($results as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 282, 352);
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

                if ($this->config->get('config_review_status')) {
                    $rating = $result['rating'];
                } else {
                    $rating = false;
                }

                $setting = isset($setting) ? $setting : '';
                $result = isset($product_info) && $setting ? $product_info : $result;

                $data['products'][]  = array(
                    'sku'         => $result['sku'],
                    'product_id'  => $result['product_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => oc_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, 200) . '..',
                    'price'       => $price,
                    'special'     => $special,
                    'tax'         => $tax,
                    'rating'      => $rating,
                    'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id']). '.html'
                );

            }

            $data['cart'] = $this->url->link('common/cart.info', 'language=' . $this->config->get('config_language'));

            $data['add_to_cart'] = $this->url->link('checkout/cart.add', 'language=' . $this->config->get('config_language'));

            $data['url_novinki'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=120') .'.html';

            return $this->load->view('common/latest_products', $data);
	}
        return false;
}
}
