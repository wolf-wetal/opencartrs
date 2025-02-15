<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class PaymentDelivery extends \Opencart\System\Engine\Controller {
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

        $data['breadcrumbs'][] = [
            'text' => 'Скидки',
            'href' => $this->url->link('product/payment_delivery', 'language=' . $this->config->get('config_language')) . '.html'
        ];

        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $this->response->setOutput($this->load->view('common/payment_delivery', $data));
	}
}
