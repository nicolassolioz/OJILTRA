<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/05
// Last update:	2020/05/05

class IndicatorCategory extends Entity
{
	public $id;
	public $name;
	public $weight;
	
	public function __construct()
	{
		parent::__construct("IndicatorCategory", "INDICATOR_CAT_");
	}
	
	public static function getAll()
	{
		$IndicatorCategories = array();
		
		$entity = new IndicatorCategories();
		$res = $entity->getAllRows();
		
		if ($res != null)
		{
			while($row = $res->fetch_assoc())
			{
				$indicatorCategory = new IndicatorCategory();
				$indicatorCategory->id = $row['INDICATOR_CAT_ID'];
				$indicatorCategory->name = $row['INDICATOR_CAT_NAME'];
				$indicatorCategory->weight = $row['INDICATOR_CAT_WEIGHT'];
				
				array_push($IndicatorCategories, $indicatorCategory);
			}
			
			$res->close();
		}
		
		return $IndicatorCategories;
	}
	
	public static function getIndicatorCategoryByID($cat_id)
	{
		$indicatorcat = null;
		
		$entity = new IndicatorCategory();
		$res = $entity->getRowById($cat_id);
		
		if ($res != null)
		{
			$row = $res->fetch_assoc();
			
			$indicatorcat = new IndicatorCategory();
			$indicatorcat->id = $row['INDICATOR_CAT_ID'];
			$indicatorcat->name = $row['INDICATOR_CAT_NAME'];
			$indicatorcat->weight = $row['INDICATOR_CAT_WEIGHT'];
			$res->close();
		}
		
		return $indicatorcat;
	}

}

?>