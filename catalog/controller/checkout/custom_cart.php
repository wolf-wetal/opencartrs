<?php
namespace Opencart\Catalog\Controller\Checkout;
/**
 * Class Checkout
 *
 * @package Opencart\Catalog\Controller\Checkout
 */
class CustomCart extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */
    public function index(): void{

        date_default_timezone_set('Europe/Moscow');

        $this->document->addScript('extension/eroticshop/catalog/view/js/cart/checkout.js');

    //    $this->document->addScript('catalog/view/javascript/custom/checkout.js');
    //    $this->document->addStyle('catalog/view/javascript/custom/stylesheet.css');

        $this->load->language('checkout/custom_cart');

        $data['logged'] = $this->customer->isLogged();

        $data['button_continue'] = $this->language->get('button_continue');
        $data['text_loading'] = $this->language->get('text_loading');


        $data['breadcrumbs'][] = [
            'text' => 'Главная',
            'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language')) . '.html'
        ];

        $data['breadcrumbs'][] = [
            'text' => $this->language->get('page_title'),
            'href' => $this->url->link('checkout/custom_cart', 'language=' . $this->config->get('config_language')) . '.html'
        ];

        // Time block
        // $setting_time = $this->config->get('module_custom_time');
        // $time = array(
        // 	'status' => false,
        // 	'start' => 0,
        // 	'end' => 0
        // );

        // $day = mb_strtolower(date('l'));
        // $now = time();

        // if (isset($setting_time) && isset($setting_time[$day]['start']) && isset($setting_time[$day]['end'])){

        // 	$start = explode(":", $setting_time[$day]['start']);
        // 	$end = explode(":", $setting_time[$day]['end']);

        // 	if (isset($start[0]) && isset($start[1]) && isset($end[0]) && isset($end[1]) ) {
        // 		$time = array(
        // 			'status' => (int)$setting_time['status'],
        // 			'start' => mktime($start[0], $start[1], 0, date("m"), date("d"), date("Y")),
        // 			'end' => mktime($end[0], $end[1], 0, date("m"), date("d"), date("Y"))
        // 		);
        // 	} else {
        // 		$time = array(
        // 			'status' => false,
        // 			'start' => 0,
        // 			'end' => 0
        // 		);
        // 	}
        // }

        $this->document->setTitle($this->language->get('page_title'));

        /*if ($this->config->get('module_custom_status')) {*/

            // Time
            // $hasTime = true;
            // if ($time['status'] && $now <= $time['start'] || $now > $time['end']) {
            // 	$data['time'] = sprintf($this->language->get('text_timeout'), date('H:i', $time['start']), date('H:i', $time['end']));
            // 	$hasTime = false;
            // }
//        $this->load->model('setting/setting');
//        $setting = $this->model_setting_setting->getSetting('module_custom');
//
//        var_dump($setting);
//        die();

            if ($this->cart->countProducts() > 0) {

                $this->load->model('setting/setting');
                $setting = $this->model_setting_setting->getSetting('module_custom');



                $this->load->model('checkout/custom_cart');

                $errors = $this->model_checkout_custom_cart->validate();

                // Подгружаем настройки
                if ($setting['module_custom_status'] && (!empty($errors)/* || !$hasTime*/)){

                    $data['cart'] = $this->getChildController('cart', $setting['module_custom_cart']);
                    $data['errors'] = $errors;

                } elseif ($setting['module_custom_status']) {

                    $data['login'] 		= $this->getChildController('login', $setting['module_custom_login']);
                    $data['cart'] 		= $this->getChildController('cart', $setting['module_custom_cart']);
                    $data['customer'] = $this->getChildController('customer', $setting['module_custom_customer']);
                    $data['shipping'] = $this->getChildController('shipping', $setting['module_custom_shipping']);
                    $data['payment'] 	= $this->getChildController('payment', $setting['module_custom_payment']);
                    $data['comment'] 	= $this->getChildController('comment', $setting['module_custom_comment']);
//                    $data['module'] 	= $this->getChildController('module', $setting['module_custom_module']);
//                    $data['total'] 		= $this->getChildController('total', $setting['module_custom_total']);

                }

            } else {
                $data['empty'] = $this->language->get('entry_empty');
            }


            if ($this->config->get('config_checkout_id')) {
                $this->load->model('catalog/information');

                $information_info = $this->model_catalog_information->getInformation($this->config->get('config_checkout_id'));

                if ($information_info) {
                    $data['text_agree'] = sprintf($this->language->get('text_agree'), $this->url->link('information/information/agree', 'information_id=' . $this->config->get('config_checkout_id'), true), $information_info['title'], $information_info['title']);
                } else {
                    $data['text_agree'] = '';
                }
            } else {
                $data['text_agree'] = '';
            }

            if (isset($this->session->data['agree'])) {
                $data['agree'] = $this->session->data['agree'];
            } else {
                $data['agree'] = '';
            }

        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header');

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');

        $this->response->setOutput($this->load->view('checkout/custom_cart', $data));
    }

    /**
     * @param $name
     * @param $setting
     * @return string
     */
    public function getChildController($name, $setting): string {
        return $this->load->controller('checkout/custom/'.$name, $setting);
    }

    /**
     * @return void
     */
    public function render() : void{

        if (isset($this->request->get['block'])){

            $this->load->model('setting/setting');
            $setting = json_decode($this->model_setting_setting->getValue('module_custom_'.$this->request->get['block']), true);

            $this->response->setOutput($this->load->controller('checkout/custom/'.$this->request->get['block'], $setting));

        }

    }
}
