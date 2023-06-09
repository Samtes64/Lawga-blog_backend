<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?: 0;

    //validate form data
    if (!$title) {
        $_SESSION['addpost'] = "Please enter the title";
    } elseif (!$category_id) {
        $_SESSION['addpost'] = "Please select a category";
    } elseif (!$body) {
        $_SESSION['addpost'] = "Please enter the body for your post";
    } elseif (!$thumbnail['name']) {
        $_SESSION['addpost'] = "Please choose thumbnail for your post";
    } else {
        //working on the thumbnail
        //rename the image
        $time = time(); // make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            // make sure image is not to big. (<2mb)
            if ($thumbnail['size'] < 2_000_000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['addpost'] = "file size should be less than 2mb";
            }
        } else {
            $_SESSION['addpost'] = "you can only upload jpg, png and jpeg image files";
        }
    }

    if (isset($_SESSION['addpost'])) {
        $_SESSION['addpost-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/addpost.php');
        die();
    } else {
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        // insert post into database
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title' , '$body', '$thumbnail_name' , $category_id , $author_id , $is_featured);";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['addpost-success'] = "New post added successfully";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/addpost.php');
die();
