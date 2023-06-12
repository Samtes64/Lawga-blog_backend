<?php
include 'component/header.php';

$current_user_id = $_SESSION['user-id'];

$query = "SELECT posts.* , categories.title AS category_title FROM posts JOIN categories ON posts.category_id = categories.id WHERE author_id=$current_user_id ";
$posts = mysqli_query($connection, $query);

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
  <?php elseif (isset($_SESSION['editpost-success'])) :  //shows if post was edited successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['editpost-success'];
        unset($_SESSION['editpost-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editpost'])) :  //shows if post was not edited successfully
  ?>
    <div class="alert_message error container">
      <p>
        <?= $_SESSION['editpost'];
        unset($_SESSION['editpost'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['deletepost-success'])) :  //shows if post was deleted successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['deletepost-success'];
        unset($_SESSION['deletepost-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['deletepost'])) :  //shows if user was not deleted successfully
  ?>
    <div class="alert_message error container">
      <p>
        <?= $_SESSION['deletepost'];
        unset($_SESSION['deletepost'])
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
        <?php if (mysqli_num_rows($posts) > 0) : ?>
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

          <?php while($post = mysqli_fetch_assoc($posts)) :?>
            <tr>
              <td><?=$post['title']?></td>
              <td><?=$post['category_title']?></td>
              <td><a href="<?=ROOT_URL?>admin/editpost.php?id=<?=$post['id']?>" class="btn sm">Edit</a> </td>
              <td><a href="<?=ROOT_URL?>admin/deletepost.php?id=<?=$post['id']?>" class="btn sm red">delete</a> </td>
              
            </tr>
            <?php endwhile?>
            
          </tbody>
        </table>
        <?php else : ?>
        <div class="alert_message error"><?="No posts by user found"?></div>
      <?php endif ?>
  
  
      </main>
    </div>
    
  </section>

 <?php

 include '../components/footer.php'
 ?>