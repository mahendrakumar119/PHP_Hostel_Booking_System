<!doctype html>
<html>
<head>
<title>Profile</title
<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
}

th {
  background-color: #4CAF50;
  color: white;
}
tr:hover {background-color:#f5f5f5;}
    

</style>
<!-- Custom styles for this template -->
<link href="album.css" rel="stylesheet">
</head>


<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.html"> <img src="dyp.jpg" height=40 width=80 class="d-inline-block align-top" /> DY Patil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<a class="nav-item nav-link" href="AboutUs.html">About Us</a>
				
                                
				
				<a class="nav-item nav-link" href="logout.php">Log Out</a>
			</div>
		</div>
	</nav>
</header>

<br><br><br>
<?php
session_start();
echo "Welcome"." ".$_SESSION['username'];
?>
<?php
$db_handle = new mysqli("localhost:3310", "root", "","hostel database");

$username=$_SESSION['username'];
$sql="select count(*) from room_details where rollno='$username'";
$query="SELECT * FROM student INNER JOIN room_details ON student.rollno=room_details.rollno WHERE student.rollno='$username'";
$result=mysqli_query($db_handle,$sql);
if(mysqli_num_rows($result) > 0){
	$result=mysqli_query($db_handle,$query);
	
}

?>
<div class="table-responsive">
<center>
<table class="table" align="cenetr" cellpadding="10px">
<tr>
	<th colspan="10">User Details</th><br>
</tr>
<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>RollNo</th>	
	<th>Email</th>	
	<th>Gender</th>	
	<th>MobileNo</th>	
	<th>Year Of Study</th>	
	<th>Registration Date</th>	
	<th>Room_Type_Id</th>
	<th>Room Id</th>
</tr>
<?php
	while($rows=mysqli_fetch_assoc($result))
	{
?>
	<tr>
		<td><?php echo $rows["firstname"]; ?></td>
		<td><?php echo $rows["lastname"]; ?></td>
		<td><?php echo $rows["rollno"]; ?></td>
		<td><?php echo $rows["email"]; ?></td>
		<td><?php echo $rows["gender"]; ?></td>
		<td><?php echo $rows["mobileno"]; ?></td>
		<td><?php echo $rows["year"]; ?></td>
		<td><?php echo $rows["reg_date"]; ?></td>
		<td><?php echo $rows["type_id"]; ?></td>
		<td><?php echo $rows["room_id"]; ?></td>
		
	</tr>
<?php 
	}
?>

</center>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
