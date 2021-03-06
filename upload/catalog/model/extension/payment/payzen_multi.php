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

class ModelExtensionPaymentPayzenMulti extends  ModelExtensionPaymentPayzen
{
    protected $plugin_features;

    public function __construct($params)
    {
        parent::__construct($params);

        require_once(DIR_SYSTEM . 'library/payzen/tools.php');
        $this->plugin_features = PayzenTools::$plugin_features;
        $this->name = 'payzen_multi';
    }

    protected function getHtmlTitle()
    {
        $title = $this->getTitle();
        $logo = '<img src="catalog/view/theme/default/image/payzen_multi.png" alt="PayZen" title="' . $title . '" style="height: 30px;" />';

        return $logo . ' ' . $title;
    }

    protected function getTitle()
    {
        $this->load->language('extension/payment/payzen');
        return sprintf(
            $this->language->get('text_' . $this->prefix . $this->name . '_title'),
            $this->config->get($this->prefix . $this->name . '_count')
        );
    }

    protected function checkMethod($address, $total)
    {
        if (! $this->plugin_features['multi']) {
            return false;
        }

        return parent::checkMethod($address, $total);
    }
}
