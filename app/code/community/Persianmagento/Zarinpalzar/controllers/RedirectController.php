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
 
class Persianmagento_Zarinpalzar_RedirectController extends Mage_Core_Controller_Front_Action 
{

	protected $_redirectBlockType = 'zarinpalzar/redirect';
	protected $_successBlockType = 'zarinpalzar/success';
	protected $_sendNewOrderEmail = true;
	protected $_order = NULL;
	protected $_paymentInst = NULL;
	protected $_transactionID = NULL;
	protected function _expireAjax() {
		if (! $this->getCheckout ()->getQuote ()->hasItems ()) {
			$this->getResponse ()->setHeader ( 'HTTP/1.1', '403 Session Expired' );
			exit ();
		}
	}
	
	public function getCheckout() {
		return Mage::getSingleton ( 'checkout/session' );
	}
	
	public function redirectAction() {
		$session = $this->getCheckout ();
		$session->setzarinpalzarQuoteId ( $session->getQuoteId () );
		$session->setzarinpalzarRealOrderId ( $session->getLastRealOrderId () );
		error_log('***********' . $session->getLastRealOrderId ());
		$order = Mage::getModel ( 'sales/order' );
		$order->loadByIncrementId ( $session->getLastRealOrderId () );
		$this->_order = Mage::getModel ( 'sales/order' )->loadByIncrementId ( $session->getLastRealOrderId () );
		$this->_paymentInst = $this->_order->getPayment ()->getMethodInstance ();
		$this->getResponse ()->setBody ( $this->getLayout ()->createBlock ( $this->_redirectBlockType )->setOrder ( $order )->toHtml () );
		$session->unsQuoteId ();
	}
	
	public function successAction() {
		$session = $this->getCheckout ();
		$session->unszarinpalzarRealOrderId ();
		$session->setQuoteId ( $session->getzarinpalzarQuoteId ( true ) );		
		$session->getQuote ()->setIsActive ( false )->save ();
		$order = Mage::getModel ( 'sales/order' );		
		$order->load ( $this->getCheckout ()->getLastOrderId () );
		$this->getResponse ()->setBody ( $this->getLayout ()->createBlock ( $this->_successBlockType )->setOrder ( $this->_order )->toHtml () );
	}
	
}