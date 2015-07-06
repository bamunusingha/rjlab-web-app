<?php
include_once 'phpcode/config.php';
	 include_once 'phpcode/helperclasses/CreateAlbum.php';
	include "header.php";

?>

 <div class="section" id="latestPhotography">
            <div class="container" >
            	<h1 class="headerfont text-center">ENJOY THE LATEST PHOTOGRAPHY</h1>
            	<div class="row">
            	<?php
            		//get all the albms 
            		$albums = R::dispense('albums');
					
					$albums=R::getAll( 'SELECT * FROM albums order by create_time DESC limit 3' );
					
					foreach ($albums as $album) {
						
						
						echo '
							<div class="col-md-4">
	                        	<div id="gallery">
						';
						
						//take all images in album
						$images = R::dispense('images');
						$query='SELECT * FROM images where album_id='.$album['id'].' limit 8';
						$images=R::getAll($query);
						
						$tmp_val=(100/(8+4));
						
						$out='';
						$i=1;
                        $lval=$tmp_val;
						foreach ($images as $image) {
							$left=$lval;
                            $lval+=$tmp_val;
                            $top=rand(0,150);
                            $rot = rand(-40,40);
							
							$out=$out.'<a id="pic-'.($i++).'" class="fancybox pic" style="top:'.$top.'px;left:'.$left.'%; -moz-transform:rotate('.$rot.'deg); -webkit-transform:rotate('.$rot.'deg);" rel="gallery-'.$album['id'].'" href="'.$image['path'].'" title="'.implode(' ', array_slice(explode(' ', $image['description']), 0, 20)).'..">
                                <img src="'.$image['thumb_path'].'" alt="" class="image-thumb-small" />
                            </a>';
							
						}

					
					echo $out;
					echo '
					</div>
                        
	                       <h3 class="headerfont"><i class="fa fa-camera"></i> &nbsp; <a class="gotoingleAlbum" href="albums.php?albumId='.$album['id'].'">'.$album['name'].'</a></h3>
			                        <h5 class="albDesc"> <i class="fa fa-calendar"></i> &nbsp; '.CreateAlbum::getDate($album['create_time']).'  &nbsp; | &nbsp;<i class="fa fa-anchor"></i> &nbsp; '.$album['place'].' &nbsp; | &nbsp; <i class="fa fa-tag"></i>&nbsp;<a href="catagory.php?catname='.$album['tag'].'" class="tag">'.$album['tag'].' </a>
									</h5>
			                       
			                        <p class="albDesc">'.implode(' ', array_slice(explode(' ', $album['adescription']), 0, 20)).'... </p>
	
	                    </div>
					
					';

					}
					
				?>
            	</div>
            	
               
                <a class="btn btn-default more-button" href="albums.php" role="button">More</a>
            </div>
        </div>

        <div class="section" id="profile">
            <div class="container">
                <div class="row">
                <h1 class="headerfont text-center">PROFILE</h1>
                    <div class="col-md-4">
                        <img src="images/propic.jpg"
                        class="img-responsive img-thumbnail img-circle">
                    </div>
                    <div class="col-md-8">
                        
                        <h3 class="headerfont albDesc">BEST SOLUTION IS THE SIMPLEST IDEA!</h3>
                        <p class="albDesc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                            nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                            enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                            felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                            elementum semper nisi...</p>
                    </div>
                </div>
                <a class="btn btn-default more-button" href="contact-me.php" role="button">More</a>
            </div>
        </div>

<?php
	include "footer.php";
?>