<?php
require_once ('../private/initial.php');
?>
<?php


$files = scandir(PUBLIC_PATH.'users');
$count=count($files)- 2;



/**foreach ($files as $file) {
    if ($file == '.' || $file == '..') {continue;}
    echo "<pre>";
    print_r($files);
    echo "</pre>";
}**/
?>


<span>number of users:<?php echo "&nbsp"."&nbsp". $count ?></span>
<table class="table">
    <thead>
    <tr>
        <th>Row</th>
        <th>Usernames</th>
        <th>operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
      foreach ($files as $file) {
          if ($file == '.' || $file == '..') {continue;}
          $username = explode('.', $file)[0];

    ?>
    <tr>
        <td class="td">
            <?php
                echo $i;
            ?>
        </td>

        <td class="td">
            <?php
            echo $username;
            ?>
        </td>

        <td class="td"><a class="td" href="<?php echo PUBLIC_URL.'user.php?'.$username ?>">مشاهده</a>
        </td>
    </tr>
    <?php $i++;} ?>
    </tbody>
</table>





<?php
require_once (PRIVATE_PATH.'endup.php');
?>
