
<?php
include 'component/header.php';

// get back form data if there was an error
$firstname = $_SESSION['adduser-data']['firstname'] ?? null;
$lastname = $_SESSION['adduser-data']['lastname'] ?? null;
$username = $_SESSION['adduser-data']['username'] ?? null;
$email = $_SESSION['adduser-data']['email'] ?? null;
$createpassword = $_SESSION['adduser-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['adduser-data']['confirmpassword'] ?? null;


unset($_SESSION['adduser-data']);
?>

    <section class="form_section">

        <div class="container form_section-container">
            <h2>Add User</h2>
            <?php if(isset($_SESSION['adduser'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?=$_SESSION['adduser']; 
                    unset($_SESSION['adduser']);
                    ?>
                    </p>
                </div>

                <?php endif ?>
            <form action="<?=ROOT_URL?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" placeholder="First Name" name="firstname" value="<?=$firstname?>">
                <input type="text" placeholder="Last Name" name="lastname" value="<?=$lastname?>">
                <select name="userrole">
                    <!-- <option value="" disabled selected>Select user type</option> -->
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                    
                </select>
                <input type="text" placeholder="UserName" name="username" value="<?=$username?>">
                <input type="text" placeholder="Email" name="email" value="<?=$email?>">
                <input type="text" placeholder="Create Password" name="createpassword">
                <input type="text" placeholder="Confirm Password" name="confirmpassword">
                <div class="form_control">
                    <label for="avatar">Add picture</label>
                    <input type="file" id="avatar" name="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Add User</button>
            </form>
        </div>

    </section>



    <?php
 include '../components/footer.php'
 ?>