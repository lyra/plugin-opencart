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
$_['heading_title'] = 'PayZen - Pago en cuotas';
$_['text_edit'] = 'Edit PayZen - Pago en cuotas';

// Texts.
$_['text_update_success'] = 'Felicitaciones, modific&oacute; los detalles del m&oacute;dulo <b>PayZen - Pago en cuotas</b> con &eacute;xito !';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

$_['error_payzen_multi_validation'] = 'Advertencia: el campo &laquo;%s&raquo; es inv&aacute;lido.';

// Gateway backend tabs & sections.
$_['tab_payzen_specific'] = 'PAGO EN CUOTAS';

$_['section_payzen_multi_options'] = 'OPCIONES DE PAGO';

// Gateway multi payment options.
$_['entry_payzen_first'] = 'Primer vencimiento';
$_['entry_payzen_count'] = 'N&uacute;mero de pagos';
$_['entry_payzen_period'] = 'Periodo';

$_['desc_payzen_first'] = 'Monto del primer vencimiento, en porcentaje del monto total. Si est&aacute; vacío, todos los vencimientos tendr&aacute;n el mismo monto.';
$_['desc_payzen_count'] = 'N&uacute;mero total de pagos.';
$_['desc_payzen_period'] = 'Plazo en días entre pagos.';

// Gateway multi payment restriction.
$_['text_payzen_multi_not_available'] = 'El pago PayZen en cuotas no es disponible para su oferta.';
$_['text_payzen_multi_restriction_warn'] = 'ATENCIÓN: La activaci&oacute;n de la funci&oacute;n de pago en cuotas est&aacute; sujeta al acuerdo previo de Societ&eacute; G&eacute;n&eacute;rale.<br />Si habilita esta funci&oacute;n cuando no tiene la opci&oacute;n asociada, ocurrir&aacute; un error 10000 – INSTALLMENTS_NOT_ALLOWED o 07 - PAYMENT_CONFIG y el comprador no podr&aacute; pagar.';
