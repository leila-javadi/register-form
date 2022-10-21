<form method="post" action="<?php echo PUBLIC_URL.'users/userslist.php'?>" enctype="multipart/form-data">

    <label for="fullname"><b>Fullname:</b></label>
    <input type="text" id="fullname" name="fullname" placeholder="Fullname..."><span class="star">*</span><br><br>
    <label for="username"><b>Username:</b></label>
    <input type="text" id="username" name="username" placeholder="Username..."><span class="star">*</span><br><br>
    <input type="submit" name="submit" value="submit">
</form>