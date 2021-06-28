<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

class PayzenTools
{
    private static $GATEWAY_CODE = 'PayZen';
    private static $GATEWAY_NAME = 'PayZen';
    private static $BACKOFFICE_NAME = 'PayZen';
    private static $GATEWAY_URL = 'https://secure.payzen.eu/vads-payment/';
    private static $REST_URL = 'https://api.payzen.eu/api-payment/';
    private static $STATIC_URL = 'https://static.payzen.eu/static/';
    private static $SITE_ID = '12345678';
    private static $KEY_TEST = '1111111111111111';
    private static $KEY_PROD = '2222222222222222';
    private static $CTX_MODE = 'TEST';
    private static $SIGN_ALGO = 'SHA-256';
    private static $LANGUAGE = 'fr';

    private static $CMS_IDENTIFIER = 'OpenCart_2.0-2.2';
    private static $SUPPORT_EMAIL = 'support@payzen.eu';
    private static $PLUGIN_VERSION = '2.2.1';
    private static $GATEWAY_VERSION = 'V2';

    public static $plugin_features = array(
        'qualif' => false,
        'prodfaq' => true,
        'restrictmulti' => false,
        'shatwo' => true,

        'multi' => true
    );

    public static function getDefault($name)
    {
        if (! is_string($name)) {
            return '';
        }

        if (! isset(self::$$name)) {
            return '';
        }

        return self::$$name;
    }

    public static function getDocPattern()
    {
        $version = self::getDefault('PLUGIN_VERSION');
        $minor = substr($version, 0, strrpos($version, '.'));

        return self::getDefault('GATEWAY_CODE') . '_' . self::getDefault('CMS_IDENTIFIER') . '_v' . $minor . '*.pdf';
    }
}
