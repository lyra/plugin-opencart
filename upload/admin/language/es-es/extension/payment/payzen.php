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
$_['heading_title'] = 'PayZen - Pago standard';
$_['text_edit'] = 'Editar PayZen - Pago standard';

// Text.
$_['text_home'] = 'Home';
$_['text_extension'] = 'Extensiones';
$_['text_update_success'] = 'Felicitaciones, modificó  los detalles del módulo <b>#PayZen - Pago standard </b> con éxito!';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen - Pago standard" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Atención: no tiene permiso para modificar el módulo de pago <b>PayZen</b>!';

// Gateway backend tabs & sections.
$_['tab_payment_payzen_general'] ='CONFIGURACIÓN GENERAL';
$_['tab_payment_payzen_specific'] ='PAGO STANDARD';
$_['tab_payment_payzen_orders'] ='PEDIDOS';

$_['section_payment_payzen_module_info'] = 'INFORMACIÓN DEL MÓDULO';
$_['section_payment_payzen_payment_access'] = 'ACCESO AL PORTAL DE PAGO';
$_['section_payment_payzen_payment_page'] = 'PÁGINA DE PAGO';
$_['section_payment_payzen_selective_3ds'] = '3DS PERSONALIZADO';
$_['section_payment_payzen_return_to_shop'] = 'VOLVER A LA TIENDA';
$_['section_payment_payzen_display_options'] = 'OPCIONES DE VISUALIZACIÓN';
$_['section_payment_payzen_restrictions'] = 'RESTRICCIONES DE MONTO';
$_['section_payment_payzen_orders'] ='ESTATO DEL PEDIDO';
$_['section_payment_payzen_notifications'] ='NOTIFICACIONES';

// Gateway backend entries.
$_['entry_payment_payzen_developed_by']  = 'Desarrollado por: ';
$_['entry_payment_payzen_contact_email'] = 'Contáctenos: ';
$_['entry_payment_payzen_contrib_version'] = 'Versión del módulo: ';
$_['entry_payment_payzen_gateway_version'] = 'Versión del portal: ';
$_['entry_payment_payzen_doc'] = 'Haga clic para ver la documentación de la configuración del módulo: ';

$_['entry_payment_payzen_site_id'] = 'Identificador de tienda';
$_['entry_payment_payzen_key_test'] = 'Clave en modo test';
$_['entry_payment_payzen_key_prod'] = 'Clave en modo production';
$_['entry_payment_payzen_ctx_mode'] = 'Modo';
$_['entry_payment_payzen_sign_algo'] = 'Algoritmo de firma';
$_['entry_payment_payzen_url_check'] = 'URL de notificación de pago instantáneo';
$_['entry_payment_payzen_platform_url'] = 'URL de página de pago';

$_['entry_payment_payzen_language'] = 'Idioma por defecto';
$_['entry_payment_payzen_available_languages'] = 'Idiomas disponibles';
$_['entry_payment_payzen_capture_delay'] = 'Plazo de captura';
$_['entry_payment_payzen_validation_mode'] = 'Modo de validación';
$_['entry_payment_payzen_payment_cards'] = 'Tipos de tarjeta';

$_['entry_payment_payzen_3ds_min_amount'] = 'Gestionar el 3DS';

$_['entry_payment_payzen_redirect_enabled'] = 'Redirección automática';
$_['entry_payment_payzen_redirect_success_timeout'] = 'Tiempo de espera de la redirección en pago exitoso';
$_['entry_payment_payzen_redirect_success_message'] = 'Mensaje de redirección en pago exitoso';
$_['entry_payment_payzen_redirect_error_timeout'] = 'Tiempo de espera de la redirección en pago rechazado';
$_['entry_payment_payzen_redirect_error_message'] = 'Mensaje de redirección en pago rechazado';
$_['entry_payment_payzen_return_mode'] = 'Modo de retorno';

$_['entry_payment_payzen_order_status_failed'] = 'Estado de los pedidos cuando el pago es rechaza.';
$_['entry_payment_payzen_order_status_success'] = 'Estado de los pedidos cuando el pago es exitoso.';
$_['entry_payment_payzen_order_status_canceled'] = 'Estado de los pedidos cuando el pago es cancelado.';

$_['entry_payment_payzen_notify_failed'] = 'Notificar el comprador en pago rechazad';
$_['entry_payment_payzen_notify_canceled'] = 'Notificar el comprador en pago cancelado';

$_['entry_payment_payzen_status'] = 'Activación';
$_['entry_payment_payzen_sort_order'] = 'Orden de clasificación';
$_['entry_payment_payzen_geo_zone'] = 'Zona de pago';

$_['entry_payment_payzen_enable_logs'] = 'Registros';

$_['entry_payment_payzen_min_amount'] = 'Monto mínimo';
$_['entry_payment_payzen_max_amount'] = 'Monto máximo';

