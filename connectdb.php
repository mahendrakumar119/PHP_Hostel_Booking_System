<?php
$host="localhost:3310";
$user="root";
$password="";
$db_name="hostel database";
// Create connection
$dbhandle = new mysqli($host, $user, $password, $db_name);
// Check connection
if ($dbhandle->connect_error) {
    die("Connection failed: " . $dbhandle->connect_error);
} 
?>