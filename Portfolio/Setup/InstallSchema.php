<?php
/**
* Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/

namespace AHT\Portfolio\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
          * Create table 'greeting_message'
          */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('aht_portfolio'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                    'title'
            )
            ->addColumn(
                'images',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Images'
            )
            ->addColumn(
                'categoryid',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                255,
                ['nullable' => false],
                    'categoryid'
            )
            ->addColumn(
                'description',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                    'description'
            );
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('aht_categories'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                    'name'
            );
        $setup->getConnection()->createTable($table);
      }
}
