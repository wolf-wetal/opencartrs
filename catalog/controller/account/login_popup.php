<?php


namespace Opencart\Catalog\Controller\Account;

/**
 * Контроллер для обработки попапа входа
 */
class LoginPopup extends \Opencart\System\Engine\Controller {
    /**
     * Отображение попапа входа
     *
     * @return string
     */
    public function index(): string {

        // Если пользователь уже авторизован, перенаправляем его в личный кабинет
        if ($this->customer->isLogged() && isset($this->request->get['customer_token']) && isset($this->session->data['customer_token']) && ($this->request->get['customer_token'] == $this->session->data['customer_token'])) {
            $this->response->redirect($this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token']));
        }

        // Загрузка языкового файла
        $this->load->language('account/login');

        // Генерация токена для защиты от CSRF
        $this->session->data['login_token'] = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);

        // Подготовка данных для шаблона
        $data['login'] = $this->url->link('account/login_popup.login', 'language=' . $this->config->get('config_language') . '&login_token=' . $this->session->data['login_token']);
        $data['register'] = $this->url->link('account/register', 'language=' . $this->config->get('config_language')) . '.html';
        $data['forgotten'] = $this->url->link('account/forgotten', 'language=' . $this->config->get('config_language')) . '.html';

        // Отображение шаблона
        return $this->load->view('account/login_popup', $data);
    }

    /**
     * Обработка AJAX-запроса для входа
     *
     * @return void
     */
    public function login(): void {
        $this->load->language('account/login');

        $json = [];

        // Проверка, авторизован ли пользователь
        if ($this->customer->isLogged()) {
            $json['redirect'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'], true);
        }

        // Проверка токена
        if (!isset($this->request->post['login_token']) || !isset($this->session->data['login_token']) || ($this->request->post['login_token'] != $this->session->data['login_token'])) {
            $json['error'] = $this->language->get('error_token');
        }

        // Если ошибок нет, пытаемся авторизовать пользователя
        if (!$json) {
            $this->load->model('account/customer');

            // Проверка количества попыток входа
            $login_info = $this->model_account_customer->getLoginAttempts($this->request->post['email']);

            if ($login_info && ($login_info['total'] >= $this->config->get('config_login_attempts')) && strtotime('-1 hour') < strtotime($login_info['date_modified'])) {
                $json['error'] = $this->language->get('error_attempts');
            }

            // Проверка, подтвержден ли аккаунт
            $customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

            if ($customer_info && !$customer_info['approved']) {
                $json['error'] = $this->language->get('error_approved');
            }

            // Если ошибок нет, авторизуем пользователя
            if (!$json) {
                if (!$this->customer->login($this->request->post['email'], $this->request->post['password'])) {
                    $json['error'] = $this->language->get('error_login');

                    $this->model_account_customer->addLoginAttempt($this->request->post['email']);
                } else {
                    $this->model_account_customer->deleteLoginAttempts($this->request->post['email']);

                    // Логируем IP пользователя
                    $this->model_account_customer->addLogin($this->customer->getId(), $this->request->server['REMOTE_ADDR']);

                    // Удаляем токен входа
                    unset($this->session->data['login_token']);

                    // Создаем токен пользователя
                    $this->session->data['customer_token'] = token(26);

                    $json['redirect'] = $this->url->link('account/account', 'language=' . $this->config->get('config_language') . '&customer_token=' . $this->session->data['customer_token'], true);
                }
            }
        }

        // Возвращаем JSON-ответ
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}