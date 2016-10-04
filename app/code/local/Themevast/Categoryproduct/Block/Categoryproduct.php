<?php
class Themevast_Categoryproduct_Block_Categoryproduct extends Mage_Catalog_Block_Product_Abstract
{

	protected $_config = array();

	protected function _construct()
	{
		if(!$this->_config) $this->_config = Mage::getStoreConfig('categoryproduct/general'); 
	}

	public function getConfig($cfg = null)
	{
		if (isset($this->_config[$cfg]) ) return $this->_config[$cfg];
		return ; // return $this->_config;
	}

	public function getColumnCount()
	{
		
		$slide = $this->getConfig('slide');
		$rows  = $this->getConfig('rows');
		if($slide && $rows >1) $column = $rows;
		else $column = $this->getConfig('qty');
		return $column;
	}

   public function getLoadedProductCollection()  
    {
        $catId = (int) $this->getData('cat_ids');
        $limit = (int) $this->getData('limit');
        $category = Mage::getModel('catalog/category')->load($catId);
        $collection = $category->getProductCollection()->addAttributeToSort('position');
        Mage::getModel('catalog/layer')->prepareProductCollection($collection);
        $collection->setPageSize($limit);
        $collection->load();
        return $collection;
        
    }
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

}

