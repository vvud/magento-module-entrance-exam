<?php
namespace AHT\Delivery\Observer;

class SaveDelivery implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @param \Magento\Quote\Model\QuoteFactory
     */
    private $_quoteFactory;

    public function __construct(
        \Magento\Quote\Model\QuoteFactory $quoteFactory
    )
    {
        $this->_quoteFactory = $quoteFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quoteId = $order->getQuoteId();
        $quote = $this->_quoteFactory->create()->load($quoteId);
        $date = $quote->getDeliveryDate();
        $order->setData('delivery_date',  $quote->getDeliveryDate());
        $order->setData('delivery_note', $quote->getDeliveryNote());
        $order->save();
    }
}