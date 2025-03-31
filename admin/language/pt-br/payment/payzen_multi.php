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
$_['heading_title'] = 'PayZen - Pagamento em x vezes';
$_['text_edit'] = 'Editar PayZen - Pagamento em x vezes';

// Text.
$_['text_update_success'] = 'Parabéns, você modificou com sucesso os detalhes do módulo <b>#PayZen - Pagamento em x vezes </b>!';
$_['text_payzen_multi'] = '<a href="https://www.lyra.com" target="_blank"><img src="../extension/payzen/admin/view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_payzen_multi_validation'] = 'Atenção: O campo « %s » é inválido.';

// Gateway backend tabs & sections.
$_['tab_payment_payzen_multi_specific'] ='PAGAMENTO EM X VEZES';

$_['section_payment_payzen_multi_options'] = 'OPÇÕES DE PAGAMENTO';

// Gateway multi payment options.
$_['entry_payment_payzen_multi_first'] = '1° pagamento';
$_['entry_payment_payzen_multi_count'] = 'Contagem';
$_['entry_payment_payzen_multi_period'] = 'Período';

$_['desc_payment_payzen_multi_first'] = 'Valor do primeiro pagamento, em percentagem do valor total. Se estiver vazio, todos os pagamentos terão o mesmo valor.';
$_['desc_payment_payzen_multi_count'] = 'Quantidade total de pagamentos.';
$_['desc_payment_payzen_multi_period'] = 'Prazo (em dias) entre os pagamentos.';

// Gateway multi payment restriction warning.
$_['text_payment_payzen_multi_restriction_warn'] = 'ATENÇÃO: Ativar a funcionalidade de pagamento em x vezes é submetido ao acordo prévio da Société Générale.<br />Se você ativar esta funcionalidade sem dispor desta opção, um erro 10000 – INSTALLMENTS_NOT_ALLOWED ou 07 - PAYMENT_CONFIG será gerado e o comprador estará na incapacidade de pagar.';
$_['text_payment_payzen_multi_not_available'] = 'O pagamento PayZen parcelado não está disponível para sua oferta.';
