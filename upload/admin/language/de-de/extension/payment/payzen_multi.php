<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart See COPYING.md for license details.
 *
 * @author     Lyra Network <https://www.lyra.com>
 * @copyright  Lyra Network
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

require_once 'payzen.php';

// Headings.
$_['heading_title'] = 'PayZen - Ratenzahlung';
$_['text_edit'] = 'Edit PayZen - Ratenzahlung';

// Text.
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Ratenzahlung</b> modulsdetailen!';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_payzen_multi_validation'] = 'Warnung: Das feld « %s » ist ungültig.';

// Gateway backend tabs & sections.
$_['tab_payment_payzen_multi_specific'] ='RATENZAHLUNG';

$_['section_payment_payzen_multi_options'] = 'RATENZAHLUNG OPTIONEN';

// Gateway multi payment options.
$_['entry_payment_payzen_multi_first'] = '1. Rate';
$_['entry_payment_payzen_multi_count'] = 'Anzahl';
$_['entry_payment_payzen_multi_period'] = 'Zeitraum';

$_['desc_payment_payzen_multi_first'] = 'Betrag der ersten Rate insgesamtes Prozent. Falls dies nicht angegeben ist, haben alle Raten den gleichen Betrag.';
$_['desc_payment_payzen_multi_count'] = 'Gesamtanzahl der Raten.';
$_['desc_payment_payzen_multi_period'] = 'Zeitraum zwischen zwei Raten (in Tagen).';

// Gateway multi payment restriction warning.
$_['text_payment_payzen_multi_restriction_warn'] = 'ATTENTION: The payment in installments feature activation is subject to the prior agreement of Société Générale.<br />If you enable this feature while you have not the associated option, an error 10000 – INSTALLMENTS_NOT_ALLOWED or 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.';
$_['text_payment_payzen_multi_not_available'] = 'The PayZen payment in installments is not available for your offer.';
