<?php
session_start();
?>
<?php
$db_handle = new mysqli("localhost:3310", "root", "","hostel database");
if (isset($_POST['submit'])){
$username=$_POST['rollno'];
$password=$_POST['password'];
$password1=md5($password);

if (!$_POST['rollno'] | !$_POST['password'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('please enter the login details!.')
        window.location.href='login.html'
        </SCRIPT>");
exit();
}

$query="SELECT * FROM `student` WHERE rollno= '$username' and password='$password1'";
$result=mysqli_query($db_handle,$query);
if(mysqli_num_rows($result) > 0)
{
	$_SESSION['username']=$username;
header('location:profile.php');
}
else{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='login.html'
        </SCRIPT>");
exit();
}
}
else{
}
mysqli_close($db_handle);
?>