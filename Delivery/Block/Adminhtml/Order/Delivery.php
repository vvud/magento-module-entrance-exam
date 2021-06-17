<?php
namespace AHT\Delivery\Block\Adminhtml\Order;

class Delivery extends \Magento\Framework\View\Element\Template
{
    const ADMIN_RESOURCE = 'Magento_Sales::actions_edit';
    /**
     * Address form template
     *
     * @var string
     */
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected $_checkoutSession;

    /**
     * @param \Magento\Sales\Model\Order
     */
    private $_order;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Model\Order $order,
        array $data = []
    ) {
        $this->_order = $order;
        $this->_checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }
    public function getOrder()
    {
        $id = $this->getOrderId();
        $order = $this->_order->load($id);
        return $order;
    }
    public function getOrderId()
    {
        return $this->getRequest()->getParam('order_id');
    }
    public function getEditLink($label = '')
    {
        if (empty($label)) {
            $label = __('Edit');
        }
        $url = $this->getUrl('sales/order/delivery', ['id' => $this->getOrderId()]);
        return '<a href="' . $this->escapeUrl($url) . '">' . $this->escapeHtml($label) . '</a>';
    }
}
