<?php
namespace AHT\Portfolio\Model\ResourceModel;

class Portfolio extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct() 
    {
        $this->_init('aht_portfolio', 'id');
    }
}