<?php
    include_once 'phpcode/secureSession.php';
	include_once 'phpcode/config.php';
	
    sec_session_start();
    check_logged();
?>


<?php
                       
                       
                        if ((isset($_GET['id']))&&(intval($_GET['id'])>0)){
							//delete the album
							$event = R::dispense('events');	
							$event = R::load( 'events', $_GET['id'] );
							
							R::trash($event);
							
							$event = R::findAll( 'events' );
							file_put_contents('json/events.json', json_encode( R::exportAll($event)));	
							redirect("changeCalander.php");
						}else{
							//go back
							redirect("changeCalander.php");
						}
	?>