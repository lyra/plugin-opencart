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
$_['heading_title'] = 'PayZen - Ratenzahlung';
$_['text_edit'] = 'Edit PayZen - Ratenzahlung';

// Texts.
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Ratenzahlung/b> modulsdetailen !';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

$_['error_payzen_multi_validation'] = 'Warnung: Das feld &laquo;%s&raquo; ist ung&uuml;ltig.';

// Gateway backend tabs & sections.
$_['tab_payzen_specific'] = 'RATENZAHLUNG';

$_['section_payzen_multi_options'] = 'ZAHLUNGSOPTIONEN';

// Gateway multi payment options.
$_['entry_payzen_first'] = 'Erste Rate';
$_['entry_payzen_count'] = 'Zahl';
$_['entry_payzen_period'] = 'Zeitraum';

$_['desc_payzen_first'] = 'Betrag der ersten Rate ins gesamtes Prozent. Wenn leer, alle Raten werden den gleichen Betrag haben.';
$_['desc_payzen_count'] = 'Gesamte Zahl von Zahlungen.';
$_['desc_payzen_period'] = 'Zeit in Tages zwischen zwei Zahlungen.';

// Gateway multi payment restriction.
$_['text_payzen_multi_not_available'] = 'The PayZen payment in installments is not available for your offer.';
$_['text_payzen_multi_restriction_warn'] = 'ATTENTION: The payment in installments feature activation is subject to the prior agreement of Soci&eacute;t&eacute; G&eacute;n&eacute;rale.<br />If you enable this feature while you have not the associated option, an error 10000 – INSTALLMENTS_NOT_ALLOWED or 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.';
