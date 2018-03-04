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

// Headings
$_['heading_title'] = 'PayZen - Payment in several times by credit card';
$_['text_edit'] = 'Edit PayZen - Payment in several times by credit card';

// Text
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>#PayZen - Payment in several times by credit card</b> module details !';
$_['text_payzen_multi'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" title="PayZen - Payment in several times by bank card" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

$_['error_payzen_multi_validation'] = 'Warning: The field &laquo;%s&raquo; is not valid.';

// PayZen backend tabs & sections
$_['tab_payzen_specific'] ='PAYMENT IN SEVERAL TIMES';

$_['section_payzen_multi_options'] = 'PAYMENT OPTIONS';

// PayZen multi payment options
$_['entry_payzen_first'] = 'First payment';
$_['entry_payzen_count'] = 'Number of payments';
$_['entry_payzen_period'] = 'Period';

$_['desc_payzen_first'] = 'Amount of first payment, in percentage of total amount. If empty, all payments will have the same amount.';
$_['desc_payzen_count'] = 'Total number of payments.';
$_['desc_payzen_period'] = 'Delay in days between payments.';