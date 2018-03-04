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

require_once 'payzen.php';

class ModelExtensionPaymentPayzenMulti extends  ModelExtensionPaymentPayzen {

	public function __construct($params) {
		parent::__construct($params);
		$this->name = 'payzen_multi';
	}

	protected function getHtmlTitle() {
		$title = $this->getTitle();
		$logo = '<img src="catalog/view/theme/default/image/payzen_multi.png" alt="PayZen" title="'.$title.'" style="height: 30px;" />';

		return $logo.' '.$title;
	}

	protected function getTitle() {
		$this->load->language('extension/payment/payzen');
		return sprintf($this->language->get('text_'.$this->name.'_title'), $this->config->get($this->name.'_count'));
	}
}
