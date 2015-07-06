<?php
include_once 'phpcode/config.php';
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 3/24/2015
 * Time: 4:18 PM
 */
class CreateAlbum{
    public static function createAlbum_($aname,$atag,$adate,$adescription,$place){

        $album = R::dispense('albums');
        $album->name=$aname;
        $album->tag=$atag;
        $album->date=new DateTime($adate);
        $album->adescription=$adescription;
        $album->createTime=date('m/d/Y h:i:s a', time());
		$album->place=$place;
        R::store($album);
    }

    public static function getAlbums(){
        $albums = R::dispense('albums');
        $albums = R::getAll( 'SELECT * FROM albums order by create_time DESC' );
        return $albums;
    }

    public static function getDate($dateTime){
        $dt = new DateTime($dateTime);
        return $dt->format('m/d/Y');
    }
	
	
	

}