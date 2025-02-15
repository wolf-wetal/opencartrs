<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Home
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Home extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
        $data['category_img_index'] = $this->load->controller('common/category_img_index');
        $data['latest_products'] = $this->load->controller('common/latest_products');
        $data['info_block_1'] = $this->load->controller('common/info_block_1');
        $data['info_block_2'] = $this->load->controller('common/info_block_2');
        $data['popup_cart'] = $this->load->controller('common/popup_cart');
        $data['products_discount'] = $this->load->controller('common/products_discount');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}