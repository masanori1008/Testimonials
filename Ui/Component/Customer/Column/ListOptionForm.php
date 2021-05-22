<?php
namespace AHT\Testimonials\Ui\Component\Customer\Column;

use AHT\Testimonials\Model\ResourceModel\Customer\Grid\CollectionFactory;

class ListOptionForm implements \Magento\Framework\Option\ArrayInterface            
{
    protected $_customerFactory;
    protected $_loadedData; 

    public function __construct(
        CollectionFactory $_customerFactory
    ){
        $this->_customerFactory = $_customerFactory->create();
    }
 
    public function toOptionArray()
    { 
        $customers = $this->_customerFactory->getItems();
        $optionArray = [];
        foreach($customers as $customer){
            $customer = $customer->getData();
            array_push($optionArray,[
                'value'  => $customer['id'],
                'label'  => $customer['customer_name'],
            ]);
        }
    return $optionArray;
    }
}