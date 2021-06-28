<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network <https://www.lyra.com>
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

// Headings.
$_['heading_title'] = 'PayZen - Standardzahlung';
$_['text_edit'] = 'Edit PayZen - Standardzahlung';

// Text.
$_['text_home'] = 'Home';
$_['text_payment'] = 'Zahlung';
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Standardzahlung</b> module details!';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen - Standardzahlung" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Warning: You do not have permission to modify <b>PayZen</b> payment module!';

// Gateway backend tabs & sections.
$_['tab_payzen_general'] ='ALLGEMEINE KONFIGURATION';
$_['tab_payzen_specific'] ='STANDARDZAHLUNG';
$_['tab_payzen_orders'] ='BESTELLEN';

$_['section_payzen_module_info'] = 'MODULINFORMATIONEN';
$_['section_payzen_payment_access'] = 'ZUGANG ZAHLUNGSSCHNITTSTELLE';
$_['section_payzen_payment_page'] = 'ZAHLUNGSSEITE';
$_['section_payzen_selective_3ds'] = 'CUSTOM 3DS';
$_['section_payzen_return_to_shop'] = 'RÜCKKEHR ZUM LADEN';
$_['section_payzen_module_setting'] = 'ANZEIGEOPTIONEN';
$_['section_payzen_amount_restrictions'] = 'BETRAGSBESCHRÄNKUNGEN';
$_['section_payzen_orders'] ='BESTELLSTATUS';

// Gateway backend entries.
$_['entry_payzen_developed_by']  = 'Entwickelt von: ';
$_['entry_payzen_support_email'] = 'E-Mail-Adresse: ';
$_['entry_payzen_plugin_version'] = 'Modulversion: ';
$_['entry_payzen_gateway_version'] = 'Kompatibel mit Zahlungsschnittstelle: ';

$_['entry_payzen_site_id'] = 'Shop ID';
$_['entry_payzen_key_test'] = 'Schlüssel im Testbetrieb';
$_['entry_payzen_key_prod'] = 'Schlüssel im Produktivbetrieb';
$_['entry_payzen_ctx_mode'] = 'Modus';
$_['entry_payzen_sign_algo'] = 'Signaturalgorithmus';
$_['entry_payzen_url_check'] = 'Benachrichtigung-URL';
$_['entry_payzen_platform_url'] = 'Plattform-URL';

$_['entry_payzen_language'] = 'Standardsprache';
$_['entry_payzen_available_languages'] = 'Verfügbare Sprachen';
$_['entry_payzen_capture_delay'] = 'Einzugsfrist';
$_['entry_payzen_validation_mode'] = 'Bestätigungsmodus';
$_['entry_payzen_payment_cards'] = 'Kartentypen';

$_['entry_payzen_3ds_min_amount'] = 'Manage 3DS';

$_['entry_payzen_redirect_enabled'] = 'Automatische Weiterleitung';
$_['entry_payzen_redirect_success_timeout'] = 'Zeitbeschränkung Weiterleitung im Erfolgsfall';
$_['entry_payzen_redirect_success_message'] = 'Weiterleitungs-Nachricht im Erfolgsfall';
$_['entry_payzen_redirect_error_timeout'] = 'Zeitbeschränkung Weiterleitung nach Ablehnung';
$_['entry_payzen_redirect_error_message'] = 'Weiterleitungs-Nachricht nach Ablehnung';
$_['entry_payzen_return_mode'] = 'Übermittlungs-Modus';

$_['entry_payzen_geo_zone'] = 'Zahlungszone';
$_['entry_payzen_status'] = 'Aktiviert';
$_['entry_payzen_sort_order'] = 'Reihenfolge';
$_['entry_payzen_enable_logs'] = 'Logdaten';

$_['entry_payzen_min_amount'] = 'Mindestbetrag';
$_['entry_payzen_max_amount'] = 'Höchstbetrag';

$_['entry_payzen_order_status_failed'] = 'Status der Bestellungen bei verweigerter Zahlung';
$_['entry_payzen_order_status_success'] = 'Status der Bestellungen bei erfolgreicher Zahlung';
$_['entry_payzen_order_status_canceled'] = 'Status der Bestellungen bei stornierten Zahlung';
$_['entry_payzen_notify_failed'] = 'Notify buyer on payment failure';
$_['entry_payzen_notify_canceled'] = 'Notify buyer on payment cancel';

$_['desc_payzen_site_id'] = 'Die Kennung von PayZen bereitgestellt.';
$_['desc_payzen_key_test'] = 'Schlüssel, das von PayZen zu Testzwecken bereitgestellt wird (im PayZen Back Office verfügbar).';
$_['desc_payzen_key_prod'] = 'Von PayZen bereitgestelltes Schlüssel (im PayZen Back Office verfügbar, nachdem der Produktionsmodus aktiviert wurde).';
$_['desc_payzen_ctx_mode'] = 'Kontextmodus dieses Moduls.';
$_['desc_payzen_sign_algo'] = 'Algorithmus zur Berechnung der Zahlungsformsignatur. Der ausgewählte Algorithmus muss derselbe sein, wie er im PayZen Back Office.<br /><b>Der HMAC-SHA-256-Algorithmus sollte nicht aktiviert werden, wenn er noch nicht im PayZen Back Office verfügbar ist. Die Funktion wird in Kürze verfügbar sein.</b>';
$_['desc_payzen_url_check'] = 'URL, die Sie in Ihre PayZen Back Office kopieren sollen > Einstellung > Regeln der Benachrichtigungen.<br />Unter Multistore Modus, die URL Bestätigung ist die gleiche für alle Geschäfte.';
$_['desc_payzen_platform_url'] = 'Link zur Bezahlungsplattform.';

