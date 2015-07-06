<?php
    include_once 'phpcode/secureSession.php';
    include_once 'phpcode/helperclasses/CreateAlbum.php';
    sec_session_start();
    check_logged();
?>


<?php
    if (($_SERVER['REQUEST_METHOD'] == 'POST')){
        CreateAlbum::createAlbum_($_POST['albumname'],$_POST['albumtag'],$_POST['date'],$_POST['albumdesc'],$_POST['takenplace']);

    }

?>


<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/formValidation.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

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
                    <li >
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
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


                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                        </h1>
                        <form role="form" id="CreateAlbum" action="createAlbum.php" method="post" class="albDesc">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Album Name *</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="Name of your album" type="text" name="albumname">
                            </div>

                            <div class="form-group">
                                <label class="control-label"  for="exampleInputEmail1">Taken Date</label>

                                    <input type="text" class="form-control" name="date" placeholder="MM/DD/YYYY" />

                            </div>

                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Album Tag *</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="tag" type="text" name="albumtag">
                            </div>

							<div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Taken Place *</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="location" type="text" name="takenplace">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Album Description *</label>
                                <textarea class="form-control" name="albumdesc"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Create Album</button>
                        </form>





                    </div>



                    <?php

                        $allAlbums=CreateAlbum::getAlbums();
                        if(!empty($allAlbums)){
                            $out='<table class="table table-striped"><tr><th>Taken Date</th><th>Taken place</th><th>Created Date</th><th>Name Of The Album</th><th>Tag</th><th>Description</th></tr>';


                            foreach($allAlbums as $album){
                                $out=$out.'<tr><td>'.CreateAlbum::getDate($album['date']).'</td><td>'.$album['place'].'</td><td>'.CreateAlbum::getDate($album['create_time']).'</td><td><a href="editAlbum.php?id='.$album['id'].'">'.$album['name'].'</a></td><td>'.$album['tag'].'</td><td>'.$album['adescription'].'</td></tr>';

                            }
                            $out=$out.'</table>';


                            echo '<div class="col-lg-12">
                                <h2 class="headerfont">You have following albums</h2>'.$out.'</div>';
                        }

                    ?>




                </div>
<!--                 /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#CreateAlbum').formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    albumname: {
                        validators: {
                            notEmpty: {
                                message: 'The Album name is required'
                            }
                        }
                    },

                    albumtag: {
                        validators: {
                            notEmpty: {
                                message: 'The Album tag is required'
                            }
                        }
                    },

					takenplace: {
                        validators: {
                            notEmpty: {
                                message: 'The Taken place is required'
                            }
                        }
                    },
                    date: {
                        validators: {
                            date: {
                                message: 'The date is not valid',
                                format: 'MM/DD/YYYY'
                            }
                        }
                    },

                    albumdesc: {
                        validators: {
                            notEmpty: {
                                message: 'The Album description is required'
                            },
                            stringLength: {
                                min: 10,
                                message: 'Description should have at least 10 chars'
                            }
                        }
                    }
                }
            }).find('[name="date"]')
                .datepicker({
                    onSelect: function(date, inst) {
                        // Revalidate the field when choosing it from the datepicker
                        $('#CreateAlbum').formValidation('revalidateField', 'date');
                    }
                });
        });

    </script>



</body>

</html>
