<form method="post" action="<?php echo PRIVATE_URL.'users/db_logs.php'?>" enctype="multipart/form-data">

    <label for="fullname"><b>Fullname:</b></label>
    <input  type="text" id="fullname" name="fullname" placeholder="Fullname..." value="<?php if(isset($_SESSION['editForm'])){echo $_SESSION['editForm']['fullname'];} ?>">
    <span class="star">*</span>
    <?php
    if(isset($_SESSION['errForm']['fullname'])){
        foreach ($_SESSION['errForm']['fullname'] as $key=>$err){
            echo "<span class='errorMessage'>$err</span>";
            if($key+1 !=count($_SESSION['errForm']['fullname'])){
                echo " | ";
            }
        }
    }
    ?>
    <br><br>
    <label for="username"><b>Username:</b></label>
    <input  type="text" id="username" name="username" placeholder="Username..." value="<?php if(isset($_SESSION['editForm'])){echo $_SESSION['editForm']['username'];} ?>">
    <span class="star">*</span>
    <?php
    if(isset($_SESSION['errForm']['username'])){
        foreach ($_SESSION['errForm']['username'] as $key=>$err){
            echo "<span class='errorMessage'>$err</span>";
            if($key+1 != count($_SESSION['errForm']['username'])){
                echo " | ";
            }
        }
    }
    ?>
    <br><br>

    <label for="password"><b>Password:</b></label>
    <input type="password" id="password" name="password" placeholder="Password..." value="<?php if(isset($_SESSION['editForm'])){echo $_SESSION['editForm']['password'];} ?>">
    <?php
    if(isset($_SESSION['errForm']['password'])){
        foreach (($_SESSION['errForm']['password'])as $key=>$err){
            echo "<span class='errorMessage'>$err</span>";
            if($key+1 !=count($_SESSION['errForm']['password'])){
                echo " | ";
            }
        }
    }
    ?>
    <br><br>
    <label for="confrim_p"><b>confrim_Password:</b></label>
    <input type="password" id="confrim_p" name="confrim_p" placeholder="confrim_password..." value="<?php if(isset($_SESSION['editForm'])){echo $_SESSION['editForm']['confrim_p'];} ?>">
    <?php
    if(isset($_SESSION['errForm']['confrim_p'])){
        foreach (($_SESSION['errForm']['confrim_p'])as $key=>$err){
            echo "<span class='errorMessage'>$err</span>";
        }
    }
    ?>
    <br><br>
    <label for="birthdate"><b>Birth Date:</b></label>
    <input type="text" id="birthdate" name="birthdate" placeholder=" xxxx / xx / xx " value="<?php if(isset($_SESSION['editForm'])){echo $_SESSION['editForm']['birthdate'];} ?>">
    <?php
    if(isset($_SESSION['errForm']['birthdate'])){
        foreach (($_SESSION['errForm']['birthdate'])as $key=>$err){
            echo "<span class='errorMessage'>$err</span>";
        }
    }
    ?>

    <br><br>
    <b>Gender:</b>
    <label for="male">Male:</label>
    <input type="radio" id="male" name="gender" value="male" <?php if(isset($_SESSION['editForm']['gender']) && $_SESSION['editForm']['gender'] == "male") {echo "checked";} ?> >
    <label for="female">Female:</label>
    <input type="radio" id="female" name="gender" value="female" <?php if(isset($_SESSION['editForm']['gender']) && $_SESSION['editForm']['gender'] == "female") {echo "checked";}?> >
    <?php
    if(isset($_SESSION['errForm']['gender'])){
    foreach (($_SESSION['errForm']['gender'])as $key=>$err) {
        echo "<span class='errorMessage'>$err</span>";
    }}
    ?>
    <br><br>
    <b>Skill:</b>
    <label for="php">PHP:</label>
    <input type="checkbox" id="php" name="php" value="php" <?php if(isset($_SESSION['editForm']['php']) && $_SESSION['editForm']['php'] == "php") {echo "checked";}?> >
    <label for="html">HTML:</label>
    <input type="checkbox" id="html" name="html" value="html" <?php if(isset($_SESSION['editForm']['html']) && $_SESSION['editForm']['html'] == "html") {echo "checked";}?> >
    <label for="css">CSS:</label>
    <input type="checkbox" id="css" name="css" value="css" <?php if(isset($_SESSION['editForm']['css']) && $_SESSION['editForm']['css'] == "css") {echo "checked";}?> ><br><br>

    <label for="address"><b>Address:</b></label>
    <textarea  id="address" name="address" cols="30" rows="5" placeholder="Address..." ><?php
        if(isset($_SESSION['editForm'])){echo $_SESSION['editForm']['address'];}
    ?></textarea>

    <?php
    if(isset($_SESSION['errForm']['address'])) {
        foreach (($_SESSION['errForm']['address']) as $key => $err) {
            echo "<span class='errorMessage'>$err</span>";
            if ($key + 1 != count($_SESSION['errForm']['address'])) {
                echo " | ";
            }
        }
    }
    ?>
    <br><br>
    <label for="photo"><b>Photo:</b></label>
    <input type="file" id="photo" name="photo"><br><br>

    <input type="submit" name="submit" value="submit">

</form>



