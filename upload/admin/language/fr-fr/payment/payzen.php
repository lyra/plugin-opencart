<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

// Headings.
$_['heading_title'] = 'PayZen - Paiement standard';
$_['text_edit'] = 'Editer PayZen - Paiement standard';

// Texts.
$_['text_payment'] = 'Paiement';
$_['text_update_success'] = 'F&eacute;licitations, vous avez modifi&eacute; les d&eacute;tails du paiement <b>PayZen - Paiement standard</b> avec succ&egrave;s !';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Attention, vous n&#39;&#39;avez pas la permission de modifier le module de paiement <b>PayZen</b> !';

// Gateway backend tabs & sections.
$_['tab_payzen_general'] = 'G&Eacute;N&Eacute;RAL';
$_['tab_payzen_specific'] = 'PAIEMENT STANDARD';
$_['tab_payzen_orders'] = 'COMMANDES';

$_['section_payzen_module_info'] = 'INFORMATIONS SUR LE MODULE';
$_['section_payzen_payment_access'] = 'ACC&Egrave;S &Agrave; LA PLATEFORME';
$_['section_payzen_payment_page'] = 'PAGE DE PAIEMENT';
$_['section_payzen_selective_3ds'] = '3DS S&Eacute;LECTIF';
$_['section_payzen_return_to_shop'] = 'RETOUR &Agrave; LA BOUTIQUE';
$_['section_payzen_module_setting'] = 'PARAM&Egrave;TRES DE BASE';
$_['section_payzen_amount_restrictions'] = 'RESTRICTIONS SUR LE MONTANT';
$_['section_payzen_orders'] = '&Eacute;TAT DES COMMANDES';

// Gateway administration interface entries.
$_['entry_payzen_developed_by'] = 'D&eacute;velopp&eacute; par: ';
$_['entry_payzen_support_email'] = 'Courriel de contact: ';
$_['entry_payzen_plugin_version'] = 'Version du module: ';
$_['entry_payzen_gateway_version'] = 'Version de la plateforme: ';

$_['entry_payzen_status'] = 'Activation';
$_['entry_payzen_sort_order'] = 'Ordre d&#39;affichage';
$_['entry_payzen_geo_zone'] = 'Zone de paiement';
$_['entry_payzen_enable_logs'] = 'Logs';

$_['entry_payzen_site_id'] = 'Identifiant de la boutique';
$_['entry_payzen_key_test'] = 'Cl&eacute; en mode test';
$_['entry_payzen_key_prod'] = 'Cl&eacute; en mode production';
$_['entry_payzen_ctx_mode'] = 'Mode';
$_['entry_payzen_sign_algo'] = 'Algorithme de signature';
$_['entry_payzen_url_check'] = 'URL de notification';
$_['entry_payzen_platform_url'] = 'URL de la page de paiement';

$_['entry_payzen_language'] = 'Langue par d&eacute;faut';
$_['entry_payzen_available_languages'] = 'Langues disponibles';
$_['entry_payzen_capture_delay'] = 'D&eacute;lai avant remise en banque';
$_['entry_payzen_validation_mode'] = 'Mode de validation';
$_['entry_payzen_payment_cards'] = 'Types de carte';
$_['entry_payzen_3ds_min_amount'] = 'D&eacute;sactiver 3DS';

$_['entry_payzen_min_amount'] = 'Montant minimum';
$_['entry_payzen_max_amount'] = 'Montant maximum';

$_['entry_payzen_redirect_enabled'] = 'Redirection automatique';
$_['entry_payzen_redirect_success_timeout'] = 'D&eacute;lai avant redirection (succ&egrave;s)';
$_['entry_payzen_redirect_success_message'] = 'Message avant redirection (succ&egrave;s)';
$_['entry_payzen_redirect_error_timeout'] = 'D&eacute;lai avant redirection (&eacute;chec)';
$_['entry_payzen_redirect_error_message'] = 'Message avant redirection (&eacute;chec)';
$_['entry_payzen_return_mode'] = 'Mode de retour';

$_['entry_payzen_order_status_failed'] = '&Eacute;tat de la commande en cas d&#39;&eacute;chec';
$_['entry_payzen_order_status_success'] = '&Eacute;tat de la commande en cas de succ&egrave;s';
$_['entry_payzen_order_status_canceled'] = '&Eacute;tat de la commande en cas d&#39;annulation';
$_['entry_payzen_notify_failed'] = 'Notifier l&#39;acheteur en cas de paiement refus&eacute;';
$_['entry_payzen_notify_canceled'] = 'Notifier l&#39;acheteur en cas d&#39;annulation';

$_['desc_payzen_status'] = 'Activer / d&eacute;sactiver le module de paiement PayZen.';
$_['desc_payzen_sort_order'] = 'Le plus petit indice est affich&eacute; en premier.';
$_['desc_payzen_geo_zone'] = 'Si une zone est choisie, ce mode de paiement ne sera effectif que pour celle-ci.';
$_['desc_payzen_enable_logs'] = 'Activer / d&eacute;sactiver les logs du module.';

