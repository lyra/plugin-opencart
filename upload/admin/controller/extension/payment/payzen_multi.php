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

class ControllerExtensionPaymentPayzenMulti extends ControllerExtensionPaymentPayzen
{

    public function __construct($params)
    {
        parent::__construct($params);

        $this->name = 'payzen_multi';
        array_push($this->configParams, 'first', 'count', 'period');
    }

    protected function getFormData()
    {
        $data = parent::getFormData();

        $data['section_payment_payzen_multi_options'] = $this->language->get('section_payment_payzen_multi_options');
        $data['text_payment_payzen_multi_restriction_warn'] = $this->language->get('text_payment_payzen_multi_restriction_warn');
        $data['text_payment_payzen_multi_not_available'] = $this->language->get('text_payment_payzen_multi_not_available');

        return $data;
    }

    protected function validate()
    {
        if (! parent::validate()) {
            return false;
        }

        $data = $this->request->post;

        if (isset($data[$this->prefix . 'payzen_multi_first'])
                && ! empty($data[$this->prefix . 'payzen_multi_first'])
                && (! is_numeric($data[$this->prefix . 'payzen_multi_first']) || (float)$data[$this->prefix . 'payzen_multi_first'] >= 100 || (float)$data[$this->prefix . 'payzen_multi_first'] < 0)) {
            $this->error = sprintf($this->language->get('error_payzen_multi_validation'), $this->language->get('entry_payment_payzen_multi_first'));
        } elseif (! isset($data[$this->prefix . 'payzen_multi_count'])
                || ! preg_match('#^[1-9]\d*$#', $data[$this->prefix . 'payzen_multi_count'])) {
            $this->error = sprintf($this->language->get('error_payzen_multi_validation'), $this->language->get('entry_payment_payzen_multi_count'));
        } elseif (! isset($data[$this->prefix . 'payzen_multi_period'])
                || ! preg_match('#^[1-9]\d*$#', $data[$this->prefix . 'payzen_multi_period'])) {
            $this->error = sprintf($this->language->get('error_payzen_multi_validation'), $this->language->get('entry_payment_payzen_multi_period'));
        }

        return empty($this->error);
    }

    protected function getDefaultValues()
    {
        $data = parent::getDefaultValues();

        $data[$this->prefix . 'payzen_multi_count'] = '3';
        $data[$this->prefix . 'payzen_multi_period'] = '30';

        return $data;
    }
}
