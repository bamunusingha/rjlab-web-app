<?php
    require_once 'libs/rb.php';
    
    //config the database
     R::setup( 'mysql:host=localhost;dbname=boot','root', '' );
     // R::setup( 'mysql:host=mysql8.000webhost.com;dbname=a9919229_boot','a9919229_kasun', '0714309008kasun' );
    //R::setup( 'mysql:host=localhost;dbname=ab58682_rjlab','ab58682_rjlab', 'Etdqc=TUZ8[5' );
    define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
    //date_default_timezone_set('Asia/Colombo');
?>