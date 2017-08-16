<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * @category   Persian Magento
 * @package    Persianmagento_Zarinpalzar
 * @copyright  Copyright (c) 1396 Persian Magento (http://www.persian-magento.ir)
 */

class Persianmagento_Zarinpalzar_Block_Redirect extends Mage_Core_Block_Abstract 
{

	protected function _toHtml() {
		$module = 'persianmagento/zarinpalzar';
		$payment = $this->getOrder ()->getPayment ()->getMethodInstance ();
		$res = $payment->getUrl () ;
		if ($res['Status'] == "100") {
             error_log('Authority' . $res['Authority']);		
			 $html = '<html><body> <script type="text/javascript"> window.location = "http://www.zarinpal.com/pg/StartPay/' . $res['Authority'] . '/ZarinGate" </script> </body></html>';
		}else{
			$html = '<html><body> <script type="text/javascript"> window.location = "' . Mage::getUrl ( 'checkout/onepage/failure', array ('_secure' => true) ) . '" </script> </body></html>';
		}
		return $html;
	}
}