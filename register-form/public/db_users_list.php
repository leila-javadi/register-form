<?php
require_once ('../private/initial.php');
?>

<?php


$querySelect="SELECT * FROM g_users";
$result1= mysqli_query($dbConnection,$querySelect);
$dataCount = mysqli_num_rows($result1);

?>


<span>number of users:<?php echo "&nbsp"."&nbsp". $dataCount ?></span>
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
    for($j=0;$j<$dataCount;$j++) {
        $userData = mysqli_fetch_assoc($result1);


        ?>
        <tr>
            <td class="td">
                <?php
                echo $i;
                ?>
            </td>

            <td class="td">
                <?php
                echo $userData['username'] ;
                ?>
            </td>

            <td class="td"><a class="td" href="<?php echo PUBLIC_URL.'db_user.php?'.$userData['username'] ?>">مشاهده</a>
            </td>
        </tr>
        <?php $i++;} ?>
    </tbody>
</table>





<?php
require_once (PRIVATE_PATH.'endup.php');
?>
