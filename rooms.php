<?php
session_start();
?>

<?php
$rollno=$_SESSION['register'];
$roomtype=$_POST['rtype'];
$roomid=$_POST['rnumber'];
//$id=$_POST['id'];
//$rollno=$username;
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

$sql = "INSERT INTO room_details VALUES ('$roomtype', '$roomid','$id','$rollno')";

if ($conn->query($sql) === TRUE) {
	
    echo "New record created successfully";
	
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You have booked the room successfully!')
        
		window.close();
		
		
        </SCRIPT>");	
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>