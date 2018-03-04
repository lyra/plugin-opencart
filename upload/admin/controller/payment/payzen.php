<?php
#####################################################################################################
#
#					Module pour la plateforme de paiement PayZen
#						Version : 1.2a (révision 51616)
#									########################
#					Développé pour OpenCart
#						Version : 1.5.5.1
#						Compatibilité plateforme : V2
#									########################
#					Développé par Lyra Network
#						http://www.lyra-network.com/
#						24/09/2013
#						Contact : support@payzen.eu
#
#####################################################################################################

class ControllerPaymentPayzen extends Controller {
	private $error = array();
	private $_name = 'payzen';
	
	public function index() {
		// loading language : opencart 1.5.5.x code compatibility
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('payment/' . $this->_name);
		} else {
			$this->load->language('payment/' . $this->_name);
		}
		
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('setting/setting');
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()) {
			if (isset($this->request->post['payzen_available_languages']) && !empty($this->request->post['payzen_available_languages'])) {
				$this->request->post['payzen_available_languages'] = implode(';', $this->request->post['payzen_available_languages']);
			} else {
				$this->request->post['payzen_available_languages'] = '';
			}
			
			if (isset($this->request->post['payzen_payment_cards']) && !empty($this->request->post['payzen_payment_cards'])) {
				$this->request->post['payzen_payment_cards'] = implode(';', $this->request->post['payzen_payment_cards']);
			} else {
				$this->request->post['payzen_payment_cardss'] = '';
			}
			
			$this->model_setting_setting->editSetting('payzen', $this->request->post);				
			$this->session->data['success'] = $this->language->get('text_update_success');
			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}
		
		/**
		 * load language constants
		 * */
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_payzen_yes'] = $this->language->get('text_payzen_yes');
		$this->data['text_payzen_no'] = $this->language->get('text_payzen_no');
		$this->data['text_payzen_default'] = $this->language->get('text_payzen_default');
		$this->data['text_payzen_automatic'] = $this->language->get('text_payzen_automatic');
		$this->data['text_payzen_manual'] = $this->language->get('text_payzen_manual');
		
		$this->data['tab_payzen_module_info'] = $this->language->get('tab_payzen_module_info');
        $this->data['tab_payzen_module_setting'] = $this->language->get('tab_payzen_module_setting');
        $this->data['tab_payzen_payment_access'] = $this->language->get('tab_payzen_payment_access');
        $this->data['tab_payzen_payment_page'] = $this->language->get('tab_payzen_payment_page');
        $this->data['tab_payzen_selective_3ds'] = $this->language->get('tab_payzen_selective_3ds');
        $this->data['tab_payzen_amount_restrictions'] = $this->language->get('tab_payzen_amount_restrictions');
        $this->data['tab_payzen_return_to_shop'] = $this->language->get('tab_payzen_return_to_shop');
        
        $this->data['entry_payzen_developed_by'] = $this->language->get('entry_payzen_developed_by');
        $this->data['entry_payzen_contact_email'] = $this->language->get('entry_payzen_contact_email');
        $this->data['entry_payzen_contrib_version'] = $this->language->get('entry_payzen_contrib_version');
        $this->data['entry_payzen_gateway_version'] = $this->language->get('entry_payzen_gateway_version');
        $this->data['entry_payzen_cms_version'] = $this->language->get('entry_payzen_cms_version');

        $this->data['entry_payzen_url_check'] = $this->language->get('entry_payzen_url_check');
        
 		require_once(DIR_SYSTEM . 'library/payzen.php');
 		$payzenApi = new PayzenApi();
 		
 		// use supported API languages
 		$this->data['payzen_language_options'] = array();
 		foreach ($payzenApi->getSupportedLanguages() as $code => $label) {
 			$this->data['payzen_language_options'][$code] = $this->language->get('text_payzen_' . strtolower($label));
 		}
 		
 		// use supported API card types
 		$this->data['payzen_payment_card_options'] = $payzenApi->getSupportedCardTypes();
 		
 		$this->data['text_enabled'] = $this->language->get('text_enabled');
 		$this->data['text_disabled'] = $this->language->get('text_disabled');
 		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['tab_general'] = $this->language->get('tab_general');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
   		$this->data['breadcrumbs'] = array();
   		$this->data['breadcrumbs'][] = array(
   				'text' => $this->language->get('text_home'),
   				'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
   		      	'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_payment'),
				'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
   		      	'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('payment/payzen', 'token=' . $this->session->data['token'], 'SSL'),      		
				'separator' => ' :: '
   		);
   		
		$this->data['action'] = HTTPS_SERVER . 'index.php?route=payment/payzen&token=' . $this->session->data['token'];
		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];
		
		$configParams = array(
				'status', 'sort_order', 'geo_zone',
				'site_id', 'key_test', 'key_prod', 'ctx_mode', 'platform_url', 'language', 'available_languages', 
				'capture_delay', 'validation_mode', 'payment_cards', '3ds_min_amount', 'minimum_amount', 'maximum_amount', 
				'redirect_enabled', 'redirect_success_timeout', 'redirect_success_message', 'redirect_error_timeout', 
				'redirect_error_message', 'return_mode', 'order_status_success', 'order_status_failed', 'order_status_canceled',
				'notify_failed', 'notify_canceled'
		);
		
		foreach ($configParams as $name) {
			// load config parameter values
			if (isset($this->request->post['payzen_' . $name])) {
				$this->data['payzen_' . $name] = $this->request->post['payzen_' . $name];
			} else {
				$this->data['payzen_' . $name] = $this->config->get('payzen_' . $name);
			}
			
			// load language constants
			$this->data['entry_payzen_' . $name] = $this->language->get('entry_payzen_' . $name);
			$this->data['desc_payzen_' . $name] = $this->language->get('desc_payzen_' . $name);
		}
		
		// load order statuses		
		$this->load->model('localisation/order_status');
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		// load geographic zones
		$this->load->model('localisation/geo_zone');
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		$this->template = 'payment/payzen.tpl';
		$this->children = array(
				'common/header',	
				'common/footer'	
		);
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/payzen')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		return !$this->error ? TRUE : FALSE;
	}
	
	public function install() {
		// loading language : opencart 1.5.5.x code compatibility
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('payment/' . $this->_name);
		} else {
			$this->load->language('payment/' . $this->_name);
		}
		
		$this->data['payzen_status'] = '1';
		$this->data['payzen_sort_order'] = '1';
		$this->data['payzen_geo_zone'] = '0';
		
		$this->data['payzen_site_id'] = '12345678';
		$this->data['payzen_key_test'] = '1111111111111111'; 
		$this->data['payzen_key_prod'] = '2222222222222222';
		$this->data['payzen_ctx_mode'] = 'TEST';
		$this->data['payzen_platform_url'] = 'https://secure.payzen.eu/vads-payment/';
		
		$this->data['payzen_language'] = 'fr';
 		$this->data['payzen_redirect_enabled'] = '0';
 		
 		$this->data['payzen_redirect_success_timeout'] = '5';
 		$this->data['payzen_redirect_success_message'] = 'Redirection vers la boutique dans quelques instants...';
 		$this->data['payzen_redirect_error_timeout'] = '5';
 		$this->data['payzen_redirect_error_message'] = 'Redirection vers la boutique dans quelques instants...';
 		$this->data['payzen_return_mode'] = 'GET';
 		$this->data['payzen_order_status_failed'] = '10';
 		$this->data['payzen_order_status_success'] = '5';
 		$this->data['payzen_order_status_canceled'] = '7';
 		$this->data['payzen_notify_failed'] = '0';
 		$this->data['payzen_notify_canceled'] = '0';
 		
		$this->load->model('setting/setting');
		$this->model_setting_setting->editSetting('payzen', $this->data);				
		$this->session->data['success'] = $this->language->get('text_install_success');
		
		$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
	}
}
?>