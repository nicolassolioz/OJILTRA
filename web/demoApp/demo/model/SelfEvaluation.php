<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/05
// Last update:	2020/05/05

class SelfEvaluation extends Entity
{
	public $id;
	public $validation;
	public $article_id;
	public $indicator_id;
	
	public function __construct()
	{
		parent::__construct("SELF_EVALUATION", "SELF_EVALUATION_");
	}
	
	public static function getAll()
	{
		$evaluations = array();
		
		$entity = new SelfEvaluation();
		$res = $entity->getRowsFromQuery("SELECT * FROM SELF_EVALUATION");
		
		if ($res != null)
		{
			while($row = $res->fetch_assoc())
			{
				$evaluation = new SelfEvaluation();
				$evaluation->id = $row['SELF_EVALUATION_ID'];
				$evaluation->validation = $row['SELF_EVALUATION_VALIDATION'];
				$evaluation->article_id = $row['ARTICLE_ID'];
				$evaluation->indicator_id = $row['INDICATOR_ID'];
				
				array_push($evaluations, $evaluation);
			}
			
			$res->close();
		}
		
		return $evaluations;
	}

	public function save()
	{
		$entity = new SelfEvaluation();
		//error_log("contect:".$content, 3, "log/my-errors.log");

		$this->executeQuery("INSERT INTO SELF_EVALUATION(SELF_EVALUATION_VALIDATION, ARTICLE_ID, INDICATOR_ID) VALUES('".$this->validation."', ".$this->article_id.", ".$this->indicator_id.")");	
		
		//save to evaluation score, to decide if we use weight to the indicator, otherwise only check the number of validations
	}
	
}

?>