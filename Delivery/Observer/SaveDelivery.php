<?php
namespace AHT\Delivery\Observer;
use Magento\Framework\Event\ObserverInterface;
 use Magento\Framework\App\RequestInterface;
 use Magento\Sales\Model\OrderFactory;

class SaveDelivery implements \Magento\Framework\Event\ObserverInterface
{
    protected $_checkoutSession;
    protected $_orderFactory;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\OrderFactory $orderFactory) {

        $this->_checkoutSession = $checkoutSession;
        $this->_orderFactory= $orderFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
        // Get data from session
        $order = $observer->getEvent()->getOrder();
        $date = $this->_checkoutSession->getData('date');
        $note = $this->_checkoutSession->getData('note');
        
        // var_dump($note);
        // die;

        // Save data to db
        $order->setData('delivery_date', $date);
        $order->setData('delivery_note', $note);
        $order->save();
    }
}
// source: https://magento.stackexchange.com/questions/247003/magento-2-2-5-checkout-page-custom-field-value-not-getting-in-observer
// https://magento.stackexchange.com/questions/154838/magento-2-how-to-get-order-data-in-observer-on-success-page
