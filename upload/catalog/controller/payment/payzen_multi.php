<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

require_once('payzen.php');

class ControllerPaymentPayzenMulti extends ControllerPaymentPayzen
{

    public function __construct($params)
    {
        parent::__construct($params);

        $this->name = 'payzen_multi';
    }

    protected function getPayzenRequest()
    {
        $payzenRequest = parent::getPayzenRequest();

        if ($payzenRequest->get('amount')) {
            $currency = PayzenApi::findCurrencyByNumCode($payzenRequest->get('currency'));
            $amount = $currency->convertAmountToFloat($payzenRequest->get('amount'));

            // multi payment options
            $configFirst = $this->config->get('payzen_multi_first');
            $first = $configFirst ?
                    $currency->convertAmountToInteger($configFirst / 100 * $amount) :
                    null;

            $payzenRequest->setMultiPayment(
                    null /* use already set amount */,
                    $first,
                    $this->config->get('payzen_multi_count'),
                    $this->config->get('payzen_multi_period')
            );
        }

        return $payzenRequest;
    }
}
