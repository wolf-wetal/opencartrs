<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class InfoBlock2 extends \Opencart\System\Engine\Controller {
	public function index(): string {
        return $this->load->view('common/info_block_2');
	}
}
