<?php
#####################################################################################################
#
#					Module pour la plateforme de paiement PayZen
#						Version : 1.2a (révision 51616)
#									########################
#					Développé pour OpenCart
#						Version : 1.5.5.1
#						Compatibilité plateforme : V2
#									########################
#					Développé par Lyra Network
#						http://www.lyra-network.com/
#						24/09/2013
#						Contact : support@payzen.eu
#
#####################################################################################################

// Heading
$_['heading_title'] = 'PayZen - Bank Card Payment';

// Text
$_['text_payment'] = 'Payment';
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen</b> payment module details !';
$_['text_install_success'] = 'Congratulations, <b>PayZen</b> payment module has been successfully installed !';
$_['text_payzen'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.jpg" alt="PayZen" title="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Error
$_['error_permission'] = 'Warning: You do not have permission to modify <b>PayZen</b> payment module !';

// PayZen administration interface tabs
$_['tab_payzen_module_info'] = 'MODULE INFORMATIONS';
$_['tab_payzen_module_setting'] = 'MODULE SETTINGS';
$_['tab_payzen_payment_access'] = 'PAYMENT GATEWAY ACCESS';
$_['tab_payzen_payment_page'] = 'PAYMENT PAGE';
$_['tab_payzen_selective_3ds'] = 'SELECTIVE 3DS';
$_['tab_payzen_amount_restrictions'] = 'AMOUNT RESTRICTIONS';
$_['tab_payzen_return_to_shop'] = 'RETURN TO SHOP';

// PayZen administration interface entries
$_['entry_payzen_developed_by']  = 'Developed by : ';
$_['entry_payzen_contact_email'] = 'Contact us : ';
$_['entry_payzen_contrib_version'] = 'Module version : ';
$_['entry_payzen_cms_version'] = 'Tested with : ';
$_['entry_payzen_gateway_version'] = 'Platform version : ';

$_['entry_payzen_geo_zone'] = 'Geo zone';
$_['entry_payzen_status'] = 'Status';
$_['entry_payzen_sort_order'] = 'Sort order';

$_['entry_payzen_site_id'] = 'Site ID';
$_['entry_payzen_key_test'] = 'Certificate in test mode';
$_['entry_payzen_key_prod'] = 'Certificate in production mode';
$_['entry_payzen_ctx_mode'] = 'Mode';
$_['entry_payzen_platform_url'] = 'Platform URL';

$_['entry_payzen_language'] = 'Default language';
$_['entry_payzen_available_languages'] = 'Available languages';
$_['entry_payzen_capture_delay'] = 'Capture delay';
$_['entry_payzen_validation_mode'] = 'Validation mode';
$_['entry_payzen_payment_cards'] = 'Card types';
$_['entry_payzen_3ds_min_amount'] = 'Minimum amount to activate 3DS';

$_['entry_payzen_minimum_amount'] = 'Minimum amount';
$_['entry_payzen_maximum_amount'] = 'Maximum amount';

$_['entry_payzen_redirect_enabled'] = 'Automatic redirection';
$_['entry_payzen_redirect_success_timeout'] = 'Success forward timeout';
$_['entry_payzen_redirect_success_message'] = 'Success forward message';
$_['entry_payzen_redirect_error_timeout'] = 'Failure forward message';
$_['entry_payzen_redirect_error_message'] = 'Failure forward message';
$_['entry_payzen_return_mode'] = 'Return mode';
$_['entry_payzen_order_status_failed'] = 'Order status on payment failure';
$_['entry_payzen_order_status_success'] = 'Order status on payment success';
$_['entry_payzen_order_status_canceled'] = 'Order status on payment cancel';
$_['entry_payzen_notify_failed'] = 'Notify client on payment failure';
$_['entry_payzen_notify_canceled'] = 'Notify client on payment cancel';
$_['entry_payzen_url_check'] = 'Server URL to copy in your store back-office';

$_['desc_payzen_site_id'] = 'Site ID provided by the payment gateway';
$_['desc_payzen_key_test'] = 'Certificate provided by the gateway for test';
$_['desc_payzen_key_prod'] = 'Certificate provided by the gateway after going into production';
$_['desc_payzen_ctx_mode'] = 'The module context mode';
$_['desc_payzen_platform_url'] = 'URL the client will be redirected to for payment';

$_['desc_payzen_language'] = 'Default language on the payment page';
$_['desc_payzen_available_languages'] = 'Available languages on payment page, select none to use gateway config';
$_['desc_payzen_capture_delay'] = 'Delay before banking (in days)';
$_['desc_payzen_validation_mode'] = 'If manual is selected, you will have to confirm payments manually in your bank backoffice';
$_['desc_payzen_payment_cards'] = 'Select none to use gateway config';
$_['desc_payzen_3ds_min_amount'] = 'Needs subscription to Selective 3-D Secure option';

$_['desc_payzen_minimum_amount'] = 'Minimum amount for which this payment method is available';
$_['desc_payzen_maximum_amount'] = 'Maximum amount for which this payment method is available';

$_['desc_payzen_redirect_enabled'] = 'If enabled, the client is automatically forwarded to your site at the end of the payment process';
$_['desc_payzen_redirect_success_timeout'] = 'Time in seconds (0-300) before the client is automatically forwarded to your site when the payment was successful';
$_['desc_payzen_redirect_success_message'] = 'Message posted on the payment platform before forwarding when the payment was successful';
$_['desc_payzen_redirect_error_timeout'] = 'Time in seconds (0-300) before the client is automatically forwarded to your site when the payment failed';
$_['desc_payzen_redirect_error_message'] = 'Message posted on the payment platform before forwarding when the payment failed';
$_['desc_payzen_return_mode'] = 'How the client will transmit the payment result';

// PayZen administration interface texts
$_['text_payzen_french'] = 'French';
$_['text_payzen_german'] = 'German';
$_['text_payzen_english'] = 'English';
$_['text_payzen_spanish'] = 'Spanish';
$_['text_payzen_chinese'] = 'Chinese';
$_['text_payzen_italian'] = 'Italian';
$_['text_payzen_japanese'] = 'Japanese';
$_['text_payzen_portuguese'] = 'Portuguese';
$_['text_payzen_dutch'] = 'Dutch';
$_['text_payzen_swedish'] = 'Swedish';

$_['text_payzen_default'] = 'PayZen back-office configuration';
$_['text_payzen_automatic'] = 'Automatic';
$_['text_payzen_manual'] = 'Manual';

$_['text_payzen_yes'] = 'Yes';
$_['text_payzen_no'] = 'No';
?>