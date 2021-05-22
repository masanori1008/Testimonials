<?php

namespace AHT\Testimonials\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(\AHT\Testimonials\Model\TestimonialsFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $data = [
            'name' => "Test",
            'email' => "abc@gmail.com",
            'message'      => "Test's description"
        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}
?>