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

<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
	<div class="breadcrumb">
    	<?php 
    	foreach ($breadcrumbs as $breadcrumb) {
    		if(key_exists('href', $breadcrumb)) {
    			$text = '<a href="' . $breadcrumb['href'] . '">' . $breadcrumb['text'] . '</a>';
    		} else {
    			$text = '<span style="color: #38B0E3;">' . $breadcrumb['text'] . '</span>';
    		}
    		echo $breadcrumb['separator']; ?><?php echo $text;
    	} 
    	?>
  	</div>
  	<h1><?php echo $heading_title; ?></h1>
  
	<?php if (isset($text_payzen_pass_to_prod)) { ?>
	<div class="success"><?php echo $text_payzen_pass_to_prod; ?></div>
	<?php } ?>

	<?php if (isset($text_payzen_url_check)) { ?>
    <div class="warning"><?php echo $text_payzen_url_check; ?></div>
	<?php }  ?>
  
  	<?php echo $text_message; ?>
  	<?php foreach ($payzen_data as $entry) { ?>
  	<p><b><?php echo $entry['key']; ?> : </b><?php echo $entry['value']; ?></p>
  	<?php } ?>
  	
  	<div class="buttons">
   		<div class="right"><a href="<?php echo $continue; ?>" class="button"><span><?php echo $button_continue; ?></span></a></div>
  	</div>
  	
  	<?php echo $content_bottom; ?></div>
<?php echo $footer; ?>