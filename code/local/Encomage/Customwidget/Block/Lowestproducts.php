<?php
class Encomage_Customwidget_Block_Lowestproducts extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface {

    const DEFAULT_PRODUCTS_PER_PAGE       = 5;
    const DEFAULT_PRODUCTS_PRICE_SORT = 'ASC';

    /**
     * @return mixed
     */
    public function getProductCollection(){
        $collection = Mage::getResourceModel('catalog/product_collection')
            ->addAttributeToSelect('name')
            ->addAttributeToSort('price', $this->getProductSort())
            ->setPageSize($this->getProductsPerPage());
        return $collection;
    }

    /**
     * @return mixed
     */
    public function getProductsPerPage() {
        if (!$this->hasData('products_per_page')) {
            $this->setData('products_per_page', self::DEFAULT_PRODUCTS_PER_PAGE);
        }
        return $this->getData('products_per_page');
    }

    /**
     * @return mixed
     */
    public function getProductSort() {
        if (!$this->hasData('sortprice')) {
            $this->setData('sortprice', self::DEFAULT_PRODUCTS_PRICE_SORT);
        }
        return $this->getData('sortprice');
    }

    /**
     * @return string
     */
    public function _toHtml() {
        return parent::_toHtml();
    }
}