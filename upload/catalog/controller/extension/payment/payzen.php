<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart See COPYING.md for license details.
 *
 * @author     Lyra Network <https://www.lyra.com>
 * @copyright  Lyra Network
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

class ControllerExtensionPaymentPayzen extends Controller
{

    protected $name;
    protected $prefix;
    protected $logger;
    protected $plugin_features;

    public function __construct($params)
    {
        parent::__construct($params);

        $this->name = 'payzen';
        $this->prefix = 'payment_';

        require_once(DIR_SYSTEM . 'library/payzen/tools.php');
        $this->plugin_features = PayzenTools::$plugin_features;

        // Init class logger.
        $this->logger = new Log(date('Y_m') . '_payzen.log');
    }

    public function index()
    {
        $payzenRequest = $this->getPayzenRequest();

        // Define template variables.
        $data = array(
            'payzen_form_fields' => $payzenRequest->getRequestHtmlFields(),
            'payzen_form_action' => $payzenRequest->get('platform_url'),
            'payzen_form_id' => $this->name . '_payment',

            'button_confirm' => $this->language->get('button_confirm')
        );

        $this->writeLog('Data to be sent to payment gateway: ' . print_r($payzenRequest->getRequestFieldsArray(true /* To hide sensitive data. */), true), 'DEBUG');

        return $this->load->view('extension/payment/payzen', $data);
    }

    protected function getPayzenRequest()
    {
        require_once(DIR_SYSTEM . 'library/payzen/request.php');
        $payzenRequest = new PayzenRequest();

        $this->load->model('checkout/order');
        $orderInfo = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        if ($orderInfo) {
            // Reset order to pending status if it isn't.
            if ($this->isOrderPending($orderInfo)) {
                $this->db->query(
                    "UPDATE `" . DB_PREFIX . "order` SET order_status_id = '0', date_modified = NOW() WHERE order_id = '" .
                    (int) $orderInfo['order_id'] . "'"
                );
            }

            // Update method title to be displayed in backend.
            $this->load->model('extension/payment/' . $this->name);
            $this->{'model_extension_payment_' . $this->name}->updateMethodTitle($orderInfo['order_id']);

            $info = array();

            // Get used currency.
            $currency = PayzenApi::findCurrencyByAlphaCode($orderInfo['currency_code']);
            $info['currency'] = $currency->getNum();

            // Get store language.
            $currentLang = strtolower(substr($orderInfo['language_code'], 0, 2));
            $configLang = $this->config->get($this->prefix . $this->name . '_language');
            $info['language'] = PayzenApi::isSupportedLanguage($currentLang) ? $currentLang : $configLang ;

            // Misc parameters.
            $info['order_id'] = $orderInfo['order_id'];

            $amount = $this->currency->format($orderInfo['total'], $orderInfo['currency_code'], $orderInfo['currency_value'], false);
            $info['amount'] = $currency->convertAmountToInteger($amount);

            $info['contrib'] = 'OpenCart_3.x_4.1.0/' . VERSION . '/' . PHP_VERSION;

            $info['order_info'] = 'session_id=' . $this->session->getId();

            // Customer info.
            $info['cust_id'] = $orderInfo['customer_id'];
            $info['cust_email'] = $orderInfo['email'];
            $info['cust_phone'] = $orderInfo['telephone'];

            $info['cust_first_name'] = $orderInfo['payment_firstname'] ;
            $info['cust_last_name'] = $orderInfo['payment_lastname'];
            $info['cust_address'] = $orderInfo['payment_address_1'] . ' ' . $orderInfo['payment_address_2'];
            $info['cust_zip'] = $orderInfo['payment_postcode'];
            $info['cust_country'] = $orderInfo['payment_iso_code_2'];
            $info['cust_city'] = $orderInfo['payment_city'];
            $info['cust_state'] = $orderInfo['payment_zone'];

            // Customer shipping address.
            $info['ship_to_first_name'] = $orderInfo['shipping_firstname'] ;
            $info['ship_to_last_name'] = $orderInfo['shipping_lastname'];
            $info['ship_to_street'] = $orderInfo['shipping_address_1'];
            $info['ship_to_street2'] = $orderInfo['shipping_address_2'];
            $info['ship_to_city'] = $orderInfo['shipping_city'];
            $info['ship_to_state'] = $orderInfo['shipping_zone'];
            $info['ship_to_country'] = $orderInfo['shipping_iso_code_2'];
            $info['ship_to_zip'] = $orderInfo['shipping_postcode'];

            // Activate 3DS?
            $threedsMpi = null;
            $threedsMinAmount = $this->config->get($this->prefix . $this->name . '_3ds_min_amount');
            if ($threedsMinAmount && $orderInfo['total'] < $threedsMinAmount) {
                $threedsMpi = '2';
            }

            $info['threeds_mpi'] = $threedsMpi;

            // Return URL.
            $info['url_return'] = $this->url->link('extension/payment/' . $this->name . '/process');

            // Admin configuration parameters.
            $configParams = array(
                'site_id', 'key_test', 'key_prod', 'ctx_mode', 'platform_url', 'available_languages',
                'capture_delay', 'validation_mode', 'payment_cards', 'redirect_enabled',
                'redirect_success_timeout', 'redirect_success_message', 'redirect_error_timeout',
                'redirect_error_message', 'return_mode', 'sign_algo'
            );

            foreach ($configParams as $param) {
                $info[$param] = $this->config->get($this->prefix . $this->name . '_' . $param);
            }

            $payzenRequest->setFromArray($info);
        }

        return $payzenRequest;
    }

