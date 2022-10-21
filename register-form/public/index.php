<?php
   require_once ("../private/initial.php");
?>


<?php

if(!isset($_GET['keepSession'])){
    unset($_SESSION['errForm']);
    unset($_SESSION['editForm']);
}

    include_once(PUBLIC_PATH."template/register_form.php");





//  $querySelect = "SELECT*FROM `g_users`";
//  $gueryInsert="INSERT INTO `g_users`(`fullname`,`username`,`password`,`birthdate`,`gender`,`skill`,`address`,`photo`) VALUES ('leilaJavadi','1234567','12345678 ','1364/01/27','1','php-html-css','Isfahan,23',NULL)";
//  $result = mysqli_query($dbConnection,$gueryInsert);
//  mysqli_fetch_assoc($result);
/**$format="Y/m/d H:i:s a";
$timestamp = mktime(4,5,6, 01,15,2003);

echo date($format,$timestamp)**/

?>










<?php
   require_once (PRIVATE_PATH."endup.php");
?>
