<?php
class Session
{
    public static function init(){
        if (version_compare(phpversion(), '7.2.4', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }
    public static function checkSession(){
        self::init();
        if (self::get("adminLogin")== false) {
            self::destroy();
            header("Location:../admin_area/index.php");
        }
    }

    public static function checkLogin(){
        self::init();
        if (self::get("adminLogin")== true) {
            header("Location:../admin_area/admin.php");
        }
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function Client_session_destroy(){
        session_destroy();
        header("Location:index.php");
    }

    public static function Admin_session_destroy(){
        session_destroy();
        header("Location:../admin_area/index.php");
    }
}