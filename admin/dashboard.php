<?php
include 'component/header.php'
?>

  <section class="dashboard">
    <div class="dashboard_container container ">
        <div id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></div>
        <div id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left"></i></div>
      <aside>
        <ul>
          <li>
            <a href="addpost.html"><i class="uil uil-pen"></i>
              <h5>Add Post</h5>
            </a>
          </li>
          <li>
            <a href="dashboard.html" class="active"><i class="uil uil-list-ul"></i>
              <h5>Manage Posts</h5>
            </a>
          </li>
          <li>
            <a href="adduser.html"><i class="uil uil-user-plus"></i>
              <h5>Add User</h5>
            </a>
          </li>
          <li>
            <a href="manage-user.html" ><i class="uil uil-users-alt"></i></i>
              <h5>Manage Users</h5>
            </a>
          </li>
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
              <td><a href="edit-category.html" class="btn sm">Edit</a> </td>
              <td><a href="delete-category.html" class="btn sm red">delete</a> </td>
              
            </tr>
            <tr>
                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                <td>sports</td>
                <td><a href="edit-category.html" class="btn sm">Edit</a> </td>
                <td><a href="delete-category.html" class="btn sm red">delete</a> </td>
                
            </tr>
            <tr>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, impedit?</td>
                <td>entertainment</td>
                <td><a href="edit-category.html" class="btn sm">Edit</a> </td>
                <td><a href="delete-category.html" class="btn sm red">delete</a> </td>
                
            </tr>
          </tbody>
        </table>
  
  
      </main>
    </div>
    
  </section>

 <?php

 include '../components/footer.php'
 ?>