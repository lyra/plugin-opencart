<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */

// Headings.
$_['heading_title'] = 'PayZen - Standardzahlung';
$_['text_edit'] = 'PayZen - Standardzahlung bearbeiten';

// Texts.
$_['text_payment'] = 'Zahlung';
$_['text_update_success'] = 'Congratulations, you have successfully modified <b>PayZen - Standardzahlung</b> module details !';
$_['text_payzen'] = '<a href="https://www.lyra.com" target="_blank"><img src="view/image/payment/payzen.png" alt="PayZen" style="border: 1px solid #EEEEEE; width: 90px;" /></a>';

// Errors.
$_['error_permission'] = 'Warning: You do not have permission to modify <b>PayZen</b> payment module !';

// Gateway backend tabs & sections.
$_['tab_payzen_general'] = 'ALLGEMEIN';
$_['tab_payzen_specific'] = 'STANDARDZAHLUNG';
$_['tab_payzen_orders'] = 'BESTELLEN';

$_['section_payzen_module_info'] = 'MODULINFORMATIONEN';
$_['section_payzen_payment_access'] = 'ZUGANG ZAHLUNGSSCHNITTSTELLE';
$_['section_payzen_payment_page'] = 'ZAHLUNGSSEITE';
$_['section_payzen_selective_3ds'] = 'CUSTOM 3DS';
$_['section_payzen_return_to_shop'] = 'ZUR&Uuml;CK ZUM SHOP';
$_['section_payzen_module_setting'] = 'MODULEINSTELLUNGEN';
$_['section_payzen_amount_restrictions'] = 'BETRAGSBESCHR&Auml;NKUNGEN';
$_['section_payzen_orders'] = 'BESTELLSTATUS';

// Gateway backend entries.
$_['entry_payzen_developed_by'] = 'Entwickelt von: ';
$_['entry_payzen_support_email'] = 'Kontakt: ';
$_['entry_payzen_plugin_version'] = 'Modulversion: ';
$_['entry_payzen_gateway_version'] = 'Kompatibel mit Zahlungsschnittstelle: ';

$_['entry_payzen_geo_zone'] = 'Zahlungsraum';
$_['entry_payzen_status'] = 'Modul aktivieren';
$_['entry_payzen_sort_order'] = 'Anzeigereihenfolge';
$_['entry_payzen_enable_logs'] = 'Logdatein';

$_['entry_payzen_site_id'] = 'Shop ID';
$_['entry_payzen_key_test'] = 'Schl&uuml;sse im Testbetrieb';
$_['entry_payzen_key_prod'] = 'Schl&uuml;sse im Produktivbetrieb';
$_['entry_payzen_ctx_mode'] = 'Modus';
$_['entry_payzen_sign_algo'] = 'Signaturalgorithmus';
$_['entry_payzen_url_check'] = 'Benachrichtigung-URL';
$_['entry_payzen_platform_url'] = 'Plattform-URL';

$_['entry_payzen_language'] = 'Standardsprache';
$_['entry_payzen_available_languages'] = 'Verf&uuml;gbare Sprachen';
$_['entry_payzen_capture_delay'] = 'Einzugsfrist';
$_['entry_payzen_validation_mode'] = 'Best&auml;tigungsmodus';
$_['entry_payzen_payment_cards'] = 'Art der Kreditkarten';
$_['entry_payzen_3ds_min_amount'] = 'Manage 3DS';

$_['entry_payzen_min_amount'] = 'Mindestbetrag';
$_['entry_payzen_max_amount'] = 'H&ouml;chstbetrag';

$_['entry_payzen_redirect_enabled'] = 'Automatische Weiterleitung';
$_['entry_payzen_redirect_success_timeout'] = 'Zeitbeschr&auml;nkung Weiterleitung im Erfolgsfall';
$_['entry_payzen_redirect_success_message'] = 'Weiterleitungs-Nachricht im Erfolgsfall';
$_['entry_payzen_redirect_error_timeout'] = 'Zeitbeschr&auml;nkung Weiterleitung nach Ablehnung';
$_['entry_payzen_redirect_error_message'] = 'Weiterleitungs-Nachricht nach Ablehnung';
$_['entry_payzen_return_mode'] = '&Uuml;bermittlungs-Modus';

$_['entry_payzen_order_status_failed'] = 'Bezahlungsstatus nach verweigerter Bezahlung';
$_['entry_payzen_order_status_success'] = 'Bestellungsstatus nach erfolgreicher Bezahlung';
$_['entry_payzen_order_status_canceled'] = 'Bezahlungsstatus nach stornierten Bezahlung';
$_['entry_payzen_notify_failed'] = '';
$_['entry_payzen_notify_canceled'] = '';

$_['desc_payzen_status'] = 'Aktiviert / Deaktiviert dieses Zahlungsmodus.';
$_['desc_payzen_sort_order'] = 'Anzeigereihenfolge: Von klein nach gross.';
$_['desc_payzen_geo_zone'] = 'Wenn ein Bereich ausgewählt ist, steht dieser Zahlungsmodus nur dafür zur Verfügung.';
$_['desc_payzen_enable_logs'] = 'Logdateien des Moduls aktivieren';

