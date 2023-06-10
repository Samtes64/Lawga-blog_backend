<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // get form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['addcategory'] = "Enter title";
    } elseif (!$description) {
        $_SESSION['addcategory'] = "Enter description";
    }

    //redirect back to add category page with an error of their was an invalid input
    if (isset($_SESSION['addcategory'])) {
        $_SESSION['addcategory-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/addcategory.php');
        die();
    } else {
        //insert category to the database
        $query = "INSERT INTO categories (title, description) values ('$title', '$description')";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['addcategory'] = "Couldn't add category";
            header('location: ' . ROOT_URL . 'admin/addcategory.php');
            die();
        } else {
            $_SESSION['addcategory-success'] = "Category $title added successfully";
            header('location: ' . ROOT_URL . 'admin/managecategory.php');
            die();
        }
    }
} else {
    header('location: ' . ROOT_URL . 'admin/addcategory.php');
    die();
}
