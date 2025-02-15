<?php
namespace Opencart\Catalog\Controller\Common;
/**
 * Class Menu
 *
 * @package Opencart\Catalog\Controller\Common
 */
class Menu extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */
	public function index(): string {
		$this->load->language('common/menu');

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

	//	$data['categories'] = [];

        $categories = $this->model_catalog_category->getCategories(0);
        $data['categories'] = $this->getCategoryTree($categories);
		/*foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = [];

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = [
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					];

					$children_data[] = [
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href'  => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category['category_id'] . '_' . $child['category_id']) . '.html'
					];
				}

				// Level 1
				$data['categories'][] = [
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $category['category_id']) . '.html'
				];
			}
		}*/
/*        var_dump('<pre>');
        var_dump($data['categories']);
        die();*/

        $data['url_novinki'] = $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=120') .'.html';
        $data['url_skidki'] = $this->url->link('product/products_discount', 'language=' . $this->config->get('config_language') ) . '.html';
        $data['payment_delivery'] = $this->url->link('common/payment_delivery', 'language=' . $this->config->get('config_language')).'.html';
        $data['adress'] = $this->url->link('information/adress', 'language=' . $this->config->get('config_language')).'.html';

        return $this->load->view('common/menu', $data);
	}

    /**
     * @return array
     */
    private function getCategoryTree($categories, $path = ''): array {
        $category_data = [];

        foreach ($categories as $category) {
            if ($category['top']) {
                // Формируем путь к текущей категории
                $current_path = $path ? $path . '_' . $category['category_id'] : $category['category_id'];

                // Получаем дочерние категории
                $children_data = [];
                $children = $this->model_catalog_category->getCategories($category['category_id']);

                if ($children) {
                    $children_data = $this->getCategoryTree($children, $current_path);
                }

                $category_info = [
                    'name'   => $category['name'],
                    'column' => $category['column'] ? $category['column'] : 1,
                    'href'   => $this->url->link('product/category', 'language=' . $this->config->get('config_language') . '&path=' . $current_path) . '.html'
                ];

                // Добавляем дочерние категории только если они существуют
                if (!empty($children_data)) {
                    $category_info['children'] = $children_data;
                }

                $category_data[] = $category_info;
            }
        }

        return $category_data;
    }
}
