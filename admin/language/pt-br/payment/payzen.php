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
$_['heading_title'] = 'PayZen - Pagamento padrão';
$_['text_edit'] = 'Editar PayZen - Pagamento padrão';

// Text.
$_['text_home'] = 'Home';
$_['text_extension'] = 'Extensões';
$_['text_update_success'] = 'Parabéns, você modificou com sucesso os detalhes do módulo <b>#PayZen - Pagamento padrão </b>!';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="../extension/payzen/admin/view/image/payment/payzen.png" alt="PayZen - Pagamento padrão" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Atenção: você não tem permissão para modificar o módulo de pagamento <b>PayZen</b>!';

// Gateway backend tabs & sections.
$_['tab_payment_payzen_general'] ='CONFIGURAÇÕES GERAIS';
$_['tab_payment_payzen_specific'] ='PAGAMENTO PADRÃO';
$_['tab_payment_payzen_orders'] ='PEDIDOS';

$_['section_payment_payzen_module_info'] = 'INFORMAÇÕES SOBRE O MÓDULO';
$_['section_payment_payzen_payment_access'] = 'ACESSO À PLATAFORMA';
$_['section_payment_payzen_payment_page'] = 'PÁGINA DE PAGAMENTO';
$_['section_payment_payzen_selective_3ds'] = '3DS PERSONALIZADO';
$_['section_payment_payzen_return_to_shop'] = 'VOLTAR PARA A LOJA';
$_['section_payment_payzen_display_options'] = 'OPÇÕES DE EXIBIÇÃO';
$_['section_payment_payzen_restrictions'] = 'RESTRIÇÕES DE VALOR';
$_['section_payment_payzen_orders'] = 'STATUS DE PEDIDO';
$_['section_payment_payzen_notifications'] ='NOTIFICAÇÕES';

// Gateway backend entries.
$_['entry_payment_payzen_developed_by']  = 'Desenvolvido por: ';
$_['entry_payment_payzen_contact_email'] = 'Email de contato: ';
$_['entry_payment_payzen_contrib_version'] = 'Versão do módulo: ';
$_['entry_payment_payzen_gateway_version'] = 'Versão da plataforma: ';
$_['entry_payment_payzen_doc'] = 'Clique para consultar a documentação da configuração do módulo: ';

$_['entry_payment_payzen_site_id'] = 'Código da loja';
$_['entry_payment_payzen_key_test'] = 'Chave em modo teste';
$_['entry_payment_payzen_key_prod'] = 'Chave em modo produção';
$_['entry_payment_payzen_ctx_mode'] = 'Modo';
$_['entry_payment_payzen_sign_algo'] = 'Algoritmo de assinatura';
$_['entry_payment_payzen_url_check'] = 'URL de notificação';

$_['entry_payment_payzen_language'] = 'Idioma por default';
$_['entry_payment_payzen_available_languages'] = 'Idiomas disponíveis';
$_['entry_payment_payzen_capture_delay'] = 'Prazo antes da captura no banco';
$_['entry_payment_payzen_validation_mode'] = 'Modo de validação';
$_['entry_payment_payzen_payment_cards'] = 'Tipos de cartões';

$_['entry_payment_payzen_3ds_min_amount'] = 'Gerenciar o 3DS';

$_['entry_payment_payzen_redirect_enabled'] = 'Redirecionamento automático';
$_['entry_payment_payzen_redirect_success_timeout'] = 'Tempo antes do redirecionamento (sucesso)';
$_['entry_payment_payzen_redirect_success_message'] = 'Mensagem antes do redirecionamento (sucesso)';
$_['entry_payment_payzen_redirect_error_timeout'] = 'Tempo antes do redirecionamento (falha)';
$_['entry_payment_payzen_redirect_error_message'] = 'Mensagem antes do redirecionamento (falha)';
$_['entry_payment_payzen_return_mode'] = 'Modo de retorno';

$_['entry_payment_payzen_order_status_failed'] = 'Status dos pedidos cujo pagamento foi realizado com rejeito.';
$_['entry_payment_payzen_order_status_success'] = 'Status dos pedidos cujo pagamento foi realizado com sucesso.';
$_['entry_payment_payzen_order_status_canceled'] = 'Status dos pedidos cujo pagamento foi realizado com cancelo.';

$_['entry_payment_payzen_notify_failed'] = 'Notificar el comprador en pago rechazad';
$_['entry_payment_payzen_notify_canceled'] = 'Notificar el comprador en pago cancelado';

$_['entry_payment_payzen_status'] = 'Ativação';
$_['entry_payment_payzen_sort_order'] = 'Ordem de classificação';
$_['entry_payment_payzen_geo_zone'] = 'Área de pagamento';

$_['entry_payment_payzen_enable_logs'] = 'Logs';

$_['entry_payment_payzen_min_amount'] = 'Valor mínimo';
$_['entry_payment_payzen_max_amount'] = 'Valor máximo';

