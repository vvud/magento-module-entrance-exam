<?php
namespace AHT\AttributeCustomer\Model\Source;

class CompanyOption extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions() {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Please select'), 'value' => ''],
                ['label' => __('CBD Manufacturer'), 'value' => 0],
                ['label' => __('CBD Brand and Marketing company'), 'value' => 1],
                ['label' => __('CBD Extractor'), 'value' => 2],
                ['label' => __('Other'), 'value' => 3]
            ];
        }
        return $this->_options;
    }
}
