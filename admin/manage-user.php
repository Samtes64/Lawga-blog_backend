<?php
include 'component/header.php';

//fetch users from database other than the current user
$current_admin_id = $_SESSION['user-id'];
$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connection, $query);



?>

<section class="dashboard">
  <?php if (isset($_SESSION['adduser-success'])) :  //shows if user was added successfully?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['adduser-success'];
        unset($_SESSION['adduser-success'])
        ?>
      </p>
    </div>
    <?php elseif (isset($_SESSION['edituser-success'])) :  //shows if user was edited successfully?>
    <div class="alert_message success container">
      <p>
        <?= $_SESSION['edituser-success'];
        unset($_SESSION['edituser-success'])
        ?>
      </p>
    </div>
    <?php elseif (isset($_SESSION['edituser'])) :  //shows if user was not edited successfully?>
    <div class="alert_message error container">
      <p>
        <?= $_SESSION['edituser'];
        unset($_SESSION['edituser'])
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
          <a href="index.php"><i class="uil uil-list-ul"></i>
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
            <a href="manage-user.php" class="active"><i class="uil uil-users-alt"></i></i>
              <h5>Manage Users</h5>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </aside>
    <main>
      <h2>Manage Users</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Admin</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($user = mysqli_fetch_assoc($users)) : ?>
            <tr>
              <td><?= $user['firstname'] . " " .  $user['lastname'] ?></td>
              <td><?= $user['username'] ?></td>
              <td><a href="<?= ROOT_URL ?>admin/edituser.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a> </td>
              <td><a href="<?= ROOT_URL ?>admin/deleteuser.php?id=<?= $user['id'] ?>" class="btn sm red">delete</a> </td>
              <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
            </tr>
          <?php endwhile ?>

        </tbody>
      </table>


    </main>
  </div>

</section>


<?php
include '../components/footer.php'
?>