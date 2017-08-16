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
 
class Persianmagento_Zarinpalzar_Model_System_Config_Source_Pgateway
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
    		array('value' => 'http://www.zarinpal.com/pg/StartPay/', 'label' => 'زرین گیت')
    	);
    }


}