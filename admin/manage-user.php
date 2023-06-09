<?php
include 'component/header.php'
?>

<section class="dashboard">
<?php if( isset($_SESSION['adduser-success'])) :  ?>
              <div class="alert_message success container">
                <p>
                  <?= $_SESSION['adduser-success'];
                  unset($_SESSION['adduser-success'])
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
          <tr>
            <td>Abebe</td>
            <td>abe</td>
            <td><a href="edituser.php" class="btn sm">Edit</a> </td>
            <td><a href="deleteuser.php" class="btn sm red">delete</a> </td>
            <td>Yes</td>
          </tr>
          <tr>
            <td>Kebede</td>
            <td>kebe</td>
            <td><a href="edituser.php" class="btn sm">Edit</a> </td>
            <td><a href="deleteuser.php" class="btn sm red">delete</a> </td>
            <td>Yes</td>
          </tr>
          <tr>
            <td>chala</td>
            <td>cha</td>
            <td><a href="edituser.php" class="btn sm">Edit</a> </td>
            <td><a href="deleteuser.php" class="btn sm red">delete</a> </td>
            <td>Yes</td>
          </tr>
        </tbody>
      </table>


    </main>
  </div>

</section>


<?php
include '../components/footer.php'
?>