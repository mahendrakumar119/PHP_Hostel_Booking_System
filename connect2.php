<?php
$room_type=$_POST['room_type'];
$room_no=$_POST['room_no'];


$host="localhost:3310";
$user="root";
$password="";
$db_name="hostel database";
// Create connection
$conn = new mysqli($host, $user, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO room_details VALUES ('$room_type', '$room_no')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>