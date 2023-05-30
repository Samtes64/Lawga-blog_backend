<?php
require 'config/database.php';

// get signup form data when the signup button is clicked

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    // echo $firstname,$lastname,$username,$email,$createpassword,$confirmpassword;
    // var_dump($avatar);

    if (!$firstname) {
        $_SESSION['signup'] = "Please enter your first name";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Please enter your last name";
    } elseif (!$username) {
        $_SESSION['signup'] = "Please enter your username";
    } elseif (!$email) {
        $_SESSION['signup'] = "Please enter a valid email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Password should be 8+ characters";
    } elseif (!$avatar['name']) {

        $_SESSION['signup'] = "Please add avatar";
    } else {
        //check if password don't match
        if ($createpassword!=$confirmpassword) {
            $_SESSION['signup'] = "password do not match";

        }else {
            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
            // echo $createpassword . '<br/>';
            // echo $hashed_password;

            // check if username or email already exists in the database
            $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result)>0) {
                $_SESSION['signup'] = "Username or Email already exists";
            }
        }

    }

    
    





    //validate input values


} else {
    //if button wasn't clicked but the url was used it will bounce back to the signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
