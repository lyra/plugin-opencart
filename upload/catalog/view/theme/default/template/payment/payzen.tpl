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

<form action="<?php echo str_replace('&', '&amp;', $payzen_form_action); ?>" method="POST" id="payzen_payment">
	<?php echo $payzen_form_fields; ?>

	<div class="buttons">
    	<div class="right">
    		<a onclick="$('#payzen_payment').submit();" class="button">
    			<span><?php echo $button_confirm; ?></span>
    		</a>
    	</div>
  	</div>
</form>