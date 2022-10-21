<?php
require_once ('../private/initial.php');
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
        <th>Register time</th>
        <th>Photo</th>
    </tr>
    </thead>
    <tbody>

    <?php
    /**echo "<pre>";
    print_r ($_SERVER['QUERY_STRING']);
    echo "<pre>";**/

    $files=scandir(PUBLIC_PATH.'users');

    foreach ($files as $file){
        if($file == '.' || $file == '..' ){continue;}
        $username = explode('.',$file)[0];
        if ($username == $_SERVER['QUERY_STRING']){
            $src=fopen(PUBLIC_PATH.'users/'.$username.'.txt','a+t');
            $images=scandir((PUBLIC_PATH.'image/'.$username));
            foreach ($images as $image) {
                if ($image == '.' || $image == '..') {continue;}
                $img = explode('.', $image)[0];
            }

    ?>

    <tr>
        <?php
        while(!feof($src)){
            ?>
            <td class="td"><?php echo fgets($src); }?></td>
        <td>
            <img width="75px" height="75px" src="<?php if(isset($img)) { echo'image/'.$username.'/'.$img.'.jpg';} else {echo'image/default/download.png';}  ?>"
        </td>
    </tr>
    </tbody>
    <?php
    fclose($src);
    break;
        }
    }
    ?>
</table>
<?php
require_once (PRIVATE_PATH.'endup.php');
?>