    public function callback()
    {
        $this->load->model('checkout/order');

        $data = $this->clean($this->request->post);

        $this->writeLog('Begin server response processing.');

        require_once(DIR_SYSTEM . 'library/payzen/response.php');
        $payzenResponse = new PayzenResponse(
            $data,
            $this->config->get($this->prefix . $this->name . '_ctx_mode'),
            $this->config->get($this->prefix . $this->name . '_key_test'),
            $this->config->get($this->prefix . $this->name . '_key_prod'),
            $this->config->get($this->prefix . $this->name . '_sign_algo')
        );

        if (! $payzenResponse->isAuthentified()) {
            $ip = $_SERVER['REMOTE_ADDR'];

            $this->writeLog("{$ip} tries to access payzen/callback page without valid signature with parameters: " . print_r($data, true), 'ERROR');
            $this->writeLog('Signature algorithm selected in module settings must be the same as one selected in PayZen Back Office.', 'ERROR');
            die($payzenResponse->getOutputForGateway('auth_fail'));
        }

        $orderId = $payzenResponse->get('order_id');
        $orderInfo = $this->model_checkout_order->getOrder($orderId);
        if (empty($orderInfo)) {
            $this->writeLog("Order with ID #$orderId was not found.", 'ERROR');
            $this->writeLog('End server response processing.');
            die($payzenResponse->getOutputForGateway('order_not_found'));
        }

        if ($this->isOrderPending($orderInfo)) {
            $this->writeLog("First payment notification for order #$orderId. Let's change order status.");

            if ($payzenResponse->isAcceptedPayment()) {
                $this->writeLog('Payment for order #' . $orderId . ' has been confirmed by notification URL. New order status is ' . $this->config->get($this->prefix . $this->name . '_order_status_success') . '.');
                $this->model_checkout_order->addOrderHistory(
                    $orderId,
                    $this->config->get($this->prefix . $this->name . '_order_status_success'),
                    $payzenResponse->getCompleteMessage(),
                    true
                );

                $this->writeLog("Clear cart and session vars to process order #$orderId.");

                // Destroy current session and restore the session in which the payment was initiated.
                $sessionId = substr($payzenResponse->get('order_info'), strlen('session_id='));

                $this->session->__destroy();
                $this->session->start($sessionId);
                $this->registry->set('session', $this->session);

                // Clear cart and delete used session vars.
                if (isset($this->session->data['order_id'])) {
                    $customer = new Cart\Customer($this->registry);
                    $this->registry->set('customer', $customer);

                    $this->cart = new Cart\Cart($this->registry);
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

                $this->writeLog('End server response processing.');
                die($payzenResponse->getOutputForGateway('payment_ok'));
            } else {
                $orderStatus = $payzenResponse->isCancelledPayment() ?
                    $this->config->get($this->prefix . $this->name . '_order_status_canceled') :
                    $this->config->get($this->prefix . $this->name . '_order_status_failed');

                $notify = $payzenResponse->isCancelledPayment() ?
                    ($this->config->get($this->prefix . $this->name . '_notify_canceled') === '1') :
                    ($this->config->get($this->prefix . $this->name . '_notify_failed') === '1');

                $this->writeLog("Payment for order #$orderId not accepted. New order status is $orderStatus.");

                $this->model_checkout_order->addOrderHistory(
                    $orderId,
                    $orderStatus,
                    $payzenResponse->getCompleteMessage(),
                    $notify
                );

                $this->writeLog('End server response processing.');
                die($payzenResponse->getOutputForGateway('payment_ko'));
            }
        } else {
            // Order already processed.

            if ($this->isOrderSuccess($orderInfo) && $payzenResponse->isAcceptedPayment()) {
                $this->writeLog("Payment notification confirmed. Payment accepted for order #$orderId.");
                $this->writeLog('End server response processing.');
                die($payzenResponse->getOutputForGateway('payment_ok_already_done'));
            } elseif (($this->isOrderFailed($orderInfo) || $this->isOrderCanceled($orderInfo)) && ! $payzenResponse->isAcceptedPayment()) {
                $this->writeLog("Payment notification confirmed. Payment failed or cancelled for order #$orderId.");
                $this->writeLog('End server response processing.');
                die($payzenResponse->getOutputForGateway('payment_ko_already_done'));
            } else {
                $this->writeLog('Error! Invalid payment code received for an already processed order #' . $orderId . '. Order status is ' . $orderInfo['order_status_id'] . '. Payment result is ' . $payzenResponse->get('code'), 'ERROR');
                $this->writeLog('End server response processing.');
                die($payzenResponse->getOutputForGateway('payment_ko_on_order_ok'));
            }
        }
    }

    public function process()
    {
        $this->language->load('checkout/success');
        $this->language->load('extension/payment/payzen');

        $this->load->model('checkout/order');

        $data = $this->clean($this->request->request);

        $this->writeLog('Begin return user response processing.');

        require_once(DIR_SYSTEM . 'library/payzen/response.php');
        $payzenResponse = new PayzenResponse(
            $data,
            $this->config->get($this->prefix . $this->name . '_ctx_mode'),
            $this->config->get($this->prefix . $this->name . '_key_test'),
            $this->config->get($this->prefix . $this->name . '_key_prod'),
            $this->config->get($this->prefix . $this->name . '_sign_algo')
        );

        if (! $payzenResponse->isAuthentified()) {
            // Fatal error: clear cart.
            $this->cart->clear();

            $ip = $_SERVER['REMOTE_ADDR'];

            $this->writeLog("{$ip} tries to access payzen/process page without valid signature with parameters: " . print_r($data, true), 'ERROR');
            $this->writeLog('Signature algorithm selected in module settings must be the same as one selected in PayZen Back Office.', 'ERROR');

            $this->writeLog('End return user response processing.');
            $this->renderResponse(true);
            return;
        }

        $orderId = $payzenResponse->get('order_id');
        $orderInfo = $this->model_checkout_order->getOrder($orderId);
        if (empty($orderInfo)) {
            // Fatal error: clear cart.
            $this->cart->clear();

            $this->writeLog("Order with ID #$orderId was not found.", 'ERROR');
            $this->writeLog('End return user response processing.');
            $this->renderResponse(true);
            return;
        }

        // Load payment currency.
        $currency = PayzenApi::findCurrencyByNumCode($payzenResponse->get('currency'));
        $data = array(
            'trans_id' => $payzenResponse->get('trans_id'),
            'paid_amount' => $payzenResponse->getFloatAmount() . ' ' . $currency->getAlpha3()
        );

        if ($this->isOrderPending($orderInfo)) {
            $this->writeLog("First payment notification by user return for order #$orderId, server URL notification does not work. Let's change order status and show warning to merchant.", 'WARN');

            // Is it TEST mode?
            $testMode = ($this->config->get($this->prefix . $this->name . '_ctx_mode') === 'TEST');

            if ($payzenResponse->isAcceptedPayment()) {
                $this->writeLog("Payment for order #$orderId accepted. New order status is " . $this->config->get($this->prefix . $this->name . '_order_status_success') . '.');
                $this->model_checkout_order->addOrderHistory(
                    $orderId,
                    $this->config->get($this->prefix . $this->name . '_order_status_success'),
                    $payzenResponse->getCompleteMessage(),
                    true
                );

                $this->writeLog("Clear cart and session vars to process order #$orderId.");

                // Clear cart and delete used session vars.
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

                $this->writeLog('End user return response processing.');
                $this->renderResponse(false, $testMode, $data);
            } else {
                $orderStatus = $payzenResponse->isCancelledPayment() ?
                    $this->config->get($this->prefix . $this->name . '_order_status_canceled') :
                    $this->config->get($this->prefix . $this->name . '_order_status_failed');

                $notify = $payzenResponse->isCancelledPayment() ?
                    ($this->config->get($this->prefix . $this->name . '_notify_canceled') === '1') :
                    ($this->config->get($this->prefix . $this->name . '_notify_failed') === '1');

                    $this->writeLog("Payment for order #$orderId not accepted. New order status is $orderStatus.");

                $this->model_checkout_order->addOrderHistory(
                    $orderId,
                    $orderStatus,
                    $payzenResponse->getCompleteMessage(),
                    $notify
                );

                $this->writeLog('End user return response processing.');
                if ($payzenResponse->isCancelledPayment()) {
                    $this->response->redirect($this->url->link('checkout/checkout'));
                } else {
                    $this->renderResponse($this->language->get('text_payment_payzen_payment_error'), $testMode);
                }
            }
        } else {
            // Order already processed.
            if ($this->isOrderSuccess($orderInfo) && $payzenResponse->isAcceptedPayment()) {
                $this->writeLog("Payment notification confirmed. Payment accepted for order #$orderId.");
                $this->writeLog('End user return response processing.');
                $this->renderResponse(false, false, $data);
            } elseif ($this->isOrderCanceled($orderInfo) && $payzenResponse->isCancelledPayment()) {
                $this->writeLog("Payment notification confirmed. Payment cancelled for order #$orderId.");
                $this->writeLog('End user return response processing.');
                $this->response->redirect($this->url->link('checkout/checkout'));
            } elseif ($this->isOrderFailed($orderInfo) && ! $payzenResponse->isAcceptedPayment() && ! $payzenResponse->isCancelledPayment()) {
                $this->writeLog("Payment notification confirmed. Payment failed for order #$orderId.");
                $this->writeLog('End user return response processing.');
                $this->renderResponse($this->language->get('text_payment_payzen_payment_error'));
            } else {
                // Fatal error: clear cart.
                $this->cart->clear();

                $this->writeLog('Error! Invalid payment code received for an already processed order #' . $orderId . '. Order status is ' . $orderInfo['order_status_id'] . '. Payment result is ' . $payzenResponse->get('code'), 'ERROR');
                $this->writeLog('End user return response processing.');
                $this->renderResponse(true);
            }
        }
    }

    private function renderResponse($errorMessage = false, $urlCheckWarn = false, $data = array())
    {
        // Set misc data (when payment is successful).
        $data['payzen_data'] = array();
        foreach ($data as $name => $value) {
            if ($value) {
                $key = $this->language->get('entry_payment_payzen_' . $name);
                $data['payzen_data'][$key] = $value ;
            }
        }

        // Set check URL warning.
        if ($urlCheckWarn) {
            if ($this->config->get('config_maintenance')) {
                $data['text_payment_payzen_url_check'] = $this->language->get('text_payment_payzen_maint_warn');
            } else {
                $data['text_payment_payzen_url_check'] = $this->language->get('text_payment_payzen_url_check_warn');
                $data['text_payment_payzen_url_check'] .= '<br />';
                $data['text_payment_payzen_url_check'] .= $this->language->get('text_payment_payzen_url_check_details');
            }
        }

        // Set going to prod information.
        if ($this->config->get($this->prefix . $this->name . '_ctx_mode') === 'TEST' && $this->plugin_features['prodfaq']) {
            $data['text_payment_payzen_pass_to_prod'] = $this->language->get('text_payment_payzen_pass_to_prod_info');
        }

        if ($errorMessage) {
            $title = $this->language->get('heading_error_title');
        } else {
            $title = $this->language->get('heading_title');
        }

        $this->document->setTitle($title);
        $data['heading_title'] = $title;

        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'href' => $this->url->link('common/home'),
            'text' => $this->language->get('text_home')
        );
        $data['breadcrumbs'][] = array(
            'href' => $this->url->link('checkout/cart'),
            'text' => $this->language->get('text_basket')
        );
        $data['breadcrumbs'][] = array(
            'href' => $this->url->link('checkout/checkout', '', 'SSL'),
            'text' => $this->language->get('text_checkout')
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_success')
        );

        if ($errorMessage) {
            $data['text_message'] = is_string($errorMessage) ? $errorMessage :
                sprintf($this->language->get('text_payment_payzen_fatal_error'), $this->url->link('information/contact'));
        } elseif ($this->customer->isLogged()) {
            $data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', 'SSL'), $this->url->link('account/order', '', 'SSL'), $this->url->link('account/download', '', 'SSL'), $this->url->link('information/contact'));
        } else {
            $data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
        }

        $data['button_continue'] = $this->language->get('button_continue');

        $data['continue'] = is_string($errorMessage) ? $this->url->link('checkout/checkout') : $this->url->link('common/home');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/payment/payzen_process', $data));
    }

    private function isOrderPending($orderInfo)
    {
        return $orderInfo['order_status_id'] === '0';
    }

    private function isOrderSuccess($orderInfo)
    {
        return $orderInfo['order_status_id'] === $this->config->get($this->prefix . $this->name . '_order_status_success');
    }

    private function isOrderFailed($orderInfo)
    {
        return $orderInfo['order_status_id'] === $this->config->get($this->prefix . $this->name . '_order_status_failed');
    }

    private function isOrderCanceled($orderInfo)
    {
        return $orderInfo['order_status_id'] === $this->config->get($this->prefix . $this->name . '_order_status_canceled');
    }

    /**
     * Request::clean() inverse function. Decode html special chars in received data from payment platform
     * to avoid signature errors.
     *
     * @param $data array of received data
     * @return The cleaned data array
     * */
    private function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);

                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = htmlspecialchars_decode($data, ENT_COMPAT);
        }

        return $data;
    }

    private function writeLog($message, $level = 'INFO')
    {
        if (! $this->config->get($this->prefix . $this->name . '_enable_logs')) {
            return;
        }

        $this->logger->write($level . ' - ' . $message);
    }
}
