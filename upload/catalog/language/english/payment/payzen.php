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

// Text
$_['heading_title'] = 'Your Order Has Been Processed !';
$_['heading_error_title'] = 'Your Payment Has Been Refused !';
$_['text_payzen_title'] = 'PayZen - Pay by Credit Card';

$_['text_payzen_url_check_warn'] = 'Warning TEST mode: The automatic notification (peer to peer connection between the payment platform and your shopping cart solution) hasn\'t worked. Have you correctly set up the server URL in your PayZen backoffice ?';
$_['text_payzen_url_check_details'] = 'For understanding the problem, please read the documentation of the module : <br />&nbsp;&nbsp;&nbsp;- Chapter &laquo;To read carefully before going further&raquo;<br />&nbsp;&nbsp;&nbsp;- Chapter &laquo;Server URL settings&raquo;';
$_['text_payzen_pass_to_prod_info'] = '<p><u>GOING INTO PRODUCTION</u></p>You want to know how to put your shop into production mode, please go to this URL : ';

$_['text_payzen_fatal_error'] = '<p>An error has occured during the payment process.</p><p>Your order has not been confirmed.</p>';
$_['text_payzen_order_error'] = '<p>The order #%s was not found.</p><p>Please direct any questions you have to the <a href="%s">store owner</a>.</p>';
$_['text_payzen_payment_error'] = '<p>Your payment was not accepted.</p><p>Please try to checkout your order again.</p>';

$_['entry_payzen_trans_id'] = 'Transaction ID';
$_['entry_payzen_paid_amount'] = 'Paid amount';
?>