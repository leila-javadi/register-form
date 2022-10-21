<?php
require_once ('../private/initial.php');
?>
<?php


?>


<table>
    <thead>
    <tr>
        <th>Fullname</th>
        <th>Username</th>
        <th>Password</th>
        <th>Birth Date</th>
        <th>Gender</th>
        <th>Skill</th>
        <th>Address</th>
        <th>Photo</th>
        <th>Register time</th>
    </tr>
    </thead>
    <tbody>


        <?php
$usename_Special=$_SERVER['QUERY_STRING'];

        $querySelect="SELECT  `fullname`, `username`, `password`, `birthdate`, `gender`, `skill`, `address`, `photo`, `creat_at` FROM `g_users` WHERE `username`= '$usename_Special'";
        $result1= mysqli_query($dbConnection,$querySelect);
      $userData = mysqli_fetch_assoc($result1);

        if (is_dir(PUBLIC_PATH . 'image/' . $userData['username'])){
        $images = scandir(PUBLIC_PATH.'image/'.$userData['username']);
        foreach ($images as $image) {
            if ($image == '.' || $image == '..') {continue;}
            $img = explode('.', $image)[0];
        }}


                ?>
                <tr>

                    <td class="td"><?php echo($userData['fullname']) ?></td>
                    <td class="td"><?php echo($userData['username'])?></td>
                    <td class="td"><?php echo($userData['password']) ?></td>
                    <td class="td"><?php echo($userData['birthdate']) ?></td>
                    <td class="td"><?php echo($userData['gender']) ?></td>
                    <td class="td"><?php echo($userData['skill']) ?></td>
                    <td class="td"><?php echo($userData['address']) ?></td>
                    <td class="td"><img width="75px" height="75px" src="<?php if(isset($img)) { echo'image/'.$userData['username'].'/'.$img.'.jpg';} else {echo'image/default/download.png';}  ?>"</td>
                    <td class="td"><?php echo($userData['creat_at']) ?></td>

                </tr>
                <?php

    ?>
    </tbody>
</table>
<?php
require_once (PRIVATE_PATH.'endup.php');
?>
