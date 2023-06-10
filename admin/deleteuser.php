<?php
require 'config/database.php';
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    
    //fetch user from the database
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    // making sure we are getting back only 1 user
    if(mysqli_num_rows($result)==1){
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name; 
        // delete image if available
        if($avatar_path){
            unlink($avatar_path); //deletes the file from the path we've given the it
        }

    }
     //for later
     //fetch all posts of the user and delete them
     

    //delete user form database
    $delete_user_query = "DELETE FROM users where id=$id";
    $delete_user_result = mysqli_query($connection,$delete_user_query);

    if(mysqli_errno($connection)){
        $_SESSION['deleteuser'] = "couldn't delete user {$user['firstname']}";

    }else{
        $_SESSION['deleteuser-success'] = "User {$user['firstname']} deleted successfully";
    }
    

}

header('location: ' . ROOT_URL . 'admin/manage-user.php');
die();