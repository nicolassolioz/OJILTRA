<!DOCTYPE html>
<html lang="en">
<head>
    <title>Articles Evaluation</title>
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
        <div class="wrap-article-evaluation">


            <form class="article-form validate-form">
					<span class="login100-form-title">
						Evaluate your News Article
					</span>

                <?php
                require_once("model/Article.php");
                require_once("model/Entity.php");
                require_once("config.php");
                require_once("model/ConnectionManager.php");
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
                $article = Article::getArticleById($articleId);


                ?>

                <p><?php echo $article->title; ?></p>

                <div class="single-element-widget mt-30">
                    <h3 class="mb-20">1. Originalité</h3>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>01. Sample Checkbox</checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox">
                            <label for="primary-checkbox"></label>
                        </div>
                    </div>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>02. Primary Color Checkboxdafasdffas dfa sdf asdf sdf s dfds f    02. Primary Color Checkbo xdafasdffas dfa sdf asdf sdf s dfds f </checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox2">
                            <label for="primary-checkbox2"></label>
                        </div>
                    </div>

                </div>
                <div class="single-element-widget mt-30">
                    <h3 class="mb-20">1. Originalité</h3>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>01. Sample Checkbox</checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox4">
                            <label for="primary-checkbox"></label>
                        </div>
                    </div>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>02. Primary Color Checkboxdafasdffas dfa sdf asdf sdf s dfds f    02. Primary Color Checkbo xdafasdffas dfa sdf asdf sdf s dfds f </checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox5">
                            <label for="primary-checkbox2"></label>
                        </div>
                    </div>

                </div>
                <div class="single-element-widget mt-30">
                    <h3 class="mb-20">1. Originalité</h3>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>01. Sample Checkbox</checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox6">
                            <label for="primary-checkbox"></label>
                        </div>
                    </div>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>02. Primary Color Checkboxdafasdffas dfa sdf asdf sdf s dfds f    02. Primary Color Checkbo xdafasdffas dfa sdf asdf sdf s dfds f </checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox7">
                            <label for="primary-checkbox2"></label>
                        </div>
                    </div>

                </div>
                <div class="single-element-widget mt-30">
                    <h3 class="mb-20">1. Originalité</h3>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>01. Sample Checkbox</checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox8">
                            <label for="primary-checkbox"></label>
                        </div>
                    </div>
                    <div class="switch-wrap d-flex justify-content-between">
                        <checklabel>02. Primary Color Checkboxdafasdffas dfa sdf asdf sdf s dfds f    02. Primary Color Checkbo xdafasdffas dfa sdf asdf sdf s dfds f </checklabel>
                        <div class="primary-checkbox">
                            <input type="checkbox" id="primary-checkbox9">
                            <label for="primary-checkbox2"></label>
                        </div>
                    </div>

                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Submit
                    </button>
                </div>

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