$_['desc_payment_payzen_site_id'] = 'El identificador proporcionado por PayZen.';
$_['desc_payment_payzen_key_test'] = 'Clave proporcionada por PayZen para modo test (disponible en el Back Office PayZen).';
$_['desc_payment_payzen_key_prod'] = 'Clave proporcionada por PayZen (disponible en el Back Office PayZen después de habilitar el modo production).';
$_['desc_payment_payzen_ctx_mode'] = 'El modo de contexto de este módulo.';
$_['desc_payment_payzen_sign_algo'] = 'Algoritmo usado para calcular la firma del formulario de pago. El algoritmo seleccionado debe ser el mismo que el configurado en el Back Office PayZen.';
$_['desc_payment_payzen_sign_algo_details'] = '<br /><b>El algoritmo HMAC-SHA-256 no se debe activar si aún no está disponible el Back Office PayZen, la función estará disponible pronto.</b>';
$_['desc_payment_payzen_url_check'] = 'URL a copiar en el Back Office PayZen > Configuración > Reglas de notificación.<br />En modo multitienda, la URL de notificación es la misma para todas las tiendas.';
$_['desc_payment_payzen_platform_url'] = 'Enlace a la página de pago.';

$_['desc_payment_payzen_language'] = 'Idioma por defecto en la página de pago.';
$_['desc_payment_payzen_available_languages'] = 'Idiomas disponibles en la página de pago. Si no selecciona ninguno, todos los idiomas compatibles estarán disponibles.';
$_['desc_payment_payzen_capture_delay'] = 'El número de días antes de la captura del pago (ajustable en su Back Office PayZen).';
$_['desc_payment_payzen_validation_mode'] = 'Si se selecciona manual, deberá confirmar los pagos manualmente en su Back Office PayZen.';
$_['desc_payment_payzen_payment_cards'] = 'El tipo(s) de tarjeta que se puede usar para el pago. No haga ninguna selección para usar la configuración del portal.';

$_['desc_payment_payzen_3ds_min_amount'] = 'Monto por debajo del cual el comprador podr&iacute;a estar exento de de la autenticaci&oacute;n fuerte. Requiere suscripci&oacute;n a la opci&oacute;n &laquo;Selective 3DS1&raquo; o a la opci&oacute;n &laquo;Frictionless 3DS2&raquo;. Para m&aacute;s informaci&oacute;n, consulte la documentaci&oacute;n del m&oacute;dulo.';

$_['desc_payment_payzen_redirect_enabled'] = 'Si está habilitada, el comprador es redirigido automáticamente a su sitio al final del pago.';
$_['desc_payment_payzen_redirect_success_timeout'] = 'Tiempo en segundos (0-300) antes de que el comprador sea redirigido automáticamente a su sitio web después de un pago exitoso.';
$_['desc_payment_payzen_redirect_success_message'] = 'Mensaje mostrado en la página de pago antes de la redirección después de un pago exitoso.';
$_['desc_payment_payzen_redirect_error_timeout'] = 'Tiempo en segundos (0-300) antes de que el comprador sea redirigido automáticamente a su sitio web después de un pago rechazado.';
$_['desc_payment_payzen_redirect_error_message'] = 'Mensaje mostrado en la página de pago antes de la redirección después de un pago rechazado.';
$_['desc_payment_payzen_return_mode'] = 'Método que se usará para transmitir el resultado del pago de la página de pago a su tienda.';

$_['desc_payment_payzen_status'] = 'Habilita/deshabilita este método de pago.';
$_['desc_payment_payzen_sort_order']= 'El índice más pequeño se muestra en primero.';
$_['desc_payment_payzen_geo_zone'] = 'Si se elige una zona, este método de pago será efectivo solo para esta.';

$_['desc_payment_payzen_enable_logs'] = 'Habilitar/deshabilitar registros del módulo.';

$_['desc_payment_payzen_min_amount'] = 'Defina el monto mínimo para activar este método de pago.';
$_['desc_payment_payzen_max_amount'] = 'Defina el monto máximo para activar este método de pago.';

// Gateway backend misc texts.
$_['text_payment_payzen_redirect_message'] = 'Redirección a la tienda en unos momentos...';

$_['text_payment_payzen_chinese'] = 'Chino';
$_['text_payment_payzen_dutch'] = 'Holandés';
$_['text_payment_payzen_english'] = 'Inglés';
$_['text_payment_payzen_french'] = 'Francés';
$_['text_payment_payzen_german'] = 'Alemán';
$_['text_payment_payzen_italian'] = 'Italiano';
$_['text_payment_payzen_japanese'] = 'Japonés';
$_['text_payment_payzen_polish'] = 'Polaco';
$_['text_payment_payzen_portuguese'] = 'Portugués';
$_['text_payment_payzen_russian'] = 'Ruso';
$_['text_payment_payzen_spanish'] = 'Español';
$_['text_payment_payzen_swedish'] = 'Sueco';
$_['text_payment_payzen_turkish'] = 'Turco';

$_['text_payment_payzen_test'] = 'TEST';
$_['text_payment_payzen_production'] = 'PRODUCTION';

$_['text_payment_payzen_default'] = 'Configuración de Back Office PayZen';
$_['text_payment_payzen_automatic'] = 'Automático';
$_['text_payment_payzen_manual'] = 'Manual';

$_['text_payment_payzen_yes'] = 'Sí';
$_['text_payment_payzen_no'] = 'No';

$_['text_enabled'] = 'Habilitar';
$_['text_disabled'] = 'Deshabilitar';
$_['text_all_zones'] = 'All Zones';
$_['button_save'] = 'Guardar';
$_['button_cancel'] = 'Cancelar';
