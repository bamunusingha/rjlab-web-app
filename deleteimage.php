<?php
    include_once 'phpcode/secureSession.php';
	include_once 'phpcode/config.php';
	
    sec_session_start();
    check_logged();
?>


<?php
                       
                       
                        if ((isset($_GET['id']))&&(intval($_GET['id'])>0)){
							//delete the image
							$image = R::dispense('images');	
							$image = R::load( 'images', $_GET['id'] );
							
							unlink($image->path);
							unlink($image->thumbPath);
							R::trash($image);
							$direc='editAlbum.php?id='.$image->album_id;
							redirect($direc);
						}else{
							//go back
							redirect("editAlbum.php");
						}
	?>