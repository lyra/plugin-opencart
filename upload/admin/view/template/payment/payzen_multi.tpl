<?php
/**
 * PayZen V2-Payment Module version 2.1.0 for OpenCart 2.0-2.2. Support contact : support@payzen.eu.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  payment
 * @package   payzen
 * @author    Lyra Network (http://www.lyra-network.com/)
 * @copyright 2014-2016 Lyra Network and contributors
 * @license   http://www.gnu.org/licenses/gpl.html  GNU General Public License (GPL v3)
 * @version   2.1.0 (revision 67770)
 */
?>

<?php echo $header; ?><?php echo $column_left; ?>

<div id="content">
<div class="page-header">
	<div class="container-fluid">
		<div class="pull-right">
			<button type="submit" form="form-payzen_multi" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
			<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
					<label class="control-label"><b><a href="http://www.lyra-network.com/" target="_blank">Lyra network</a></b></label>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo $entry_payzen_contact_email; ?></label>
					<label class="control-label"><b><a href="mailto:support@payzen.eu">support@payzen.eu</a></b></label>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo $entry_payzen_contrib_version; ?></label>
					<label class="control-label"><b>2.1.0</b></label>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"><?php echo $entry_payzen_gateway_version; ?></label>
					<label class="control-label"><b>V2</b></label>
				</div> 
			</fieldset>

			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data" id="form-payzen_multi" class="form-horizontal">
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
								<label class="col-sm-3 control-label" for="payzen_multi_site_id"><span data-toggle="tooltip" title="<?php echo $desc_payzen_site_id; ?>"><?php echo $entry_payzen_site_id; ?></span></label>
								<div >
									<input type="text" id="payzen_multi_site_id" name="payzen_multi_site_id" placeholder="<?php echo $entry_payzen_site_id; ?>" value="<?php echo $payzen_multi_site_id; ?>" />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-3 control-label" for="payzen_multi_key_test"><span data-toggle="tooltip" title="<?php echo $desc_payzen_key_test; ?>"><?php echo $entry_payzen_key_test; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_key_test" name="payzen_multi_key_test" placeholder="<?php echo $entry_payzen_key_test; ?>" value="<?php echo $payzen_multi_key_test; ?>" />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-3 control-label" for="payzen_multi_key_prod"><span data-toggle="tooltip" title="<?php echo $desc_payzen_key_prod; ?>"><?php echo $entry_payzen_key_prod; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_key_prod" name="payzen_multi_key_prod" placeholder="<?php echo $entry_payzen_key_prod; ?>" value="<?php echo $payzen_multi_key_prod; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_ctx_mode"><span data-toggle="tooltip" title="<?php echo $desc_payzen_ctx_mode; ?>"><?php echo $entry_payzen_ctx_mode; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_ctx_mode" name="payzen_multi_ctx_mode">
										<option <?php if ($payzen_multi_ctx_mode == 'TEST') echo 'selected="selected"'; ?> value="TEST">TEST</option>
										<option <?php if ($payzen_multi_ctx_mode == 'PRODUCTION') echo 'selected="selected"'; ?> value="PRODUCTION">PRODUCTION</option>
									</select>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-3 control-label" for="payzen_multi_platform_url"><span data-toggle="tooltip" title="<?php echo $desc_payzen_platform_url; ?>"><?php echo $entry_payzen_platform_url; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_platform_url" name="payzen_multi_platform_url" placeholder="<?php echo $entry_payzen_platform_url; ?>" value="<?php echo $payzen_multi_platform_url; ?>" size="50"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo $entry_payzen_url_check ; ?></label>
								<label class="control-label"><b><?php echo HTTP_CATALOG.'index.php?route=payment/payzen/callback'; ?></b></label>
							</div>
						</fieldset>

						<fieldset>
							<legend><font style="font-weight: bold;"><?php echo $section_payzen_payment_page?> </font></legend>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_language"><span data-toggle="tooltip" title="<?php echo $desc_payzen_language; ?>"><?php echo $entry_payzen_language; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_language" name="payzen_multi_language">
									<?php
									foreach ($payzen_multi_language_options as $code => $label) {
										$selected = ($payzen_multi_language == $code) ? ' selected="selected"' : '';
									?>
										<option <?php echo $selected; ?> value="<?php echo $code; ?>"> <?php echo $label; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_available_languages"><span data-toggle="tooltip" title="<?php echo $desc_payzen_available_languages; ?>"><?php echo $entry_payzen_available_languages; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_available_languages" name="payzen_multi_available_languages[]" multiple="multiple" size="9" style="height: auto;">
									<?php
									if (!empty($payzen_multi_available_languages)) {
										$payzen_multi_available_languages = explode(';', $payzen_multi_available_languages); 
									} else {
										$payzen_multi_available_languages = array(); 
									}
									foreach ($payzen_multi_language_options as $code => $label) { 
										$selected = (in_array($code, $payzen_multi_available_languages)) ? ' selected="selected"' : '';
									?>
										<option <?php echo $selected; ?> value="<?php echo $code; ?>"><?php echo $label; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_capture_delay"><span data-toggle="tooltip" title="<?php echo $desc_payzen_capture_delay; ?>"><?php echo $entry_payzen_capture_delay; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_capture_delay" name="payzen_multi_capture_delay" placeholder="<?php echo $entry_payzen_capture_delay; ?>" value="<?php echo $payzen_multi_capture_delay; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_validation_mode"><span data-toggle="tooltip" title="<?php echo $desc_payzen_validation_mode; ?>"><?php echo $entry_payzen_validation_mode; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_validation_mode" name="payzen_multi_validation_mode">
										<option <?php if ($payzen_multi_validation_mode == '') echo 'selected="selected"'; ?>  value=''><?php echo $text_payzen_default ?></option>
										<option <?php if ($payzen_multi_validation_mode == '0') echo 'selected="selected"'; ?> value='0'><?php echo $text_payzen_automatic ?></option>
										<option <?php if ($payzen_multi_validation_mode == '1') echo 'selected="selected"'; ?> value='1'><?php echo $text_payzen_manual ?></option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_payment_cards"><span data-toggle="tooltip" title="<?php echo $desc_payzen_payment_cards; ?>"><?php echo $entry_payzen_payment_cards; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_payment_cards" name="payzen_multi_payment_cards[]" multiple="multiple" size="7" style="height: auto;">
									<?php
										if (!empty($payzen_multi_payment_cards)) {
											$payzen_multi_payment_cards = explode(';', $payzen_multi_payment_cards); 
										} else {
											$payzen_multi_payment_cards = array(); 
										}
										foreach ($payzen_multi_payment_card_options as $code => $label) { 
											$selected = (in_array($code, $payzen_multi_payment_cards)) ? ' selected="selected"' : '';
									?>
										<option <?php echo $selected; ?> value="<?php echo $code; ?>"> <?php echo $label; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend><font style="font-weight: bold;"><?php echo $section_payzen_selective_3ds?> </font> </legend>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_3ds_min_amount"><span data-toggle="tooltip" title="<?php echo $desc_payzen_3ds_min_amount; ?>"><?php echo $entry_payzen_3ds_min_amount; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_3ds_min_amount" name="payzen_multi_3ds_min_amount" placeholder="<?php echo $entry_payzen_3ds_min_amount; ?>" value="<?php echo $payzen_multi_3ds_min_amount; ?>"/>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend><font style="font-weight: bold;"><?php echo $section_payzen_return_to_shop ; ?></font></legend>
							<div class="form-group" >
								<label class="col-sm-3 control-label"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_enabled; ?>"><?php echo $entry_payzen_redirect_enabled; ?></span></label>
								<div class="col-sm-13">
									<input type="radio" <?php if ($payzen_multi_redirect_enabled == '0') echo 'checked="checked"'; ?> value='0' name="payzen_multi_redirect_enabled" id="payzen_multi_redirect_enabled_0"><label for="payzen_multi_redirect_enabled_0"><?php echo $text_payzen_no; ?></label>
									<input type="radio" <?php if ($payzen_multi_redirect_enabled == '1') echo 'checked="checked"'; ?> value='1' name="payzen_multi_redirect_enabled" id="payzen_multi_redirect_enabled_1"><label for="payzen_multi_redirect_enabled_1"><?php echo $text_payzen_yes; ?></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_redirect_success_timeout"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_success_timeout; ?>"><?php echo $entry_payzen_redirect_success_timeout; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_redirect_success_timeout" name="payzen_multi_redirect_success_timeout" placeholder="<?php echo $entry_payzen_redirect_success_timeout; ?>" value="<?php echo $payzen_multi_redirect_success_timeout; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_redirect_success_message"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_success_message; ?>"><?php echo $entry_payzen_redirect_success_message; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_redirect_success_message" name="payzen_multi_redirect_success_message" placeholder="<?php echo $entry_payzen_redirect_success_message; ?>" value="<?php echo $payzen_multi_redirect_success_message; ?>" size="50"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_redirect_error_timeout"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_error_timeout; ?>"><?php echo $entry_payzen_redirect_error_timeout; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_redirect_error_timeout" name="payzen_multi_redirect_error_timeout" placeholder="<?php echo $entry_payzen_redirect_error_timeout; ?>" value="<?php echo $payzen_multi_redirect_error_timeout; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_redirect_error_message"><span data-toggle="tooltip" title="<?php echo $desc_payzen_redirect_error_message; ?>"><?php echo $entry_payzen_redirect_error_message; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_redirect_error_message" name="payzen_multi_redirect_error_message" placeholder="<?php echo $entry_payzen_redirect_error_message; ?>" value="<?php echo $payzen_multi_redirect_error_message; ?>" size="50"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_return_mode"><span data-toggle="tooltip" title="<?php echo $desc_payzen_return_mode; ?>"><?php echo $entry_payzen_return_mode; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_return_mode" name="payzen_multi_return_mode">
										<option <?php if ($payzen_multi_return_mode == 'GET') echo 'selected="selected"'; ?> value="GET">GET</option>
										<option <?php if ($payzen_multi_return_mode == 'POST') echo 'selected="selected"'; ?> value="POST">POST</option>
									</select>
								</div>
							</div>
						</fieldset>
					</div>

					<div class="tab-pane" id="tab-specific">
						<fieldset>
							<legend><font style="font-weight: bold;"><?php echo $section_payzen_module_setting; ?></font></legend>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_status"><span data-toggle="tooltip" title="<?php echo $desc_payzen_status; ?>"><?php echo $entry_payzen_status; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_status" name="payzen_multi_status">
										<option <?php if ($payzen_multi_status) echo 'selected="selected"'; ?> value="1"><?php echo $text_enabled;?></option>
										<option <?php if (!$payzen_multi_status) echo 'selected="selected"'; ?> value="0"><?php echo $text_disabled;?></option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_sort_order"><span data-toggle="tooltip" title="<?php echo $desc_payzen_sort_order; ?>"><?php echo $entry_payzen_sort_order; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_sort_order" name="payzen_multi_sort_order" placeholder="<?php echo $entry_payzen_sort_order; ?>" value="<?php echo $payzen_multi_sort_order; ?>" size="3" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_geo_zone"><span data-toggle="tooltip" title="<?php echo $desc_payzen_geo_zone; ?>"><?php echo $entry_payzen_geo_zone; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_geo_zone" name="payzen_multi_geo_zone">
										<option value="0"><?php echo $text_all_zones; ?></option>
										<?php
										foreach ($geo_zones as $geo_zone) {
											$selected = ($geo_zone['geo_zone_id'] == $payzen_multi_geo_zone) ? ' selected="selected"' : '';
										?>
											<option value="<?php echo $geo_zone['geo_zone_id']; ?>" <?php echo $selected; ?>><?php echo $geo_zone['name']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_enable_logs"><span data-toggle="tooltip" title="<?php echo $desc_payzen_enable_logs; ?>"><?php echo $entry_payzen_enable_logs; ?></span></label>
								<div class="col-sm-13">
									<select id="payzen_multi_enable_logs" name="payzen_multi_enable_logs">
										<option <?php if ($payzen_multi_enable_logs) echo 'selected="selected"'; ?> value="1"><?php echo $text_enabled;?></option>
										<option <?php if (!$payzen_multi_enable_logs) echo 'selected="selected"'; ?> value="0"><?php echo $text_disabled;?></option>
									</select>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend><font style="font-weight: bold;"> <?php echo $section_payzen_amount_restrictions ; ?></font> </legend>
							<div class="form-group"> 
								<label class="col-sm-3 control-label" for="payzen_multi_min_amount"><span data-toggle="tooltip" title="<?php echo $desc_payzen_min_amount; ?>"><?php echo $entry_payzen_min_amount; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_min_amount" name="payzen_multi_min_amount" placeholder="<?php echo $entry_payzen_min_amount; ?>" value="<?php echo $payzen_multi_min_amount; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_max_amount"><span data-toggle="tooltip" title="<?php echo $desc_payzen_max_amount; ?>"> <?php echo $entry_payzen_max_amount; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_max_amount" name="payzen_multi_max_amount" placeholder="<?php echo $entry_payzen_max_amount; ?>" value="<?php echo $payzen_multi_max_amount; ?>" />
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend><font style="font-weight: bold;"><?php echo $section_payzen_multi_options ; ?></font></legend>
							<div class="form-group"> 
								<label class="col-sm-3 control-label" for="payzen_multi_first"><span data-toggle="tooltip" title="<?php echo $desc_payzen_first; ?>"> <?php echo $entry_payzen_first; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_first"  name="payzen_multi_first" placeholder="<?php echo $entry_payzen_first; ?>" value="<?php echo $payzen_multi_first; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_count"><span data-toggle="tooltip" title="<?php echo $desc_payzen_count; ?>"> <?php echo $entry_payzen_count; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_count" name="payzen_multi_count" placeholder="<?php echo $entry_payzen_count; ?>" value="<?php echo $payzen_multi_count; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_period"><span data-toggle="tooltip" title="<?php echo $desc_payzen_period; ?>"> <?php echo $entry_payzen_period; ?></span></label>
								<div class="col-sm-13">
									<input type="text" id="payzen_multi_period" name="payzen_multi_period" placeholder="<?php echo $entry_payzen_period; ?>" value="<?php echo $payzen_multi_period; ?>" />
								</div>
							</div>
						</fieldset>
					</div>

					<div class="tab-pane" id="tab-orders">
						<fieldset>
							<legend><font style="font-weight: bold;"><?php echo $section_payzen_orders; ?></font></legend>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_order_status_success"><?php echo $entry_payzen_order_status_success; ?></label>
								<div class="col-sm-13">  
									<select name="payzen_multi_order_status_success" id="payzen_multi_order_status_success">
									<?php 
									foreach ($order_statuses as $order_status) {
										$selected = ($order_status['order_status_id'] == $payzen_multi_order_status_success) ? ' selected="selected"' : '';
									?>
										<option <?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_order_status_failed"><?php echo $entry_payzen_order_status_failed; ?></label>
								<div class="col-sm-13">
									<select name="payzen_multi_order_status_failed" id="payzen_multi_order_status_failed">
									<?php 
									foreach ($order_statuses as $order_status) {
										$selected = ($order_status['order_status_id'] == $payzen_multi_order_status_failed) ? ' selected="selected"' : '';
									?>
										<option <?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label" for="payzen_multi_order_status_canceled"><?php echo $entry_payzen_order_status_canceled; ?></label>
								<div class="col-sm-13">
									<select name="payzen_multi_order_status_canceled" id="payzen_multi_order_status_canceled">
									<?php 
									foreach ($order_statuses as $order_status) {
										$selected = ($order_status['order_status_id'] == $payzen_multi_order_status_canceled) ? ' selected="selected"' : '';
									?>
										<option <?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo $entry_payzen_notify_failed; ?></label>
								<div class="col-sm-13">
									<input type="radio" <?php if ($payzen_multi_notify_failed === '0') echo 'checked="checked"'; ?> value="0" name="payzen_multi_notify_failed" id="payzen_multi_notify_failed_0"><label for="payzen_multi_notify_failed_0"><?php echo $text_payzen_no; ?></label>
									<input type="radio" <?php if ($payzen_multi_notify_failed === '1') echo 'checked="checked"'; ?> value="1" name="payzen_multi_notify_failed" id="payzen_multi_notify_failed_1"><label for="payzen_multi_notify_failed_1"><?php echo $text_payzen_yes; ?></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label"><?php echo $entry_payzen_notify_canceled; ?></label>
								<div class="col-sm-13">
									<input type="radio" <?php if ($payzen_multi_notify_canceled === '0') echo 'checked="checked"'; ?> value="0" name="payzen_multi_notify_canceled" id="payzen_multi_notify_canceled_0"><label for="payzen_multi_notify_canceled_0"><?php echo $text_payzen_no; ?></label>
									<input type="radio" <?php if ($payzen_multi_notify_canceled === '1') echo 'checked="checked"'; ?> value="1" name="payzen_multi_notify_canceled" id="payzen_multi_notify_canceled_1"><label for="payzen_multi_notify_canceled_1"><?php echo $text_payzen_yes; ?></label>
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
