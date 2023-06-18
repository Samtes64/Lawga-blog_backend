<?php
require 'config/constants.php';
$username_email = $_SESSION['signin-data']['username_email'] ?? null;
unset($_SESSION['signin-data'])

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lawga Blog</title>
    <link rel="stylesheet" href="<?=ROOT_URL?>/css/style.css" />
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
            <h2>Sign In</h2>
            <?php if( isset($_SESSION['signup-success'])) :  ?>
              <div class="alert_message success">
                <p>
                  <?= $_SESSION['signup-success'];
                  unset($_SESSION['signup-success'])
                   ?>
                </p>
              </div>
              <?php elseif(isset($_SESSION['signin'])) :  ?>
              <div class="alert_message error">
                <p>
                  <?= $_SESSION['signin'];
                  unset($_SESSION['signin'])
                   ?>
                </p>
              </div>
              

            <?php endif ?>
            <form action="<?=ROOT_URL?>signin-logic.php" method="POST">
                <input type="text" placeholder="Username" value='<?= $username_email?>' name='username_email'>
                <input type="password" style="display: block;
    width: 100%;
    padding: 10px;
    background: var(--color-dark3);
    margin-bottom: 10px;
    resize: none;
    color: white;

    border-radius: 5px;" placeholder="Password" name='password'>
                
                <button type="submit" name="submit" class="btn">Sign In</button>
                <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
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