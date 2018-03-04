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
$_['heading_title'] = 'PayZen - Paiement en plusieurs fois par carte bancaire';
$_['text_edit'] = 'Editer PayZen - Paiement en plusieurs fois par carte bancaire';

// Text
$_['text_update_success'] = 'F&eacute;licitations, vous avez modifi&eacute; les d&eacute;tails du module <b>PayZen - Paiement en plusieurs fois par carte bancaire</b> avec succ&egrave;s !';
$_['text_payzen_multi'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" title="PayZen - Paiement en plusieurs fois par carte bancaire" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_payzen_multi_validation'] = 'Avertissement: le champ &laquo;%s&raquo; est invalide.';

// PayZen backend tabs and sections
$_['tab_payzen_specific'] ='PAIEMENT EN PLUSIEURS FOIS';

$_['section_payzen_multi_options'] = 'OPTIONS DE PAIEMENT';

// PayZen multi payment options
$_['entry_payzen_first'] = 'Premier paiement';
$_['entry_payzen_count'] = 'Nombre de paiements';
$_['entry_payzen_period'] = 'P&eacute;riode';

$_['desc_payzen_first'] = 'Montant du premier paiement, en pourcentage du montant total. Si vide, tous les paiements auront le même montant.';
$_['desc_payzen_count'] = 'Nombre total de paiements.';
$_['desc_payzen_period'] = 'D&eacute;lai en jours entre deux paiements.';
