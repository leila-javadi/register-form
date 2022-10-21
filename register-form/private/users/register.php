<?php
require_once ("../../private/initial.php");
?>
<?php


$isImage=false;
if(isset($_FILES['photo'])){
    $photoTaype=explode('/',$_FILES['photo']['type']);
    if($photoTaype[0]=='image'){
        $isImage=true;
    }
    print_r(getimagesize($_FILES['photo']['tmp_name']));
    print_r($_FILES['photo']);
}
else{
    echo "عکس بارگذاری نشده است";
}
if($isImage){
    $photoSize=getimagesize($_FILES['photo']['tmp_name']);
    if($_FILES['photo']['size']<=100*1024){
        echo "حجم عکس ارسال شده کمتر از 100KB است.";
    }
    else if($_FILES['photo']['size']>=2000*1024){
        echo "حجم عکس ارسال شده بیشتر از 2MB است.";
    }




    if(!is_dir(PUBLIC_PATH.'image/'.$_POST['username'])){
        mkdir(PUBLIC_PATH.'image/'.$_POST['username']);
    }

    move_uploaded_file($_FILES['photo']['tmp_name'],PUBLIC_PATH.'image/'.$_POST['username'].'/'.$_FILES['photo']['name']);
}
if($isImage)

?>




<table>
  <thead>
    <tr>
     <th>Fullname</th>
     <th>Username</th>
     <th>Password</th>
     <th>Gender</th>
     <th>Skill</th>
     <th>Address</th>
     <th>Photo</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <td><?php echo $_POST['fullname']?></td>
      <td><?php echo $_POST['username']?></td>
      <td><?php echo $_POST['password']?></td>
      <td><?php echo $_POST['gender']?></td>
      <td><?php $dash='';
          if(isset( $_POST['php'])){
          echo  $_POST['php'];
          $dash=" - ";
          }
          if (isset($_POST['html'])){
          echo $dash.$_POST['html'];
          }
          if (isset($_POST['css'])){
              echo $dash.$_POST['css'];
          }

          ?></td>
      <td><?php echo $_POST['address']?></td>
      <td><?php if(isset($_FILES['photo'])){
                  echo $_FILES['photo']['name'];
          }
          ?></td>
     </tr>
  </tbody>

</table>
<?php
require_once (PRIVATE_PATH.'endup.php');
?>
