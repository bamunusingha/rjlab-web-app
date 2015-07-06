<?php
    include_once 'phpcode/secureSession.php';
	include_once 'phpcode/config.php';
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
                    <li class="active">
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
            	
            	<script>
            		
            		$(document).ready(
					    function(){
					        $('input:file').change(
					            function(){
					                if ($(this).val()) {
					                    $('input:submit').attr('disabled',false);
					                    // or, as has been pointed out elsewhere:
					                    // $('input:submit').removeAttr('disabled'); 
					                } 
					            }
					            );
					    });
            	</script>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    	
                    	<?php
							//save the model
							if (($_SERVER['REQUEST_METHOD'] == 'POST')){
									                     		
												if((!empty($_POST['id_']))&&(!empty($_POST['descr']))){
														//uodate the db
														$image = R::dispense('images');
														$image=R::load('images',$_POST['id_']);	
														$image->description=$_POST['descr'];
														
														R::store($image);
														echo "<span class='text-success'>Image Updated!</span><br/>";
												}
											}
						?>
		
		
								 <?php
								    //process model 2
								    if (($_SERVER['REQUEST_METHOD'] == 'POST')){
													                     		
																if((!empty($_POST['aid_']))&&(!empty($_POST['aname']))&&(!empty($_POST['adescr']))&&(!empty($_POST['atag_']))){
																		//uodate the db
																		$album = R::dispense('albums');
																		$album=R::load('albums',$_POST['aid_']);	
																		$album->name=$_POST['aname'];
																		$album->adescription=$_POST['adescr'];
																		$album->tag=$_POST['atag_'];
																		R::store($album);
																		echo "<span class='text-success'>Album Updated!</span><br/>";
																}
															}
								    ?>
    

                        <?php
                        if ((isset($_GET['id']))&&(intval($_GET['id'])>0)){
                        	//get the album details
                        		$album = R::dispense('albums');	
								$album=R::load('albums',$_GET['id']);
                        		
                        		
                        	
                            //echo the form to upload images
                            echo '<form action="" method="POST" enctype="multipart/form-data" id="uploadFormOfEditAlbum">
									    <input class="btn btn-default btn-file" type="file" name="files[]" multiple /><br/>
									    <input class="btn btn-success" type="submit" name="Upload" value="Upload Selected Images" disabled />
								  </form>';
                            
							
							
							
							
							//processing code
							if(isset($_FILES['files'])){

									$desired_dir="UploadedImages/".preg_replace('/\s+/', '', $album->name)."/";
									
								    $errors= array();
								    $extensions = array("jpeg","jpg","png");  
									
									  
									foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
										
										
										$file_name = $key.$_FILES['files']['name'][$key];
										
										$file_ext=explode('.',$file_name);
										$file_ext=end($file_ext);  
										$file_ext=@strtolower(end(explode('.',$file_name))); 
										
										$file_size =$_FILES['files']['size'][$key];
										$file_tmp =$_FILES['files']['tmp_name'][$key];
										$file_type=$_FILES['files']['type'][$key];	
										
										//get the image number
										
										$count=R::count('images',' album_id = ?',array($album->id))+1;
										
										//create new file name
										$file_name=$album->name."_".$count.".".$file_ext;
										$file_name=preg_replace('/\s+/', '', $file_name);
										
										if(in_array($file_ext,$extensions ) === false){
											$errors[]="extension not allowed";
										}  
								
								
								        if($file_size > 209715200){
											$errors[]='File size must be less than 2 MB';
								        }
								
								
												if(empty($errors)==true){
										            if(is_dir($desired_dir)==false){
										                mkdir("$desired_dir", 0777);		// Create directory if it does not exist
										            }
										            if(is_dir("$desired_dir/".$file_name)==false){
										                	
														//save the image	
										                move_uploaded_file($file_tmp,$desired_dir.$file_name);
														
														
														$thumbDir=$desired_dir.'thumb';
														//add to the db
														$image = R::dispense('images');
														
														$image->name=$file_name;
														$image->album_id=$album->id;
														$image->path=$desired_dir.$file_name;
														$image->description=$album->adescription."-".$file_name;
														$image->thumbPath=$thumbDir.'/'.$file_name;
														
														R::store($image);
														
														//save the thumb
														
														createThumbnail($file_name, $desired_dir, $thumbDir, 120);
										                // echo "Success";
										            }
										            		
										        }else{
										                print_r($errors);
										        }
								
								        }
								
								    }
							
							
							//get all images relavent to the album and display them
							$query='SELECT * FROM images WHERE album_id='.$album->id.' order by id desc';
							$allImages=R::getAll( $query );
							
							$out='<br/>';
							if(!empty($allImages)){
								foreach($allImages as $img){
									
									$out=$out.'<div class="single-image"><img src='.$img['thumb_path'].' alt='.preg_replace('/\s+/', '&nbsp;', $img['description']).' class="img-thumbnail admin-image-look" >									
									<button type="button" class="edit-image-buttons btn btn-primary btn-small" data-toggle="modal" data-target="#myModal" data-id="'.$img['id'].'" data-desc="'.$img['description'].'">									
								  Edit
								</button>
								<a href=deleteimage.php?id='.$img['id'].' class="edit-image-buttons btn btn-warning btn-small">Delete</a>
									</div>';
								}
							}
							echo $out;

                        }else{
                        	//show the album list

                            $allAlbums=CreateAlbum::getAlbums();
                        if(!empty($allAlbums)){
                            $out='<table class="table table-striped"><tr><th>Taken Date</th><th>Taken place</th><th>Created Date</th><th>Name Of The Album</th><th>Tag</th><th>Description</th><th>Edit</th><th>Delete Album</th></tr>';


                            foreach($allAlbums as $album){
                                $out=$out.'<tr><td>'.CreateAlbum::getDate($album['date']).'</td><td>'.$album['place'].'
                                </td><td>'.CreateAlbum::getDate($album['create_time']).'
                                </td><td><a href="editAlbum.php?id='.$album['id'].'">'.$album['name'].'
                                </a></td><td>'.$album['tag'].'</td><td>'.$album['adescription'].'
                                </td>
                                <td>
                                <button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal2"
                                 data-alid="'.$album['id'].'" data-atag="'.$album['tag'].'" data-alname="'.$album['name'].'" data-aldesc="'.$album['adescription'].'">Edit</button>
                                </td>
                                <td><a class="btn btn-warning" href="deletealbum.php?id='.$album['id'].'">Delete</a></td></tr>';

                            }
                            $out=$out.'</table>';


                            echo '<div class="col-lg-12">
                                <h2 class="headerfont">You have following albums</h2>'.$out.'</div>';
                        }
                              }

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
   
    
<!-- Modal 2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Album Description</h4>
      </div>
      
      <form method="post" action="" >
      	<div class="modal-body">
      	
      	
	      	<div class="form-group">
	                                <label class="control-label from-edit-albm" for="exampleInputEmail1">Id (Don't Edit This)</label>
	                                <input class="form-control oneeee" id="exampleInputEmail1"
	                                       placeholder="id" type="text" name="aid_" >
	                            </div>
	                            
	                            <div class="form-group">
	                                <label class="control-label from-edit-albm" for="exampleInputEmail1">Name</label>
	                                <input class="form-control albmname " id="exampleInputEmail1"
	                                       placeholder="enter the image description" type="text" name="aname">
	                            </div>
	                            
	                            <div class="form-group">
	                                <label class="control-label from-edit-albm" for="exampleInputEmail1">Tag</label>
	                                <input class="form-control atag_" id="exampleInputEmail1"
	                                       placeholder="enter the image description" type="text" name="atag_">
	                            </div>
	                            
	                            <div class="form-group">
	                                <label class="control-label from-edit-albm" for="exampleInputEmail1">Description</label>
	                                <input class="form-control aldesc_ " id="exampleInputEmail1"
	                                       placeholder="enter the image description" type="text" name="adescr">
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
		
		$('#myModal2').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('alid')
		   var recipient2 = button.data('alname')
		   var recipient3 = button.data('aldesc')  
		   var recipient4 = button.data('atag')
		 
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  // modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.oneeee').val(recipient)
		  modal.find('.albmname').val(recipient2)
		  modal.find('.aldesc_').val(recipient3)
		  modal.find('.atag_').val(recipient4)
		});
		
	</script>				
			

<!-- Modal 1-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Image Description</h4>
      </div>
      
      <form method="post" action="" >
      	<div class="modal-body">
      	
      	
	      	<div class="form-group">
	                                <label class="control-label from-edit-albm" for="exampleInputEmail1">Id (Don't Edit This)</label>
	                                <input class="form-control oneeee" id="exampleInputEmail1"
	                                       placeholder="id" type="text" name="id_" >
	                            </div>
	                            
	                            <div class="form-group">
	                                <label class="control-label from-edit-albm" for="exampleInputEmail1">Description</label>
	                                <input class="form-control desc_ " id="exampleInputEmail1"
	                                       placeholder="enter the image description" type="text" name="descr">
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
		   var recipient2 = button.data('desc') 
		 
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  // modal.find('.modal-title').text('New message to ' + recipient)
		  modal.find('.oneeee').val(recipient)
		  modal.find('.desc_').val(recipient2)
		  
		});
		
	</script>				
			

	
   

</body>

</html>
