<?php
    include_once 'phpcode/secureSession.php';
	include_once 'phpcode/config.php';
	
    sec_session_start();
    check_logged();
?>


<?php
                       
                       
                        if ((isset($_GET['id']))&&(intval($_GET['id'])>0)){
							//delete the album
							$album = R::dispense('albums');	
							$album = R::load( 'albums', $_GET['id'] );
							
							R::trash($album);
							
							$dirname='UploadedImages/'.preg_replace('/\s+/', '', $album['name']);
							
							deleteDir($dirname.'/'.'thumb');
							deleteDir($dirname);
							
							//delete images from db
							$images = R::dispense('images');	
							
							
							$images=R::find('images','album_id=?',array($_GET['id']));
							
							R::trashAll($images);
													
										
							redirect("editAlbum.php");
						}else{
							//go back
							redirect("editAlbum.php");
						}
	?>