<?php
include_once ('initial.php');
?>
<?php
  function isEmpty($data){
      return empty(trim($data));
  }
  function check_length($data, $min=0, $max=1024){
      if (strlen($data) >= $min && strlen($data) <= $max){return true;}
      return false;
  }

  function check_has_character($data){
      if (strpos($data,"-")){return true;}
      if (strpos($data,",")){return true;}
      return false;
  }

  function confrim_Password($data, $password){
      if ($data == $password){return true;}
      return false;
  }
//
//  function check_has_number($data){
//      if (strpos($data,"0")){return true;}
//      if (strpos($data,"1")){return true;}
//      if (strpos($data,"2")){return true;}
//      if (strpos($data,"3")){return true;}
//      if (strpos($data,"4")){return true;}
//      if (strpos($data,"5")){return true;}
//      if (strpos($data,"6")){return true;}
//      if (strpos($data,"7")){return true;}
//      if (strpos($data,"8")){return true;}
//      if (strpos($data,"9")){return true;}
//      return false;
//  }

function check_has_number($data){
if (mb_eregi ("\d", $data)){return true;}
    return false;
}

function check_format($data){
    $date= explode("/",$data);
    if(count($date)== 3 && strlen($date[0])== 4 && strlen($date[1])== 2 && strlen($date[2])== 2 ){return true;}
    return false;
}

function format($data){
    $date= explode("/",$data);
    if($date[1]<= 6 && $date[2]<= 31){return true;}
    if($date[1]= 7 && $date[1]<12 && $date[2]< 31){return true;}
    if($date[1]= 12 && $date[2]== 29){return true;}
    return false;
}

function format_1($data){
    $jalali_date= jdate("Y/m/d");
    if($data < $jalali_date ){return true;}
    return false;
}


//function isRepetitive($data){
//    foreach ($files=scandir(PUBLIC_PATH.'users') as $file)
//        if ($data == explode('.', $file)[0] ){return true;}
//    return false;
//}

      function isRepetitive($data){
          $dbHost="127.0.0.1";
          $dbUsername="root";
          $dbdbPassword="";
          $dbName="gilani";
          $dbConnection = mysqli_connect($dbHost,$dbUsername,$dbdbPassword,$dbName);
          $querySelect= "SELECT username FROM g_users WHERE `username`='$data'";
          $result1= mysqli_query($dbConnection,$querySelect);
          if($userData = mysqli_fetch_assoc($result1)){return true;}
                return false;}


?>


