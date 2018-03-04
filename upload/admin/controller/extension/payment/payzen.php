<?php
/**
 * PayZen V2-Payment Module version 3.0.0 for OpenCart 2.3.x. Support contact : support@payzen.eu.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  payment
 * @package   payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2017 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 */

class ControllerExtensionPaymentPayzen extends Controller {
	protected $error = '';
	protected $name;

	// all configurable parameters
	protected $configParams = array(
			'status', 'sort_order', 'geo_zone','site_id', 'key_test', 'key_prod', 'ctx_mode', 'platform_url', 'language',
			'available_languages', 'capture_delay', 'validation_mode', 'payment_cards', '3ds_min_amount','min_amount',
			'max_amount', 'redirect_enabled', 'redirect_success_timeout', 'redirect_success_message', 'redirect_error_timeout',
			'redirect_error_message', 'return_mode', 'order_status_success', 'order_status_failed', 'order_status_canceled',
			'notify_failed', 'notify_canceled', 'enable_logs'
	);

	public function __construct($params) {
		parent::__construct($params);
		$this->name = 'payzen';
	}

	public function index() {
		$this->load->language('extension/payment/'.$this->name);
		$this->response->setOutput($this->load->view('extension/payment/'.$this->name.'.tpl', $this->getFormData()));
	}

	protected function getFormData() {
		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()) {
			if (isset($this->request->post[$this->name.'_available_languages']) && !empty($this->request->post[$this->name.'_available_languages'])) {
				$this->request->post[$this->name.'_available_languages'] = implode(';', $this->request->post[$this->name.'_available_languages']);
			} else {
				$this->request->post[$this->name.'_available_languages'] = '';
			}

			if (isset($this->request->post[$this->name.'_payment_cards']) && !empty($this->request->post[$this->name.'_payment_cards'])) {
				$this->request->post[$this->name.'_payment_cards'] = implode(';', $this->request->post[$this->name.'_payment_cards']);
			} else {
				$this->request->post[$this->name.'_payment_cards'] = '';
			}

			$this->model_setting_setting->editSetting($this->name, $this->request->post);
			$this->session->data['success'] = $this->language->get('text_update_success');
			$this->response->redirect($this->url->link('extension/extension', 'token='.$this->session->data['token'].'&type=payment', 'SSL'));
		}

		// load language constants
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_payzen_yes'] = $this->language->get('text_payzen_yes');
		$data['text_payzen_no'] = $this->language->get('text_payzen_no');
		$data['text_payzen_test'] = $this->language->get('text_payzen_test');
		$data['text_payzen_production'] = $this->language->get('text_payzen_production');
		$data['text_payzen_default'] = $this->language->get('text_payzen_default');
		$data['text_payzen_automatic'] = $this->language->get('text_payzen_automatic');
		$data['text_payzen_manual'] = $this->language->get('text_payzen_manual');

		$data['section_payzen_module_info'] = $this->language->get('section_payzen_module_info');
		$data['section_payzen_payment_access'] = $this->language->get('section_payzen_payment_access');
		$data['section_payzen_payment_page'] = $this->language->get('section_payzen_payment_page');
		$data['section_payzen_selective_3ds'] = $this->language->get('section_payzen_selective_3ds');
		$data['section_payzen_return_to_shop'] = $this->language->get('section_payzen_return_to_shop');
		$data['section_payzen_module_setting'] = $this->language->get('section_payzen_module_setting');
		$data['section_payzen_amount_restrictions'] = $this->language->get('section_payzen_amount_restrictions');
		$data['section_payzen_orders'] = $this->language->get('section_payzen_orders');

		$data['entry_payzen_developed_by'] = $this->language->get('entry_payzen_developed_by');
		$data['entry_payzen_contact_email'] = $this->language->get('entry_payzen_contact_email');
		$data['entry_payzen_contrib_version'] = $this->language->get('entry_payzen_contrib_version');
		$data['entry_payzen_gateway_version'] = $this->language->get('entry_payzen_gateway_version');

