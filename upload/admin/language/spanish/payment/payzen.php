<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

// Headings
$_['heading_title'] = 'PayZen - Pago standard';
$_['text_edit'] = 'Editar PayZen - Pago standard';

// Text
$_['text_payment'] = 'Pago';
$_['text_update_success'] = 'Felicitaciones, modific&oacute; los detalles del m&oacute;dulo <b>PayZen - Pago standard</b> con éxito !';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors
$_['error_permission'] = 'Atenci&oacute;n: no tiene permiso para modificar el m&oacute;dulo de pago <b>PayZen</b> !';

// Gateway backend tabs & sections
$_['tab_payzen_general'] = 'GENERAL';
$_['tab_payzen_specific'] = 'PAGO STANDARD';
$_['tab_payzen_orders'] = 'PEDIDOS';

$_['section_payzen_module_info'] = 'INFORMACI&Oacute;N DEL M&Oacute;DULO';
$_['section_payzen_payment_access'] = 'ACCESO AL PORTAL DE PAGO';
$_['section_payzen_payment_page'] = 'PÁGINA DE PAGO';
$_['section_payzen_selective_3ds'] = '3DS PERSONALIZADO';
$_['section_payzen_return_to_shop'] = 'VOLVER A LA TIENDA';
$_['section_payzen_module_setting'] = 'CONFIGURACI&Oacute;N DEL M&Oacute;DULO';
$_['section_payzen_amount_restrictions'] = 'RESTRICCIONES DE MONTO';
$_['section_payzen_orders'] = 'Estado del pedido';

// Gateway backend entries
$_['entry_payzen_developed_by'] = 'Desarrollado por: ';
$_['entry_payzen_support_email'] = 'Cont&aacute;ctenos: ';
$_['entry_payzen_plugin_version'] = 'Versi&oacute;n del m&oacute;dulo: ';
$_['entry_payzen_gateway_version'] = 'Versi&oacute;n del portal: ';

$_['entry_payzen_geo_zone'] = '&oAcute;rea de pago';
$_['entry_payzen_status'] = 'Activaci&oacute;n';
$_['entry_payzen_sort_order'] = 'Orden de clasificaci&oacute;n';
$_['entry_payzen_enable_logs'] = 'Registros';

$_['entry_payzen_site_id'] = 'Identificador de tienda';
$_['entry_payzen_key_test'] = 'Clave en modo test';
$_['entry_payzen_key_prod'] = 'Clave en modo production';
$_['entry_payzen_ctx_mode'] = 'Modo';
$_['entry_payzen_sign_algo'] = 'Algoritmo de firma';
$_['entry_payzen_url_check'] = 'URL de notificaci&oacute;n de pago instant&aacute;neo';
$_['entry_payzen_platform_url'] = 'URL de p&aacute;gina de pago';

$_['entry_payzen_language'] = 'Idioma predeterminado';
$_['entry_payzen_available_languages'] = 'Idiomas disponible';
$_['entry_payzen_capture_delay'] = 'Plazo de captura';
$_['entry_payzen_validation_mode'] = 'Modo de validaci&oacute;n';
$_['entry_payzen_payment_cards'] = 'Tipos de tarjeta';
$_['entry_payzen_3ds_min_amount'] = 'Gestionar el 3DS';

$_['entry_payzen_min_amount'] = 'Monto m&iacute;nimo';
$_['entry_payzen_max_amount'] = 'Monto m&aacute;ximo';

$_['entry_payzen_redirect_enabled'] = 'Redirecci&oacute;n autom&aacute;tica';
$_['entry_payzen_redirect_success_timeout'] = 'Tiempo de espera de la redirecci&oacute;n en pago exitoso';
$_['entry_payzen_redirect_success_message'] = 'Mensaje de redirecci&oacute;n en pago exitoso';
$_['entry_payzen_redirect_error_timeout'] = 'Tiempo de espera de la redirecci&oacute;n en pago rechazado';
$_['entry_payzen_redirect_error_message'] = 'Mensaje de redirecci&oacute;n en pago rechazado';
$_['entry_payzen_return_mode'] = 'Modo de retorno';

$_['entry_payzen_order_status_failed'] = 'Estado del pedido en pago rechazado';
$_['entry_payzen_order_status_success'] = 'Estado del pedido en pago exitoso';
$_['entry_payzen_order_status_canceled'] = 'Estado del pedido en pago cancelado';
$_['entry_payzen_notify_failed'] = 'Notificar el comprador en pago rechazad';
$_['entry_payzen_notify_canceled'] = 'Notificar el comprador en pago cancelado';

$_['desc_payzen_status'] = 'Habilita/deshabilita el m&oacute;dulo de pago PayZen.';
$_['desc_payzen_sort_order'] = 'El &iacute;ndice m&aacute;s pequeño se muestra en primero.';
$_['desc_payzen_geo_zone'] = 'Si se selecciona un &aacute;rea, esta forma de pago solo estar&aacute; disponible para ella.';
$_['desc_payzen_enable_logs'] = 'Habilita/deshabilita registros del m&oacute;dulo.';

