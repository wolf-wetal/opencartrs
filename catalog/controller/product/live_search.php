<?php
namespace Opencart\Catalog\Controller\Product;
/**
 * Class LiveSearch
 *
 * @package Opencart\Catalog\Controller\Product
 */
class LiveSearch extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
//        var_dump('assa');
//        die();
        $json = array();
        if (isset($this->request->get['filter_search'])) {
            $search = $this->request->get['filter_search'];
        } else {
            $search = '';
        }
        if (isset($this->request->get['category_id'])) {
            $cat_id = (int)$this->request->get['category_id'];
        } else {
            $cat_id = 0;
        }

        $tag           = $search;
        $description   = '';
        $category_id   = $cat_id;
        $sub_category  = '';
        $sort          = 'p.sort_order';
        $order         = 'ASC';
        $page          = 1;
        $limit         = 4;
        $search_result = 0;
        $error         = false;
        if( version_compare(VERSION, '3.0.0.0', '>=') ){
            $currency_code = $this->session->data['currency'];
        }
        else{
            $error = true;
            $json[] = array(
                'product_id' => 0,
                'image'      => null,
                'name'       => 'Version Error: '.VERSION,
                'extra_info' => null,
                'price'      => 0,
                'special'    => 0,
                'url'        => '#'
            );
        }

        if(!$error){
            if (isset($this->request->get['filter_search'])) {
                $this->load->model('catalog/product');
                $this->load->model('tool/image');
                $filter_data = array(
                    'filter_search'       => $search,
                    'filter_tag'          => $tag,
                    'filter_description'  => $description,
                    'filter_category_id'  => $category_id,
                    'filter_sub_category' => $sub_category,
                    'sort'                => $sort,
                    'order'               => $order,
                    'start'               => ($page - 1) * $limit,
                    'limit'               => $limit
                );

//                var_dump($filter_data);
//                die();

                $results = $this->model_catalog_product->getProducts($filter_data);

                $search_result = $this->model_catalog_product->getTotalProducts($filter_data);
//                var_dump($search_result);
//                die();
                $image_width        = 80;
                $image_height       = 80;
                $title_length       = 100;
                $description_length = 100;

                foreach ($results as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], $image_width, $image_height);
                    } else {
                        $image = $this->model_tool_image->resize('placeholder.png', $image_width, $image_height);
                    }

                    if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
                        $price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $currency_code);
                    } else {
                        $price = false;
                    }

                    if ((float)$result['special']) {
                        $special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $currency_code);
                    } else {
                        $special = false;
                    }

                    if ($this->config->get('config_tax')) {
                        $tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $currency_code);
                    } else {
                        $tax = false;
                    }

                    if ($this->config->get('config_review_status')) {
                        $rating = (int)$result['rating'];
                    } else {
                        $rating = false;
                    }
                    $json['total'] = (int)$search_result;
                    $json['products'][] = array(
                        'product_id'  => $result['product_id'],
                        'image'       => $image,
                        'name' => oc_substr(trim(strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))), 0, $title_length) . '..',
                        'extra_info' => oc_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $description_length) . '..',
                        'price'       => $price,
                        'special'     => $special,
                        'url'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
                    );
                }
            }
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
