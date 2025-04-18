<?php
namespace Opencart\Catalog\Model\Extension\Opencart\Payment;
/**
 * Class FreeCheckout
 *
 * @package
 */
class FreeCheckout extends \Opencart\System\Engine\Model {
	/**
	 * @param array $address
	 *
	 * @return array
	 */
	public function getMethods(array $address = []): array {

		$this->load->language('extension/opencart/payment/free_checkout');

		$total = $this->cart->getTotal();

		if (!empty($this->session->data['vouchers'])) {
			$amounts = array_column($this->session->data['vouchers'], 'amount');
		} else {
			$amounts = [];
		}

		$total = $total + array_sum($amounts);



		if ((float)$total <= 0.00) {
			$status = true;
		} elseif ($this->cart->hasSubscription()) {
			$status = false;
		} else {
			$status = true;
		}

		$method_data = [];

		if ($status) {
			$option_data['free_checkout'] = [
				'code' => 'free_checkout.free_checkout',
				'name' => $this->language->get('heading_title')
			];

			$method_data = [
				'code'       => 'free_checkout',
				'name'       => $this->language->get('heading_title'),
				'option'     => $option_data,
				'sort_order' => $this->config->get('payment_free_checkout_sort_order')
			];
		}

		return $method_data;
	}
}