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
$_['heading_title'] = 'PayZen - Paiement par carte bancaire';

// Text
$_['text_payment'] = 'Paiement';
$_['text_update_success'] = 'F&eacute;licitations, vous avez modifi&eacute; les d&eacute;tails du paiement <b>PayZen</b> avec succ&egrave;s !';
$_['text_install_success'] = 'F&eacute;licitations, l\'installation de <b>PayZen</b> s\'est d&eacute;roul&eacute;e avec succ&egrave;s !';
$_['text_payzen'] = '<a href="http://www.lyra-network.com" target="_blank"><img src="view/image/payment/payzen.jpg" alt="PayZen" title="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Error 
$_['error_permission'] = 'Attention, vous n&#39;avez pas la permission de modifier le module de paiement <b>PayZen</b> !'; 

// PayZen administration interface tabs
$_['tab_payzen_module_info'] = 'INFORMATIONS SUR LE MODULE';
$_['tab_payzen_module_setting'] = 'PARAM&Egrave;TRES DU MODULE';
$_['tab_payzen_payment_access'] = 'ACC&Egrave;S &Agrave; LA PLATEFORME';
$_['tab_payzen_payment_page'] = 'PAGE DE PAIEMENT';
$_['tab_payzen_selective_3ds'] = '3DS SÉLECTIF';
$_['tab_payzen_amount_restrictions'] = 'RESTRICTIONS SUR LE MONTANT';
$_['tab_payzen_return_to_shop'] = 'RETOUR &Agrave; LA BOUTIQUE';

// PayZen administration interface entries 
$_['entry_payzen_developed_by']  = 'D&eacute;velopp&eacute; par : ';
$_['entry_payzen_contact_email'] = 'Courriel de contact : ';
$_['entry_payzen_contrib_version'] = 'Version du module : ';
$_['entry_payzen_cms_version'] = 'Test&eacute; avec : ';
$_['entry_payzen_gateway_version'] = 'Version de la plateforme : ';

$_['entry_payzen_geo_zone'] = 'Zone g&eacute;ographique';
$_['entry_payzen_status'] = '&Eacute;tat';
$_['entry_payzen_sort_order'] = 'Classement';

$_['entry_payzen_site_id'] = 'Identifiant du Site';
$_['entry_payzen_key_test'] = 'Certificat en mode test';
$_['entry_payzen_key_prod'] = 'Certificat en mode production';
$_['entry_payzen_ctx_mode'] = 'Mode';
$_['entry_payzen_platform_url'] = 'URL de la plateforme';

$_['entry_payzen_language'] = 'Langage par d&eacute;faut';
$_['entry_payzen_available_languages'] = 'Langues disponibles';
$_['entry_payzen_capture_delay'] = 'D&eacute;lai avant remise en banque';
$_['entry_payzen_validation_mode'] = 'Mode de validation';
$_['entry_payzen_payment_cards'] = 'Types de carte';
$_['entry_payzen_3ds_min_amount'] = 'Montant minimum pour activer 3DS';

$_['entry_payzen_minimum_amount'] = 'Montant minimum';
$_['entry_payzen_maximum_amount'] = 'Montant maximum';

$_['entry_payzen_redirect_enabled'] = 'Redirection automatique';
$_['entry_payzen_redirect_success_timeout'] = 'D&eacute;lai avant redirection (succ&egrave;s)';
$_['entry_payzen_redirect_success_message'] = 'Message avant redirection (succ&egrave;s)';
$_['entry_payzen_redirect_error_timeout'] = 'D&eacute;lai avant redirection (&eacute;chec)';
$_['entry_payzen_redirect_error_message'] = 'Message avant redirection (&eacute;chec)';
$_['entry_payzen_return_mode'] = 'Mode de retour';
$_['entry_payzen_order_status_failed'] = '&Eacute;tat de la commande en cas d\'&eacute;chec';
$_['entry_payzen_order_status_success'] = '&Eacute;tat de la commande en cas de succ&egrave;s';
$_['entry_payzen_order_status_canceled'] = '&Eacute;tat de la commande en cas d\'annulation';
$_['entry_payzen_notify_failed'] = 'Notifier le client en cas de paiement refusé';
$_['entry_payzen_notify_canceled'] = 'Notifier le client en cas d\'annulation';
$_['entry_payzen_url_check'] = 'URL serveur &agrave; renseigner sur le back-office PayZen de votre boutique';

