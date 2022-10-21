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
  if (!check_format($_POST['birthdate'],4,2,2,2)){$errors['birthdate'][]="xxxx/xx/xx";}
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
if($_POST['submit']=="submit" && $has_Permit==true) {
    $gueryInsert= "INSERT INTO g_users(`fullname`,`username`,`password`,`birthdate`,`gender`,`skill`,`address`,`photo`) VALUES ([$_POST'fullname'], [$_post'username'], [$_POST'password'], [$_POST'birthdate'], [$_POST'gender'], [$_post'skill'], [$_POST'address'], [$_post'photo')";

    $src = fopen(PUBLIC_PATH . 'users/' . $_POST['username'] . '.txt', 'a+t');

    fwrite($src, $_POST['fullname'] . "\n");
    fwrite($src, $_POST['username'] . "\n");
    fwrite($src, $_POST['password'] . "\n");
    fwrite($src, $_POST['birthdate'] . "\n");
    fwrite($src, $_POST['gender'] . "\n");
    $dash = '';

    if (isset($_POST['php']) && isset($_POST['html']) && isset($_POST['css'])) {
        fwrite($src, $_POST['php'] . $dash = "-" . $_POST['html'] . $dash = "-" . $_POST['css'] . "\n");
    } else if (isset($_POST['php']) && isset($_POST['html'])) {
        fwrite($src, $_POST['php'] . $dash = "-" . $_POST['html'] . "\n");
    } else if (isset($_POST['php']) && isset($_POST['css'])) {
        fwrite($src, $_POST['php'] . $dash = "-" . $_POST['css'] . "\n");
    } else if (isset($_POST['html']) && isset($_POST['css'])) {
        fwrite($src, $_POST['html'] . $dash = "-" . $_POST['css'] . "\n");
    } else if (isset($_POST['php'])) {
        fwrite($src, $_POST['php'] . "\n");
    } else if (isset($_POST['html'])) {
        fwrite($src, $_POST['html'] . "\n");
    } else if (isset($_POST['css'])) {
        fwrite($src, $_POST['css'] . "\n");
    } else {
        fwrite($src, "NO SKILL" . "\n");
    }

    fwrite($src, $_POST['address']);

    $isImage = false;
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



    if ($_POST['submit'] == "submit") {
        $format = "Y/m/d H:m:s";
        fwrite($src, date($format) . "\n");
    }

    fclose($src);

    header("Location: http://localhost:80/gilani/public/users_list.php");

}
?>


<?php
require_once (PRIVATE_PATH.'endup.php');
?>