$_['desc_payzen_site_id'] = 'Identifiant fourni par PayZen.';
$_['desc_payzen_key_test'] = 'Cl&eacute; fournie par PayZen pour le mode test (disponible sur le Back Office PayZen).';
$_['desc_payzen_key_prod'] = 'Cl&eacute; fournie par PayZen (disponible sur le Back Office PayZen apr&egrave;s passage en production).';
$_['desc_payzen_ctx_mode'] = 'Mode de fonctionnement du module.';
$_['desc_payzen_sign_algo'] = 'Algorithme utilis&eacute; pour calculer la signature du formulaire de paiement. L&#39;algorithme s&eacute;lectionn&eacute; doit &ecirc;tre le m&ecirc;me que celui configur&eacute; sur le Back Office PayZen.<br /><b>Le HMAC-SHA-256 ne doit pas &ecirc;tre activ&eacute; si celui-ci n&#39;est pas encore disponible depuis le Back Office PayZen, la fonctionnalit&eacute; sera disponible prochainement.</b>';
$_['desc_payzen_url_check'] = 'URL &agrave; copier dans le Back Office PayZen > Param&eacute;trage > R&egrave;gles de notifications';
$_['desc_payzen_platform_url'] = 'URL vers laquelle l&#39;acheteur sera redirig&eacute; pour le paiement.';
$_['desc_payzen_doc_link'] = 'Cliquer pour acc&eacute;der &agrave; la documentation de configuration du module :';

$_['desc_payzen_language'] = 'S&eacute;lectionner la langue par d&eacute;faut &agrave; utiliser sur la page de paiement.';
$_['desc_payzen_available_languages'] = 'S&eacute;lectionner les langues &agrave; proposer sur la page de paiement.';
$_['desc_payzen_capture_delay'] = 'Le nombre de jours avant la remise en banque (param&eacute;trable sur votre Back Office PayZen).';
$_['desc_payzen_validation_mode'] = 'En mode manuel, vous devrez confirmer les paiements dans le Back Office PayZen.';
$_['desc_payzen_payment_cards'] = 'Le(s) type(s) de carte pouvant être utilis&eacute;(s) pour le paiement. Ne rien s&eacute;lectionner pour utiliser la configuration de la plateforme.';
$_['desc_payzen_3ds_min_amount'] = 'Montant en dessous duquel 3DS sera d&eacute;sactiv&eacute;. N&eacute;cessite la souscription &agrave; l&#39;option 3DS s&eacute;lectif. Pour plus d&#39;informations, reportez-vous &agrave; la documentation du module.';

$_['desc_payzen_min_amount'] = 'Montant minimum pour lequel ce mode de paiement est disponible.';
$_['desc_payzen_max_amount'] = 'Montant maximum pour lequel ce mode de paiement est disponible.';

$_['desc_payzen_redirect_enabled'] = 'Si activ&eacute;e, l&#39;acheteur sera redirig&eacute; automatiquement vers votre site &agrave; la fin du processus de paiement.';
$_['desc_payzen_redirect_success_timeout'] = 'Temps en secondes (0-300) avant que l&#39;acheteur ne soit redirig&eacute; automatiquement vers votre site lorsque le paiement a r&eacute;ussi.';
$_['desc_payzen_redirect_success_message'] = 'Message affich&eacute; sur la plateforme de paiement avant redirection lorsque le paiement a r&eacute;ussi.';
$_['desc_payzen_redirect_error_timeout'] = 'Temps en secondes (0-300) avant que l&#39;acheteur ne soit redirig&eacute; automatiquement vers votre site lorsque le paiement a &eacute;chou&eacute;.';
$_['desc_payzen_redirect_error_message'] = 'Message affich&eacute; sur la plateforme de paiement avant redirection lorsque le paiement a &eacute;chou&eacute;.';
$_['desc_payzen_return_mode'] = 'Fa&ccedil;on dont l&#39;acheteur transmettra le r&eacute;sultat du paiement lors de son retour &agrave; la boutique.';

// Gateway backend misc texts.
$_['text_payzen_redirect_message'] = 'Redirection vers la boutique dans quelques instants...';

$_['text_payzen_chinese'] = 'Chinois';
$_['text_payzen_dutch'] = 'N&eacute;erlandais';
$_['text_payzen_english'] = 'Anglais';
$_['text_payzen_french'] = 'Fran&ccedil;ais';
$_['text_payzen_german'] = 'Allemand';
$_['text_payzen_italian'] = 'Italien';
$_['text_payzen_japanese'] = 'Japonais';
$_['text_payzen_polish'] = 'Polonais';
$_['text_payzen_portuguese'] = 'Portugais';
$_['text_payzen_russian'] = 'Russe';
$_['text_payzen_spanish'] = 'Espagnol';
$_['text_payzen_swedish'] = 'Su&eacute;dois';
$_['text_payzen_turkish'] = 'Turc';

$_['text_payzen_test'] = 'TEST';
$_['text_payzen_production'] = 'PRODUCTION';

$_['text_payzen_default'] = 'Configuration Back Office PayZen';
$_['text_payzen_automatic'] = 'Automatique';
$_['text_payzen_manual'] = 'Manuel';

$_['text_payzen_yes'] = 'Oui';
$_['text_payzen_no'] = 'Non';
