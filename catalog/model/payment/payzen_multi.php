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

require_once(DIR_EXTENSION . 'payzen/system/library/payzenTools.php');
use \OpenCart\System\Library\PayzenTools as PayzenTools;

class PayzenMulti extends \Opencart\Catalog\Model\Extension\Payzen\Payment\Payzen
{
    protected $plugin_features;

    public function __construct($params)
    {
        parent::__construct($params);

        $this->plugin_features = PayzenTools::$plugin_features;
        $this->name = 'payzen_multi';
    }

    protected function getTitle()
    {
        $this->load->language('extension/payzen/payment/payzen');
        return sprintf(
            $this->language->get('text_' . $this->prefix . $this->name . '_title'),
            $this->config->get($this->prefix . $this->name . '_count')
        );
    }

    protected function checkMethod($address)
    {
        if (! $this->plugin_features['multi']) {
            return false;
        }

        return parent::checkMethod($address);
    }
}
