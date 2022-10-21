<?php
require_once ('../../private/initial.php');
?>
<?php
$has_Permit=true;
$errors=array();

if (isEmpty($_POST['fullname'])){$errors['fullname'][]="Fullname Must Be Filled";}
if (!check_length($_POST['fullname'],0,100)){$errors['fullname'][]="Fullname Must Be Less 100 Characters";}
if (isEmpty($_POST['username'])){$errors['username'][]="Username Must Be Filled";}
if (!check_length($_POST['username'],6,12)){$errors['username'][]="Username Must Between 6 and 12";}
if (isRepetitive($_POST['username'])){$errors['username'][]="Username Is Repetitive";}
if (isEmpty($_POST['password'])){$errors['password'][]="Password Must Be Filled";}
if (!check_length($_POST['password'],8)){$errors['password'][]="Password Must Be Least 8 Characters";}
if (isEmpty(($_POST['confrim_p']== $_POST['password']))){$errors['confrim_p'][]="The Password Is Wrong";}
if (!check_has_number($_POST['password'])){$errors['password'][]="Password Must Have Number";}
if (!check_format($_POST['birthdate'])){$errors['birthdate'][]="xxxx/xx/xx";}
if (!format($_POST['birthdate'])){$errors['birthdate'][]="???";}
if (!format_1($_POST['birthdate'])){$errors['birthdate'][]="!!!";}
if (isEmpty($_POST['gender'])){$errors['gender'][]="Gender Must Be Selected";}
if (isEmpty($_POST['address'])){$errors['address'][]="Address Must Be Filled";}
if (!check_has_character($_POST['address'])){$errors['address'][]="Address Must Have , or - ";}
if (!check_has_number($_POST['address'])){$errors['address'][]="Address Must Have Number";}
if (count($errors) != 0){
    $_SESSION['errForm'] = $errors;
    $_SESSION['editForm'] = $_POST;
    $has_Permit=false;
    header("Location: ".PUBLIC_URL."index.php?keepSession=1");}


?>
<?php
$x1=$_POST['fullname'];
$x2=$_POST['username'];
$x3=$_POST['password'];
$x4=$_POST['birthdate'];
$x5=$_POST['gender'];
$x7=$_POST['address'];

if($_POST['submit']=="submit" && $has_Permit==true) {

//    if (isset($_POST['php']) && isset($_POST['html']) && isset($_POST['css'])) {
//        $x6 = $_POST['php'] . $dash = "-" . $_POST['html'] . $dash = "-" . $_POST['css'];
//    } else if (isset($_POST['php']) && isset($_POST['html'])) {
//        $x6 = $_POST['php'] . $dash = "-" . $_POST['html'];
//    } else if (isset($_POST['php']) && isset($_POST['css'])) {
//        $x6 = $_POST['php'] . $dash = "-" . $_POST['css'];
//    } else if (isset($_POST['html']) && isset($_POST['css'])) {
//        $x6 = $_POST['html'] . $dash = "-" . $_POST['css'];
//    } else if (isset($_POST['php'])) {
//        $x6 = $_POST['php'];
//    } else if (isset($_POST['html'])) {
//        $x6 = $_POST['html'];
//    } else if (isset($_POST['css'])) {
//        $x6 = $_POST['css'];
//    } else {
//        $x6 = "NO SKILL";
//    }

    if($_POST['gender']== "male"){$x5="0";}
    else if ($_POST['gender']=="female"){$x5="1";}

$skill=[];
     if (isset($_POST['php'])){
         $skill[0]=$_POST['php'];
     }
     if (isset($_POST['html'])){
         $skill[1]=$_POST['html'];
     }
     if (isset($_POST['css'])){
         $skill[2]=$_POST['css'];
             }
    $x6=implode("-",$skill);



    $isImage=false;
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photoType = explode('/', $_FILES['photo']['type']);
        if ($photoType[0] == 'image') {$isImage = true;}
    }

    if($isImage){
        if (!is_dir(PUBLIC_PATH . 'image/' . $_POST['username'])) {
            mkdir(PUBLIC_PATH . 'image/' . $_POST['username']);
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], PUBLIC_PATH . 'image/' . $_POST['username'] . '/' . $_FILES['photo']['name']);
    }

    if($isImage == true){$x8= $_FILES['photo']['name'];}
    else if ($isImage == false){$x8= "NULL" ;}






    $queryInsert = "INSERT INTO g_users(`fullname`,`username`,`password`,`birthdate`,`gender`,`skill`,`address`,`photo`) VALUES ('$x1','$x2','$x3','$x4','$x5','$x6','$x7','$x8')";
    $result = mysqli_query($dbConnection, $queryInsert);

    header("Location:" . $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/gilani/public/db_users_list.php");

}

?>

<?php
require_once (PRIVATE_PATH.'endup.php');
?>