$_['desc_payzen_site_id'] = 'Die Kennung von PayZen bereitgestellt.';
$_['desc_payzen_key_test'] = 'Schl&uuml;ssel, das von PayZen zu Testzwecken bereitgestellt wird (im PayZen-Back Office verf&uuml;gbar)';
$_['desc_payzen_key_prod'] = 'Von PayZen bereitgestelltes Schl&uuml;ssel (im PayZen-Back Office verf&uuml;gbar).';
$_['desc_payzen_ctx_mode'] = 'Kontextmodus dieses Moduls.';
$_['desc_payzen_sign_algo'] = 'Algorithmus zur Berechnung der Zahlungsformsignatur. Der ausgew&auml;hlte Algorithmus muss derselbe sein, wie er im PayZen Back Office.<br /><b>Der HMAC-SHA-256-Algorithmus sollte nicht aktiviert werden, wenn er noch nicht im PayZen Back Office verf&uuml;gbar ist. Die Funktion wird in K&uuml;rze verf&uuml;gbar sein.</b>';
$_['desc_payzen_url_check'] = 'URL, die Sie in Ihre PayZen Back Office kopieren sollen > Einstellung > Regeln der Benachrichtigungen.';
$_['desc_payzen_platform_url'] = 'Link zur Bezahlungsplattform.';
$_['desc_payzen_doc_link'] = 'Klicken Sie, um die Modul-Konfigurationsdokumentation zu finden :';

$_['desc_payzen_language'] = 'Standardsprache auf Zahlungsseite.';
$_['desc_payzen_available_languages'] = 'Verf&uuml;gbare Sprachen der Zahlungsseite. Nichts ausw&auml;hlen, um die Einstellung der Zahlungsplattform zu benutzen.';
$_['desc_payzen_capture_delay'] = 'Anzahl der Tage bis zum Einzug der Zahlung (Einstellung &uuml;ber Ihr PayZen Back Office).';
$_['desc_payzen_validation_mode'] = 'Bei manueller Eingabe m&uuml;ssen Sie Zahlungen manuell in Ihrem PayZen Back Office best&auml;tigen.';
$_['desc_payzen_payment_cards'] = 'Wählen Sie die zur Zahlung verfügbaren Kartentypen aus. Nichts auswählen, um die Einstellungen der Plattform zu verwenden.';
$_['desc_payzen_3ds_min_amount'] = 'Amount below which customer could be exempt from strong authentication. Needs subscription to &laquo;Selective 3DS1&raquo; or &laquo;Frictionless 3DS2&raquo; options. For more information, refer to the module documentation.';

$_['desc_payzen_min_amount'] = 'Mindestbetrag f&uuml;r die Nutzung dieser Zahlungsweise.';
$_['desc_payzen_max_amount'] = 'H&ouml;chstbetrag f&uuml;r die Nutzung dieser Zahlungsweise.';

$_['desc_payzen_redirect_enabled'] = 'Ist diese Einstellung aktiviert, wird der Kunde am Ende des Bezahlvorgangs automatisch auf Ihre Seite weitergeleitet.';
$_['desc_payzen_redirect_success_timeout'] = 'Zeitspanne in Sekunden (0-300) bis zur automatischen Weiterleitung des Kunden auf Ihre Seite nach erfolgter Zahlung.';
$_['desc_payzen_redirect_success_message'] = 'Nachricht, die nach erfolgter Zahlung und vor der Weiterleitung auf der Plattform angezeigt wird.';
$_['desc_payzen_redirect_error_timeout'] = 'Zeitspanne in Sekunden (0-300) bis zur automatischen Weiterleitung des Kunden auf Ihre Seite nach fehlgeschlagener Zahlung.';
$_['desc_payzen_redirect_error_message'] = 'Nachricht, die nach fehlgeschlagener Zahlung und vor der Weiterleitung auf der Plattform angezeigt wird.';
$_['desc_payzen_return_mode'] = 'Methode, die zur &Uuml;bermittlung des Zahlungsergebnisses von der Zahlungsschnittstelle an Ihren Shop verwendet wird.';

// Gateway backend misc texts.
$_['text_payzen_redirect_message'] = 'Weiterleitung zum Shop in K&uuml;rze...';

$_['text_payzen_chinese'] = 'Chinesisch';
$_['text_payzen_dutch'] = 'Niederl&auml;ndisch';
$_['text_payzen_english'] = 'Englisch';
$_['text_payzen_french'] = 'Franz&ouml;sisch';
$_['text_payzen_german'] = 'Deutsch';
$_['text_payzen_italian'] = 'Italianisch';
$_['text_payzen_japanese'] = 'Japanisch';
$_['text_payzen_polish'] = 'Polnisch';
$_['text_payzen_portuguese'] = 'Portugiesisch';
$_['text_payzen_spanish'] = 'Spanisch';
$_['text_payzen_swedish'] = 'Schwedisch';
$_['text_payzen_russian'] = 'Russisch';
$_['text_payzen_turkish'] = 'T&uuml;rkisch';

$_['text_payzen_test'] = 'TEST';
$_['text_payzen_production'] = 'PRODUKTION';

$_['text_payzen_default'] = 'PayZen Back Office Konfiguration';
$_['text_payzen_automatic'] = 'Automatisch';
$_['text_payzen_manual'] = 'Manuell';

$_['text_payzen_yes'] = 'Ja';
$_['text_payzen_no'] = 'Nein';
