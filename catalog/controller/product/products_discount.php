<?php
namespace Opencart\Catalog\Controller\Product;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Product
 */
class ProductsDiscount extends \Opencart\System\Engine\Controller {
    /**
     * @return void
     */
    public function index(): void {

        $this->document->setTitle($this->config->get('config_meta_title'));
        $this->document->setDescription($this->config->get('config_meta_description'));
        $this->document->setKeywords($this->config->get('config_meta_keyword'));


        $data['breadcrumbs'] = [];

        $data['breadcrumbs'][] = [
            'text' => 'Главная',
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language'))
        ];

        $this->load->language('product/special');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');
        $data['products'] = array();

        if (isset($this->request->get['filter_value_price'])) {
            $filter_value_price = $this->request->get['filter_value_price'];
        } else {
            $filter_value_price = '';
        }

        $url = '';

        if (isset($this->request->get['filter_value_price'])) {
            $url .= '&filter_value_price=' . $this->request->get['filter_value_price'];
        }

        $data['breadcrumbs'][] = [
            'text' => 'Скидки',
            'href' => $this->url->link('product/products_discount', 'language=' . $this->config->get('config_language') . $url) . '.html'
        ];

        $filter_data = [
            'start' => 0,
            'limit' => 8
        ];

        $results = $this->model_catalog_product->getSpecialsDiscount($filter_data, (int)$filter_value_price);
        $product_total = $this->model_catalog_product->getTotalSpecialsFilterCount((int)$filter_value_price);

        $prices = $this->model_catalog_product->getDiscountedPriceRange((int)$filter_value_price);

        $data['minPrice'] = intval($prices["minDiscountPrice"]);
        $data['maxPrice'] = intval($prices["maxDiscountPrice"]);
        $data['valuePrice'] = intval($prices["maxDiscountPrice"]) / 2;

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
                $price = $this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax'));

            } else {
                $special = false;
            }

            $product_data  = array(
                'product_id'  => $result['product_id'],
                'thumb'       => $image,
                'name'        => $result['name'],
                'description' => oc_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, 200) . '..',
                'price'       => $price,
                'special'     => $special,
                'href'        => $this->url->addHtmlSuffixToUrls($this->url->link('product/product', 'language=' . $this->config->get('config_language') . '&product_id=' . $result['product_id'] . $url)),
            );

            $data['products'][] = $this->load->controller('product/thumb', $product_data);
        }


        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $data['scrollHandler'] = 'extension/eroticshop/catalog/view/js/scrollHandler.js';
        $data['jquery_ui_css'] = 'extension/eroticshop/catalog/view/stylesheet/jquery-ui.css';
        $data['jquery_ui_js'] = 'extension/eroticshop/catalog/view/js/jquery-ui.js';
        $data['jquery_ui_touch_punch_min_js'] = 'extension/eroticshop/catalog/view/js/jquery.ui.touch-punch.min.js';
        $data['popup_cart'] = $this->load->controller('common/popup_cart');


        $this->response->setOutput($this->load->view('product/products_discount', $data));
    }
}

