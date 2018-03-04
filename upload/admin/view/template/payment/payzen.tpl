<?php
#####################################################################################################
#
#					Module pour la plateforme de paiement PayZen
#						Version : 1.2a (révision 51616)
#									########################
#					Développé pour OpenCart
#						Version : 1.5.5.1
#						Compatibilité plateforme : V2
#									########################
#					Développé par Lyra Network
#						http://www.lyra-network.com/
#						24/09/2013
#						Contact : support@payzen.eu
#
##################################################################################################### 
?>

<?php echo $header; ?>

<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>

<div class="box">
  
  <div class="heading">
    <h1><img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
  </div>
  
  <div class="content">
    <fieldset><legend><font style="font-weight: bold;"><?php echo $tab_payzen_module_info; ?></font></legend>
	  <table >
	    <tr>
	   	  <td style="width: 200px; text-align:right;"><?php echo $entry_payzen_developed_by; ?></td>
	      <td><a href="http://www.lyra-network.com/" target="_blank">Lyra network</a></td>
	    </tr>
	    <tr>
	      <td style="width: 200px; text-align:right;"><?php echo $entry_payzen_contact_email; ?></td>
	      <td><a href="mailto:support@payzen.eu">support@payzen.eu</a></td>
	    </tr>
	    <tr>
	      <td style="width: 200px; text-align:right;"><?php echo $entry_payzen_contrib_version; ?></td>
	      <td>1.2a</td>
	    </tr>
	    <tr>
	      <td style="width: 200px; text-align:right;"><?php echo $entry_payzen_gateway_version; ?> </td>
	      <td>V2</td>
	    </tr>
	    <tr>
	      <td style="width: 200px; text-align:right;"><?php echo $entry_payzen_cms_version; ?> </td>
	      <td>OpenCart 1.5.5.1</td>
	    </tr>
	  </table>
	</fieldset>
  
  
	<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data" id="form">
      
      <fieldset><legend><font style="font-weight: bold;"><?php echo $tab_payzen_module_setting; ?></font></legend>
	    <table class="form">
	      <tr>
            <td style="text-align: right;"><?php echo $entry_payzen_status; ?></td>
            <td>
              <select name="payzen_status">
                <option <?php if ($payzen_status) echo 'selected="selected"'; ?> value="1"><?php echo $text_enabled;?></option>
                <option <?php if (!$payzen_status) echo 'selected="selected"'; ?> value="0"><?php echo $text_disabled;?></option>
              </select>
            </td>
          </tr>
          
          <tr>
            <td style="text-align: right;"><?php echo $entry_payzen_sort_order; ?></td>
            <td><input type="text" name="payzen_sort_order" value="<?php echo $payzen_sort_order; ?>" size="3" /></td>
          </tr>
          
          <tr>
            <td style="text-align: right;"><?php echo $entry_payzen_geo_zone; ?></td>
            <td>
              <select name="payzen_geo_zone">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php 
                foreach ($geo_zones as $geo_zone) {
                  $selected = ($geo_zone['geo_zone_id'] == $payzen_geo_zone) ? ' selected="selected"' : '';
               	?>
                  <option value="<?php echo $geo_zone['geo_zone_id']; ?>" <?php echo $selected; ?>><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
               </select>
             </td>
           </tr>
	     </table>
       </fieldset> 
   
       <fieldset><legend><font style="font-weight: bold;"><?php echo $tab_payzen_payment_access; ?></font></legend>
	     <table class="form">
	       <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_site_id; ?></td>
             <td><input type="text" name="payzen_site_id" value="<?php echo $payzen_site_id; ?>" /><br /><span class="help"><?php echo $desc_payzen_site_id; ?></span></td>
           </tr>
        
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_key_test; ?></td>
             <td><input type="text" name="payzen_key_test" value="<?php echo $payzen_key_test; ?>" /><br /><span class="help"><?php echo $desc_payzen_key_test; ?></span></td>
           </tr>
         
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_key_prod; ?></td>
             <td><input type="text" name="payzen_key_prod" value="<?php echo $payzen_key_prod; ?>" /><br /><span class="help"><?php echo $desc_payzen_key_prod; ?></span></td>
           </tr>
        
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_ctx_mode; ?></td>
             <td>
               <select name="payzen_ctx_mode">
                 <option <?php if ($payzen_ctx_mode == 'TEST') echo 'selected="selected"'; ?> value="TEST">TEST</option>
			     <option <?php if ($payzen_ctx_mode == 'PRODUCTION') echo 'selected="selected"'; ?> value="PRODUCTION">PRODUCTION</option>
               </select><br /><span class="help"><?php echo $desc_payzen_ctx_mode; ?></span>
             </td>
           </tr>
          
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_platform_url; ?></td>
             <td><input type="text" name="payzen_platform_url" value="<?php echo $payzen_platform_url; ?>" size="50"/><br /><span class="help"><?php echo $desc_payzen_platform_url; ?></span></td>
           </tr>
           
           <tr>
      	     <td style="text-align: right;"><?php echo $entry_payzen_url_check ; ?></td>
             <td><?php echo '<b>' . HTTP_CATALOG . 'index.php?route=payment/payzen/callback'.'</b>';?></td>
           </tr>
         </table>
       </fieldset>  
   
       <fieldset><legend><font style="font-weight: bold;"><?php echo $tab_payzen_payment_page?> </font> </legend>
	     <table class="form">
	       <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_language; ?></td>
             <td>
               <select name="payzen_language"  >
               <?php 
               foreach ($payzen_language_options as $code => $label) { 
                 $selected = ($payzen_language == $code) ? ' selected="selected"' : '';
               ?>
                 <option  <?php echo $selected; ?> value="<?php echo $code; ?>"> <?php echo $label; ?></option>
               <?php } ?>
               </select><br /><span class="help"><?php echo $desc_payzen_language; ?></span>
             </td>
           </tr>
        
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_available_languages; ?></td>
             <td>
               <select  name="payzen_available_languages[]" multiple="multiple" size="9" style="height: auto;">
               <?php
               if (!empty($payzen_available_languages)) {
                 $payzen_available_languages = explode(';', $payzen_available_languages); 
               } else {
                 $payzen_available_languages = array(); 
               }
               foreach ($payzen_language_options as $code => $label) { 
                 $selected = (in_array($code, $payzen_available_languages)) ? ' selected="selected"' : '';
               ?>
                 <option  <?php echo $selected; ?> value="<?php echo $code; ?>"> <?php echo $label; ?></option>
               <?php } ?>
               </select><br /><span class="help"><?php echo $desc_payzen_available_languages; ?></span>
             </td>
           </tr>
	   
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_capture_delay; ?></td>
             <td><input type="text" name="payzen_capture_delay" value="<?php echo $payzen_capture_delay; ?>" /><br /><span class="help"><?php echo $desc_payzen_capture_delay; ?></span></td>
           </tr>
          
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_validation_mode; ?></td>
             <td>
               <select name="payzen_validation_mode">
                 <option <?php if ($payzen_validation_mode == '') echo 'selected="selected"'; ?>  value=''><?php echo $text_payzen_default ?></option>
                 <option <?php if ($payzen_validation_mode == '0') echo 'selected="selected"'; ?> value='0'><?php echo $text_payzen_automatic ?></option>
                 <option <?php if ($payzen_validation_mode == '1') echo 'selected="selected"'; ?> value='1'><?php echo $text_payzen_manual ?></option>
               </select><br /><span class="help"><?php echo $desc_payzen_validation_mode; ?></span>
             </td>
           </tr>
          
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_payment_cards; ?></td>
             <td>
               <select name="payzen_payment_cards[]" multiple="multiple" size="7" style="height: auto;">
               
               <?php
               if (!empty($payzen_payment_cards)) {
                 $payzen_payment_cards = explode(';', $payzen_payment_cards); 
               } else {
                 $payzen_payment_cards = array(); 
               }
               foreach ($payzen_payment_card_options as $code => $label) { 
                 $selected = (in_array($code, $payzen_payment_cards)) ? ' selected="selected"' : '';
               ?>
                 <option <?php echo $selected; ?> value="<?php echo $code; ?>"> <?php echo $label; ?></option>
               <?php } ?>
               </select><br /><span class="help"><?php echo $desc_payzen_payment_cards; ?></span>
             </td>
           </tr>
	     </table>
       </fieldset>
       
       <fieldset><legend><font style="font-weight: bold;"><?php echo $tab_payzen_selective_3ds?> </font> </legend>
	     <table class="form">         
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_3ds_min_amount; ?></td>
             <td><input type="text" name="payzen_3ds_min_amount" value="<?php echo $payzen_3ds_min_amount; ?>" /><br /><span class="help"><?php echo $desc_payzen_3ds_min_amount; ?></span></td>
           </tr>
	     </table>
       </fieldset>  
   
       <fieldset><legend><font style="font-weight: bold;"> <?php echo $tab_payzen_amount_restrictions ; ?></font> </legend>
	     <table class="form">
	       <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_minimum_amount; ?></td>
             <td><input type="text" name="payzen_minimum_amount" value="<?php echo $payzen_minimum_amount; ?>" /><br /><span class="help"><?php echo $desc_payzen_minimum_amount; ?></span></td>
           </tr>
           
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_maximum_amount; ?></td>
             <td><input type="text" name="payzen_maximum_amount" value="<?php echo $payzen_maximum_amount; ?>" /><br /><span class="help"><?php echo $desc_payzen_maximum_amount; ?></span></td>
           </tr>
	     </table>
       </fieldset>
    
       <fieldset><legend><font style="font-weight: bold;"> <?php echo $tab_payzen_return_to_shop ; ?></font> </legend>
	     <table class="form">
	   	   <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_redirect_enabled; ?></td>
             <td> 
               <input type="radio" <?php if ($payzen_redirect_enabled == '0') echo 'checked="checked"'; ?> value='0' name="payzen_redirect_enabled"><label><?php echo $text_payzen_no; ?></label>
               <input type="radio" <?php if ($payzen_redirect_enabled == '1') echo 'checked="checked"'; ?> value='1' name="payzen_redirect_enabled"><label><?php echo $text_payzen_yes; ?></label>
               <br /><span class="help"><?php echo $desc_payzen_redirect_enabled; ?></span>
             </td>
           </tr>
        
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_redirect_success_timeout; ?></td>
             <td ><input type="text" name="payzen_redirect_success_timeout" value="<?php echo $payzen_redirect_success_timeout; ?>" /><br /><span class="help"><?php echo $desc_payzen_redirect_success_timeout; ?></span></td>
           </tr>
        
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_redirect_success_message; ?></td>
             <td><input type="text" name="payzen_redirect_success_message" value="<?php echo $payzen_redirect_success_message; ?>" size="50"/><br /><span class="help"><?php echo $desc_payzen_redirect_success_message; ?></span></td>
           </tr>
         
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_redirect_error_timeout; ?></td>
             <td><input type="text" name="payzen_redirect_error_timeout" value="<?php echo $payzen_redirect_error_timeout; ?>" /><br /><span class="help"><?php echo $desc_payzen_redirect_error_timeout; ?></span></td>
           </tr>
         
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_redirect_error_message; ?></td>
             <td><input type="text" name="payzen_redirect_error_message" value="<?php echo $payzen_redirect_error_message; ?>" size="50"/><br /><span class="help"><?php echo $desc_payzen_redirect_error_message; ?></span></td>
           </tr>
         
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_return_mode; ?></td>
             <td>
               <select name="payzen_return_mode">
                 <option <?php if ($payzen_return_mode == 'GET') echo 'selected="selected"'; ?> value="GET">GET</option>
			     <option <?php if ($payzen_return_mode == 'POST') echo 'selected="selected"'; ?> value="POST">POST</option>
		       </select><br /><span class="help"><?php echo $desc_payzen_return_mode; ?></span>
             </td>
           </tr>
           
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_order_status_success; ?></td>
             <td>
               <select name="payzen_order_status_success">
               <?php 
               foreach ($order_statuses as $order_status) {
                 $selected = ($order_status['order_status_id'] == $payzen_order_status_success) ? ' selected="selected"' : '';
               ?>
               
                 <option <?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
               <?php } ?>
               </select>
             </td>
           </tr>
           
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_order_status_failed; ?></td>
             <td>
               <select name="payzen_order_status_failed">
               <?php 
               foreach ($order_statuses as $order_status) {
                 $selected = ($order_status['order_status_id'] == $payzen_order_status_failed) ? ' selected="selected"' : '';
               ?>
               
                 <option <?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
               <?php } ?>
               </select>
             </td>
           </tr>
           
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_order_status_canceled; ?></td>
             <td>
               <select name="payzen_order_status_canceled">
               <?php 
               foreach ($order_statuses as $order_status) {
                 $selected = ($order_status['order_status_id'] == $payzen_order_status_canceled) ? ' selected="selected"' : '';
               ?>
               
                 <option <?php echo $selected; ?> value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
               <?php } ?>
               </select>
             </td>
           </tr>
           
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_notify_failed; ?></td>
             <td> 
               <input type="radio" <?php if ($payzen_notify_failed == '0') echo 'checked="checked"'; ?> value='0' name="payzen_notify_failed"><label><?php echo $text_payzen_no; ?></label>
               <input type="radio" <?php if ($payzen_notify_failed == '1') echo 'checked="checked"'; ?> value='1' name="payzen_notify_failed"><label><?php echo $text_payzen_yes; ?></label>
             </td>
           </tr>
           
           <tr>
             <td style="text-align: right;"><?php echo $entry_payzen_notify_canceled; ?></td>
             <td> 
               <input type="radio" <?php if ($payzen_notify_canceled == '0') echo 'checked="checked"'; ?> value='0' name="payzen_notify_canceled"><label><?php echo $text_payzen_no; ?></label>
               <input type="radio" <?php if ($payzen_notify_canceled == '1') echo 'checked="checked"'; ?> value='1' name="payzen_notify_canceled"><label><?php echo $text_payzen_yes; ?></label>
             </td>
           </tr>
	    </table>
      </fieldset>
      
    </form>
  </div>
</div>
</div>
<?php echo $footer; ?>