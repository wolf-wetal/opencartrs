<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class CategoryImgIndex extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
        $data['top_menu'] = [];

        $data['url_seks_igrushki'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=31') .'.html';
        $data['url_vozbuditeli'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=33') .'.html';
        $data['url_poppers'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=50') .'.html';
        $data['url_intim_uhod'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=193') .'.html';

        $data['url_bdsm'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=6') .'.html';
        $data['url_eroticheskoe_bele'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=1') .'.html';
        $data['url_suveniry'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=192') .'.html';

        return $this->load->view('common/category_img_index', $data);
	}
}
