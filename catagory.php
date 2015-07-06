<?php
   
	include_once 'phpcode/config.php';
	include_once 'phpcode/helperclasses/CreateAlbum.php';
	include_once 'phpcode/secureSession.php';
	include "header.php";
?>


<?php
                       
                       
                        if ((!isset($_GET['catname']))||(empty($_GET['catname']))){
							redirect('index.php');
						}
	?>
	
<div class="section" id="latestPhotography">
            <div class="container">
            	<br/>
            	<h1 class="headerfont text-center">"<?php echo $_GET['catname'];?>" Catagory</h1>
            	
            	
            	<?php
            		//get all the albms 
            		$albums = R::dispense('albums');
					
					if(isset($_GET['albumId'])){
						
						$query='SELECT * FROM albums where id='.$_GET['albumId'];
						
					}else{
						$condition[]=$_GET['catname'];
					$numberOfAlbums = R::count( 'albums' ,'tag=?',$condition);
					
					$albmsPerPage=5;
					 $active_number=1;
					 if( isset($_GET['page'] )&&($_GET{'page'}!=1) )
						{
						   $page = $_GET{'page'};
						   $active_number=$page;
						   $end = $albmsPerPage * $page ;
						   $start=$end-5;
						   
						}
						else
						{
							$page=0;
						   $start=0;
						   
						}
					
					$query='SELECT * FROM albums where tag="'.$_GET['catname'].'" order by id DESC limit '.$start.',' .$albmsPerPage.'';
					}
					
					
					
					
					$albums=R::getAll($query);
					foreach ($albums as $album) {
						
						//take all images in album
						$images = R::dispense('images');
						$query='SELECT * FROM images where album_id='.$album['id'];
						$images=R::getAll($query);
						
						$imagecount=sizeof($images);
						$devided=0;
						if($imagecount>80){
							$devided=30;
						}
						if($imagecount>50 && $imagecount<=80){
							$devided=20;
						}
						if($imagecount>40 && $imagecount<=50){
							$devided=17;
						}
						
						if($imagecount>30 && $imagecount<=40){
							$devided=15;
						}
						
						if($imagecount>20 && $imagecount<=30){
							$devided=15;
						}
						
						
						if($imagecount>0 && $imagecount<=20){
							$devided=10;
						}
						
						$tmp_val=(100/($imagecount+$devided));
						
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
						
						echo '
						<div class="row"> 
							<div class="col-md-6">  
			                        <div id="gallery">
	                        
							'.$out.'
							
							</div>
			
			
			                    </div>
			                    
			                    <div class="col-md-6">
			                        
			                        <h3 class="headerfont"><i class="fa fa-camera"></i> &nbsp; <a class="gotoingleAlbum" href="albums.php?albumId='.$album['id'].'">'.$album['name'].'</a></h3>
			                        <h5 class="albDesc"> <i class="fa fa-calendar"></i> &nbsp; '.CreateAlbum::getDate($album['create_time']).'  &nbsp; | &nbsp;<i class="fa fa-anchor"></i> &nbsp; '.$album['place'].' &nbsp; | &nbsp; <i class="fa fa-tag"></i>&nbsp;<a href="catagory.php?catname='.$album['tag'].'" class="tag">'.$album['tag'].' </a>
									</h5>
			                       
			                        <p class="albDesc">'.$album['adescription'].' </p>
			                    </div>
			                </div>
						';
					}
            	?>

		<?php
				
				//generate pagination 
				$out='<ul class="pagination ">
				  <li><a href="#">&laquo;</a></li>
				  ';
				  
				  $count=1;
				  while($numberOfAlbums>=0){
				  	
					if($count==$active_number){
						$out.='<li class="active"><a href="catagory.php?catname='.$_GET['catname'].'&page='.$count.'">'.($count++).'</a></li>';
					}else{
						$out.='<li><a href="catagory.php?catname='.$_GET['catname'].'&page='.$count.'">'.($count++).'</a></li>';
					}
					
				  	
					$numberOfAlbums=$numberOfAlbums-$albmsPerPage;
				  }
				  
				  $out.='<li><a href="#">&raquo;</a></li>
				</ul>';
				
				echo $out;
				?>
            </div>
        </div>

        

<?php
	include "footer.php";
?>