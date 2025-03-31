<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart See COPYING.md for license details.
 *
 * @author     Lyra Network <https://www.lyra.com>
 * @copyright  Lyra Network
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

namespace Opencart\Admin\Controller\Extension\Payzen\Payment;

require_once(DIR_EXTENSION . 'payzen/system/library/payzenTools.php');

use \Lyranetwork\Payzen\Sdk\Form\Api as PayzenApi;
use \OpenCart\System\Library\PayzenTools as PayzenTools;

class Payzen extends \Opencart\System\Engine\Controller
{
    protected $error = '';
    protected $name;
    protected $prefix;
    protected $plugin_features;
    protected $separator = '';

    // All configurable parameters.
    protected $configParams = array(
        'status', 'sort_order', 'geo_zone', 'site_id', 'key_test', 'key_prod', 'ctx_mode', 'sign_algo', 'platform_url', 'language',
        'available_languages', 'capture_delay', 'validation_mode', 'payment_cards', '3ds_min_amount', 'min_amount',
        'max_amount', 'redirect_enabled', 'redirect_success_timeout', 'redirect_success_message', 'redirect_error_timeout',
        'redirect_error_message', 'return_mode', 'order_status_success', 'order_status_failed', 'order_status_canceled',
        'notify_failed', 'notify_canceled', 'enable_logs'
    );

    public function __construct($params)
    {
        parent::__construct($params);

        if (version_compare(VERSION, '4.0.2.0', '>=')) {
            $this->separator = '.';
        } else {
            $this->separator = '|';
        }

        $this->name = 'payzen';
        $this->prefix = 'payment_';

        $this->plugin_features = PayzenTools::$plugin_features;
    }

    public function index()
    {
        $this->load->language('extension/payzen/payment/' . $this->name);
        $this->response->setOutput($this->load->view('extension/payzen/payment/' . $this->name, $this->getFormData()));
    }

