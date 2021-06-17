<?php 

namespace AHT\Delivery\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

public function upgrade(
    ModuleDataSetupInterface $setup, 
    ModuleContextInterface $context
) {
    $setup->startSetup();

    if (version_compare($context->getVersion(), '1.0.2') < 0) {

            $setup->startSetup();
            $arr = [
                'delivery_date' => [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
                    'nullable' => false,
                    'comment' => 'Delivery Date'    
                ],

                'delivery_note' => [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'length' => '225',
                    'comment' => 'Note'
                ]
            ];

            foreach ($arr as $key => $value) {
                $setup->getConnection()->addColumn($setup->getTable('quote'),$key,$value);
                $setup->getConnection()->addColumn($setup->getTable('sales_order'),$key,$value);
            }
            $setup->endSetup();
        }
    }
} 