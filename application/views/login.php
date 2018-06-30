<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->



    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Cable billing Software">
        <meta name="author" content="Technopits">

        <!-- Bootstrap Stylesheet -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen">

        <!--  Fluid Grid System -->
        <link rel="stylesheet" href="assets/css/fluid.html" media="screen">

        <!-- Login Stylesheet -->
        <link rel="stylesheet" href="assets/css/login.min.css" media="screen">
        <title>DCNO | Log In</title>

    </head>
    <style>
        .login_box{
            padding-left: 40px;
            background-repeat: no-repeat;
            background-position: 12px center;
            min-height: 48px;
            height: 38px;
            width: 100%;
            border-bottom-width: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }
    </style>
    <body>

        <div id="da-home-wrap">
            <div id="da-home-wrap-inner">
                <div id="da-home-inner">
                    <div id="da-home-box">
                        <div id="da-home-box-header">
                            <span class="da-home-box-title">Login to your DCN Account</span>
                        </div>
                        <form class="da-form da-home-form" method="POST" action="">
                            <div class="da-form-row">
                                <div class=" da-home-form-big">
                                    <select name="type" class = "login_box"
                                            onchange="if (this.selectedIndex === 2) {
                                                        document.getElementById('da-login-username').setAttribute('placeholder', 'VC Number');
                                                        document.getElementById('da-login-password').setAttribute('placeholder', 'Mobile Number');
                                                        document.getElementById('da-login-password').setAttribute('style', 'background-image: url(assets/images/icons/led/src/user.png)');
                                                        document.getElementById('da-login-username').setAttribute('style', 'background-image: url(assets/images/icons/led/src/key.png)');
                                                    } else {
                                                        document.getElementById('da-login-username').setAttribute('placeholder', 'Username');
                                                        document.getElementById('da-login-password').setAttribute('placeholder', 'Password');
                                                        document.getElementById('da-login-password').setAttribute('style', 'background-image: url(assets/images/icons/led/src/key.png)');
                                                        document.getElementById('da-login-username').setAttribute('style', 'background-image: url(assets/images/icons/led/src/user.png)');
                                                    }
                                                    ;"
                                            >
                                        <option value="0">Operator</option>
                                        <option value="1">Sub-Operator</option>
                                        <!--                                        <option value="2">Customer</option>-->
                                    </select>
                                </div>
                                <div class=" da-home-form-big">
                                    <input type="text" name="username" id="da-login-username" placeholder="Username">
                                </div>
                                <div class=" da-home-form-big">
                                    <input type="password" name="password" id="da-login-password" placeholder="Password">
                                </div>
                            </div>
                            <div class="da-form-row">
                                <ul class="da-form-list inline">
                                    <li><input type="checkbox" id="remember"> <label for="remember">Remember me</label></li>
                                    <li class="pull-right"><a href="#">Forget password</a></li>
                                </ul>
                            </div>
                            <div class="da-home-form-btn-big">
                                <input type="submit" value="Login" id="da-login-submit" class="btn btn-danger btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- JS Libs -->
        <script src="assets/js/libs/jquery-1.8.3.min.js"></script>
        <script src="assets/js/libs/jquery.placeholder.min.js"></script>
        <script src="plugins/validate/jquery.validate.min.js"></script>

        <!-- JS Login -->
        <script src="assets/js/core/dandelion.login.js"></script>

    </body>


</html>