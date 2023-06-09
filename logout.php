<?php
require 'config/constants.php';
// deestroying all the sessions and redirect user to login page
session_destroy();
header('location: ' . ROOT_URL);
die();
