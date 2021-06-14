<?php
namespace AHT\Portfolio\Model\ResourceModel\Portfolio\Grid;

use AHT\Portfolio\Model\Portfolio;
use Magento\Framework\Api;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Psr\Log\LoggerInterface as Logger;

// use Magento\Framework\Api\Search\SearchResultInterface;

class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
   /**
     * Value of seconds in one minute
     */
    const SECONDS_IN_MINUTE = 60;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $date;

    /**
     * @var Visitor
     */
    protected $visitorModel;

    /**
     * @param EntityFactory $entityFactory
     * @param Logger $logger
     * @param FetchStrategy $fetchStrategy
     * @param EventManager $eventManager
     * @param string $mainTable
     * @param string $resourceModel
     * @param Visitor $visitorModel
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     */
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable,
        $resourceModel,
        Portfolio $portfolioModel,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        $this->date = $date;
        $this->portfolioModel = $portfolioModel;
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }

    protected function _initSelect()
    {
        $this->getSelect()
            ->from(['main_table' => 'aht_portfolio'])
            ->joinLeft('aht_categories',
            'main_table.categoryid = aht_categories.id',
            [
                'aht_categories.name'
            ]);
        $this->addFilterToMap('id', 'main_table.id');
        return $this;
    }
}
