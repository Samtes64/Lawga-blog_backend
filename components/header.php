<?php
require 'config/database.php';

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
    <nav>
      <div class="cantainer nav_container">
        <a href="<?= ROOT_URL ?>" class="nav_logo"
          >La<strong style="color: var(--color-1); font-size: large"
            >W</strong
          >ga</a
        >
        <ul class="nav_items">
          <li><a href="blog.php">Blog</a></li>
          <?php if(isset($_SESSION['user-id'])) : ?>
          <li class="nav_profile">
            <div class="avatar">
              <img src="./images/avatar.JPG" alt="avatar" />
            </div>
            <ul>
              <li><a href="index.php">posts</a></li>
              <li style="background: var(--color-dark1)">
                <a href="signin.php">Logout</a>
              </li>
            </ul>
          </li>
          <?php else : ?>
          <li><a href="<?=ROOT_URL?>signin.php">Signin</a></li>
          <?php endif?>
        </ul>
        <button id="open_nav"><i class="uil uil-bars"></i></button>
        <button id="close_nav"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>