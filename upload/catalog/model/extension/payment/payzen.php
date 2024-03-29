<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart See COPYING.md for license details.
 *
 * @author     Lyra Network <https://www.lyra.com>
 * @copyright  Lyra Network
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

use \payzen\Form\Api as PayzenApi;

class ModelExtensionPaymentPayzen extends Model
{
    protected $name;
    protected $prefix;

    public function __construct($params)
    {
        parent::__construct($params);

        $this->name = 'payzen';
        $this->prefix = 'payment_';
    }

    public function getMethod($address, $total)
    {
        if (! $this->checkMethod($address, $total)) {
            return array();
        }

        return array(
            'code' => $this->name,
            'terms' => '',
            'title' => $this->getHtmlTitle(),
            'sort_order' => $this->config->get($this->prefix . $this->name . '_sort_order')
        );
    }

    protected function checkMethod($address, $total)
    {
        if (! $this->config->get($this->prefix . $this->name . '_status')) {
            // Disabled module.
            return false;
        }

        $query = $this->db->query(
            'SELECT * FROM ' . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int) $this->config->get($this->prefix . $this->name . '_geo_zone').
            "' AND country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')"
        );

        if ($this->config->get($this->prefix . $this->name . '_geo_zone') && ! $query->num_rows) {
            // If geo zone is configured and user country do not belong to module geo zone.
            return false;
        }

        // Check the customer's credit.
        if ($this->config->get('credit_status')) {
            $credit = $this->customer->getBalance();

            if ((float) $credit) {
                if ($credit >= $total) {
                    return false;
                }
            }
        }

        // Check the current currency support.
        $currencyObj = PayzenApi::findCurrencyByAlphaCode($this->session->data['currency']);
        if (! $currencyObj) {
            return false;
        }

        $min = $this->config->get($this->prefix . $this->name . '_min_amount');
        $max = $this->config->get($this->prefix . $this->name . '_max_amount');

        // Check the amount authorized by the module.
        if (($min && ($total < $min)) || ($max && ($total > $max))) {
            return false;
        }

        return true;
    }

    protected function getHtmlTitle()
    {
        $title = $this->getTitle();
        $logo = '<img src="catalog/view/theme/default/image/payzen.png" alt="PayZen" title="' . $title . '" style="height: 30px;" />';

        return $logo . ' ' . $title;
    }

    protected function getTitle()
    {
        $this->load->language('extension/payment/'.$this->name);
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
