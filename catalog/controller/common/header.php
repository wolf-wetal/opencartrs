<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Header
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Header extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
		// Analytics
		$data['analytics'] = [];
/*        var_dump('adads');
        die();*/

		if (!$this->config->get('config_cookie_id') || (isset($this->request->cookie['policy']) && $this->request->cookie['policy'])) {
			$this->load->model('setting/extension');

			$analytics = $this->model_setting_extension->getExtensionsByType('analytics');

			foreach ($analytics as $analytic) {
				if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
					$data['analytics'][] = $this->load->controller('extension/' . $analytic['extension'] . '/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
				}
			}
		}

		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$data['title'] = $this->document->getTitle();
		$data['base'] = $this->config->get('config_url');
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
        $data['category_id'] = $this->document->getCategoryId();

        if ($this->document->getTitle() === 'Корзина покупок' || $this->document->getTitle() === 'Оформление заказа') {
            $data['scripts_cart'] = 'extension/eroticshop/catalog/view/js/cart/cart.js';
            $data['scripts_checkout'] = 'extension/eroticshop/catalog/view/js/cart/checkout.js';
            $data['classbody'] = 'class="cabinet"';
        }

        if ($this->document->getTitle() === 'Адрес магазина') {
            $data['adress_css'] = 'extension/eroticshop/catalog/view/stylesheet/adress.css';
        }

		// Hard coding css so they can be replaced via the event's system.
		$data['bootstrap'] = 'catalog/view/stylesheet/bootstrap.css';
		$data['icons'] = 'catalog/view/stylesheet/fonts/fontawesome/css/all.min.css';
		$data['stylesheet'] = 'catalog/view/stylesheet/stylesheet.css';

		$data['slick_min'] = 'extension/eroticshop/catalog/view/js/slick.min.js';
		$data['common_ext'] = 'extension/eroticshop/catalog/view/js/common.js';
		$data['common_cat'] = 'catalog/view/javascript/common.js';

        $data['jquery_ui_touch_punch_min_js'] = 'extension/eroticshop/catalog/view/js/jquery.ui.touch-punch.min.js';
        $data['jquery_ui_js'] = 'extension/eroticshop/catalog/view/js/jquery-ui.js';
       // $data['login_popup_js'] = 'extension/eroticshop/catalog/view/js/login_popup.js';
        $data['jquery_fancybox_min_js'] = 'extension/eroticshop/catalog/view/js/jquery.fancybox.min.js';
        $data['jquery_3_4_1_js'] = 'extension/eroticshop/catalog/view/js/jquery-3.4.1.min.js';

		$data['style_ext'] = 'extension/eroticshop/catalog/view/stylesheet/style.css';
		$data['style_1_ext'] = 'extension/eroticshop/catalog/view/stylesheet/style_1.css';
		$data['slick_ext'] = 'extension/eroticshop/catalog/view/stylesheet/slick.css';
        $data['fancybox_min'] = 'extension/eroticshop/catalog/view/stylesheet/fancybox.min.css';
        $data['jquery_ui_css'] = 'extension/eroticshop/catalog/view/stylesheet/jquery-ui.css';

		// Hard coding scripts so they can be replaced via the event's system.
		$data['jquery'] = 'catalog/view/javascript/jquery/jquery-3.7.1.min.js';

		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts('header');

		$data['name'] = $this->config->get('config_name');

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');

		// Wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');

			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		} else {
			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		}

		$data['home'] = $this->url->link('common/home', 'language=' . $this->config->get('config_language'));
		$data['wishlist'] = $this->url->link('account/wishlist', 'language=' . $this->config->get('config_language') . (isset($this->session->data['customer_token']) ? '&customer_token=' . $this->session->data['customer_token'] : ''));
		$data['logged'] = $this->customer->isLogged();

		if (!$this->customer->isLogged()) {
			$data['register'] = $this->url->link('account/register', 'language=' . $this->config->get('config_language')) . '.html';
			$data['login'] = $this->url->link('account/login', 'language=' . $this->config->get('config_language')) . '.html';
 		} else {
			$data['account'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
			$data['order'] = $this->url->link('account/order', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
			$data['transaction'] = $this->url->link('account/transaction', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
			$data['download'] = $this->url->link('account/download', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']);
			$data['logout'] = $this->url->link('account/logout', 'language=' . $this->config->get('config_language'));
		}


        $data['shopping_cart'] = $this->url->link('checkout/cart', 'language=' . $this->config->get('config_language'));
		$data['checkout'] = $this->url->link('checkout/checkout', 'language=' . $this->config->get('config_language'));
		$data['contact'] = $this->url->link('information/contact', 'language=' . $this->config->get('config_language'));
 		$data['telephone'] = $this->config->get('config_telephone');

		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');

		$data['cart'] = $this->load->controller('common/cart');
		$data['menu'] = $this->load->controller('common/menu');
		$data['top_menu'] = $this->load->controller('common/top_menu');

		$data['login_popup'] = $this->load->controller('account/login_popup');

/*        var_dump('<pre>');
        var_dump($data);
        die();*/

		return $this->load->view('common/header', $data);
	}
}
