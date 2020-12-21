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
$_['heading_title'] = 'PayZen - Paiement en plusieurs fois';
$_['text_edit'] = 'Modifier PayZen - Paiement en plusieurs fois';

// Text.
$_['text_update_success'] = 'Félicitations, vous avez modifié les détails du module <b>PayZen - Paiement en plusieurs fois</b> avec succès!';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_payzen_multi_validation'] = 'Avertissement: le champ « %s » est invalide.';

// Gateway backend tabs and sections
$_['tab_payment_payzen_multi_specific'] ='PAIEMENT EN PLUSIEURS FOIS';

$_['section_payment_payzen_multi_options'] = 'OPTIONS DE PAIEMENT';

// Gateway multi payment options.
$_['entry_payment_payzen_multi_first'] = '1er Paiement';
$_['entry_payment_payzen_multi_count'] = 'Nombre';
$_['entry_payment_payzen_multi_period'] = 'Période';

$_['desc_payment_payzen_multi_first'] = 'Montant de la première échéance en pourcentage du total. Si vide, toutes les échéances auront le même montant.';
$_['desc_payment_payzen_multi_count'] = 'Nombre total d\'échéances.';
$_['desc_payment_payzen_multi_period'] = 'Délai entre deux échéances (en jours).';

// Gateway multi payment restriction warning.
$_['text_payment_payzen_multi_restriction_warn'] = 'ATTENTION: L\'activation de la fonctionnalité de paiement en nfois est soumise à l\'accord préalable de Société Générale.<br />Si vous activez cette fonctionnalité alors que vous ne disposez pas de cette option, une erreur 10000 – INSTALLMENTS_NOT_ALLOWED ou 07 - PAYMENT_CONFIG sera générée et l\'acheteur sera dans l\'incapacité de payer.';
$_['text_payment_payzen_multi_not_available'] = 'Le paiement PayZen en plusieurs fois n\'est pas disponible pour votre offre.';
