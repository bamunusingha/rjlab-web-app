<?php
    class LoginHelper{
        public static function login($user,$email,$pass){
            if(($email==$user->email)&&(sha1($pass)==$user->password)){
                return TRUE;
            }
            return FALSE;
        }
    }
?>