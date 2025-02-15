<?php
namespace Opencart\Catalog\Controller\Account;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Account
 */
class LoginPopup extends \Opencart\System\Engine\Controller {
	public function index(): string {
/*        var_dump('<pre>');
        var_dump($this->request->get['customer_token']);
        var_dump($this->session->data['customer_token']);
        die();*/
        // If already logged in and has matching token then redirect to account page
        if ($this->customer->isLogged() && isset($this->request->get['customer_token']) && isset($this->session->data['customer_token']) && ($this->request->get['customer_token'] == $this->session->data['customer_token'])) {
            // Проверка наличия в сессии флага перенаправления, чтобы избежать бесконечного редиректа
            if (!isset($this->session->data['redirect_done'])) {
                $this->session->data['redirect_done'] = true;
                $this->response->redirect($this->url->addHtmlSuffixToUrls($this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'])));
            }
        }

        $this->load->language('account/login');


        // Check to see if user is using incorrect token
        if (isset($this->session->data['customer_token'])) {
            $data['error_warning'] = $this->language->get('error_token');

            $this->customer->logout();

            unset($this->session->data['customer']);
            unset($this->session->data['shipping_address']);
            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_address']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['comment']);
            unset($this->session->data['order_id']);
            unset($this->session->data['coupon']);
            unset($this->session->data['reward']);
            unset($this->session->data['voucher']);
            unset($this->session->data['vouchers']);
            unset($this->session->data['customer_token']);
        } elseif (isset($this->session->data['error'])) {

            $data['error_warning'] = $this->session->data['error'];

            unset($this->session->data['error']);
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->session->data['success'])) {
            $data['success'] = $this->session->data['success'];

            unset($this->session->data['success']);
        } else {
            $data['success'] = '';
        }

        if (isset($this->session->data['redirect'])) {
            $data['redirect'] = $this->session->data['redirect'];

            unset($this->session->data['redirect']);
        } elseif (isset($this->request->get['redirect'])) {
            $data['redirect'] = urldecode($this->request->get['redirect']);
        } else {
            $data['redirect'] = '';
        }

        $this->session->data['login_token'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);

        $data['login'] = $this->url->link('account/login.login', 'language=' . $this->config->get('config_language') . '&login_token=' . $this->session->data['login_token']);
        $data['register'] = $this->url->link('account/register', 'language=' . $this->config->get('config_language')) .'.html';
        $data['forgotten'] = $this->url->link('account/forgotten', 'language=' . $this->config->get('config_language')) .'.html';

        return $this->load->view('account/login_popup', $data);
	}

    public function login(): void {
        $this->load->language('account/login');

        $json = [];

        if ($this->customer->isLogged()) {
            $json['redirect'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'], true);
        }

        if (!isset($this->request->post['login_token']) || !isset($this->session->data['login_token']) || ($this->request->post['login_token'] != $this->session->data['login_token'])) {
            $json['error'] = $this->language->get('error_token');
        }

        if (!$json) {
            $this->load->model('account/customer');

            // Check how many login attempts have been made.
            $login_info = $this->model_account_customer->getLoginAttempts($this->request->post['email']);

            if ($login_info && ($login_info['total'] >= $this->config->get('config_login_attempts')) && strtotime('-1 hour') < strtotime($login_info['date_modified'])) {
                $json['error'] = $this->language->get('error_attempts');
            }

            // Check if customer has been approved.
            $customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

            if ($customer_info && !$customer_info['approved']) {
                $json['error'] = $this->language->get('error_approved');
            }

            if (!$json) {
                if (!$this->customer->login($this->request->post['email'], $this->request->post['password'])) {
                    $json['error'] = $this->language->get('error_login');

                    $this->model_account_customer->addLoginAttempt($this->request->post['email']);
                } else {
                    $this->model_account_customer->deleteLoginAttempts($this->request->post['email']);

                    // Log the IP info
                    $this->model_account_customer->addLogin($this->customer->getId(), $this->request->server['REMOTE_ADDR']);

                    // Unset login token
                    unset($this->session->data['login_token']);

                    // Create customer token
                    $this->session->data['customer_token'] = token(26);

                    $json['redirect'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'], true);
                }
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

}
