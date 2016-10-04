<?php

class Themevast_Categoryproduct_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getConfig($cfg=null) 
	{
		$config = Mage::getStoreConfig('categoryproduct');
		if (isset($config['general'][$cfg]) ) return $config['general'][$cfg];
		return $config;
	}
}

