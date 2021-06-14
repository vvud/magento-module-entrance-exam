<?php
namespace AHT\Portfolio\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(\AHT\Portfolio\Model\PortfolioFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $data = [
            'title' => "It is Test", 
            'images' => "test.jpg",
            'description'      => "t is Test's description"
        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}
?>