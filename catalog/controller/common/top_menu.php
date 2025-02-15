<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class TopMenu extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
        $data['top_menu'] = [];

        $data['url_novinki'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=120') .'.html';
        $data['url_skidki'] = $this->url->link('product/products_discount', 'language=' . $this->config->get('config_language') ) . '.html';
        $data['payment_delivery'] = $this->url->link('common/payment_delivery', 'language=' . $this->config->get('config_language')).'.html';
        $data['adress'] = $this->url->link('information/adress', 'language=' . $this->config->get('config_language')).'.html';


		return $this->load->view('common/top_menu', $data);
	}
}
