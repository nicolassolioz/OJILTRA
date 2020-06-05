<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/12
// Last update:	2020/05/12

class Company extends Entity
{
	public $id;
	public $name;
	public $code;
	public $address;
	public $tel;
	
	public function __construct()
	{
		parent::__construct("COMPANY", "COMPANY");
	}
	
	public static function getAll()
	{
		$companies = array();
		
		$entity = new companies();
		$res = $entity->getAllRows();
		
		if ($res != null)
		{
			while($row = $res->fetch_assoc())
			{
				$company = new Company();
				$company->id = $row['COMPANY_ID'];
				$company->name = $row['COMPANY_NAME'];
				$company->code = $row['COMPANY_CODE'];
				$company->address = $row['COMPANY_ADDRESS'];
				$company->tel = $row['COMPANY_TEL'];
				
				array_push($companies, $company);
			}
			
			$res->close();
		}
		
		return $companies;
	}
	
	// get code by id
	public static function getCompanyCodebyId($companyId)
	{
	
		$companyCode = '';
		$entity = new Company();
		$res = $entity->getRowsFromQuery("SELECT COMPANY_CODE FROM COMPANY WHERE COMPANY_ID = '" . $companyId ."'");
		
		if ($res != null)
		{
			$row = $res->fetch_assoc();
			$companyCode = $row['COMPANY_CODE'];
			
			$res->close();
		}
		console.log("companyCode: ".$companyCode);

		return $companyCode ;
	}

}

?>