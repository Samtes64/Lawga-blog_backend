<?php

require 'config/constants.php';

//get back form data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
unset($_SESSION['signup-data']);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lawga Blog</title>
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
</head>

<body>

  <section class="form_section">

    <div class="container form_section-container">
      <h2>Sign Up</h2>
      <?php if (isset($_SESSION['signup'])) : ?>
        <div class="alert_message error">
          <p><?= $_SESSION['signup'];
              unset($_SESSION['signup']);
              ?>
          </p>

        </div>
      <?php endif ?>
      <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="post">
        <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
        <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
        <input type="text" name="username" value="<?= $username ?>" placeholder="UserName">
        <input type="text" name="email" value="<?= $email ?>" placeholder="Email">
        <input type="password" style="display: block;
    width: 100%;
    padding: 10px;
    background: var(--color-dark3);
    margin-bottom: 10px;
    resize: none;
    color: white;

    border-radius: 5px;" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
        <input type="password" style="display: block;
    width: 100%;
    padding: 10px;
    background: var(--color-dark3);
    margin-bottom: 10px;
    resize: none;
    color: white;

    border-radius: 5px;" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
        <div class="form_control">
          <label for="avatar">User Avatar</label>
          <input type="file" name="avatar" id="avatar">
        </div>
        <button type="submit" name="submit" class="btn">Sign Up</button>
        <small>Already have an account? <a href="signin.php">Sign In</a></small>
      </form>
    </div>

  </section>

  <script>
    // Get the button and body elements
    var themeButton = document.getElementById('themeButton');
    var bodyElement = document.body;

    // Check if a theme is already stored in local storage
    var savedTheme = localStorage.getItem('theme');

    // Apply the saved theme if available
    if (savedTheme) {
      bodyElement.classList.add(savedTheme);
    }

    // Button click event handler
    themeButton.addEventListener('click', function() {
      // Check if the body element has the light theme class
      var isLightTheme = bodyElement.classList.contains('light-theme');

      // Remove the current theme class
      bodyElement.classList.remove(isLightTheme ? 'light-theme' : 'dark-theme');

      // Determine the next theme class
      var nextTheme = isLightTheme ? 'dark-theme' : 'light-theme';

      // Add the next theme class to the body element
      bodyElement.classList.add(nextTheme);

      // Save the selected theme in local storage
      localStorage.setItem('theme', nextTheme);
    });
  </script>


</body>

</html>