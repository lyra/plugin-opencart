<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart See COPYING.md for license details.
 *
 * @author     Lyra Network <https://www.lyra.com>
 * @copyright  Lyra Network
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

// Headings.
$_['heading_title'] = 'PayZen - Paiement standard';
$_['text_edit'] = 'Modifier PayZen - Paiement standard';

// Text.
$_['text_home'] = 'Home';
$_['text_extension'] = 'Extensions';
$_['text_update_success'] = 'Félicitations, vous avez modifié les détails du paiement <b>PayZen - Paiement standard</b> avec succès!';
$_['text_payment_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen - Paiement standard" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Attention, vous n\'avez pas la permission de modifier le module de paiement <b>PayZen</b>!';

// Gateway backend tabs & sections.
$_['tab_payment_payzen_general'] ='CONFIGURATION GÉNÉRALE';
$_['tab_payment_payzen_specific'] ='PAIEMENT STANDARD';
$_['tab_payment_payzen_orders'] ='COMMANDES';

$_['section_payment_payzen_module_info'] = 'INFORMATIONS SUR LE MODULE';
$_['section_payment_payzen_payment_access'] = 'ACCÈS À LA PLATEFORME';
$_['section_payment_payzen_payment_page'] = 'PAGE DE PAIEMENT';
$_['section_payment_payzen_selective_3ds'] = '3DS PERSONNALIS&Eacute;';
$_['section_payment_payzen_return_to_shop'] = 'RETOUR À LA BOUTIQUE';
$_['section_payment_payzen_display_options'] = 'OPTIONS D\'AFFICHAGE';
$_['section_payment_payzen_restrictions'] = 'RESTRICTIONS SUR LE MONTANT';
$_['section_payment_payzen_orders'] ='ÉTAT DES COMMANDES';
$_['section_payment_payzen_notifications'] ='NOTIFICATIONS';

// Gateway administration interface entries.
$_['entry_payment_payzen_developed_by']  = 'Développé par: ';
$_['entry_payment_payzen_contact_email'] = 'Courriel de contact: ';
$_['entry_payment_payzen_contrib_version'] = 'Version du module: ';
$_['entry_payment_payzen_gateway_version'] = 'Version de la plateforme: ';

$_['entry_payment_payzen_site_id'] = 'Identifiant de la boutique';
$_['entry_payment_payzen_key_test'] = 'Clé en mode test';
$_['entry_payment_payzen_key_prod'] = 'Clé en mode production';
$_['entry_payment_payzen_ctx_mode'] = 'Mode';
$_['entry_payment_payzen_sign_algo'] = 'Algorithme de signature';
$_['entry_payment_payzen_url_check'] = 'URL de notification';
$_['entry_payment_payzen_platform_url'] = 'URL de la page de paiement';

$_['entry_payment_payzen_language'] = 'Langue par défaut';
$_['entry_payment_payzen_available_languages'] = 'Langues disponibles';
$_['entry_payment_payzen_capture_delay'] = 'Délai avant remise en banque';
$_['entry_payment_payzen_validation_mode'] = 'Mode de validation';
$_['entry_payment_payzen_payment_cards'] = 'Types de carte';

$_['entry_payment_payzen_3ds_min_amount'] = 'G&eacute;rer le 3DS';

$_['entry_payment_payzen_redirect_enabled'] = 'Redirection automatique';
$_['entry_payment_payzen_redirect_success_timeout'] = 'Temps avant redirection (succès)';
$_['entry_payment_payzen_redirect_success_message'] = 'Message avant redirection (succès)';
$_['entry_payment_payzen_redirect_error_timeout'] = 'Temps avant redirection (échec)';
$_['entry_payment_payzen_redirect_error_message'] = 'Message avant redirection (échec)';
$_['entry_payment_payzen_return_mode'] = 'Mode de retour';

$_['entry_payment_payzen_order_status_failed'] = 'Statut des commandes dont le paiement a échoué.';
$_['entry_payment_payzen_order_status_success'] = 'Statut des commandes dont le paiement a réussi.';
$_['entry_payment_payzen_order_status_canceled'] = 'Statut des commandes dont le paiement est annulé.';

$_['entry_payment_payzen_notify_failed'] = 'Notifier l\'acheteur en cas de paiement refusé.';
$_['entry_payment_payzen_notify_canceled'] = 'Notifier l\'acheteur en cas d\'annulation.';

$_['entry_payment_payzen_status']= 'Activation';
$_['entry_payment_payzen_sort_order'] = 'Ordre d\'affichage';
$_['entry_payment_payzen_geo_zone'] = 'Zone de paiement';

$_['entry_payment_payzen_enable_logs'] = 'Logs';

$_['entry_payment_payzen_min_amount'] = 'Montant minimum';
$_['entry_payment_payzen_max_amount'] = 'Montant maximum';

$_['desc_payment_payzen_site_id'] = 'Identifiant fourni par PayZen.';
$_['desc_payment_payzen_key_test'] = 'Clé fournie par PayZen pour le mode test (disponible sur le Back Office PayZen).';
$_['desc_payment_payzen_key_prod'] = 'Clé fournie par PayZen (disponible sur le Back Office PayZen après passage en production).';
$_['desc_payment_payzen_ctx_mode'] = 'Mode de fonctionnement du module.';
$_['desc_payment_payzen_sign_algo'] = 'Algorithme utilisé pour calculer la signature du formulaire de paiement. L\'algorithme sélectionné doit être le même que celui configuré sur le Back Office PayZen.';
$_['desc_payment_payzen_sign_algo_details'] = '<br /><b>Le HMAC-SHA-256 ne doit pas être activé si celui-ci n\'est pas encore disponible depuis le Back Office PayZen, la fonctionnalité sera disponible prochainement.</b>';
$_['desc_payment_payzen_url_check'] = 'URL à copier dans le Back Office PayZen > Paramétrage > Règles de notifications.<br />En mode multi-boutique, l\'URL de notification est la même pour toutes les boutiques.';
$_['desc_payment_payzen_platform_url'] = 'URL vers laquelle l\'acheteur sera redirigé pour le paiement.';

$_['desc_payment_payzen_language'] = 'Sélectionner la langue par défaut à utiliser sur la page de paiement.';
$_['desc_payment_payzen_available_languages'] = 'Sélectionner les langues à proposer sur la page de paiement. Ne rien sélectionner pour utiliser la configuration de la plateforme.';
$_['desc_payment_payzen_capture_delay'] = 'Le nombre de jours avant la remise en banque (paramétrable sur votre Back Office PayZen).';
$_['desc_payment_payzen_validation_mode'] = 'En mode manuel, vous devrez confirmer les paiements dans le Back Office PayZen.';
$_['desc_payment_payzen_payment_cards'] = 'Le(s) type(s) de carte pouvant être utilisé(s) pour le paiement. Ne rien sélectionner pour utiliser la configuration de la plateforme.';

$_['desc_payment_payzen_3ds_min_amount'] = 'Montant en dessous duquel l&apos;acheteur pourrait &ecirc;tre exempt&eacute; de l&apos;authentification forte. N&eacute;cessite la souscription &agrave; l&apos;option &laquo;Selective 3DS1&raquo; ou l&apos;option &nbsp;&laquo;Frictionless 3DS2&raquo;. Pour plus d&apos;informations, reportez-vous &agrave; la documentation du module.';

$_['desc_payment_payzen_redirect_enabled'] = 'Si activée, l\'acheteur sera redirigé automatiquement vers votre site à la fin du paiement.';
$_['desc_payment_payzen_redirect_success_timeout'] = 'Temps en secondes (0-300) avant que l\'acheteur ne soit redirigé automatiquement vers votre site lorsque le paiement a réussi.';
$_['desc_payment_payzen_redirect_success_message'] = 'Message affiché sur la page de paiement avant redirection lorsque le paiement a réussi.';
$_['desc_payment_payzen_redirect_error_timeout'] = 'Temps en secondes (0-300) avant que l\'acheteur ne soit redirigé automatiquement vers votre site lorsque le paiement a échoué.';
$_['desc_payment_payzen_redirect_error_message'] = 'Message affiché sur la page de paiement avant redirection, lorsque le paiement a échoué.';
$_['desc_payment_payzen_return_mode'] = 'Façon dont l\'acheteur transmettra le résultat du paiement lors de son retour à la boutique.';

$_['desc_payment_payzen_status'] = 'Active / désactive cette méthode de paiement.';
$_['desc_payment_payzen_sort_order']= 'Le plus petit indice est affiché en premier.';
$_['desc_payment_payzen_geo_zone'] = 'Si une zone est choisie, ce mode de paiement ne sera effectif que pour celle-ci.';

$_['desc_payment_payzen_enable_logs'] = 'Activer / désactiver les logs du module.';

$_['desc_payment_payzen_min_amount'] = 'Montant minimum pour lequel cette méthode de paiement est disponible.';
$_['desc_payment_payzen_max_amount'] = 'Montant maximum pour lequel cette méthode de paiement est disponible.';

// Gateway backend misc texts.
$_['text_payment_payzen_redirect_message'] = 'Redirection vers la boutique dans quelques instants...';

$_['text_payment_payzen_chinese'] = 'Chinois';
$_['text_payment_payzen_dutch'] = 'Néerlandais';
$_['text_payment_payzen_english'] = 'Anglais';
$_['text_payment_payzen_french'] = 'Français';
$_['text_payment_payzen_german'] = 'Allemand';
$_['text_payment_payzen_italian'] = 'Italien';
$_['text_payment_payzen_japanese'] = 'Japonais';
$_['text_payment_payzen_polish'] = 'Polonais';
$_['text_payment_payzen_portuguese'] = 'Portugais';
$_['text_payment_payzen_russian'] = 'Russe';
$_['text_payment_payzen_spanish'] = 'Espagnol';
$_['text_payment_payzen_swedish'] = 'Suédois';
$_['text_payment_payzen_turkish'] = 'Turc';

$_['text_payment_payzen_test'] = 'TEST';
$_['text_payment_payzen_production'] = 'PRODUCTION';

$_['text_payment_payzen_default'] = 'Configuration Back Office PayZen';
$_['text_payment_payzen_automatic'] = 'Automatique';
$_['text_payment_payzen_manual'] = 'Manuel';

$_['text_payment_payzen_yes'] = 'Oui';
$_['text_payment_payzen_no'] = 'Non';

$_['text_enabled'] = 'Activer';
$_['text_disabled'] = 'Désactiver';
$_['text_all_zones'] = 'All Zones';
$_['button_save'] = 'Enregistrer';
$_['button_cancel'] = 'Annuler';