$_['desc_payzen_language'] = 'Standardsprache auf Zahlungsseite.';
$_['desc_payzen_available_languages'] = 'Verfügbare Sprachen der Zahlungsseite. Nichts auswählen, um die Einstellung der Zahlungsplattform zu benutzen.';
$_['desc_payzen_capture_delay'] = 'Anzahl der Tage bis zum Einzug der Zahlung (Einstellung über Ihr PayZen Back Office).';
$_['desc_payzen_validation_mode'] = 'Bei manueller Eingabe müssen Sie Zahlungen manuell in Ihr PayZen Back Office bestätigen..';
$_['desc_payzen_payment_cards'] = 'Wählen Sie die zur Zahlung verfügbaren Kartentypen aus. Nichts auswählen, um die Einstellungen der Plattform zu verwenden.';

$_['desc_payzen_3ds_min_amount'] = 'Amount below which customer could be exempt from strong authentication. Needs subscription to &laquo;Selective 3DS1&raquo; or &laquo;Frictionless 3DS2&raquo; options. For more information, refer to the module documentation.';

$_['desc_payzen_redirect_enabled'] = 'Ist diese Einstellung aktiviert, wird der Kunde am Ende des Bezahlvorgangs automatisch auf Ihre Seite weitergeleitet.';
$_['desc_payzen_redirect_success_timeout'] = 'Zeitspanne in Sekunden (0-300) bis zur automatischen Weiterleitung des Kunden auf Ihre Seite nach erfolgter Zahlung.';
$_['desc_payzen_redirect_success_message'] = 'Nachricht, die nach erfolgter Zahlung und vor der Weiterleitung auf der Plattform angezeigt wird.';
$_['desc_payzen_redirect_error_timeout'] = 'Zeitspanne in Sekunden (0-300) bis zur automatischen Weiterleitung des Kunden auf Ihre Seite nach fehlgeschlagener Zahlung.';
$_['desc_payzen_redirect_error_message'] = 'Nachricht, die nach fehlgeschlagener Zahlung und vor der Weiterleitung auf der Plattform angezeigt wird.';
$_['desc_payzen_return_mode'] = 'Methode, die zur Übermittlung des Zahlungsergebnisses von der Zahlungsschnittstelle an Ihren Shop verwendet wird.';

$_['desc_payzen_status'] = 'Aktiviert / Deaktiviert dieses Zahlungsmodus.';
$_['desc_payzen_sort_order']= 'In der Liste der Zahlungsmittel.';
$_['desc_payzen_geo_zone'] = 'Wenn ein Bereich ausgewählt ist, steht dieser Zahlungsmodus nur dafür zur Verfügung.';

$_['desc_payzen_enable_logs'] = 'Logdateien des Moduls aktivieren.';

$_['desc_payzen_min_amount'] = 'Mindestbetrag für die Nutzung dieser Zahlungsweise.';
$_['desc_payzen_max_amount'] = 'Höchstbetrag für die Nutzung dieser Zahlungsweise.';

// Gateway backend misc texts.
$_['text_payzen_redirect_message'] = 'Weiterleitung zum Shop in Kürze...';

$_['text_payzen_chinese'] = 'Chinesisch';
$_['text_payzen_dutch'] = 'Holländisch';
$_['text_payzen_english'] = 'Englisch';
$_['text_payzen_french'] = 'Französisch';
$_['text_payzen_german'] = 'Deutsch';
$_['text_payzen_italian'] = 'Italianisch';
$_['text_payzen_japanese'] = 'Japanisch';
$_['text_payzen_polish'] = 'Polnisch';
$_['text_payzen_portuguese'] = 'Portugiesisch';
$_['text_payzen_spanish'] = 'Spanisch';
$_['text_payzen_swedish'] = 'Schwedisch';
$_['text_payzen_russian'] = 'Russisch';
$_['text_payzen_turkish'] = 'Türkisch';

$_['text_payzen_test'] = 'TEST';
$_['text_payzen_production'] = 'PRODUKTION';

$_['text_payzen_default'] = 'PayZen Back Office Konfiguration';
$_['text_payzen_automatic'] = 'Automatisch';
$_['text_payzen_manual'] = 'Manuell';

$_['text_payzen_yes'] = 'Ja';
$_['text_payzen_no'] = 'Nein';

$_['text_enabled'] = 'Aktiviert';
$_['text_disabled'] = 'Deaktiviert';
$_['text_all_zones'] = 'All Zones';
$_['button_save'] = 'Speichern';
$_['button_cancel'] = 'Stornieren';
