<?php
/**
 * Copyright © Lyra Network.
 * This file is part of PayZen plugin for OpenCart. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL v3)
 */
 ?>

<?php echo $header; ?><?php echo $column_left; ?>

<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-payzen" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>
            <h1><img src="view/image/payment/payzen.png" alt=""/><?php echo $heading_title; ?></h1><br />
            <ul class="breadcrumb">
            <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
            <?php } ?>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <?php if ($error_warning) { ?>
            <div class="alert alert-danger"><?php echo $error_warning; ?></div>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php } ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i><?php echo $text_edit; ?></h3>
            </div>

            <div class="panel-body">
                <fieldset class="form-horizontal">
                   <legend><font style="font-weight: bold;"><?php echo $section_payzen_module_info; ?></font></legend>
                        <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo $entry_payzen_developed_by; ?></label>
                        <label class="control-label"><b><a href="https://www.lyra.com/" target="_blank">Lyra network</a></b></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo $entry_payzen_support_email; ?></label>
                        <label class="control-label"><b><a href="mailto:<?php echo $text_payzen_support_email; ?>"><?php echo $text_payzen_support_email; ?></a></b></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo $entry_payzen_plugin_version; ?></label>
                        <label class="control-label"><b><?php echo $text_payzen_plugin_version; ?></b></label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo $entry_payzen_gateway_version; ?></label>
                        <label class="control-label"><b><?php echo $text_payzen_gateway_version; ?></b></label>
                    </div>
                    <?php if ($payzen_doc_link) { ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" style="color: red; text-transform: uppercase;"><?php echo $desc_payzen_doc_link; ?></label>
                            <label class="control-label"><b><?php echo $payzen_doc_link; ?></b></label>
                        </div>
                    <?php } ?>
                </fieldset>

                <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data" id="form-payzen" class="form-horizontal">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_payzen_general; ?></a></li>
                        <li><a href="#tab-specific" data-toggle="tab"><?php echo $tab_payzen_specific; ?></a></li>
                        <li><a href="#tab-orders" data-toggle="tab"><?php echo $tab_payzen_orders; ?></a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-general">
                            <fieldset>
                                <legend><font style="font-weight: bold;"><?php echo $section_payzen_payment_access; ?></font></legend>

                                <div class="form-group required">
                                    <label class="col-sm-3 control-label" for="payzen_site_id"><span data-toggle="tooltip" title="<?php echo $desc_payzen_site_id; ?>"><?php echo $entry_payzen_site_id; ?></span></label>
                                    <div >
                                        <input type="text" id="payzen_site_id" name="payzen_site_id" placeholder="<?php echo $entry_payzen_site_id; ?>" value="<?php echo $payzen_site_id; ?>" />
                                    </div>
                                </div>
                                <div class="form-group required"<?php if ($payzen_plugin_features['qualif']) echo ' style="display: none;"'; ?> >
                                    <label class="col-sm-3 control-label" for="payzen_key_test"><span data-toggle="tooltip" title="<?php echo $desc_payzen_key_test; ?>"><?php echo $entry_payzen_key_test; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_key_test" name="payzen_key_test" placeholder="<?php echo $entry_payzen_key_test; ?>" value="<?php echo $payzen_key_test; ?>" />
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-3 control-label" for="payzen_key_prod"><span data-toggle="tooltip" title="<?php echo $desc_payzen_key_prod; ?>"><?php echo $entry_payzen_key_prod; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_key_prod" name="payzen_key_prod" placeholder="<?php echo $entry_payzen_key_prod; ?>" value="<?php echo $payzen_key_prod; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_ctx_mode"><span data-toggle="tooltip" title="<?php echo $desc_payzen_ctx_mode; ?>"><?php echo $entry_payzen_ctx_mode; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_ctx_mode" name="payzen_ctx_mode"<?php if ($payzen_plugin_features['qualif']) echo ' disabled="disabled"'; ?> >
                                            <option<?php if ($payzen_ctx_mode == 'TEST') echo ' selected="selected"'; ?> value="TEST"><?php echo $text_payzen_test; ?></option>
                                            <option<?php if ($payzen_ctx_mode == 'PRODUCTION') echo ' selected="selected"'; ?> value="PRODUCTION"><?php echo $text_payzen_production; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_sign_algo"><span data-toggle="tooltip" title="<?php echo $desc_payzen_sign_algo; ?>"><?php echo $entry_payzen_sign_algo; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_sign_algo" name="payzen_sign_algo">
                                            <option<?php if ($payzen_sign_algo == 'SHA-1') echo ' selected="selected"'; ?> value="SHA-1">SHA-1</option>
                                            <option<?php if ($payzen_sign_algo == 'SHA-256') echo ' selected="selected"'; ?> value="SHA-256">HMAC-SHA-256</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo $entry_payzen_url_check; ?></label>
                                    <label style="display: inline;"><b><?php echo HTTP_CATALOG.'index.php?route=payment/payzen/callback'; ?></b>
                                    <br />
                                        <img src="view/image/payment/warn.png" alt="" />
                                        <span style="color: red;"><?php echo $desc_payzen_url_check; ?></span>
                                    </label>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-3 control-label" for="payzen_platform_url"><span data-toggle="tooltip" title="<?php echo $desc_payzen_platform_url; ?>"><?php echo $entry_payzen_platform_url; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_platform_url" name="payzen_platform_url" placeholder="<?php echo $entry_payzen_platform_url; ?>" value="<?php echo $payzen_platform_url; ?>" size="50"/>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend><font style="font-weight: bold;"><?php echo $section_payzen_payment_page; ?> </font></legend>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_language"><span data-toggle="tooltip" title="<?php echo $desc_payzen_language; ?>"><?php echo $entry_payzen_language; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_language" name="payzen_language">
                                        <?php
                                        foreach ($payzen_language_options as $code => $label) {
                                            $selected = ($payzen_language == $code) ? ' selected="selected"' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $code; ?>"> <?php echo $label; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_available_languages"><span data-toggle="tooltip" title="<?php echo $desc_payzen_available_languages; ?>"><?php echo $entry_payzen_available_languages; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_available_languages" name="payzen_available_languages[]" multiple="multiple" size="9" style="height: auto;">
                                        <?php
                                        if (! empty($payzen_available_languages)) {
                                            $payzen_available_languages = explode(';', $payzen_available_languages);
                                        } else {
                                            $payzen_available_languages = array();
                                        }
                                        foreach ($payzen_language_options as $code => $label) {
                                            $selected = (in_array($code, $payzen_available_languages)) ? ' selected="selected"' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $code; ?>"><?php echo $label; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_capture_delay"><span data-toggle="tooltip" title="<?php echo $desc_payzen_capture_delay; ?>"><?php echo $entry_payzen_capture_delay; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_capture_delay" name="payzen_capture_delay" placeholder="<?php echo $entry_payzen_capture_delay; ?>" value="<?php echo $payzen_capture_delay; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_validation_mode"><span data-toggle="tooltip" title="<?php echo $desc_payzen_validation_mode; ?>"><?php echo $entry_payzen_validation_mode; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_validation_mode" name="payzen_validation_mode">
                                            <option<?php if ($payzen_validation_mode == '') echo ' selected="selected"'; ?> value=''><?php echo $text_payzen_default ?></option>
                                            <option<?php if ($payzen_validation_mode == '0') echo ' selected="selected"'; ?> value='0'><?php echo $text_payzen_automatic ?></option>
                                            <option<?php if ($payzen_validation_mode == '1') echo ' selected="selected"'; ?> value='1'><?php echo $text_payzen_manual ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_payment_cards"><span data-toggle="tooltip" title="<?php echo $desc_payzen_payment_cards; ?>"><?php echo $entry_payzen_payment_cards; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_payment_cards" name="payzen_payment_cards[]" multiple="multiple" size="7" style="height: auto;">
                                        <?php
                                            if (! empty($payzen_payment_cards)) {
                                                $payzen_payment_cards = explode(';', $payzen_payment_cards);
                                            } else {
                                                $payzen_payment_cards = array();
                                            }

                                            foreach ($payzen_payment_card_options as $code => $label) {
                                                $selected = (in_array($code, $payzen_payment_cards)) ? ' selected="selected"' : '';
                                        ?>
                                            <option <?php echo $selected; ?> value="<?php echo $code; ?>"><?php echo $label; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend><font style="font-weight: bold;"><?php echo $section_payzen_selective_3ds?> </font> </legend>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_3ds_min_amount"><span data-toggle="tooltip" title="<?php echo $desc_payzen_3ds_min_amount; ?>"><?php echo $entry_payzen_3ds_min_amount; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_3ds_min_amount" name="payzen_3ds_min_amount" placeholder="<?php echo $entry_payzen_3ds_min_amount; ?>" value="<?php echo $payzen_3ds_min_amount; ?>"/>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend><font style="font-weight: bold;"><?php echo $section_payzen_return_to_shop; ?></font></legend>
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_enabled; ?>"><?php echo $entry_payzen_redirect_enabled; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="radio"<?php if ($payzen_redirect_enabled == '0') echo ' checked="checked"'; ?> value='0' name="payzen_redirect_enabled" id="payzen_redirect_enabled_0"><label for="payzen_redirect_enabled_0"><?php echo $text_payzen_no; ?></label>
                                        <input type="radio"<?php if ($payzen_redirect_enabled == '1') echo ' checked="checked"'; ?> value='1' name="payzen_redirect_enabled" id="payzen_redirect_enabled_1"><label for="payzen_redirect_enabled_1"><?php echo $text_payzen_yes; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_redirect_success_timeout"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_success_timeout; ?>"><?php echo $entry_payzen_redirect_success_timeout; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_redirect_success_timeout" name="payzen_redirect_success_timeout" placeholder="<?php echo $entry_payzen_redirect_success_timeout; ?>" value="<?php echo $payzen_redirect_success_timeout; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_redirect_success_message"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_success_message; ?>"><?php echo $entry_payzen_redirect_success_message; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_redirect_success_message" name="payzen_redirect_success_message" placeholder="<?php echo $entry_payzen_redirect_success_message; ?>" value="<?php echo $payzen_redirect_success_message; ?>" size="50"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_redirect_error_timeout"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_error_timeout; ?>"><?php echo $entry_payzen_redirect_error_timeout; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_redirect_error_timeout" name="payzen_redirect_error_timeout" placeholder="<?php echo $entry_payzen_redirect_error_timeout; ?>" value="<?php echo $payzen_redirect_error_timeout; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_redirect_error_message"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_error_message; ?>"><?php echo $entry_payzen_redirect_error_message; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_redirect_error_message" name="payzen_redirect_error_message" placeholder="<?php echo $entry_payzen_redirect_error_message; ?>" value="<?php echo $payzen_redirect_error_message; ?>" size="50"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_return_mode"><span data-toggle="tooltip" title="<?php echo $desc_payzen_return_mode; ?>"><?php echo $entry_payzen_return_mode; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_return_mode" name="payzen_return_mode">
                                            <option<?php if ($payzen_return_mode == 'GET') echo ' selected="selected"'; ?> value="GET">GET</option>
                                            <option<?php if ($payzen_return_mode == 'POST') echo ' selected="selected"'; ?> value="POST">POST</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="tab-pane" id="tab-specific">
                            <fieldset>
                                <legend><font style="font-weight: bold;"><?php echo $section_payzen_module_setting; ?></font></legend>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_status"><span data-toggle="tooltip" title="<?php echo $desc_payzen_status; ?>"><?php echo $entry_payzen_status; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_status" name="payzen_status">
                                            <option<?php if ($payzen_status) echo ' selected="selected"'; ?> value="1"><?php echo $text_enabled;?></option>
                                            <option<?php if (! $payzen_status) echo ' selected="selected"'; ?> value="0"><?php echo $text_disabled;?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_sort_order"><span data-toggle="tooltip" title="<?php echo $desc_payzen_sort_order; ?>"><?php echo $entry_payzen_sort_order; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_sort_order" name="payzen_sort_order" placeholder="<?php echo $entry_payzen_sort_order; ?>" value="<?php echo $payzen_sort_order; ?>" size="3" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_geo_zone"><span data-toggle="tooltip" title="<?php echo $desc_payzen_geo_zone; ?>"><?php echo $entry_payzen_geo_zone; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_geo_zone" name="payzen_geo_zone">
                                            <option value="0"><?php echo $text_all_zones; ?></option>
                                            <?php
                                            foreach ($geo_zones as $geo_zone) {
                                                $selected = ($geo_zone['geo_zone_id'] == $payzen_geo_zone) ? ' selected="selected"' : '';
                                            ?>
                                                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"<?php echo $selected; ?>><?php echo $geo_zone['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_enable_logs"><span data-toggle="tooltip" title="<?php echo $desc_payzen_enable_logs; ?>"><?php echo $entry_payzen_enable_logs; ?></span></label>
                                    <div class="col-sm-13">
                                        <select id="payzen_enable_logs" name="payzen_enable_logs">
                                            <option<?php if ($payzen_enable_logs) echo ' selected="selected"'; ?> value="1"><?php echo $text_enabled;?></option>
                                            <option<?php if (! $payzen_enable_logs) echo ' selected="selected"'; ?> value="0"><?php echo $text_disabled;?></option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend><font style="font-weight: bold;"> <?php echo $section_payzen_amount_restrictions ; ?></font> </legend>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_min_amount"><span data-toggle="tooltip" title="<?php echo $desc_payzen_min_amount; ?>"><?php echo $entry_payzen_min_amount; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_min_amount" name="payzen_min_amount" placeholder="<?php echo $entry_payzen_min_amount; ?>" value="<?php echo $payzen_min_amount; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_max_amount"><span data-toggle="tooltip" title="<?php echo $desc_payzen_max_amount; ?>"> <?php echo $entry_payzen_max_amount; ?></span></label>
                                    <div class="col-sm-13">
                                        <input type="text" id="payzen_max_amount" name="payzen_max_amount" placeholder="<?php echo $entry_payzen_max_amount; ?>" value="<?php echo $payzen_max_amount; ?>" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="tab-pane" id="tab-orders">
                            <fieldset>
                                <legend><font style="font-weight: bold;"><?php echo $section_payzen_orders; ?></font></legend>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_order_status_success"><?php echo $entry_payzen_order_status_success; ?></label>
                                    <div class="col-sm-13">
                                        <select name="payzen_order_status_success" id="payzen_order_status_success">
                                        <?php
                                        foreach ($order_statuses as $order_status) {
                                            $selected = ($order_status['order_status_id'] == $payzen_order_status_success) ? ' selected="selected"' : '';
                                        ?>
                                            <option<?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_order_status_failed"><?php echo $entry_payzen_order_status_failed; ?></label>
                                    <div class="col-sm-13">
                                        <select name="payzen_order_status_failed" id="payzen_order_status_failed">
                                        <?php
                                        foreach ($order_statuses as $order_status) {
                                            $selected = ($order_status['order_status_id'] == $payzen_order_status_failed) ? ' selected="selected"' : '';
                                        ?>
                                            <option<?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="payzen_order_status_canceled"><?php echo $entry_payzen_order_status_canceled; ?></label>
                                    <div class="col-sm-13">
                                        <select name="payzen_order_status_canceled" id="payzen_order_status_canceled">
                                        <?php
                                        foreach ($order_statuses as $order_status) {
                                            $selected = ($order_status['order_status_id'] == $payzen_order_status_canceled) ? ' selected="selected"' : '';
                                        ?>
                                            <option<?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo $entry_payzen_notify_failed; ?></label>
                                    <div class="col-sm-13">
                                        <input type="radio"<?php if ($payzen_notify_failed === '0') echo ' checked="checked"'; ?> value="0" name="payzen_notify_failed" id="payzen_notify_failed_0"><label for="payzen_notify_failed_0"><?php echo $text_payzen_no; ?></label>
                                        <input type="radio"<?php if ($payzen_notify_failed === '1') echo ' checked="checked"'; ?> value="1" name="payzen_notify_failed" id="payzen_notify_failed_1"><label for="payzen_notify_failed_1"><?php echo $text_payzen_yes; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo $entry_payzen_notify_canceled; ?></label>
                                    <div class="col-sm-13">
                                        <input type="radio"<?php if ($payzen_notify_canceled === '0') echo ' checked="checked"'; ?> value="0" name="payzen_notify_canceled" id="payzen_notify_canceled_0"><label for="payzen_notify_canceled_0"><?php echo $text_payzen_no; ?></label>
                                        <input type="radio"<?php if ($payzen_notify_canceled === '1') echo ' checked="checked"'; ?> value="1" name="payzen_notify_canceled" id="payzen_notify_canceled_1"><label for="payzen_notify_canceled_1"><?php echo $text_payzen_yes; ?></label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $footer; ?>