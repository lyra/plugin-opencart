<?php
/**
 * PayZen V2-Payment Module version 3.0.0 for OpenCart 2.3.x. Support contact : support@payzen.eu.
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
 * @copyright 2014-2017 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 */

class ModelExtensionPaymentPayzen extends Model {

	protected $name;

	public function __construct($params) {
		parent::__construct($params);
		$this->name = 'payzen';
	}

	public function getMethod($address, $total) {
		if (!$this->checkMethod($address, $total)) {
			return array();
		}

		return array(
				'code' => $this->name,
				'terms' => '',
				'title' => $this->getHtmlTitle(),
				'sort_order' => $this->config->get($this->name.'_sort_order')
		);
	}

	protected function checkMethod($address, $total) {
		if (!$this->config->get($this->name.'_status')) {
			// disabled module
			return false;
		}

		$query = $this->db->query(
				'SELECT * FROM '.DB_PREFIX."zone_to_geo_zone WHERE geo_zone_id = '".(int)$this->config->get($this->name.'_geo_zone').
				"' AND country_id = '".(int)$address['country_id']."' AND (zone_id = '".(int)$address['zone_id']."' OR zone_id = '0')"
		);
		if ($this->config->get($this->name.'_geo_zone') && !$query->num_rows) {
			// if geo zone is configured and user country do not belong to module geo zone
			return false;
		}

		// check the customer's credit
		if ($this->config->get('credit_status')) {
			$credit = $this->customer->getBalance();

			if ((float)$credit) {
				if ($credit >= $total) {
					return false;
				}
			}
		}

		// load PayzenApi class
		require_once(DIR_SYSTEM.'library/payzen/api.php');

		// check the current currency support
		$currencyObj = PayzenApi::findCurrencyByAlphaCode($this->session->data['currency']);
		if($currencyObj == null) {
			return false;
		}

		$min = $this->config->get($this->name.'_min_amount');
		$max = $this->config->get($this->name.'_max_amount');

		// check the amount authorized by the module
		if(($min != '' && $total < $min) || ($max != '' && $total > $max)) {
			return false;
		}

		return true;
	}

	protected function getHtmlTitle() {
		$title = $this->getTitle();
		$logo = '<img src="catalog/view/theme/default/image/payzen.png" alt="PayZen" title="'.$title.'" style="height: 30px;" />';

		return $logo.' '.$title;
	}

	protected function getTitle() {
		$this->load->language('extension/payment/payzen');
		return $this->language->get('text_'.$this->name.'_title');
	}

	public function updateMethodTitle($order_id) {
		$this->db->query('UPDATE `'.DB_PREFIX."order` SET `payment_method` = '".
						$this->db->escape($this->getTitle())."' WHERE order_id = '".(int)$order_id."'");
	}
}
