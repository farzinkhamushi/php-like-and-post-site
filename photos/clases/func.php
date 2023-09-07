<?php 

class Func{
/*
function __autoload($class){
    $class = strtolower($class);
    $the_path = "includes/{$class}.php";
    if (file_exists($the_path)) {
        require_once($the_path);
    }else {
        die("This file name {$class}.php was not found....");
    }
}
*/
//Fatal error: __autoload() is no longer supported, use spl_autoload_register() instead
static function redirect($location){
    header("Location: {$location}");
}

}

//if we wanted to use it :
//Func::redirect("your wanted location");

?>