<?php
    include_once 'phpcode/secureSession.php';
    include_once 'phpcode/helperclasses/CreateAlbum.php';
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
                    <li >
                        <a href="createAlbum.php"><i class="fa fa-fw fa-folder-o"></i> Create Album</a>
                    </li>
                    <li >
                        <a href="editAlbum.php"><i class="fa fa-fw fa-folder-open-o"></i> Edit Album</a>
                    </li>
                    <li class="active">
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
                        
                        <form role="form" id="createIvent" action="" method="post">
                        	<div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Title *</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="enter your work" type="text" name="title">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label"  for="exampleInputEmail1">Start Date *</label>

                                    <input type="text" class="form-control" name="sdate" placeholder="MM/DD/YYYY" />

                            </div>
                            
                            <div class="form-group">
                                <label class="control-label"  for="exampleInputEmail1">End Date *</label>

                                    <input type="text" class="form-control" name="edate" placeholder="MM/DD/YYYY" />

                            </div>
                            
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Link (Optional)</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="enter the link to event" type="text" name="link">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Add Event</button>
                        </form>
                        <br/>
                        
                        <?php
							//process the model
							if (($_SERVER['REQUEST_METHOD'] == 'POST')){
					                     		
								if((!empty($_POST['id_']))&&(!empty($_POST['title']))&&(!empty($_POST['link']))){
										//uodate the db
										$event = R::dispense('events');
										$event=R::load('events',$_POST['id_']);	
										$event->title=$_POST['title'];
										$event->url=$_POST['link'];
										R::store($event);
										echo "<span class='text-success'>Event Updated!</span><br/>";
								}
							}
							
							
						?>
		
                        
                        
                     <?php
                     	if (($_SERVER['REQUEST_METHOD'] == 'POST')){
                     		
							if((!empty($_POST['title']))&&(!empty($_POST['sdate']))&&(!empty($_POST['edate']))){
								
								$event = R::dispense('events');
								$event->title=$_POST['title'];
								$event->start=date('Y-m-d',strtotime($_POST['sdate']));
								$event->end=date('Y-m-d',strtotime($_POST['edate']));
								
								if((isset($_POST['link']))&&!empty($_POST['link'])){
									$event->url=$_POST['link'];
								}
								
								R::store($event);
							}
                     	}
						
						$event = R::dispense('events');
						
						$query='SELECT * FROM events order by id DESC';
						$allevents=R::getAll( $query );
						
						
						if(!empty($allevents)){
							$out='<table class="table table-striped"><tr><th>Title</th><th>Starting Date</th><th>Ending Date</th><th>link</th><th>Remove</th><th>Edit</th></tr>';
							
							foreach ($allevents as $event) {
								$out.='<tr><td>'.$event['title'].'</td><td>'.$event['start'].'</td><td>'.$event['end'].'</td><td>'.$event['url'].'</td><td><a class="btn btn-warning" href="removeEvent.php?id='.$event['id'].'">Remove</a></td><td>
								<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal" data-id="'.$event['id'].'" data-eventname="'.$event['title'].'"  data-url="'.$event['url'].'">
								  Edit
								</button>
								</td></tr>';
							}
							
							
							$out.='</table>';
							
							echo $out;
							
							 $allevents = R::findAll( 'events' );
							file_put_contents('json/events.json', json_encode( R::exportAll($allevents)));
							
						}else{
							echo "<br/><span>You have no events !</span>";
						}
						
                     ?>

				
		
					
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit and Save the event</h4>
      </div>
      
      <form method="post" action="" >
      	<div class="modal-body">
      	
      	
	      	<div class="form-group">
	                                <label class="control-label" for="exampleInputEmail1">Id (Don't Edit This)</label>
	                                <input class="form-control oneeee" id="exampleInputEmail1"
	                                       placeholder="enter your work" type="text" name="id_" >
	                            </div>
	                            
	                            <div class="form-group">
	                                <label class="control-label" for="exampleInputEmail1">Title *</label>
	                                <input class="form-control title_" id="exampleInputEmail1"
	                                       placeholder="enter your work" type="text" name="title">
	                            </div>
	      	
	      	<div class="form-group">
	                                <label class="control-label" for="exampleInputEmail1">Link </label>
	                                <input class="form-control link_" id="exampleInputEmail1"
	                                       placeholder="enter the link to event" type="text" name="link">
	                            </div>
             	       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save Changes"/>
      </div>
      
      </form> 
      
    </div>
  </div>
</div>
					
					
					
	<script>
		
		$('#myModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('id')
		   var recipient2 = button.data('url') 
		   var recipient3 = button.data('eventname')// Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  // modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.oneeee').val(recipient)
		  modal.find('.link_').val(recipient2)
		  modal.find('.title_').val(recipient3)
		});
		
	</script>				
					
					
						
						

                    </div>
                </div>
                <!-- /.row -->
<script type="text/javascript">
        $(document).ready(function() {
            $('#createIvent').formValidation({
                message: 'This value is not valid',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: { 
					title: {
                        validators: {
                            notEmpty: {
                                message: 'The Title is required'
                            }
                        }
                    },
                    sdate: {
                        validators: {
                            date: {
                                message: 'The date is not valid',
                                format: 'MM/DD/YYYY'
                            }
                        }
                    },
                    edate: {
                        validators: {
                            date: {
                                message: 'The date is not valid',
                                format: 'MM/DD/YYYY'
                            }
                        }
                    },
                    
                    link: {
		                validators: {
		                    uri: {
		                        message: 'The link address is not valid'
				                    }
				               }
				    }

                    
                }
            }).find('[name*="date"]')
                .datepicker({
                    onSelect: function(date, inst) {
                        // Revalidate the field when choosing it from the datepicker
                        $('#createIvent').formValidation('revalidateField', 'date');
                    }
                });
        });

    </script>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
