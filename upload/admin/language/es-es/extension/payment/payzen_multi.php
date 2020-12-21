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
$_['heading_title'] = 'PayZen - Pago en cuotas';
$_['text_edit'] = 'Editar PayZen - Pago en cuotas';

// Text.
$_['text_update_success'] = 'Felicitaciones, modificó  los detalles del módulo <b>PayZen - Pago en cuotas</b> con éxito!';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_payzen_multi_validation'] = 'Advertencia: el campo "% s" es inválido.';

// Gateway backend tabs & sections.
$_['tab_payzen_specific'] ='PAGO EN CUOTAS';

$_['section_payzen_multi_options'] = 'OPCIONES DE PAGO';

// Gateway multi payment options.
$_['entry_payzen_first'] = 'Primer vencimiento';
$_['entry_payzen_count'] = 'Conteo';
$_['entry_payzen_period'] = 'Periodo';

$_['desc_payzen_first'] = 'Monto del primer vencimiento, en porcentaje del monto total. Si está vacío, todos los vencimientos tendrán el mismo monto.';
$_['desc_payzen_count'] = 'Número total de vencimientos.';
$_['desc_payzen_period'] = 'Plazo (en días) entre vencimientos.';

// Gateway multi payment restriction warning.
$_['text_payzen_multi_restriction_warn'] = 'ATENCIÓN: La activación de la función de pago en cuotas está sujeta al acuerdo previo de Société Générale.<br />Si habilita esta opción cuando no tiene la opción asociada, ocurrirá un error 10000 – INSTALLMENTS_NOT_ALLOWED o 07 - PAYMENT_CONFIG y el comprador no podrá pagar.';
$_['text_payzen_multi_not_available'] = 'El pago PayZen en cuotas no es disponible para su oferta.';
