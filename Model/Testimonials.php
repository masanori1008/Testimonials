<?php
namespace AHT\Testimonials\Model;

use AHT\Testimonials\Api\Data\TestimonialsInterface;

class Testimonials extends \Magento\Framework\Model\AbstractModel implements TestimonialsInterface {
    public function __construct(
   	 \Magento\Framework\Model\Context $context,
   	 \Magento\Framework\Registry $registry,
   	 \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
   	 null,
   	 \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
   	 null,
   	 array $data = []
    ) {
   	 parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    
    public function _construct() {
		$this->_init('AHT\Testimonials\Model\ResourceModel\Testimonials');
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        $this->setData('id', $id);
    }
     
    public function getTitle()
    {
        return $this->getData('title');
    }
    public function setTitle($title)
    {
        $this->setData('title', $title);
    } 

    public function getImages()
    {
        return $this->getData('images');
    }
    public function setImages($images)
    {
        $this->setData('images', $images);
    } 

    public function getCustomerid()
    {
        return $this->getData('customerid');
    }
    public function setCustomerid($customerid)
    {
        $this->setData('customerid', $customerid);
    }

    public function getDesignation()
    {
        return $this->getData('designation');
    }
    public function setDesignation($designation)
    {
        $this->setData('designation', $designation);
    } 

    public function getMessage()
    {
        return $this->getData('message');
    }
    public function setMessage($message)
    {
        $this->setData('message', $message);
    } 

    public function getContact()
    {
        return $this->getData('contact');
    }
    public function setContact($contact)
    {
        $this->setData('contact', $contact);
    } 
}
