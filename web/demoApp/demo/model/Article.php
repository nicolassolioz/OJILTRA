<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/05
// Last update:	2020/05/05
require_once("log.php");


class Article extends Entity
{
	public $id;
	public $code;
	public $title;
	public $summary;
	public $content;
	public $dateCreation;
	public $url;
	public $nbClick;
	public $nbShare;
	public $user_id;
	public $article_status_id;
	
	public function __construct()
	{
		parent::__construct("ARTICLE", "ARTICLE_");
	}
	
	public static function getAll()
	{
		$articles = array();
		
		$entity = new Article();
		//$res = $entity->getAllRows();
		$res = $entity->getRowsFromQuery("SELECT * FROM ARTICLE order by ARTICLE_CREATEDATE DESC");
		
		if ($res != null)
		{
			while($row = $res->fetch_assoc())
			{
				$article = new Article();
				$article->id = $row['ARTICLE_ID'];
				$article->code = $row['ARTICLE_CODE'];
				$article->title = $row['ARTICLE_TITLE'];
				$article->summary = $row['ARTICLE_SUMMARY'];
				$article->content = $row['ARTICLE_CONTENT'];
				$article->dateCreation = $row['ARTICLE_DATECRATIOM'];
				$article->url = $row['ARTICLE_URL'];
				$article->nbClick = $row['ARTICLE_NBCLICK'];
				$article->nbShare = $row['ARTICLE_NBSHARE'];
				$article->user_id = $row['USER_ID'];
				$article->article_status_id = $row['ARTICLE_STATUS_ID'];
				
				array_push($articles, $article);
			}
			
			$res->close();
		}
		
		return $articles;
	}	

	public function save()
	{
		$entity = new Article();

		$title = $entity->real_escape_string($this->title);
		$summary = $entity->real_escape_string($this->summary);
		$content = $entity->real_escape_string($this->content);

		$query = "INSERT INTO ARTICLE(ARTICLE_CODE, ARTICLE_TITLE, ARTICLE_SUMMARY, ARTICLE_CONTENT, ARTICLE_DATECREATION, ARTICLE_URL, ARTICLE_NBCLICK, ARTICLE_NBSHARE, USER_ID, ARTICLE_STATUS_ID) VALUES('".$this->code."', '".$title."', '".$summary."', '".$content."', '".date("Y-m-d H:i:s", $this->dateCreation)."', '".$this->url."', 0, 0, ".$this->user_id.", ".$this->article_status_id.")";
		//error_log("contect:".$content, 3, "log/my-errors.log");
        //wh_log("Article created : " . date("hh-mm"));
        wh_log($query);
		$this->executeQuery($query);
	}

	public static function getArticlesByStatus($article_status_id)
	{
		$articles = array();
		$entity = new Article();
		$res = $entity->getRowsFromQuery("SELECT * FROM ARTICLE WHERE ARTICLE_STATUS_ID = '" . $article_status_id ."'");
		
		if ($res != null)
		{
			while($row = $res->fetch_assoc())
			{
				$article = new Article();
				$article->id = $row['ARTICLE_ID'];
				$article->code = $row['ARTICLE_CODE'];
				$article->title = $row['ARTICLE_TITLE'];
				$article->summary = $row['ARTICLE_SUMMARY'];
				$article->content = $row['ARTICLE_CONTENT'];
				$article->dateCreation = $row['ARTICLE_DATECRATIOM'];
				$article->url = $row['ARTICLE_URL'];
				$article->nbClick = $row['ARTICLE_NBCLICK'];
				$article->nbShare = $row['ARTICLE_NBSHARE'];
				$article->user_id = $row['USER_ID'];
				$article->article_status_id = $row['ARTICLE_STATUS_ID'];
				array_push($articles, $article);
			}	
		$res->close();
		}
	return $articles ;
	}

	// for the information of traceability
	public static function getArticleById($id)
	{
	
		$entity = new Article();
		$res = $entity->getRowsFromQuery("SELECT * FROM ARTICLE WHERE ARTICLE_ID = '" . $id ."'");
		
		if ($res != null)
		{
			$row = $res->fetch_assoc();
			
			$article = new Article();
			$article->id = $row['ARTICLE_ID'];
			$article->code = $row['ARTICLE_CODE'];
			$article->title = $row['ARTICLE_TITLE'];
			$article->summary = $row['ARTICLE_SUMMARY'];
			$article->content = $row['ARTICLE_CONTENT'];
			$article->dateCreation = $row['ARTICLE_DATECRATIOM'];
			$article->url = $row['ARTICLE_URL'];
			$article->nbClick = $row['ARTICLE_NBCLICK'];
			$article->nbShare = $row['ARTICLE_NBSHARE'];
			$article->user_id = $row['USER_ID'];
			$article->article_status_id = $row['ARTICLE_STATUS_ID'];
			
		$res->close();
		}
		
		return $article ;
	}

	public function changeStatus($idArticle, $idStatus)
	{

		$this->executeQuery("UPDATE ARTICLE SET ARTICLE_STATUS_ID = " . $idStatus . " WHERE ARTICLE_ID = " . $idArticle);		
	}
}

?>