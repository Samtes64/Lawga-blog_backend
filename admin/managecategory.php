<?php
include 'component/header.php';

//fetch category from database 

$query = "SELECT * FROM categories where not title='Uncategorized' ORDER BY title";
$categories = mysqli_query($connection, $query);



?>

<section class="dashboard">
  <?php if (isset($_SESSION['addcategory-success'])) :  //shows if the category was added successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['addcategory-success'];
        unset($_SESSION['addcategory-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editcategory-success'])) :  //shows if the category was edited successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['editcategory-success'];
        unset($_SESSION['editcategory-success'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['editcategory'])) :  //shows if the category was not edited successfully
  ?>
    <div class="alert_message error container">
      <p>
        <?= $_SESSION['editcategory'];
        unset($_SESSION['editcategory'])
        ?>
      </p>
    </div>
  <?php elseif (isset($_SESSION['deletecategory-success'])) :  //shows if user was edited successfully
  ?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['deletecategory-success'];
        unset($_SESSION['deletecategory-success'])
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
          <a href="index.php"><i class="uil uil-postcard"></i>
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
            <a href="manage-user.php" class=""><i class="uil uil-users-alt"></i></i>
              <h5>Manage Users</h5>
            </a>
          </li>
          <li>
            <a href="addcategory.php" class=""><i class="uil uil-edit"></i></i>
              <h5>Add Category</h5>
            </a>
          </li>
          <li>
            <a href="managecategory.php" class="active"><i class="uil uil-list-ul"></i></i>
              <h5>Manage Category</h5>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </aside>
    <main>
      <h2>Manage Category</h2>
      <?php if (mysqli_num_rows($categories) > 0) : ?>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              
              <th>Edit</th>
              <th>Delete</th>
              
            </tr>
          </thead>
          <tbody>
            <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
              <tr>
                <td><?= $category['title'] ?></td>
                
                <td><a href="<?= ROOT_URL ?>admin/editcategory.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a> </td>
                <td><a href="<?= ROOT_URL ?>admin/deletecategory.php?id=<?= $category['id'] ?>" class="btn sm red">delete</a> </td>
                
              </tr>
            <?php endwhile ?>

          </tbody>
        </table>
      <?php else : ?>
        <div class="alert_message error"><?="No categories found"?></div>
      <?php endif ?>


    </main>
  </div>

</section>


<?php
include '../components/footer.php'
?>