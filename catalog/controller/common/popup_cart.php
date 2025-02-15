<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class PopupCart extends \Opencart\System\Engine\Controller {
	public function index(): string {
        $data['cart'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language')) . '.html';
        return $this->load->view('common/popup_cart', $data);
	}
}
