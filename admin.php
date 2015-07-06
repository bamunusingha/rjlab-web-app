<?php
    include_once 'phpcode/secureSession.php';
    sec_session_start();
    check_logged();
?>
<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VG-Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
        rel="stylesheet" type="text/css">

        <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand headerfont" href="index.php">VISHGRAPHY</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                        <?php echo($_SESSION['username']);?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="createAlbum.php"><i class="fa fa-fw fa-folder-o"></i> Create Album</a>
                    </li>
                    <li>
                        <a href="editAlbum.php"><i class="fa fa-fw fa-folder-open-o"></i> Edit Album</a>
                    </li>
                    <li>
                        <a href="changeCalander.php"><i class="fa fa-fw fa-calendar-o"></i> Calander</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid adminPage" >

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome <?php
                                echo($_SESSION['username']);
                            ?>
                        </h1>
                    <p>This is the admin area of the <a href="index.php">VISHGRAPHY site.</a><br/> Here you can <a href="createAlbum.php">create albums </a>,
                    	<a href="editAlbum.php"> edit albums</a>, upload images to exsisting albums
                    delete images from it's album, update details of a image, delete albums.</p>
                    <p>
                    As well as in the <a href="changeCalander.php">calander section</a> you can edit your activity calander.
                    There you can add events to the calander,edit those events (if you have uploaded images relavent to some event you can add
                    the url of the album of those images there.then when a user click on your peticular calander event those album will be loaded!)or delete events.</p>
					
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>

</html>
