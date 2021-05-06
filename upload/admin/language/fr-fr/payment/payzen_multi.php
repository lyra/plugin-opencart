<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

require_once 'payzen.php';

// Headings.
$_['heading_title'] = 'PayZen - Paiement en plusieurs fois';
$_['text_edit'] = 'Editer PayZen - Paiement en plusieurs fois';

// Texts.
$_['text_update_success'] = 'F&eacute;licitations, vous avez modifi&eacute; les d&eacute;tails du module <b>PayZen - Paiement en plusieurs fois</b> avec succ&egrave;s !';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

$_['error_payzen_multi_validation'] = 'Avertissement: le champ &laquo;%s&raquo; est invalide.';

// Gateway backend tabs and sections.
$_['tab_payzen_specific'] = 'PAIEMENT EN PLUSIEURS FOIS';

$_['section_payzen_multi_options'] = 'OPTIONS DE PAIEMENT';

// Gateway multi payment options.
$_['entry_payzen_first'] = 'Premi&egrave;re &eacute;ch&eacute;ance';
$_['entry_payzen_count'] = 'Nombre de paiements';
$_['entry_payzen_period'] = 'P&eacute;riode';

$_['desc_payzen_first'] = 'Montant de la premi&egrave;re &eacute;ch&eacute;ance, en pourcentage du montant total. Si vide, toutes les &eacute;ch&eacute;ances auront le même montant.';
$_['desc_payzen_count'] = 'Nombre total de paiements.';
$_['desc_payzen_period'] = 'D&eacute;lai en jours entre deux paiements.';

// Gateway multi payment restriction.
$_['text_payzen_multi_not_available'] = 'Le paiement PayZen en plusieurs fois n&#39;est pas disponible pour votre offre.';
$_['text_payzen_multi_restriction_warn'] = 'ATTENTION: L&#39;activation de la fonctionnalit&eacute; de paiement en nfois est soumise &agrave; accord pr&eacute;alable de Soci&eacute;t&eacute; G&eacute;n&eacute;rale.<br />Si vous activez cette fonctionnalit&eacute; alors que vous ne disposez pas de cette option, une erreur 10000 – INSTALLMENTS_NOT_ALLOWED ou 07 - PAYMENT_CONFIG sera g&eacute;n&eacute;r&eacute;e et l&#39;acheteur sera dans l&#39;incapacit&eacute; de payer.';
