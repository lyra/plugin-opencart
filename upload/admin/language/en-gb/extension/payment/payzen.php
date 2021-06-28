<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network <https://www.lyra.com>
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

// Headings.
$_['heading_title'] = 'PayZen - Standard payment';
$_['text_edit'] = 'Edit PayZen - Standard payment';

// Text.
$_['text_home'] = 'Home';
$_['text_payment'] = 'Payment';
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Standard payment</b> module details!';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen - Standard payment" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Warning: You do not have permission to modify <b>PayZen</b> payment module!';

// Gateway backend tabs & sections.
$_['tab_payzen_general'] ='GENERAL CONFIGURATION';
$_['tab_payzen_specific'] ='STANDARD PAYMENT';
$_['tab_payzen_orders'] ='ORDERS';

$_['section_payzen_module_info'] = 'MODULE INFORMATION';
$_['section_payzen_payment_access'] = 'PAYMENT GATEWAY ACCESS';
$_['section_payzen_payment_page'] = 'PAYMENT PAGE';
$_['section_payzen_selective_3ds'] = 'CUSTOM 3DS';
$_['section_payzen_return_to_shop'] = 'RETURN TO SHOP';
$_['section_payzen_module_setting'] = 'DISPLAY OPTIONS';
$_['section_payzen_amount_restrictions'] = 'AMOUNT RESTRICTIONS';
$_['section_payzen_orders'] ='ORDER STATUS';

// Gateway backend entries.
$_['entry_payzen_developed_by']  = 'Developed by: ';
$_['entry_payzen_support_email'] = 'Contact us: ';
$_['entry_payzen_plugin_version'] = 'Module version: ';
$_['entry_payzen_gateway_version'] = 'Gateway version: ';

$_['entry_payzen_site_id'] = 'Shop ID';
$_['entry_payzen_key_test'] = 'Key in test mode';
$_['entry_payzen_key_prod'] = 'Key in production mode';
$_['entry_payzen_ctx_mode'] = 'Mode';
$_['entry_payzen_sign_algo'] = 'Signature algorithm';
$_['entry_payzen_url_check'] = 'Instant Payment Notification URL';
$_['entry_payzen_platform_url'] = 'Payment page URL';

$_['entry_payzen_language'] = 'Default language';
$_['entry_payzen_available_languages'] = 'Available languages';
$_['entry_payzen_capture_delay'] = 'Capture delay';
$_['entry_payzen_validation_mode'] = 'Validation mode';
$_['entry_payzen_payment_cards'] = 'Card types';

$_['entry_payzen_3ds_min_amount'] = 'Manage 3DS';

$_['entry_payzen_redirect_enabled'] = 'Automatic redirection';
$_['entry_payzen_redirect_success_timeout'] = 'Redirection timeout on success';
$_['entry_payzen_redirect_success_message'] = 'Redirection message on success';
$_['entry_payzen_redirect_error_timeout'] = 'Redirection timeout on failure';
$_['entry_payzen_redirect_error_message'] = 'Redirection message on failure';
$_['entry_payzen_return_mode'] = 'Return mode';

$_['entry_payzen_status'] = 'Activation';
$_['entry_payzen_sort_order'] = 'Sort order';
$_['entry_payzen_geo_zone'] = 'Payment zone';
$_['entry_payzen_enable_logs'] = 'Logs';

$_['entry_payzen_min_amount'] = 'Minimum amount';
$_['entry_payzen_max_amount'] = 'Maximum amount';

$_['entry_payzen_order_status_failed'] = 'Status of orders when payment is declined';
$_['entry_payzen_order_status_success'] = 'Status of orders when payment is successfull';
$_['entry_payzen_order_status_canceled'] = 'Status of orders when payment is cancelled';
$_['entry_payzen_notify_failed'] = 'Notify buyer on payment failure';
$_['entry_payzen_notify_canceled'] = 'Notify buyer on payment cancel';

