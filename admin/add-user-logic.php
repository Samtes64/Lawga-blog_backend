<?php

require 'config/database.php';

// get signup form data when the submit button is clicked

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $userrole = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];
    // echo $firstname,$lastname,$username,$email,$createpassword,$confirmpassword;
    var_dump($avatar);

    //validate input values

    if (!$firstname) {
        $_SESSION['adduser'] = "Please enter your first name";
    } elseif (!$lastname) {
        $_SESSION['adduser'] = "Please enter your last name";
    } elseif (!$username) {
        $_SESSION['adduser'] = "Please enter your username";
    } elseif (!$email) {
        $_SESSION['adduser'] = "Please enter a valid email";
    // } elseif (!$userrole) {
    //     $_SESSION['adduser'] = "Please select the user role";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['adduser'] = "Password should be 8+ characters";
    } elseif (!$avatar['name']) {

        $_SESSION['adduser'] = "Please add avatar";
    } else {
        //check if password don't match
        if ($createpassword != $confirmpassword) {
            $_SESSION['adduser'] = "password do not match";
        } else {
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // echo $createpassword . '<br/>';
            // echo $hashed_password;

            // check if username or email already exists in the database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['adduser'] = "Username or Email already exists";
            } else {
                //work on the avatar
                //rename the avatar
                $time = time(); //make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                //make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if (in_array($extension, $allowed_files)) {
                    // make sure image is not too large (1mb>)
                    if ($avatar['size'] < 1000000) {
                        // upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['adduser'] = 'File size to big. Should be less than 1mb';
                    }
                } else {
                    $_SESSION['adduser'] = 'File should be png, jpg or jpeg';
                }
            } 
        }
    }











    //redirect back to the signup page if there was any problem
    if (isset($_SESSION['adduser'])) {
        // pass form data back to signup page
        $_SESSION['adduser-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/adduser.php');
        die();
    } else {
        //if everything went well insert new user into users table
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) 
        VALUES('$firstname' , '$lastname', '$username' , '$email', '$hashed_password', '$avatar_name', $userrole)";

        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_error($connection)) {
            // redirect to manageuser page with success message
            $_SESSION['adduser-success'] = "User $firstname added";
            header('location: ' . ROOT_URL . 'admin/manage-user.php');
            die();
        }
    }
} else {
    //if button wasn't clicked but the url was used it will bounce back to the signup page
    header('location: ' . ROOT_URL . 'admin/adduser.php');
    die();
}
