<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart See COPYING.md for license details.
 *
 * @author     Lyra Network <https://www.lyra.com>
 * @copyright  Lyra Network
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

namespace Opencart\Catalog\Model\Extension\Payzen\Payment;

require_once(DIR_EXTENSION . 'payzen/system/library/sdk-autoload.php');

use \Lyranetwork\Payzen\Sdk\Form\Api as PayzenApi;

class Payzen extends \Opencart\System\Engine\Model
{
    protected $name;
    protected $prefix;

    public function __construct($params)
    {
        parent::__construct($params);

        $this->name = 'payzen';
        $this->prefix = 'payment_';
    }

    public function getMethods($address = [])
    {
        if (! $this->checkMethod($address) || $this->cart->hasSubscription()) {
           return [];
        }

        $option_data[$this->name] = [
            'code' => $this->name . '.' . $this->name,
            'name' => $this->getTitle()
        ];

        return [
           'code' => 'payzen',
           'name' => $this->getTitle(),
           'option' => $option_data,
           'sort_order' => $this->config->get($this->prefix . $this->name . '_sort_order')
       ];
    }

    protected function checkMethod($address)
    {
        if (! $this->config->get($this->prefix . $this->name . '_status')) {
            // Disabled module.
            return false;
        }

        if ($this->config->get('config_checkout_payment_address') && $this->config->get($this->prefix . $this->name . '__geo_zone_id')) {
            $query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone_to_geo_zone` WHERE `geo_zone` = '" . (int)$this->config->get($this->prefix . $this->name . '__geo_zone_id') . "' AND `country_id` = '" . (int)$address['country_id'] . "' AND (`zone_id` = '" . (int)$address['zone_id'] . "' OR `zone_id` = '0')");

            if (! $query->num_rows) {
                return false;
            }
        }

        // Check the current currency support.
        $currencyObj = PayzenApi::findCurrencyByAlphaCode($this->session->data['currency']);
        if (! $currencyObj) {
            return false;
        }

        $min = $this->config->get($this->prefix . $this->name . '_min_amount');
        $max = $this->config->get($this->prefix . $this->name . '_max_amount');

        // Order Totals.
        $total = $this->getCartTotal();

        // Check the amount authorized by the module.
        if (($min && ($total < $min)) || ($max && ($total > $max))) {
            return false;
        }

        return true;
    }

    private function getCartTotal()
    {
        $totals = $this->load->controller('api/cart.getTotals');
        foreach ($totals as $total) {
            if ($total['code'] == 'total') {
                return $this->currency->format($total['value'], $this->session->data['currency'], 0, false);
            }
        }

        return 0;
    }

    protected function getTitle()
    {
        $this->load->language('extension/payzen/payment/' . $this->name);
        return $this->language->get('text_' . $this->prefix . $this->name . '_title');
    }

    public function updateMethodTitle($order_id)
    {
        $this->db->query(
            'UPDATE `' . DB_PREFIX . "order` SET `payment_method` = '" . $this->db->escape($this->getTitle())
            . "' WHERE order_id = '" . (int) $order_id . "'"
        );
    }
}
