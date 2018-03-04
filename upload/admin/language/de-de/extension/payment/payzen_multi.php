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
$_['heading_title'] = 'PayZen - Ratenzahlung mit EC-/Kreditkarte';
$_['text_edit'] = 'Edit PayZen - Ratenzahlung mit EC-/Kreditkarte';

// Text
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Ratenzahlung mit EC-/Kreditkarte</b> modulsdetailen !';
$_['text_payzen_multi'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" title="PayZen - Ratenzahlung mit EC-/Kreditkarte" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

$_['error_payzen_multi_validation'] = 'Warnung: Das feld &laquo;%s&raquo; ist ung&uuml;ltig.';

// PayZen backend tabs & sections
$_['tab_payzen_specific'] ='RATENZAHLUNG';

$_['section_payzen_multi_options'] = 'ZAHLUNGSOPTIONEN';


// PayZen multi payment options
$_['entry_payzen_first'] = 'Erste Zahlung';
$_['entry_payzen_count'] = 'Zahl';
$_['entry_payzen_period'] = 'Zeitraum';

$_['desc_payzen_first'] = 'Betrag der ersten Zahlung ins gesamtes Prozent. Wenn leer, alle Zahlungen werden den gleichen Betrag haben.';
$_['desc_payzen_count'] = 'Gesamte Zahl von Zahlungen.';
$_['desc_payzen_period'] = 'Zeit in Tages zwischen zwei Zahlungen.';