$_['desc_payzen_site_id'] = 'L\'identifiant du site fourni par votre banque';
$_['desc_payzen_key_test'] = 'Certificat fourni par votre banque pour test';
$_['desc_payzen_key_prod'] = 'Certificat fourni par votre banque apr&egrave;s passage en production';
$_['desc_payzen_ctx_mode'] = 'Mode de fonctionnement du module';
$_['desc_payzen_platform_url'] = 'URL vers laquelle le client sera redirig&eacute; pour le paiement';

$_['desc_payzen_language'] = 'S&eacute;lectionner la langue par d&eacute;faut &agrave; utiliser sur la page de paiement';
$_['desc_payzen_available_languages'] = 'Langues disponibles sur la page de paiement, ne rien s&eacute;lectionner pour utiliser la configuration de la plateforme';
$_['desc_payzen_capture_delay'] = 'Le nombre de jours avant la remise en banque';
$_['desc_payzen_validation_mode'] = 'En mode manuel, vous devrez confirmer les paiements dans le back-office PayZen';
$_['desc_payzen_payment_cards'] = 'Ne rien s&eacute;lectionner pour utiliser la configuration de la plateforme';
$_['desc_payzen_3ds_min_amount'] = 'N&eacute;cessite la souscription &agrave; l\'option 3-D Secure s&eacute;lectif';

$_['desc_payzen_minimum_amount'] = 'Montant minimum pour lequel ce mode de paiement est disponible';
$_['desc_payzen_maximum_amount'] = 'Montant maximum pour lequel ce mode de paiement est disponible';

$_['desc_payzen_redirect_enabled'] = 'Si activ&eacute;e, le client sera redirig&eacute; automatiquement vers votre site &agrave; la fin du processus de paiement';
$_['desc_payzen_redirect_success_timeout'] = 'Temps en secondes (0-300) avant que le client ne soit redirig&eacute; automatiquement vers votre site lorsque le paiement a r&eacute;ussi';
$_['desc_payzen_redirect_success_message'] = 'Message affich&eacute; sur la plateforme de paiement avant redirection lorsque le paiement a r&eacute;ussi';
$_['desc_payzen_redirect_error_timeout'] = 'Temps en secondes (0-300) avant que le client ne soit redirig&eacute; automatiquement vers votre site lorsque le paiement a &eacute;chou&eacute;';
$_['desc_payzen_redirect_error_message'] = 'Message affich&eacute; sur la plateforme de paiement avant redirection lorsque le paiement a &eacute;chou&eacute;';
$_['desc_payzen_return_mode'] = 'Fa&ccedil;on dont le client transmettra le r&eacute;sultat du paiement lors de son retour sur la boutique';

// PayZen administration interface texts
$_['text_payzen_french'] = 'Fran&ccedil;ais';
$_['text_payzen_german'] = 'Allemand';
$_['text_payzen_english'] = 'Anglais';
$_['text_payzen_spanish'] = 'Espagnol';
$_['text_payzen_chinese'] = 'Chinois';
$_['text_payzen_italian'] = 'Italien';
$_['text_payzen_japanese'] = 'Japonais';
$_['text_payzen_portuguese'] = 'Portugais';
$_['text_payzen_dutch'] = 'N&eacute;erlandais';
$_['text_payzen_swedish'] = 'Su&eacute;dois';

$_['text_payzen_default'] = 'Configuration back-office PayZen';
$_['text_payzen_automatic'] = 'Automatique';
$_['text_payzen_manual'] = 'Manuel';

$_['text_payzen_yes'] = 'Oui';
$_['text_payzen_no'] = 'Non';
?>