$_['desc_payment_payzen_site_id'] = 'Código dado pelo PayZen.';
$_['desc_payment_payzen_key_test'] = 'Chave dada pelo PayZen para o modo teste (disponível no Back Office PayZen).';
$_['desc_payment_payzen_key_prod'] = 'Chave dada pelo PayZen (disponível no Back Office PayZen após passar em produção).';
$_['desc_payment_payzen_ctx_mode'] = 'Modo de funcionamento do módulo.';
$_['desc_payment_payzen_sign_algo'] = 'Algoritmo usado para calcular a assinatura do formulário de pagamento. O algoritmo selecionado deve ser o mesmo que foi configurado no Back Office PayZen.';
$_['desc_payment_payzen_sign_algo_details'] = '<br/><b>O HMAC-SHA-256 não deve estar ativo enquanto não estiver disponível no Back Office PayZen, a funcionalidade será disponível em breve.</b>';
$_['desc_payment_payzen_url_check'] = 'URL para copiar no Back Office PayZen > Configurações > Regras de notificações.<br />Em modo multi-loja, a URL de notificação é a mesma para todas as lojas.';

$_['desc_payment_payzen_language'] = 'Selecione o idioma default para usar na página de pagamento.';
$_['desc_payment_payzen_available_languages'] = 'Selecione os idiomas para propor na página de pagamento. Não selecionar nada para usar a configuração da plataforma.';
$_['desc_payment_payzen_capture_delay'] = 'A quantidade de dias antes da captura no banco (configurável no seu Back Office PayZen).';
$_['desc_payment_payzen_validation_mode'] = 'Em modo manual, deve confirmar os pagamentos no Back Office PayZen.';
$_['desc_payment_payzen_payment_cards'] = 'O(s) tipo(s) de cartão que pode(m) ser usado(s) para o pagamento. Selecionar nada para usar a configuração da plataforma.';

$_['desc_payment_payzen_3ds_min_amount'] = 'Valor abaixo do qual o comprador poderá ser isento da autenticação forte. Requer a contratação da opção &laquo;Selective3DS1&raquo; ou da opção &laquo;Frictionless 3DS2&raquo;. Para maiores informações, consulte a documentação do módulo.';

$_['desc_payment_payzen_redirect_enabled'] = 'Se ativa, o comprador será redirecionado automaticamente para seu site no final de pagamento.';
$_['desc_payment_payzen_redirect_success_timeout'] = 'Tempo em segundos (0-300) antes do redirecionamento automático do seu comprador para seu site, quando o pagamento foi realizado com sucesso.';
$_['desc_payment_payzen_redirect_success_message'] = 'Mensagem exibida na página de pagamento antes do redirecionamento após um pagamento realizado com sucesso.';
$_['desc_payment_payzen_redirect_error_timeout'] = 'Tempo em segundos (0-300) antes do redirecionamento automático do seu comprador para seu site, quando o pagamento falhou.';
$_['desc_payment_payzen_redirect_error_message'] = 'Mensagem exibida na página de pagamento antes do redirecionamento, quando o pagamento falhou.';
$_['desc_payment_payzen_return_mode'] = 'Maneira do comprador enviar o resultado do pagamento quando voltar à loja.';

$_['desc_payment_payzen_status'] = 'Ativa / desativa este método de pagamento.';
$_['desc_payment_payzen_sort_order']= 'O menor índice é exibido primeiro.';
$_['desc_payment_payzen_geo_zone'] = 'Se uma zona for escolhida, este método de pagamento será efetivo apenas para esta zona.';

$_['desc_payment_payzen_enable_logs'] = 'Ativar / desativar os logs do módulo.';

$_['desc_payment_payzen_min_amount'] = 'Defina o valor mínimo para ativar esta forma de pagamento.';
$_['desc_payment_payzen_max_amount'] = 'Defina o valor máximo para ativar esta forma de pagamento.';

// Gateway backend misc texts.
$_['text_payment_payzen_redirect_message'] = 'Redirecionamento para a loja em alguns instantes...';

$_['text_payment_payzen_chinese'] = 'Chinês';
$_['text_payment_payzen_dutch'] = 'Holandês';
$_['text_payment_payzen_english'] = 'Inglês';
$_['text_payment_payzen_french'] = 'Francês';
$_['text_payment_payzen_german'] = 'Alemão';
$_['text_payment_payzen_italian'] = 'Italiano';
$_['text_payment_payzen_japanese'] = 'Japonês';
$_['text_payment_payzen_polish'] = 'Polonês';
$_['text_payment_payzen_portuguese'] = 'Português';
$_['text_payment_payzen_russian'] = 'Russo';
$_['text_payment_payzen_spanish'] = 'Espanhol';
$_['text_payment_payzen_swedish'] = 'Sueco';
$_['text_payment_payzen_turkish'] = 'Turco';

$_['text_payment_payzen_test'] = 'TEST';
$_['text_payment_payzen_production'] = 'PRODUCTION';

$_['text_payment_payzen_default'] = 'Configuração Back Office PayZen';
$_['text_payment_payzen_automatic'] = 'Automático';
$_['text_payment_payzen_manual'] = 'Manual';

$_['text_payment_payzen_yes'] = 'Sim';
$_['text_payment_payzen_no'] = 'Não';

$_['text_enabled'] = 'Ativar';
$_['text_disabled'] = 'Desativar';
$_['text_all_zones'] = 'All Zones';
$_['button_save'] = 'Salvar';
$_['button_cancel'] = 'Cancelar';
