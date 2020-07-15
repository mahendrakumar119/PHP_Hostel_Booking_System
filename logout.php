<?php
session_start();

session_unset();
echo "Logout Successfully";

session_destroy();

header('location:index.html');
?>