		$data['entry_payzen_url_check'] = $this->language->get('entry_payzen_url_check');

		require_once(DIR_SYSTEM.'library/payzen/api.php');

		// use supported API languages
		$data[$this->name.'_language_options'] = array();
		foreach (PayzenApi::getSupportedLanguages() as $code => $label) {
			$data[$this->name.'_language_options'][$code] = $this->language->get('text_payzen_'.strtolower($label));
		}

		// use supported API card types
		$data[$this->name.'_payment_card_options'] = PayzenApi::getSupportedCardTypes();

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_payzen_general'] = $this->language->get('tab_payzen_general');
		$data['tab_payzen_specific'] = $this->language->get('tab_payzen_specific');
		$data['tab_payzen_orders'] = $this->language->get('tab_payzen_orders');

		$data['error_warning'] = !empty($this->error) ? $this->error : '';

		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token='.$this->session->data['token'], 'SSL'),
				'separator' => false
		);
		$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_payment'),
				'href' => $this->url->link('extension/extension', 'token='.$this->session->data['token'].'&type=payment', 'SSL'),
				'separator' => ' :: '
		);
		$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('extension/payment/'.$this->name, 'token='.$this->session->data['token'], 'SSL'),
				'separator' => ' :: '
		);

		$data['action'] = HTTPS_SERVER.'index.php?route=extension/payment/'.$this->name.'&token='.$this->session->data['token'];
		$data['cancel'] = HTTPS_SERVER.'index.php?route=extension/extension&token='.$this->session->data['token'].'&type=payment';

		foreach ($this->configParams as $param) {
			// load config parameter values
			if (isset($this->request->post[$this->name.'_'.$param])) {
				$data[$this->name.'_'.$param] = $this->request->post[$this->name.'_'.$param];
			} else {
				// original value from database
				$data[$this->name.'_'.$param] = $this->config->get($this->name.'_'.$param);
			}

			// load language constants
			$data['entry_payzen_'.$param] = $this->language->get('entry_payzen_'.$param);
			$data['desc_payzen_'.$param] = $this->language->get('desc_payzen_'.$param);
		}

		// load order statuses
		$this->load->model('localisation/order_status');
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		// load geographic zones
		$this->load->model('localisation/geo_zone');
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		return $data;
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/'.$this->name)) {
			$this->error = $this->language->get('error_permission');
		}

		return empty($this->error);
	}

	protected function getDefaultValues() {
		$data = array();

		$data[$this->name.'_status'] = '1';
		$data[$this->name.'_sort_order'] = '1';
		$data[$this->name.'_geo_zone'] = '0';
		$data[$this->name.'_enable_logs'] = '1';
		$data[$this->name.'_site_id'] = '12345678';
		$data[$this->name.'_key_test'] = '1111111111111111';
		$data[$this->name.'_key_prod'] = '2222222222222222';
		$data[$this->name.'_ctx_mode'] = 'TEST';
		$data[$this->name.'_platform_url'] = 'https://secure.payzen.eu/vads-payment/';
		$data[$this->name.'_language'] = 'fr';
		$data[$this->name.'_redirect_enabled'] = '0';
		$data[$this->name.'_redirect_success_timeout'] = '5';
		$data[$this->name.'_redirect_success_message'] = 'Redirection vers la boutique dans quelques instants...';
		$data[$this->name.'_redirect_error_timeout'] = '5';
		$data[$this->name.'_redirect_error_message'] = 'Redirection vers la boutique dans quelques instants...';
		$data[$this->name.'_return_mode'] = 'GET';
		$data[$this->name.'_order_status_failed'] = '10';
		$data[$this->name.'_order_status_success'] = '5';
		$data[$this->name.'_order_status_canceled'] = '7';
		$data[$this->name.'_notify_failed'] = '0';
		$data[$this->name.'_notify_canceled'] = '0';

		return $data;
	}

	public function install() {
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting($this->name, $this->getDefaultValues());
		$this->load->model('extension/extension');
	}
}
