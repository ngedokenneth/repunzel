<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if (isset($_GET['package']))
    $_SESSION['package'] = htmlspecialchars($_GET['package']);
$package = htmlspecialchars($_SESSION['package']);

if (!isset($package))
    header("location: index.php");

//make all imports here
include_once 'settings.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $sitename; ?> | Signup </title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                });
            });</script>
        <link rel="icon" type="image/png" href="/images/favicon.ico">
        <script type="text/javascript" src="/js/force.js"></script>
        <!--<script type="text/javascript" src="/js/processSignup.js"></script>-->
        <!---- start-smoth-scrolling---->
        <!-- Custom Theme files -->
        <link href="css/theme-style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </script>
    <!----font-Awesome----->
    <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
    <!----font-Awesome----->
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
    <!----//webfonts---->
    <!----start-top-nav-script---->
    <script>
            $(function () {
                var pull = $('#pull');
                menu = $('nav ul');
                menuHeight = menu.height();
                $(pull).on('click', function (e) {
                    e.preventDefault();
                    menu.slideToggle();
                });
                $(window).resize(function () {
                    var w = $(window).width();
                    if (w > 320 && menu.is(':hidden')) {
                        menu.removeAttr('style');
                    }
                });
            });</script>
    <!----//End-top-nav-script---->
</head>
<body>
    <!----start-container---->
    <div id="home" class=" scroll">
        <div class="container">
            <!---- start-logo---->
            <div class="logo">
                <a href="/index.php"><img src="images/logoed.png" title="ddc" /></a>
            </div>
            <!---- //End-logo---->
            <!----start-top-nav---->
            <nav class="top-nav">
                <ul class="top-nav">
                    <li class="active"><a href="index.php" >Home</a></li>
                    <li id="newsBt"><a href="news.php">News</a></li>
                    <li id="supportBt"><a href="support.php">Support</a></li>
                    <li id="loginBt" class="contatct-active"><a href="login.php">Login</a></li>
                </ul>
                <a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
            </nav>

            <!----//End-top-nav---->
        </div>
    </div>

    <!----start-contact---->
    <div id="contact" class="contact"> 

        <div class="contact-grids">

            <div class="col-md-8 contact-left">
                <br><br><br>
                <h3> <?php echo $package; ?> package</h3>
                <p> You have selected the <?php echo $package; ?> package. This means that you will provide help and receive help of 
                    <?php
                    if ($package == 'starter') {
                        echo '10,000 and 20,000';
                    } else if ($package == 'bronze') {
                        echo '20,000 and 40,000';
                    } else if ($package == 'silver') {
                        echo '50,000 and 100,000';
                    } else if ($package == 'gold') {
                        echo '70,000 and 140,000';
                    } else if ($package == 'platinum') {
                        echo '100,000 and 200,000';
                    } else if ($package == 'uranium') {
                        echo '200,000 and 400,000';
                    }
                    ?>
                    naira respectively.
                </p>

                <p>Please be sure that all information provided are correct, especially the phone number and account details. We will not be held liable for any loss of earnings due to wrong information
                    provided by any participant.</p>

            </div>
            <div class="col-md-4 contact-left">
                <h3><span> </span> Signup</h3>
                <?php
                if (isset($_GET['error'])) {
                    $error = htmlspecialchars($_GET['error']);
                    echo '<p class="conditions"> <label id="alert"><span>*</span>' . $error . '</label></p>';
                }
                ?>
                <form name="signupForm" id="signupForm" action="processSignup.php" method="POST" >
                    <input name="firstname" id="firstname" type="text" required placeholder="Firstname *" >
                    <input name="lastname" id="lastname" required type="text" placeholder="Lastname *">
                    <input name="phone" id="phone" required type="number"  placeholder="Phone number *">
                    <input name="accountname" id="accountname" type="text" required placeholder="Bank account name *">
                    <input name="accountnumber" id="accountnumber"  type="number" required placeholder="Bank account number *" >
                    <select  type="password" name="bank" class="form-control" id="bank" required  >
                                        <option value="" disabled selected style="display:none;">Bank name *</option>
                                        <option value="Access Bank">Access Bank</option>
                                        <option value="Citibank">Citibank</option>
                                        <option value="Diamond Bank">Diamond Bank</option>
                                        <option value="Ecobank">Ecobank</option>
                                        <option value="Fidelity Bank">Fidelity Bank</option>
                                        <option value="First Bank">First Bank</option>
                                        <option value="First City Monument Bank (FCMB)">First City Monument Bank (FCMB)</option>
                                        <option value="FSDH Merchant Bank">FSDH Merchant Bank</option>
                                        <option value="Guarantee Trust Bank (GTB)">Guarantee Trust Bank (GTB)</option>
                                        <option value="Heritage Bank">Heritage Bank</option>
                                        <option value="Keystone Bank">Keystone Bank</option>
                                        <option value="Rand Merchant Bank">Rand Merchant Bank</option>
                                        <option value="Skye Bank">Skye Bank</option>
                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                        <option value="Sterling Bank">Sterling Bank</option>
                                        <option value="Suntrust Bank">Suntrust Bank</option>
                                        <option value="Union Bank">Union Bank</option>
                                        <option value="United Bank for Africa (UBA)">United Bank for Africa (UBA)</option>
                                        <option value="Unity Bank">Unity Bank</option>
                                        <option value="Wema Bank">Wema Bank</option>
                                        <option value="Zenith Bank">Zenith Bank</option>
                                    </select>
                    <input name="email" id="email" type="email" required placeholder="Email *">
                    <input name="password" id="password" required type="password" placeholder="Password *">
                    <input name="password_again" id="password_again" required type="password" placeholder="Repeat password *">
                    <select  type="text" name="securityquestion" class="form-control" id="securityquestion" required  >
                        <option value="" disabled selected style="display:none;">Security question *</option>
                        <option>What was your favorite place to visit as a child?</option>
                        <option>Who is your favorite actor, musician, or artist?</option>
                        <option>What is the name of your favorite pet?</option>
                        <option>What is your mother's maiden name?</option>
                        <option>What is your favorite color?</option>
                        <option>Which is your favorite web browser?</option>
                        <option>What street did you grow up on?</option>
                    </select>
                    <input name="securityQuestionAnswer" id="securityQuestionAnswer" type="text" required placeholder="Answer to security question *">
                    <input name="package" id="package" type="text" hidden value="<?php echo $package ?>">

                    <span class="submit-btn"><input type="submit" value="Signup"></span>
                </form>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
    <!----//End-contact---->

    <!----start-footer---->
    <div class="footer">
        <div class="container">
            <div class="footer-left">
                    <!--<a href="#"><img src="images/footer-logo.png" title="mabur" /></a>-->
                <p>Created by <a href="#">lucho</a></p>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    /*
                     var defaults = {
                     containerID: 'toTop', // fading element id
                     containerHoverID: 'toTopHover', // fading element hover id
                     scrollSpeed: 1200,
                     easingType: 'linear' 
                     };
                     */

                    $().UItoTop({easingType: 'easeOutQuart'});

                });
            </script>
            <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        </div>
    </div>
    <!----//End-footer---->


    <!----//End-container---->
</body>
</html>