$_['desc_payzen_site_id'] = 'The identifier provided by PayZen.';
$_['desc_payzen_key_test'] = 'Key provided by PayZen for test mode (available in PayZen Back Office).';
$_['desc_payzen_key_prod'] = 'Key provided by PayZen (available in PayZen Back Office after enabling production mode).';
$_['desc_payzen_ctx_mode'] = 'The context mode of this module.';
$_['desc_payzen_sign_algo'] = 'Algorithm used to compute the payment form signature. Selected algorithm must be the same as one configured in the PayZen Back Office.<br /><b>The HMAC-SHA-256 algorithm should not be activated if it is not yet available in the PayZen Back Office, the feature will be available soon.</b>';
$_['desc_payzen_url_check'] = 'URL to copy into your PayZen Back Office > Settings > Notification rules.<br />In multistore mode, notification URL is the same for all the stores.';
$_['desc_payzen_platform_url'] = 'Link to the payment page.';

$_['desc_payzen_language'] = 'Default language on the payment page.';
$_['desc_payzen_available_languages'] = 'Languages available on the payment page. If you do not select any, all the supported languages will be available.';
$_['desc_payzen_capture_delay'] = 'The number of days before the bank capture (adjustable in your PayZen Back Office).';
$_['desc_payzen_validation_mode'] = 'If manual is selected, you will have to confirm payments manually in your PayZen Back Office.';
$_['desc_payzen_payment_cards'] = 'The card type(s) that can be used for the payment. Select none to use gateway configuration.';

$_['desc_payzen_3ds_min_amount'] = 'Amount below which customer could be exempt from strong authentication. Needs subscription to &laquo;Selective 3DS1&raquo; or &laquo;Frictionless 3DS2&raquo; options. For more information, refer to the module documentation.';

$_['desc_payzen_redirect_enabled'] = 'If enabled, the buyer is automatically redirected to your site at the end of the payment.';
$_['desc_payzen_redirect_success_timeout'] = 'Time in seconds (0-300) before the buyer is automatically redirected to your website after a successful payment.';
$_['desc_payzen_redirect_success_message'] = 'Message displayed on the payment page prior to redirection after a successful payment.';
$_['desc_payzen_redirect_error_timeout'] = 'Time in seconds (0-300) before the buyer is automatically redirected to your website after a declined payment.';
$_['desc_payzen_redirect_error_message'] = 'Message displayed on the payment page prior to redirection after a declined payment.';
$_['desc_payzen_return_mode'] = 'Method that will be used for transmitting the payment result from the payment page to your shop.';

$_['desc_payzen_status'] = 'Enables / disables this payment method.';
$_['desc_payzen_sort_order']= 'In the payment methods list.';
$_['desc_payzen_geo_zone'] = 'If an area is selected, this payment mode will only be available for it.';

$_['desc_payzen_enable_logs'] = 'Enable / disable module logs.';

$_['desc_payzen_min_amount'] = 'Minimum amount to activate this payment method.';
$_['desc_payzen_max_amount'] = 'Maximum amount to activate this payment method.';

// Gateway backend misc texts.
$_['text_payzen_redirect_message'] = 'Redirection to shop in a few seconds...';

$_['text_payzen_chinese'] = 'Chinese';
$_['text_payzen_dutch'] = 'Dutch';
$_['text_payzen_english'] = 'English';
$_['text_payzen_french'] = 'French';
$_['text_payzen_german'] = 'German';
$_['text_payzen_italian'] = 'Italian';
$_['text_payzen_japanese'] = 'Japanese';
$_['text_payzen_polish'] = 'Polish';
$_['text_payzen_portuguese'] = 'Portuguese';
$_['text_payzen_russian'] = 'Russian';
$_['text_payzen_spanish'] = 'Spanish';
$_['text_payzen_swedish'] = 'Swedish';
$_['text_payzen_turkish'] = 'Turkish';

$_['text_payzen_test'] = 'TEST';
$_['text_payzen_production'] = 'PRODUCTION';

$_['text_payzen_default'] = 'PayZen Back Office configuration';
$_['text_payzen_automatic'] = 'Automatic';
$_['text_payzen_manual'] = 'Manual';

$_['text_payzen_yes'] = 'Yes';
$_['text_payzen_no'] = 'No';
