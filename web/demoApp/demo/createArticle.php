<?php
session_start();
error_reporting(0);

require_once("config.php");
require_once("model/ConnectionManager.php");
require_once("model/Entity.php");
require_once("model/Article.php");
require_once("log.php");

if (isset($_POST['code']) && isset($_POST['url']) && isset($_POST['title']) && isset($_POST['summary']) && isset($_POST['content'])){


    $code = $_POST['code'];
    $url = $_POST['url'];
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];

    wh_log("MY TITLE : " . $title);
    $article = new Article();
    $article->code = $code;
    $article->url = $url;
    $article->title = $title;
    $article->summary = $summary;
    $article->content = $content;
    $article->dateCreation = date("Y-m-d H:i:s");
    $article->user_id = $_SESSION["userid"];
    $article->article_status_id = 1;

    $article->save();

    header("Location: ./plagiarismsearch/init-api.php");
}



?>