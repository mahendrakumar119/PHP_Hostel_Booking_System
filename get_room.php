<!doctype html>
<html>
<head>
</head>
<body>
<?php 
include "connectdb.php";

$sql2=" SELECT * FROM rooms WHERE type_id='".$_POST["type_id"]."' and room_id NOT IN(SELECT room_id FROM room_details)";
$results=mysqli_query($dbhandle,$sql2);

?>
<option value="">select room</option>
<?php
	while($rs=mysqli_fetch_assoc($results)){
		?>
			<option value="<?php echo $rs['room_id']; ?>"><?php echo $rs["room_no"]; ?></option>
<?php
	}			
	?>

</body>
</html>	
