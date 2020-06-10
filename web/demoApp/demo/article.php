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
                session_start();
                error_reporting(0);

                require_once("config.php");
                require_once("model/ConnectionManager.php");
                require_once("model/Entity.php");
                require_once("model/Article.php");
                require_once("log.php");

                if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                    $url = "https://";
                else
                    $url = "http://";
                // Append the host(domain name, ip) to the URL.
                $url.= $_SERVER['HTTP_HOST'];

                // Append the requested resource location to the URL
                $url.= $_SERVER['REQUEST_URI'];

                // Use parse_url() function to parse the URL
                // and return an associative array which
                // contains its various components
                $url_components = parse_url($url);

                // Use parse_str() function to parse the
                // string passed via URL
                parse_str($url_components['query'], $params);
                $articleId = $params['articleId'];
                wh_log("UPDATE : " . $articleId);

                if(!isset($params['articleId'])) {
                ?>

				<form class="article-form validate-form" method="POST" action="createArticle.php">
                        <span class="login100-form-title">
						Create a News Article
					    </span>

                        <div class="mt-10">
                            <input type="text" name="code" placeholder="Article Code"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Article Code'" required
                                   class="single-input">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="url" placeholder="URL"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'URL'" required
                                   class="single-input">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="title" placeholder="Title"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required
                                   class="single-input">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="summary" placeholder="Summary"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Summary'" required
                                   class="single-input">
                        </div>

                        <div class="mt-10">
						<textarea name="content" class="single-textarea" placeholder="Content"
                                  onfocus="this.placeholder = ''"
                                  onblur="this.placeholder = 'Content'" required></textarea>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Submit
                            </button>
                        </div>

                        <?php
                        }
                        else {
                            $_SESSION["articleId"] = $articleId;
                            $article = Article::getArticleById($articleId);
                        ?>
                    <form class="article-form validate-form" method="POST" action="updateArticle.php">
                        <span class="login100-form-title">
						Update a News Article
					    </span>

                        <div class="mt-10">
                            <input type="text" name="code" required
                                   class="single-input" value="<?php echo $article->code ?>">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="url" required
                                   class="single-input" value="<?php echo $article->url ?>">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="title" required
                                   class="single-input" value="<?php echo $article->title ?>">
                        </div>

                        <div class="mt-10">
                            <input type="text" name="summary" required
                                   class="single-input" value="<?php echo $article->summary ?>">
                        </div>

                        <div class="mt-10">
						<textarea name="content" class="single-textarea" required><?php echo $article->content ?></textarea>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Update
                            </button>
                        </div>

                        <?php
                        }
                        ?>

					<div class="text-center p-t-80">
						<a class="txt2" href="articles.php">
							Evaluate your articles
							<i class="fa fa-check-square-o m-l-5" aria-hidden="true"></i>
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="txt2" href="logout.php">
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