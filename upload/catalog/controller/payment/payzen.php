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

require_once(DIR_SYSTEM . 'library/payzen.php');

class ControllerPaymentPayzen extends Controller {
	
	protected function index() {
		$this->language->load('payment/payzen');
    	
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');
        
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payzen.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/payzen.tpl';
		} else {
			$this->template = 'default/template/payment/payzen.tpl';
		}
		
		$this->load->model('checkout/order');
		$orderInfo = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		
		// load PayzenApi class
		$payzenApi = new PayzenApi('UTF-8');
		
		$data = array();
		
		// get used currency
		$currency = $payzenApi->findCurrencyByAlphaCode($orderInfo['currency_code']);
		if($currency == null) {
			$this->log->write('PayZen :: Currency not supported, use default currency (EUR).');
			$currency = $payzenApi->findCurrencyByAlphaCode('EUR');
		}
		$data['currency'] = $currency->num;
		
		// get store language
		$currentLang = strtolower($this->session->data['language']);
		$configLang = $this->config->get('payzen_language');
		$data['language'] = $payzenApi->isSupportedLanguage($currentLang) ? $currentLang : $configLang ;
		
		// misc parameters
		$data['order_id'] = $orderInfo['order_id']; 
		
		$decimalPlace = $this->currency->getDecimalPlace($orderInfo['currency_code']);
		$data['amount'] = $currency->convertAmountToInteger(round($orderInfo['total'], (int)$decimalPlace));
		$data['contrib'] = 'OpenCart1.5.5.1_1.2a/' . VERSION;
		$data['order_info'] = 'session_id=' . session_id();
		
		// customer info
		$data['cust_id'] = $orderInfo['customer_id'];
		$data['cust_email'] = $orderInfo['email'];
		$data['cust_phone'] = $orderInfo['telephone'];
		
		$data['cust_first_name'] = $orderInfo['payment_firstname'] ;
		$data['cust_last_name'] = $orderInfo['payment_lastname'];
		$data['cust_address'] = $orderInfo['payment_address_1'] . ' ' . $orderInfo['payment_address_2'];   
		$data['cust_zip'] = $orderInfo['payment_postcode'];   
		$data['cust_country'] = $orderInfo['payment_iso_code_2'];   
		$data['cust_city'] = $orderInfo['payment_city']; 
		$data['cust_state'] = $orderInfo['payment_zone'];
		
		// customer shipping address
		$data['ship_to_first_name'] = $orderInfo['shipping_firstname'] ;   
		$data['ship_to_last_name'] = $orderInfo['shipping_lastname'];
		$data['ship_to_street'] = $orderInfo['shipping_address_1'];
		$data['ship_to_street2'] = $orderInfo['shipping_address_2'];
		$data['ship_to_city'] = $orderInfo['shipping_city'];   
		$data['ship_to_state'] = $orderInfo['shipping_zone'];   
		$data['ship_to_country'] = $orderInfo['shipping_iso_code_2'];   
		$data['ship_to_zip'] = $orderInfo['shipping_postcode'];   
		
		// activate 3DS ?
		$threedsMpi = NULL;
		$threedsMinAmount = $this->config->get('payzen_3ds_min_amount');
		if($threedsMinAmount != '' && $orderInfo['total'] < $threedsMinAmount) {
			$threedsMpi = '2';
		}
		$data['threeds_mpi'] = $threedsMpi;
		
		// return URL
		$data['url_return'] = $this->url->link('payment/payzen/process');
		
		$payzenApi->setFromArray($data);
		
		// admin configuration parameters
		$configParams = array(
				'site_id', 'key_test', 'key_prod', 'ctx_mode', 'platform_url', 'available_languages',
				'capture_delay', 'validation_mode', 'payment_cards', 'redirect_enabled', 
				'redirect_success_timeout', 'redirect_success_message', 'redirect_error_timeout',
				'redirect_error_message', 'return_mode'
		);
		
		foreach ($configParams as $name) {
			$payzenApi->set($name, $this->config->get('payzen_' . $name));
		}
		
        // define template variables
        $this->data['payzen_form_fields'] =  $payzenApi->getRequestFieldsHtml();
        $this->data['payzen_form_action'] =  $payzenApi->platformUrl;
        
        $this->log->write('PayZen :: Parameters to send to payment gateway : ' . print_r($payzenApi->getRequestFieldsArray(), true));
        
