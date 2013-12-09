<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Lowkey</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/homecooked.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
        <style>
            body {
                padding-top: 60px;
            }
        </style>

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../samGholizadeh/"><b>Lowkey</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li<?php if($action == "blogg") echo " class='active'"; ?>><a href="?a=blogg"><b>Blogg</b></a></li>
                    <li<?php if($action == "cv") echo " class='active'"; ?>><a href="?a=downloadcv"><b>CV</b></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Utbildningar</b> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><b>Nackademin</b></li>
                            <li><a href="?a=utb&utb=java">Javautvecklare</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header"><b>Jensen Education</b></li>
                            <li><a href="?a=utb&utb=webbutv">Webbutvecklare</a></li>
                            <li><a href="?a=utb&utb=webbprog">Webbprogrammerare</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header"><b>Södertörns Högskola</b></li>
                            <li><a href="#">Nationalekonomi A</a></li>
                            <li><a href="#">Företagsekonomi A</a></li>
                            <li><a href="#">HÖKEN</a></li>
                        </ul>
                    </li>
                </ul>
                <ul id="panel" class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION["user_id"])){?>
                        <li class="dropdown">
                           <a href='#' class='dropdown-toggle' data-toggle='dropdown'><b><?php echo $_SESSION["username"]; ?></b> <b class='caret'></b></a>
                           <ul class='dropdown-menu'>
                                <li><a href='?a=admin'>Dashboard</a></li>
                                <li><a href='?a=logout'>Logout</a></li>
                            </ul>
                        </li>
                    <?php } else
                        echo "<li><a data-toggle='modal' href='#login'><b>Login</b></a></li>";
                     ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container" id="vardumpTest">
        <div class="well well-sm" style="margin-bottom: 8px;"><b>This site is still under development. Its a CMS I'm developing for personal use. Updates are being rolled out on a daily basis.</b></div>