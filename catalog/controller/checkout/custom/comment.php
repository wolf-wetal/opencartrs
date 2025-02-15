<?php
namespace Opencart\Catalog\Controller\Checkout\Custom;
/**
 * Class Comment
 *
 * @package Opencart\Catalog\Controller\Checkout\Custom
 */
class Comment extends \Opencart\System\Engine\Controller {

    /**
     * @param array $setting
     * @return string
     */
    public function index(array $setting = []) : string {

        if (isset($setting['status']) && (bool)$setting['status'] === true) {
            $this->load->language('checkout/custom/comment');

            $data['heading_comment'] = $this->language->get('heading_comment');
            $data['entry_comment'] = $this->language->get('entry_comment');

            if (isset($this->session->data['comment'])) {
                $data['comment'] = $this->session->data['comment'];
            } else {
                $data['comment'] = '';
            }

            $data['setting'] = $setting;
            return $this->load->view('checkout/custom/comment', $data);

        } else {

            $this->session->data['comment'] = '';
            return '';

        }

    }

    /**
     * @return void
     */
    public function save() : void {

        $json = array();

        $this->load->language('checkout/custom/comment');

        if (!isset($this->request->post['comment'])) {
            $json['error']['warning'] = $this->language->get('error_payment');
        } else {
            $this->session->data['comment'] = $this->request->post['comment'];
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));

    }

}