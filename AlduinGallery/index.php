<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ALDUIN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-lightbox.min.css">

    <link href="css/styles.css" rel="stylesheet">
    <link href="css/styles2.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script>
        function onLogin() {
            console.log("onLogin");
            $.get( "controllers/register.php", function( data ) {
                $( ".loginForm" ).html( data );
                $("#welcome").hide();
            });
            // $(".loginForm").append('loginClicked');
        }

        function onRegister() {
            console.log('onRegister');
        }
        $( document ).ready(function() {
            console.log("document.ready()")
            $(".login").click(onLogin);
            $(".register").click(onRegister);
        });

    </script>
</head>
<body>
<div class="container-fluid">
    <header class="page-header">
        <div class="row">
            <div class="col-lg-8">
                <nav>
                    <ul class="nav nav-pills pull-left" role="tablist">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Albums</a></li>
                        <li><a class="login" href="#">Login</a></li>
                        <li><a class="register" href="#">Register</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <h1 class="h1 pull-right">Alduin</h1>
            </div>

        </div>
    </header>

    <main class="row">
        <div class="left col-lg-5">
            <div class="jumbotron col-lg-12">
                <div id="welcome">
                    <h1>Welcome!</h1>
                    <p>Not registered?</p>
                    <p>
                        <a class="btn btn-success btn-lg">Create an account</a>
                    </p>
                </div>
                <div class="loginForm">

                </div>
            </div>
            <div class="col-lg-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident,
                    sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident,
                    sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <div class="imgGallery col-lg-7">
            <div class="row">
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="images/2.jpg">
                    </a>
                </div>
            </div>


            <ul class="pagination pull-right">
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </main>
    <footer class="row modal-footer">All rights reserved</footer>
</div>
<script src="js/bootstrap.min.js" />
<script src="js/bootstrap-lightbox.min.js"/>

</body>
</html>