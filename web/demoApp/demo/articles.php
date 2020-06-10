<!DOCTYPE html>
<html lang="en">
<head>
	<title>Article</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-article">
                <?php
                    require_once("model/Article.php");
                    require_once("model/Entity.php");
                    require_once("config.php");
                    require_once("model/ConnectionManager.php");
                    require_once("log.php");
                    session_start();

                    $articles = Article::getByLoggedUserId();
                    $value = 'test';
                ?>

                <form class="article-form validate-form">
					<span class="login100-form-title">
						News Articles for Evaluation
					</span>

                    <div class="progress-table-wrap">
                        <div class="progress-table">
                            <div class="table-head">
                                <div class="code">ID</div>
                                <div class="date">Date</div>
                                <div class="title">Title</div>
                                <div class="evaluation">Evaluation</div>
                                <div class="update">Update</div>
                                <div class="delete">Delete</div>
                            </div>

                            <?php
                            for ($x = 0; $x < sizeof($articles); $x++) { ?>
                                <div class="table-row">
                                    <div class="code"><?php echo $articles[$x]->code ?></div>
                                    <div class="date"><?php echo $articles[$x]->dateCreation ?></div>
                                    <div class="title"><?php echo $articles[$x]->title ?></div>
                                    <div class="evaluation">
                                        <a href="./self_evaluation.php?articleId=<?php echo $articles[$x]->id; ?>" class="genric-btn link">Evaluate</a>
                                    </div>
                                    <div class="update">
                                        <a href="./self_evaluation.php?articleId=<?php echo $articles[$x]->id; ?>" class="genric-btn link">Update</a>
                                    </div>
                                    <div class="delete">
                                        <a href="./deleteArticle.php?articleId=<?php echo $articles[$x]->id; ?>" onclick="return confirm('Are you sure you want to delete this article?')" class="genric-btn link">Delete</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>


                    <div class="text-center p-t-80">
                        <a class="txt2" href="./article.php">
                            Create a new article
                            <i class="fa fa-edit m-l-5" aria-hidden="true"></i>
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="txt2" href="./logout.php">
                            Logout
                            <i class="fa fa-sign-out m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>