<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/collapse.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="js/formValidation.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
        rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        
        
		<!--calander-->
		<link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.css' rel='stylesheet' />
		<link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css ' rel='stylesheet' media='print' />
		<script src='lib/moment.min.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js'></script>

		<link rel="stylesheet" href="css/style.css">
		
<!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        
		
		
		<title>RJ lab - The Best Photographer In Srilanka</title>
		
    </head>

<?php
//oncontextmenu="return false"
?>

    <body>

    <div id="home" class="home">
        <div class="container" id="mainDesc">
            <div class="col-sm-6 " id="headeslogen">
                <p class="hidden">RJ lab - i do more than take a photo</p>
                <h1 class="headerfont" id="mainHead">RJ LAB</h1>
                <h3 class="headerfont" id="slogen">I DO MORE THAN TAKE A PHOTO</h3>
          </div>
        </div>
    </div>

<?php
    
    $url= $_SERVER['REQUEST_URI'];

    $end = explode('/', $url);
   
?>

        <div id="mainNavigationBar" class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                    <a class="navbar-brand" href="index.php"><span class="headerfont" id="secondHead">RJ LAB</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-collapse">
                        <li <?php
                                if(end($end)=="index.php"){
                                    echo "class='active'";
                                }
                            ?>
                        >
                            <a href="index.php">HOME</a>
                        </li>
                        <li 
                            <?php
								if (strpos($url,'album') !== false) {
								    echo "class='active'";
								}
                            ?>
                        >
                            <a href="albums.php">ALBUMS</a>
                        </li>
                        <li 
                            <?php
                                if (strpos($url,'contact-me') !== false) {
								    echo "class='active'";
								}
                            ?>
                        >
                            <a href="contact-me.php">CONTACT ME</a>
                        </li>
                        <li 
                            <?php
                                if (strpos($url,'calander') !== false) {
								    echo "class='active'";
								}
                            ?>
                        >
                            <a href="calander.php">CALANDER</a>
                        </li>
                        <li 
                            <?php
                                if (strpos($url,'login') !== false) {
								    echo "class='active'";
								}
                            ?>
                        >
                            <a href="login.php">LOGIN</a>
                        </li>
                        <li class="socialIcon fitstSocialIcon">
                            
                                <a class="linkdinIcon" href="#"></a>
                        </li>
                        <li class="socialIcon">
                            
                                <a class="fbIcon" href="#"></a>
                        </li>
                        <li class="socialIcon">
                            
                                <a class="googleIcon" href="#"></a>
                        </li>
                        <li class="socialIcon">
                            
                                <a class="twitterIcon" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<div class="toTopNav"><i class="fa fa-chevron-circle-up gotohomeIcon"></i>
</div>
<!--End of the header seection-->