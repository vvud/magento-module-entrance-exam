<?php

namespace AHT\Knockoutjs\Controller\Index;

class Search extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param Magento\Framework\App\ResponseInterface
     */
    private $response;

    /**
     * @param Magento\Catalog\Model\ProductFactory
     */
    private $productCollectionFactory;

    /**
     * @param \Magento\Framework\Serialize\Serializer\Json
     */
    private $json;

    /**
     * @param Magento\Framework\Controller\Result\JsonFactory
     */
    private $jsonFactory;

    /**
     * @param Magento\Catalog\Helper\Image
     */
    private $imageHelper;

    /**
     * @param \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param \Magento\Eav\Model\Config
     */
    private $eavConfig;

    /**
     * @param Magento\Framework\Pricing\PriceCurrencyInterface
     */
    private $priceCurrency;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\App\ResponseInterface $response,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Framework\Serialize\Serializer\Json $json,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
    ) {

        $this->_pageFactory = $pageFactory;
        $this->response = $response;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->json = $json;
        $this->jsonFactory = $jsonFactory;
        $this->imageHelper = $imageHelper;
        $this->storeManager = $storeManager;
        $this->eavConfig = $eavConfig;
        $this->priceCurrency = $priceCurrency;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        return $resultJson->setData($this->getCollection());
    }

    public function getCollection()
    {
        $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $data = $this->getRequest()->getContent();
        $response = $this->json->unserialize($data);

        $search = $response['search'];
        if (!$search) {
            return false;
        }
        $data = $this->productCollectionFactory->create()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('name', [
                'like' => '%' . $search . '%'
            ])
            ->setPageSize(3)
            ->setCurPage(1);

        $list = [];
        foreach ($data as &$value) {
            $value['src'] = $this->imageHelper
                ->init($value, 'product_base_image')
                ->getUrl();
            }

        return [
            'data' => array_values($data->toArray()),
            'symbol' => $this->priceCurrency->getCurrencySymbol()
        ];
    }
}