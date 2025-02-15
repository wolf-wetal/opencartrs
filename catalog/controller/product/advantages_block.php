<?php
namespace Opencart\Catalog\Controller\Product;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Product
 */
class AdvantagesBlock extends \Opencart\System\Engine\Controller {
	public function index(): string {
        return $this->load->view('product/advantages_block');
	}
}
