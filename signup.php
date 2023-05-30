<?php
require 'config/constants.php'

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lawga Blog</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

    <section class="form_section">

        <div class="container form_section-container">
            <h2>Sign Up</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="<?= ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" name = "firstname" placeholder="First Name">
                <input type="text" name = "lastname" placeholder="Last Name">
                <input type="text" name = "username" placeholder="UserName">
                <input type="text" name = "email" placeholder="Email">
                <input type="text" name = "createpassword" placeholder="Create Password">
                <input type="text" name = "confirmpassword" placeholder="Confirm Password">
                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name = "avatar" id="avatar">
                </div>
                <button type="submit" name = "submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>

    </section>


  </body>
  </html>