<?php
/**
 * PayZen V2-Payment Module version 2.1.0 for OpenCart 2.0-2.2. Support contact : support@payzen.eu.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  payment
 * @package   payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2016 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 * @version   2.1.0 (revision 67770)
 */

require_once('payzen.php');

class ControllerPaymentPayzenMulti extends ControllerPaymentPayzen {

	public function __construct($params) {
		parent::__construct($params);

		$this->name = 'payzen_multi';
	}

	protected function getPayzenRequest() {
		$payzenRequest = parent::getPayzenRequest();

		if($payzenRequest->get('amount')) {
			$currency = PayzenApi::findCurrencyByNumCode($payzenRequest->get('currency'));
			$amount = $currency->convertAmountToFloat($payzenRequest->get('amount'));

			// multi payment options
			$configFirst = $this->config->get('payzen_multi_first');
			$first = $configFirst ?
					$currency->convertAmountToInteger($configFirst / 100 * $amount) :
					null;

			$payzenRequest->setMultiPayment(
					null /* use already set amount */,
					$first,
					$this->config->get('payzen_multi_count'),
					$this->config->get('payzen_multi_period')
			);
		}

		return $payzenRequest;
	}
}
