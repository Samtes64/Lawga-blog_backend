<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    //FOR LATER
    // update category_id of posts that belong to this category to id of uncategorized category

    $update_query = "UPDATE posts SET category_id=15 WHERE category_id=$id;";
    $update_result = mysqli_query($connection, $update_query);

    if(!mysqli_errno($connection)){
        // delete category
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection,$query);
    $_SESSION['deletecategory-success'] = "Category deleted seccessfully";

    }

    

}

header('location: ' . ROOT_URL . 'admin/managecategory.php');
die();