<?php
    // To view in mobile devices connected with same wifi
    // define("LINK", "http://192.168.0.107/archtype/"); 
    define("LINK", "http://localhost/archtype/");


    define("HOST_NAME", "localhost");
    define("USER_NAME", "root");
    define("PASS_NAME", "");
    define("DB_NAME", "archtype");
    $conn = new mysqli(HOST_NAME, USER_NAME, PASS_NAME, DB_NAME);
    if($conn->connect_error)
        die('Not Allowed');


    function convertSlugToString($slug) {
        $string = str_replace('-', ' ', $slug);  
        $string = ucwords($string);              
        return $string;
    }
    

?>