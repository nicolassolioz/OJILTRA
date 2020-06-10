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

    $article = Article::getArticleById($_SESSION["articleId"]);

    $article->code = $code;
    $article->url = $url;
    $article->title = $title;
    $article->summary = $summary;
    $article->content = $content;
    $article->article_status_id = 1;

    $article->update();

    header("Location: articles.php");
}


?>