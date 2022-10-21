<?php

   ob_start();

   session_start();

   $dbHost="127.0.0.1";
   $dbUsername="root";
   $dbdbPassword="";
   $dbName="gilani";
   $dbConnection = mysqli_connect($dbHost,$dbUsername,$dbdbPassword,$dbName);

    date_default_timezone_set("Asia/Tehran");

   define("PUBLIC_PATH",dirname(dirname(__FILE__)).'/public/');
   define("PRIVATE_PATH",dirname(__FILE__).'/');
   define("PUBLIC_URL",$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/Gilani/public/');
   define("PRIVATE_URL",$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/Gilani/private/');

   include_once(PRIVATE_PATH.'jdf.php');
   include_once (PRIVATE_PATH.'helpers.php');
   include_once (PUBLIC_PATH.'template/base_head.php');

if(!isset($_GET['keepSession'])){
    unset($_SESSION['errForm']);
    unset($_SESSION['editForm']);
}
?>











