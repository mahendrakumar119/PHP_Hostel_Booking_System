<!doctype html>
<html>
<head>
</head>
<body>
<?php 
include "connectdb.php";
$sql=" SELECT * FROM rooms1 WHERE type_id='".$_POST["type_id"]."' and room_id NOT IN(SELECT room_id FROM room_details1)";
$results=mysqli_query($dbhandle,$sql);

?>
<option value="">select room</option>
<?php
	while($rs=mysqli_fetch_assoc($results)){
		?>
			<option value="<?php echo $rs["room_id"]; ?>"><?php echo $rs["room1_no"]; ?></option>
<?php
	}			
	?>

</body>
</html>	
