<?php

namespace AHT\Testimonials\Model\ResourceModel\Customer;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'aht_customer';
    protected $_eventObject = 'customer_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Testimonials\Model\Customer', 'AHT\Testimonials\Model\ResourceModel\Customer');
    }
}