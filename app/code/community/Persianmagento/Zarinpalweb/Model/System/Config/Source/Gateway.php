<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * @category   Persian Magento
 * @package    Persianmagento_Zarinpalweb
 * @copyright  Copyright (c) 1396 Persian Magento (http://www.persian-magento.ir)
 */
 
class Persianmagento_Zarinpalweb_Model_System_Config_Source_Gateway
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
    	return array(
    		array('value' => '0', 'label' => ' -- سرور خود را انتخاب کنید -- '),
    		array('value' => 'https://www.zarinpal.com/pg/services/WebGate/wsdl', 'label' => 'زرین پال')
    	);
    }
}