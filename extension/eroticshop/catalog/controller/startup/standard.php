<?php
namespace Opencart\Catalog\Controller\Extension\eroticshop\Startup;

class Standard extends \Opencart\System\Engine\Controller
{
    public function index(): void
    {
        if ($this->config->get('theme_standard_status')) {
            $this->event->register('view/*/before', new \Opencart\System\Engine\Action('extension/eroticshop/startup/standard.event'));
        }
    }

    public function event(string &$route, array &$args, mixed &$output): void
    {


        $override = [
            'common/header',
            'common/cart',
            'common/search',
            'common/menu',
            'common/top_menu',
            'common/home',
            'common/category_img_index',
            'common/latest_products',
            'common/info_block_1',
            'common/info_block_2',
            'common/popup_cart',
            'common/products_discount',
            'common/footer',
            'common/payment_delivery',
            'product/category',
            'product/thumb',
            'product/product',
            'product/products_discount',
            'product/live_search',
            'product/search',
            'product/advantages_block',
            'account/login_popup',
            'account/login_popup.login',
            'account/register',
            'account/login',
            'account/forgotten',
            'checkout/checkout',
            'checkout/confirm',
            'checkout/cart',
            'common/success',
            'checkout/cart_list',
            'checkout/custom_cart',
            'checkout/custom/login',
            'checkout/custom/cart',
            'checkout/custom/customer',
            'checkout/custom/shipping',
            'checkout/custom/payment',
            'checkout/custom/comment',
            'checkout/custom/module',
            'checkout/custom/total',
            'information/adress'

        ];

        if (in_array($route, $override)) {

            $route = 'extension/eroticshop/' . $route;
        }
    }
}
