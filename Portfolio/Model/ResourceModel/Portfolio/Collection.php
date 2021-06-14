<?php
namespace AHT\Portfolio\Model\ResourceModel\Portfolio;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'aht_portfolio_collection';
	protected $_eventObject = 'Portfolio_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Portfolio\Model\Portfolio', 'AHT\Portfolio\Model\ResourceModel\Portfolio');
	}

}