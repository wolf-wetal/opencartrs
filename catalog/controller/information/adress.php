<?php
namespace Opencart\Catalog\Controller\Information;
/**
 * Class Information
 *
 * @package Opencart\Catalog\Controller\Information
 */
class Adress extends \Opencart\System\Engine\Controller
{
    /**
     * @return void
     */
    public function index(): void
    {

            $this->document->setTitle('Адрес магазина');
        /*           $this->document->setDescription($information_info['meta_description']);
                   $this->document->setKeywords($information_info['meta_keyword']);*/

            $data['breadcrumbs'] = [];

            $data['breadcrumbs'][] = [
                'text' => 'Главная',
                'href' => $this->url->link('common/home', 'language=' . $this->config->get('config_language')) . '.html'
            ];

            $data['breadcrumbs'][] = [
                'text' => 'Адрес',
                'href' => $this->url->link('information/adress', 'language=' . $this->config->get('config_language')) . '.html'
            ];

            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('information/adress', $data));

    }
}
