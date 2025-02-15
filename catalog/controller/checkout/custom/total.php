<?php
namespace Opencart\Catalog\Controller\Checkout\Custom;
/**
 * Class Total
 *
 * @package Opencart\Catalog\Controller\Checkout\Custom
 */
class Total extends \Opencart\System\Engine\Controller {

    /**
     * @param array $setting
     * @return array
     */
	public function index(array $setting = []) : array {

		// Блок отображается
		if (isset($setting['status']) && (bool)$setting['status'] === true) {

			$this->load->language('checkout/custom/total');

			$data['heading_total'] = $this->language->get('heading_total');

			$data['totals'] = array();

			$result = $this->getTotals();

			foreach ($result['totals'] as $total) {
				$data['totals'][] = array(
					'title' => $total['title'],
					'text'  => $total['value'] !== 0 ? $this->currency->format($total['value'], $this->session->data['currency']) : $this->language->get('text_free')
				);
			}

			$data['setting'] = $setting;
			return $this->load->view('checkout/custom/total', $data);

		// Блок отключен
		} else {
			return [];
		}

	}

    /**
     * @return array
     */
	public function getTotals() : array{

        $this->load->model('checkout/cart');

		$totals = array();
		$taxes = $this->cart->getTaxes();
		$total = 0;
        $totals_summ = 0;
		
		// Because __call can not keep var references so we put them into an array.
		$total_data = array(
			'totals' => &$totals,
			'taxes'  => &$taxes,
			'total'  => &$total
		);
		
		// Display prices
		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
            $data['totals'] = [];

            $totals = [];
            $taxes = $this->cart->getTaxes();
            $total = 0;

            // Display prices
            if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
                ($this->model_checkout_cart->getTotals)($totals, $taxes, $total);


                foreach ($totals as $result) {
                    $data['totals'][] = [
                        'title' => $result['title'],
                        'text'  => $this->currency->format($result['value'], $this->session->data['currency'])
                    ];
                }
            }

            $totals_summ = $total;

        }

        return array(
			'total' => $total,
			'totals' => $totals_summ
		);
		
	}

}