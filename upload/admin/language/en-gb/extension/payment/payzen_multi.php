<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network <https://www.lyra.com>
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

require_once 'payzen.php';

// Headings.
$_['heading_title'] = 'PayZen - Payment in installments';
$_['text_edit'] = 'Edit PayZen - Payment in installments';

// Text
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Payment in installments</b> module details!';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_payzen_multi_validation'] = 'Warning: The field « %s » is not valid.';

// Gateway backend tabs & sections.
$_['tab_payzen_specific'] ='PAYMENT IN INSTALLMENTS';

$_['section_payzen_multi_options'] = 'PAYMENT OPTIONS';

// Gateway multi payment options.
$_['entry_payzen_first'] = '1st installment';
$_['entry_payzen_count'] = 'Count';
$_['entry_payzen_period'] = 'Period';

$_['desc_payzen_first'] = 'Amount of first installment, in percentage of total amount. If empty, all installments will have the same amount.';
$_['desc_payzen_count'] = 'Total number of installments.';
$_['desc_payzen_period'] = 'Delay (in days) between installments.';

// Gateway multi payment restriction warning.
$_['text_payzen_multi_restriction_warn'] = 'ATTENTION: The payment in installments feature activation is subject to the prior agreement of Société Générale.<br />If you enable this feature while you have not the associated option, an error 10000 – INSTALLMENTS_NOT_ALLOWED or 07 - PAYMENT_CONFIG will occur and the buyer will not be able to pay.';
$_['text_payzen_multi_not_available'] = 'The PayZen payment in installments is not available for your offer.';
