<?php

namespace AHT\Testimonials\Model\ResourceModel\Testimonials;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'aht_testimonials';
    protected $_eventObject = 'testimonials_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Testimonials\Model\Testimonials', 'AHT\Testimonials\Model\ResourceModel\Testimonials');
    }
}
