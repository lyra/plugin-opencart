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

class ModelPaymentPayzen extends Model {

  	public function getMethod($address, $total) {
		$this->load->language('payment/payzen');
		
		$status = FALSE;
		if ($this->config->get('payzen_status')) {
      		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payzen_geo_zone') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
			if (!$this->config->get('payzen_geo_zone') || $query->num_rows) {
				// if no geo zone configured or geo zone belongs to module zone
        		$status = TRUE;
      		}
		}
		
 		// test the customers credit
		if ($this->config->get('credit_status')) {
			$credit = $this->customer->getBalance();
					
			if ((float)$credit) {
				if ($credit >= $total) {
					$status = FALSE;
				}
			}
		}
		
		// load PayzenApi class
		require_once(DIR_SYSTEM . 'library/payzen.php');
		$payzenApi = new PayzenApi();
		
  		// test the compatibility of the currency
		$currencyObj = $payzenApi->findCurrencyByAlphaCode($this->session->data['currency']);
		if($currencyObj == null) {
			$status = FALSE;
		}
		
		// test the amount authorized by the payment
		if(($this->config->get('payzen_minimum_amount') != '' && $total < $this->config->get('payzen_minimum_amount'))
				|| ($this->config->get('payzen_maximum_amount') != '' && $total > $this->config->get('payzen_maximum_amount'))) {
            $status = FALSE;
        }
        
		$methodData = array();
		if ($status) {  
      		$methodData = array(
        		'code' => 'payzen',
        		'title' => $this->language->get('text_payzen_title'),
				'sort_order' => $this->config->get('payzen_sort_order')
      		);
    	}
   
    	return $methodData;
  	}
}
?>