    protected function getFormData()
    {
        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] === 'POST') && $this->validate()) {
            if (isset($this->request->post[$this->prefix . $this->name . '_available_languages']) && ! empty($this->request->post[$this->prefix . $this->name . '_available_languages'])) {
                $this->request->post[$this->prefix . $this->name . '_available_languages'] = implode(';', $this->request->post[$this->prefix . $this->name . '_available_languages']);
            } else {
                $this->request->post[$this->prefix . $this->name . '_available_languages'] = '';
            }

            if (isset($this->request->post[$this->prefix . $this->name . '_payment_cards']) && ! empty($this->request->post[$this->prefix . $this->name . '_payment_cards'])) {
                $this->request->post[$this->prefix . $this->name . '_payment_cards'] = implode(';', $this->request->post[$this->prefix . $this->name . '_payment_cards']);
            } else {
                $this->request->post[$this->prefix . $this->name . '_payment_cards'] = '';
            }

            if ($this->plugin_features['qualif']) {
                $this->request->post[$this->prefix . $this->name . '_ctx_mode'] = 'PRODUCTION';
            }

            $this->model_setting_setting->editSetting($this->prefix . $this->name, $this->request->post);
            $this->session->data['success'] = $this->language->get('text_update_success');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', 'SSL'));
        }

        $data = [];

        // Load language constants.
        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_payment_payzen_yes'] = $this->language->get('text_payment_payzen_yes');
        $data['text_payment_payzen_no'] = $this->language->get('text_payment_payzen_no');
        $data['text_payment_payzen_test'] = $this->language->get('text_payment_payzen_test');
        $data['text_payment_payzen_production'] = $this->language->get('text_payment_payzen_production');
        $data['text_payment_payzen_default'] = $this->language->get('text_payment_payzen_default');
        $data['text_payment_payzen_automatic'] = $this->language->get('text_payment_payzen_automatic');
        $data['text_payment_payzen_manual'] = $this->language->get('text_payment_payzen_manual');

        $data['text_payment_payzen_support_email'] = PayzenApi::formatSupportEmails(PayzenTools::getDefault('SUPPORT_EMAIL'));
        $data['text_payment_payzen_contrib_version'] = PayzenTools::getDefault('PLUGIN_VERSION');
        $data['text_payment_payzen_gateway_version'] = PayzenTools::getDefault('GATEWAY_VERSION');
        $data['text_payment_payzen_doc'] = PayzenTools::getDocUrls();

        $data['section_payment_payzen_module_info'] = $this->language->get('section_payment_payzen_module_info');
        $data['section_payment_payzen_payment_access'] = $this->language->get('section_payment_payzen_payment_access');
        $data['section_payment_payzen_payment_page'] = $this->language->get('section_payment_payzen_payment_page');
        $data['section_payment_payzen_selective_3ds'] = $this->language->get('section_payment_payzen_selective_3ds');
        $data['section_payment_payzen_return_to_shop'] = $this->language->get('section_payment_payzen_return_to_shop');
        $data['section_payment_payzen_display_options'] = $this->language->get('section_payment_payzen_display_options');
        $data['section_payment_payzen_restrictions'] = $this->language->get('section_payment_payzen_restrictions');
        $data['section_payment_payzen_orders'] = $this->language->get('section_payment_payzen_orders');
        $data['section_payment_payzen_notifications'] = $this->language->get('section_payment_payzen_notifications');

        $data['entry_payment_payzen_developed_by'] = $this->language->get('entry_payment_payzen_developed_by');
        $data['entry_payment_payzen_contact_email'] = $this->language->get('entry_payment_payzen_contact_email');
        $data['entry_payment_payzen_contrib_version'] = $this->language->get('entry_payment_payzen_contrib_version');
        $data['entry_payment_payzen_gateway_version'] = $this->language->get('entry_payment_payzen_gateway_version');
        $data['entry_payment_payzen_doc'] = $this->language->get('entry_payment_payzen_doc');

        $data['text_payment_payzen_site_id'] = PayzenTools::getDefault('SITE_ID');
        $data['text_payment_payzen_key_test'] = PayzenTools::getDefault('KEY_TEST');
        $data['text_payment_payzen_key_prod'] = PayzenTools::getDefault('KEY_PROD');
        $data['entry_payment_payzen_url_check'] = $this->language->get('entry_payment_payzen_url_check');
        $data['desc_payment_payzen_url_check'] = $this->language->get('desc_payment_payzen_url_check');

        // Use supported API languages.
        $data[$this->prefix . $this->name . '_language_options'] = [];
        foreach (PayzenApi::getSupportedLanguages() as $code => $label) {
            $data[$this->prefix . $this->name . '_language_options'][$code] = $this->language->get('text_payment_payzen_' . strtolower($label));
        }

        // Use supported API card types.
        $data[$this->prefix . $this->name . '_payment_card_options'] = PayzenApi::getSupportedCardTypes();

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_all_zones'] = $this->language->get('text_all_zones');
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        $data['tab_payment_payzen_general'] = $this->language->get('tab_payment_payzen_general');
        $data['tab_payment_payzen_specific'] = $this->language->get('tab_payment_payzen_specific');
        $data['tab_payment_payzen_orders'] = $this->language->get('tab_payment_payzen_orders');

        $data['error_warning'] = ! empty($this->error) ? $this->error : '';

        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
            'separator' => false
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', 'SSL'),
            'separator' => ' :: '
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/payzen/payment/' . $this->name, 'user_token=' . $this->session->data['user_token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['action'] = HTTP_SERVER . 'index.php?route=extension/payzen/payment/' . $this->name . '&user_token=' . $this->session->data['user_token'];
        $data['cancel'] = HTTP_SERVER . 'index.php?route=marketplace/extension&user_token=' . $this->session->data['user_token'] . '&type=payment';
        $data[$this->prefix . 'payzen_notification_url'] = HTTP_CATALOG . 'index.php?route=extension/payzen/payment/payzen' . $this->separator . 'callback';

        foreach ($this->configParams as $param) {
            // Load config parameter values.
            if (isset($this->request->post[$this->prefix . $this->name . '_' . $param])) {
                $data[$this->prefix . $this->name . '_' . $param] = $this->request->post[$this->prefix . $this->name . '_' . $param];
            } else {
                // Original value from database.
                $data[$this->prefix . $this->name . '_' . $param] = $this->config->get($this->prefix . $this->name . '_' . $param);
            }

            // Load language constants.
            $data['entry_payment_payzen_' . $param] = $this->language->get('entry_payment_payzen_' . $param);
            $data['desc_payment_payzen_' . $param] = $this->language->get('desc_payment_payzen_' . $param);

            if (($param === 'sign_algo') && ! $this->plugin_features['shatwo']) {
                $data['desc_payment_payzen_' . $param] .= $this->language->get('desc_payment_payzen_sign_algo_details');
            }
        }

        // Load order statuses.
        $this->load->model('localisation/order_status');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        // Load geographic zones.
        $this->load->model('localisation/geo_zone');
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        // Load plugin features array.
        $data['payzen_plugin_features'] = $this->plugin_features;

        return $data;
    }

    protected function validate()
    {
        if (! $this->user->hasPermission('modify', 'extension/payzen/payment/' . $this->name)) {
            $this->error = $this->language->get('error_permission');
        }

        return empty($this->error);
    }

    protected function getDefaultValues()
    {
        $data = [];
        $data[$this->prefix . $this->name . '_status'] = '1';
        $data[$this->prefix . $this->name . '_sort_order'] = '1';
        $data[$this->prefix . $this->name . '_geo_zone'] = '0';
        $data[$this->prefix . $this->name . '_enable_logs'] = '1';
        $data[$this->prefix . $this->name . '_ctx_mode'] = PayzenTools::getDefault('CTX_MODE');
        $data[$this->prefix . $this->name . '_sign_algo'] = PayzenTools::getDefault('SIGN_ALGO');
        $data[$this->prefix . $this->name . '_language'] = PayzenTools::getDefault('LANGUAGE');
        $data[$this->prefix . $this->name . '_redirect_enabled'] = '0';
        $data[$this->prefix . $this->name . '_redirect_success_timeout'] = '5';
        $data[$this->prefix . $this->name . '_redirect_success_message'] = $this->language->get('text_payment_payzen_redirect_message');
        $data[$this->prefix . $this->name . '_redirect_error_timeout'] = '5';
        $data[$this->prefix . $this->name . '_redirect_error_message'] = $this->language->get('text_payment_payzen_redirect_message');
        $data[$this->prefix . $this->name . '_return_mode'] = 'POST';
        $data[$this->prefix . $this->name . '_order_status_failed'] = '10';
        $data[$this->prefix . $this->name . '_order_status_success'] = '5';
        $data[$this->prefix . $this->name . '_order_status_canceled'] = '7';
        $data[$this->prefix . $this->name . '_notify_failed'] = '0';
        $data[$this->prefix . $this->name . '_notify_canceled'] = '0';

        return $data;
    }

    public function install()
    {
        $this->load->language('extension/payzen/payment/' . $this->name);
        $this->load->model('setting/setting');
        $this->model_setting_setting->editSetting($this->prefix . $this->name, $this->getDefaultValues());
        $this->load->controller('extension/payzen/payment/' . $this->name);
    }
}
