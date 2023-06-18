<?php
require 'config/database.php';

//fetch current user from database
if (isset($_SESSION['user-id'])) {
  $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT avatar FROM users WHERE id=$id";
  $result = mysqli_query($connection, $query);
  $avatar = mysqli_fetch_assoc($result);
}

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
  <nav>
    <div class="cantainer nav_container">
      <a href="<?= ROOT_URL ?>" class="nav_logo">La<strong style="color: var(--color-1); font-size: large">W</strong>ga</a>
      <ul class="nav_items">
        <li><img src="<?= ROOT_URL ?>icons/sun.svg" alt="" id="themeButton"></li>
        <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
        <?php if (isset($_SESSION['user-id'])) : ?>
          <li class="nav_profile">
            <div class="avatar">
              <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" alt="avatar" />
            </div>
            <ul>
              <li><a href="<?= ROOT_URL ?>admin/index.php">manage</a></li>
              <li style="background: var(--color-dark1)">
                <a href="<?= ROOT_URL ?>logout.php">Logout</a>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li><a href="<?= ROOT_URL ?>signin.php">Signin</a></li>
        <?php endif ?>
      </ul>
      <button id="open_nav"><i class="uil uil-bars"></i></button>
      <button id="close_nav"><i class="uil uil-multiply"></i></button>
    </div>
  </nav>

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