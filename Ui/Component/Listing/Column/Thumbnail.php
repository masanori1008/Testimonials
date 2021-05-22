<?php
namespace AHT\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class Thumbnail extends \Magento\Ui\Component\Listing\Columns\Column
{
    const NAME = 'Thumbnail';

    const ALT_FIELD = 'path';

    protected $_storeManager;
    protected $_fileSystem;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,        
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Filesystem $filesystem
    ) {        
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $storeManager;
        $this->_fileSystem = $filesystem;
        $this->urlBuilder = $urlBuilder;
    }

    /**
    * Prepare Data Source
    *
    * @param array $dataSource
    * @return array
    */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $testimonials = new \Magento\Framework\DataObject($item);
                $item[$fieldName . '_src'] = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)."testimonials/tmp/index/".$testimonials['images'];
                $item[$fieldName . '_orig_src'] = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)."testimonials/tmp/index/".$testimonials['images'];
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl("testimonials/tmp/index/edit",
                    ['id' => $testimonials['id']]
                );
                $item[$fieldName . '_alt'] = $testimonials['name'];
            }
        }
        return $dataSource;
    }

    /**
    * @param array $row
    *
    * @return null|string
    */
    protected function getAlt($row)
    {
        $altField = self::ALT_FIELD;
        return isset($row[$altField]) ? $row[$altField] : null;
    }
}