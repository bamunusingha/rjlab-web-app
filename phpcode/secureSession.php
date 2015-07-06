<?php

function sec_session_start() {
    // $session_name = 'sec_session_id';   // Set a custom session name
    // $secure = true;
    // // This stops JavaScript being able to access the session id.
    // $httponly = true;
    // // Forces sessions to only use cookies.
    // if (ini_set('session.use_only_cookies', 1) === FALSE) {
    //     header("Location: ../../error.php?err=Could not initiate a safe session (ini_set)");
    //     exit();
    // }
    // // Gets current cookies params.
    // $cookieParams = session_get_cookie_params();
    // session_set_cookie_params($cookieParams["lifetime"],
    //     $cookieParams["path"], 
    //     $cookieParams["domain"], 
    //     $secure,
    //     $httponly);
    // Sets the session name to the one set above.
    // session_name($session_name);
    session_start();            // Start the PHP session 
    // session_regenerate_id(false);    // regenerated the session, delete the old one. 
}

function check_logged(){
     global $_SESSION;
     // print_r($_SESSION);
     if (!array_key_exists("username",$_SESSION)) {
          redirect("login.php");
     };
}; 


function logout(){
    
     session_destroy();     
     redirect("index.php");
     
};

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

function createThumbnail($filename,$orginalImagePath,$thumbPath,$widthOfThumb) {
     
    
     
    if(preg_match('/[.](jpg)$/', $filename)) {
        $im = imagecreatefromjpeg($orginalImagePath . $filename);
    } else if (preg_match('/[.](gif)$/', $filename)) {
        $im = imagecreatefromgif($orginalImagePath . $filename);
    } else if (preg_match('/[.](png)$/', $filename)) {
        $im = imagecreatefrompng($orginalImagePath . $filename);
    }
     
    $ox = imagesx($im);
    $oy = imagesy($im);
     
    $nx = $widthOfThumb;
    $ny = floor($oy * ($widthOfThumb / $ox));
     
    $nm = imagecreatetruecolor($nx, $ny);
    
    imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);
     
    if(!file_exists($thumbPath)) {
      if(!mkdir($thumbPath,0777)) {
           die("There was a problem. Please try again!");
      }
       }
 
    imagejpeg($nm, $thumbPath .'/'. $filename);
    
}
?>