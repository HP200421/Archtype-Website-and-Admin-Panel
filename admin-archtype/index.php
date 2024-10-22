<?php
define("DEV_MODE", "dev");
define("BASEPATH", true);
// define("DEV_MODE", "production");
if(DEV_MODE == "dev"){
    define("LINK", "http://localhost/archtype/admin-archtype/");
    define("WEBSITE", "http://localhost/archtype");
   
}
else{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    define("LINK", "http://vit.touchmediaads.com/");
    define("WEBSITE", "http://localhost/archtype");
}

define("HOST_NAME", "localhost");
define("USER_NAME", "root");
define("PASS_NAME", "");
define("DB_NAME", "archtype");
$conn = new mysqli(HOST_NAME, USER_NAME, PASS_NAME, DB_NAME);
if($conn->connect_error)
    die('Not Allowed');

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $zlinki = "https"; 
else
    $zlinki = "http"; 
// require_once __DIR__.'/function.php';
define("ASSET", LINK."assets/");
define("DIR", __DIR__."/");
define("VIEW", DIR."view/");
define("UP", WEBSITE."/uploads/");
define("UPLOAD",  dirname(__DIR__)."/uploads/");
// define("UPLOAD", LINK."uploads/");

$zlinki .= "://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
$zurl = explode(LINK, $zlinki);
$zgeturl = explode('/', $zurl[1]);
$controllerFile = $zgeturl[0];
require_once DIR.'utils/helper.php';
require_once DIR.'controller/main.php';

if ($controllerFile == ''){
    require_once DIR.'controller/index_controller.php';
    $controllerName = New Index($conn);
    $controllerName->index();
}else{
    try {
        $className = "Index";
        $requestFunction = "index";
        if (!file_exists(DIR.'controller/'.$controllerFile.'_controller.php')) {
            require_once DIR.'controller/index_controller.php';
            $requestFunction = $controllerFile;
            $requestedParams = array_slice($zgeturl, 1);
            $controllerName  = new $className($conn, $requestedParams);
            $controllerName->$requestFunction();
        }
        else{
            require_once DIR.'controller/'.$controllerFile.'_controller.php';
            $className = ucfirst($controllerFile);
            if(isset($zgeturl[1]) && $zgeturl[1] != '')
                $requestFunction = $zgeturl[1];
            $requestedParams = array_slice($zgeturl, 1);
            $controllerName  = new $className($conn, $requestedParams);
            if(!method_exists($controllerName, $requestFunction))
                $requestFunction = "index";
            else
                $controllerName->setParam(array_slice($zgeturl, 2));
            $controllerName->$requestFunction();
        }
    } catch (\Error $ex) {
        print_r($ex);
        require_once __DIR__.'/404.php';
    }
}
?>