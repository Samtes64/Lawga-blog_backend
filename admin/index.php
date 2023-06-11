<?php
include 'component/header.php'
?>

  <section class="dashboard">
  <?php if (isset($_SESSION['addpost-success'])) :  //shows if post was added successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['addpost-success'];
        unset($_SESSION['addpost-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edituser-success'])) :  //shows if user was edited successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['edituser-success'];
        unset($_SESSION['edituser-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['edituser'])) :  //shows if user was not edited successfully
  ?>
    <div class="alert_message error container">
      <p>
        <?= $_SESSION['edituser'];
        unset($_SESSION['edituser'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['deleteuser-success'])) :  //shows if user was edited successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['deleteuser-success'];
        unset($_SESSION['deleteuser-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['deleteuser'])) :  //shows if user was not edited successfully
  ?>
    <div class="alert_message error container">
      <p>
        <?= $_SESSION['deleteuser'];
        unset($_SESSION['deleteuser'])
        ?>
      </p>
    </div>
  <?php endif ?>
    <div class="dashboard_container container ">
        <div id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></div>
        <div id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left"></i></div>
      <aside>
        <ul>
          <li>
            <a href="addpost.php"><i class="uil uil-pen"></i>
              <h5>Add Post</h5>
            </a>
          </li>
          <li>
            <a href="index.php" class="active"><i class="uil uil-postcard"></i>
              <h5>Manage Posts</h5>
            </a>
          </li>
          <?php if (($_SESSION['user_is_admin']) == true) : ?>

          <li>
            <a href="adduser.php"><i class="uil uil-user-plus"></i>
              <h5>Add User</h5>
            </a>
          </li>
          <li>
            <a href="manage-user.php" ><i class="uil uil-users-alt"></i></i>
              <h5>Manage Users</h5>
            </a>
          </li>
          <li>
            <a href="addcategory.php" class=""><i class="uil uil-edit"></i></i>
              <h5>Add Category</h5>
            </a>
          </li>
          <li>
            <a href="managecategory.php" class=""><i class="uil uil-list-ul"></i></i>
              <h5>Manage Category</h5>
            </a>
          </li>
          <?php endif ?>
        </ul>
      </aside>
      <main>
        <h2>Manage Posts</h2>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Edit</th>
              <th>Delete</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
              <td>Art</td>
              <td><a href="editpost.php" class="btn sm">Edit</a> </td>
              <td><a href="deletepost.php" class="btn sm red">delete</a> </td>
              
            </tr>
            <tr>
                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                <td>sports</td>
                <td><a href="editpost.php" class="btn sm">Edit</a> </td>
                <td><a href="deletepost.php" class="btn sm red">delete</a> </td>
                
            </tr>
            <tr>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, impedit?</td>
                <td>entertainment</td>
                <td><a href="editpost.php" class="btn sm">Edit</a> </td>
                <td><a href="deletepost.php" class="btn sm red">delete</a> </td>
                
            </tr>
          </tbody>
        </table>
  
  
      </main>
    </div>
    
  </section>

 <?php

 include '../components/footer.php'
 ?>