		$this->render();
	}
	
	
	public function callback() {
		if ((key_exists('vads_payment_config', $_POST) && stripos($_POST['vads_payment_config'], 'MULTI') !== false)
			|| (key_exists('vads_contrib', $_POST) && stripos($_POST['vads_contrib'], 'multi') !== false)) {
		
			// Multi payment : let multi module do the work
			return $this->forward('payment/payzen_multi/callback');
		}
		
		$this->load->model('checkout/order');
		
		$data = $this->clean($this->request->post);
		
		$this->log->write('PayZen :: Begin server response processing.');
		$this->log->write('PayZen :: Parameters received from payment gateway : ' . print_r($data, true));
		
		$payzenResponse = new PayzenResponse(
				$data,
				$this->config->get('payzen_ctx_mode'),
				$this->config->get('payzen_key_test'),
				$this->config->get('payzen_key_prod')
		);
		
		if(!$payzenResponse->isAuthentified()) {
			$this->log->write('PayZen :: Invalid signature. It may be a hacking attempt.');
			$this->log->write('PayZen :: End server response processing.');
			die($payzenResponse->getOutputForGateway('auth_fail'));
		}
		
		$orderId = $payzenResponse->get('order_id');
		$orderInfo = $this->model_checkout_order->getOrder($orderId);
		if (empty($orderInfo)) {
			$this->log->write('PayZen :: Order with ID#' . $orderId . ' was not found.');
			$this->log->write('PayZen :: End server response processing.');
			die($payzenResponse->getOutputForGateway('order_not_found'));
		}
		
		if($this->isOrderPending($orderInfo)) {
			$this->log->write('PayZen :: First payment notification. Let\'s change order status.');
			
			if ($payzenResponse->isAcceptedPayment()) {
				$this->log->write('PayZen :: Payment accepted. New order status is ' . $this->config->get('payzen_order_status_success') . '.');
				if((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
					$this->model_checkout_order->confirm(
							$orderId,
							$this->config->get('payzen_order_status_success'),
							$payzenResponse->getLogString(),
							TRUE
					);
				} else {
					$this->model_checkout_order->confirm(
							$orderId,
							$this->config->get('payzen_order_status_success'),
							$payzenResponse->getLogString()
					);
				}
				
				$this->log->write('PayZen :: Clear cart and session vars.');
				// close current session and restore the session in which the payment was done
				session_write_close();
				session_id(substr($payzenResponse->get('order_info'), strlen('session_id=')));
				session_start();
				
				$this->session = new Session();
				
				// clear cart and delete used session vars
				if (isset($this->session->data['order_id'])) {
					$this->session->data['cart'] = array();
		
					unset($this->session->data['shipping_method']);
					unset($this->session->data['shipping_methods']);
					unset($this->session->data['payment_method']);
					unset($this->session->data['payment_methods']);
					unset($this->session->data['guest']);
					unset($this->session->data['comment']);
					unset($this->session->data['order_id']);
					unset($this->session->data['coupon']);
					unset($this->session->data['voucher']);
					unset($this->session->data['vouchers']);
				}
		
				$this->log->write('PayZen :: End server response processing.');
				die($payzenResponse->getOutputForGateway('payment_ok'));
			} else {
				$orderStatus = $payzenResponse->isCancelledPayment() ?
							   $this->config->get('payzen_order_status_canceled') : 
							   $this->config->get('payzen_order_status_failed');
				
				$notify = $payzenResponse->isCancelledPayment() ?
						  ($this->config->get('payzen_notify_canceled') == '1') : 
						  ($this->config->get('payzen_notify_failed') == '1');
				
				$this->log->write('PayZen :: Payment not accepted. New order status is ' . $orderStatus . '.');
				
				// set order on pending status to allow update method processing
				$this->model_checkout_order->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = '1' WHERE order_id = '" . (int)$orderId . "'");
				
				$this->model_checkout_order->update(
						$orderId,
						$orderStatus,
						$payzenResponse->getLogString(),
						$notify
				);
		
				$this->log->write('PayZen :: End server response processing.');
				die($payzenResponse->getOutputForGateway('payment_ko'));
			}
		} else {
			// order already processed
		
			if($this->isOrderSuccess($orderInfo) && $payzenResponse->isAcceptedPayment()) {
				$this->log->write('PayZen :: Payment notification reconfirmed. Payment accepted.');
				$this->log->write('PayZen :: End server response processing.');
				die($payzenResponse->getOutputForGateway('payment_ok_already_done'));
					
			} elseif(($this->isOrderFailed($orderInfo) || $this->isOrderCanceled($orderInfo)) && !$payzenResponse->isAcceptedPayment()) {
				$this->log->write('PayZen :: Payment notification reconfirmed. Payment error or cancelation.');
				$this->log->write('PayZen :: End server response processing.');
				die($payzenResponse->getOutputForGateway('payment_ko_already_done'));
		
			} else {
				$this->log->write('PayZen :: Error! Invalid payment code received for an already processed order. Order status is ' . $orderInfo['order_status_id'] . '. Payment result is ' . $payzenResponse->code);
				$this->log->write('PayZen :: End server response processing.');
				die($payzenResponse->getOutputForGateway('payment_ko_on_order_ok'));
			}
		}
	}
	
	
	public function process() {
		$this->language->load('checkout/success');
		$this->language->load('payment/payzen');
		
		$this->load->model('checkout/order');
		
		$data = $this->clean($this->request->request);
		
		$this->log->write('PayZen :: Begin return user response processing.');
		$this->log->write('PayZen :: Parameters received from payment gateway : ' . print_r($data, true));
		
		$payzenResponse = new PayzenResponse(
				$data,
				$this->config->get('payzen_ctx_mode'),
				$this->config->get('payzen_key_test'),
				$this->config->get('payzen_key_prod')
		);
		
		if(!$payzenResponse->isAuthentified()) {
			$this->log->write('PayZen :: Invalid signature. It may be a hacking attempt.');
			$this->log->write('PayZen :: End return user response processing.');
			$this->renderResponse($this->language->get('text_payzen_fatal_error'));
			return;
		}

		$orderId = $payzenResponse->get('order_id');
		$orderInfo = $this->model_checkout_order->getOrder($orderId);
		if (empty($orderInfo)) {
			$this->log->write('PayZen :: Order with ID#' . $orderId . ' was not found.');
			$this->log->write('PayZen :: End return user response processing.');
			$this->renderResponse(sprintf($this->language->get('text_payzen_order_error'), $orderId, $this->url->link('information/contact')));
			return;
		}
		
		// load payment currency
		$currency = $payzenResponse->api->findCurrencyByNumCode($payzenResponse->get('currency'));
		$data = array(
				'trans_id' => $payzenResponse->get('trans_id'),
				'paid_amount' => $payzenResponse->getFloatAmount() . ' ' . $currency->alpha3
		);
		
		if($this->isOrderPending($orderInfo)) {
			$this->log->write('PayZen :: First payment notification by user return, server URL notification does not work. Let\'s change order status.');
			
			// is it TEST mode ?
			$testMode = ($this->config->get('payzen_ctx_mode') == 'TEST');
			
			if ($payzenResponse->isAcceptedPayment()) {
				$this->log->write('PayZen :: Payment accepted. New order status is ' . $this->config->get('payzen_order_status_success') . '.');
				if((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
					$this->model_checkout_order->confirm(
							$orderId,
							$this->config->get('payzen_order_status_success'),
							$payzenResponse->getLogString(),
							TRUE
					);
				} else {
					$this->model_checkout_order->confirm(
							$orderId,
							$this->config->get('payzen_order_status_success'),
							$payzenResponse->getLogString()
					);
				}
				
				$this->log->write('PayZen :: Clear cart and session vars.');
				// clear cart and delete used session vars
				if (isset($this->session->data['order_id'])) {
					$this->cart->clear();
						
					unset($this->session->data['shipping_method']);
					unset($this->session->data['shipping_methods']);
					unset($this->session->data['payment_method']);
					unset($this->session->data['payment_methods']);
					unset($this->session->data['guest']);
					unset($this->session->data['comment']);
					unset($this->session->data['order_id']);
					unset($this->session->data['coupon']);
					unset($this->session->data['voucher']);
					unset($this->session->data['vouchers']);
				}
				
				$this->log->write('PayZen :: End user return response processing.');
				$this->renderResponse(FALSE, $testMode, $data);
			} else {
				$orderStatus = $payzenResponse->isCancelledPayment() ?
								$this->config->get('payzen_order_status_canceled') :
								$this->config->get('payzen_order_status_failed');
				
				$notify = $payzenResponse->isCancelledPayment() ?
							($this->config->get('payzen_notify_canceled') == '1') :
							($this->config->get('payzen_notify_failed') == '1');
				
				$this->log->write('PayZen :: Payment not accepted. New order status is ' . $orderStatus . '.');
				
				// set order on pending status to allow update method processing
				$this->model_checkout_order->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = '1' WHERE order_id = '" . (int)$orderId . "'");
				
				$this->model_checkout_order->update(
						$orderId,
						$orderStatus,
						$payzenResponse->getLogString(),
						$notify
				);
				
				$this->log->write('PayZen :: End user return response processing.');				
				if($payzenResponse->isCancelledPayment()) {
					$this->redirect($this->url->link('checkout/cart'));
				} else {
					$this->renderResponse($this->language->get('text_payzen_payment_error'), $testMode);
				}
			}
		} else {
			// Order already processed
		 	
			if($this->isOrderSuccess($orderInfo) && $payzenResponse->isAcceptedPayment()) {
				$this->log->write('PayZen :: Payment notification reconfirmed. Payment accepted.');
				$this->log->write('PayZen :: End user return response processing.');
				$this->renderResponse(FALSE, FALSE, $data);
			
			} elseif($this->isOrderCanceled($orderInfo) && $payzenResponse->isCancelledPayment()) {
				$this->log->write('PayZen :: Payment notification reconfirmed. Payment canceled.');
				$this->log->write('PayZen :: End user return response processing.');
				$this->redirect($this->url->link('checkout/cart'));
				
			} elseif($this->isOrderFailed($orderInfo) && !$payzenResponse->isAcceptedPayment() && !$payzenResponse->isCancelledPayment()) {
				$this->log->write('PayZen :: Payment notification reconfirmed. Payment failed.');
				$this->log->write('PayZen :: End user return response processing.');
				$this->renderResponse($this->language->get('text_payzen_payment_error'));
				
			} else {
				$this->log->write('PayZen :: Error! Invalid payment code received for an already processed order. Order status is ' . $orderInfo['order_status_id'] . '. Payment result is ' . $payzenResponse->code);
				$this->log->write('PayZen :: End user return response processing.');
				$this->renderResponse($this->language->get('text_payzen_fatal_error'));
			}
		}
	}
	
	private function renderResponse($errorMessage=FALSE, $urlCheckWarn=FALSE, $data=array()) {
		// set check URL warning
		if($urlCheckWarn) {
			$this->data['text_payzen_url_check'] = $this->language->get('text_payzen_url_check_warn');
			$this->data['text_payzen_url_check'] .= '<br />';
			$this->data['text_payzen_url_check'] .= $this->language->get('text_payzen_url_check_details');
		}
		
		// set going to prod information
		if($this->config->get('payzen_ctx_mode') == 'TEST') {
			$this->data['text_payzen_pass_to_prod'] = $this->language->get('text_payzen_pass_to_prod_info');
			$this->data['text_payzen_pass_to_prod'] .= '<a href="https://secure.payzen.eu/html/faq/prod" target="_blank">https://secure.payzen.eu/html/faq/prod</a>';
		}
		
		// set misc data (when payment was successful)
		$this->data['payzen_data'] = array();
		foreach ($data as $name => $value) {
			$this->data['payzen_data'][] = array (
					'key' => $this->language->get('entry_payzen_' . $name),
					'value' => $value
			);
		}
		
		if($errorMessage) {
			$title = $this->language->get('heading_error_title');
		} else {
			$title = $this->language->get('heading_title');
		}
		$this->document->setTitle($title);
		$this->data['heading_title'] = $title;
		
		$this->data['breadcrumbs'] = array();
		
		$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('common/home'),
				'text'      => $this->language->get('text_home'),
				'separator' => false
		);
		
		$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('checkout/cart'),
				'text'      => $this->language->get('text_basket'),
				'separator' => $this->language->get('text_separator')
		);
		
		$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('checkout/checkout', '', 'SSL'),
				'text'      => $this->language->get('text_checkout'),
				'separator' => $this->language->get('text_separator')
		);
			
		$this->data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_success'),
				'separator' => $this->language->get('text_separator')
		);
		
		if($errorMessage) {
			$this->data['text_message'] = $errorMessage;
		} elseif ($this->customer->isLogged()) {
			$this->data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', 'SSL'), $this->url->link('account/order', '', 'SSL'), $this->url->link('account/download', '', 'SSL'), $this->url->link('information/contact'));
		} else {
			$this->data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
		}
		
		$this->data['button_continue'] = $this->language->get('button_continue');
		
		$this->data['continue'] = $errorMessage ? $this->url->link('checkout/cart') : $this->url->link('common/home');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payzen_process.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/payzen_process.tpl';
		} else {
			$this->template = 'default/template/payment/payzen_process.tpl';
		}
		
		$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
		);
		
		$this->response->setOutput($this->render());
	}
	
	private function isOrderPending($orderInfo) {
		return $orderInfo['order_status_id'] == 0;
	}
	
	private function isOrderSuccess($orderInfo) {
		return $orderInfo['order_status_id'] == $this->config->get('payzen_order_status_success');
	}
	
	private function isOrderFailed($orderInfo) {
		return $orderInfo['order_status_id'] == $this->config->get('payzen_order_status_failed');
	}
	
	private function isOrderCanceled($orderInfo) {
		return $orderInfo['order_status_id'] == $this->config->get('payzen_order_status_canceled');
	}
	
	/**
	 * Request::clean() inverse function. Decode html special chars in received data from payment platform
	 * to avoid signature errors.
	 *
	 * @param $data array of received data
	 * @return The cleaned data array
	 * */
	private function clean($data) {
		if(is_array($data)) {
			foreach ($data as $key => $value) {
				unset($data[$key]);
	
				$data[$this->clean($key)] = $this->clean($value);
			}
		} else {
			$data = htmlspecialchars_decode($data, ENT_COMPAT);
		}
	
		return $data;
	}
}
?>