$_['desc_payzen_site_id'] = 'El identificador proporcionado por PayZen.';
$_['desc_payzen_key_test'] = 'Clave proporcionada por PayZen para modo test (disponible en el Back Office PayZen).';
$_['desc_payzen_key_prod'] = 'Clave proporcionada por PayZen (disponible en el Back Office PayZen despu&eacute;s de habilitar el modo production).';
$_['desc_payzen_ctx_mode'] = 'El modo de contexto de este m&oacute;dulo.';
$_['desc_payzen_sign_algo'] = 'Algoritmo usado para calcular la firma del formulario de pago. El algoritmo seleccionado debe ser el mismo que el configurado en el Back Office PayZen.<br /><b>El algoritmo HMAC-SHA-256 no se debe activar si a&iacute;n no est&aacute; disponible el Back Office PayZen, la funci&oacute;n estar&aacute; disponible pronto.</b>';
$_['desc_payzen_url_check'] = 'URL a copiar en el Back Office PayZen > Configuraci&oacute;n > Reglas de notificaci&oacute;n.';
$_['desc_payzen_platform_url'] = 'Enlace a la p&aacute;gina de pago.';
$_['desc_payzen_doc_link'] = 'Haga clic para ver la documentaci&oacute;n de la configuraci&oacute;n del m&oacute;dulo :';

$_['desc_payzen_language'] = 'Idioma predeterminado en la p&aacute;gina de pago.';
$_['desc_payzen_available_languages'] = 'Idiomas disponibles en la p&aacute;gina de pago. Si no selecciona ninguno, todos los idiomas compatibles estar&aacute;n disponibles.';
$_['desc_payzen_capture_delay'] = 'El n&uacute;mero de d&iacute;as antes de la captura del pago (ajustable en su Back Office PayZen).';
$_['desc_payzen_validation_mode'] = 'Si se selecciona manual, deber&aacute; confirmar los pagos manualmente en su Back Office PayZen.';
$_['desc_payzen_payment_cards'] = 'El tipo(s) de tarjeta que se puede usar para el pago. No haga ninguna selecci&oacute;n para usar la configuraci&oacute;n del portal';
$_['desc_payzen_3ds_min_amount'] = 'Monto por debajo del cual el comprador podr&iacute;a estar exento de de la autenticaci&oacute;n fuerte. Requiere suscripci&oacute;n a la opci&oacute;n &laquo;Selective 3DS1&raquo; o a la opci&oacute;n &laquo;Frictionless 3DS2&raquo;. Para m&aacute;s informaci&oacute;n, consulte la documentaci&oacute;n del m&oacute;dulo.';

$_['desc_payzen_min_amount'] = 'Monto m&iacute;nimo para activar este m&eacute;todo de pago.';
$_['desc_payzen_max_amount'] = 'Monto m&aacute;ximo para activar este m&eacute;todo de pago.';

$_['desc_payzen_redirect_enabled'] = 'Si est&aacute; habilitada, el comprador es redirigido autom&aacute;ticamente a su sitio al final del pago.';
$_['desc_payzen_redirect_success_timeout'] = 'Tiempo en segundos (0-300) antes de que el comprador sea redirigido autom&aacute;ticamente a su sitio web despu&eacute;s de un pago exitoso.';
$_['desc_payzen_redirect_success_message'] = 'Mensaje mostrado en la p&aacute;gina de pago antes de la redirecci&oacute;n despu&eacute;s de un pago exitoso.';
$_['desc_payzen_redirect_error_timeout'] = 'Tiempo en segundos (0-300) antes de que el comprador sea redirigido autom&aacute;ticamente a su sitio web despu&eacute;s de un pago rechazado.';
$_['desc_payzen_redirect_error_message'] = 'Mensaje mostrado en la p&aacute;gina de pago antes de la redirecci&oacute;n despu&eacute;s de un pago rechazado.';
$_['desc_payzen_return_mode'] = 'M&eacute;todo que se usar&aacute; para transmitir el resultado del pago de la p&aacute;gina de pago a su tienda.';

// Gateway backend misc texts
$_['text_payzen_redirect_message'] = 'Redirección a la tienda en unos momentos...';

$_['text_payzen_chinese'] = 'Chino';
$_['text_payzen_dutch'] = 'Holand&eacute;s';
$_['text_payzen_english'] = 'Ingl&eacute;s';
$_['text_payzen_french'] = 'Franc&eacute;s';
$_['text_payzen_german'] = 'Alem&aacute;n';
$_['text_payzen_italian'] = 'Italiano';
$_['text_payzen_japanese'] = 'Japon&eacute;s';
$_['text_payzen_polish'] = 'Polaco';
$_['text_payzen_portuguese'] = 'Portugu&eacute;s';
$_['text_payzen_russian'] = 'Ruso';
$_['text_payzen_spanish'] = 'Espa&ntilde;ol';
$_['text_payzen_swedish'] = 'Sueco';
$_['text_payzen_turkish'] = 'Turco';

$_['text_payzen_test'] = 'TEST';
$_['text_payzen_production'] = 'PRODUCTION';

$_['text_payzen_default'] = 'Configuraci&oacute;n de Back Office PayZen';
$_['text_payzen_automatic'] = 'Autom&aacute;tico';
$_['text_payzen_manual'] = 'Manual';

$_['text_payzen_yes'] = 'S&iacute;';
$_['text_payzen_no'] = 'No';
