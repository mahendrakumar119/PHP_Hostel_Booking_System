<!doctype html>
<html>
<head>
<title>First Floor</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.cls1 {
  padding: 16px 20px;
  border: none;
  font-color: red;
  width: 100%;
}
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<?php 
include "connectdb.php";
 ?>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script>
function getRoom(val){	
	$.ajax({
		type:"POST",
		url:"get_room1.php",
		data:'type_id='+val,
		success: function(data){
			$("#roomno").html(data);
		}
	});
}	
</script>
<script>
function display(){
window.opener.location='index.html';	
}
</script>
<div class="cls1" align="center" style="width: 100%;">
<marquee><h1 style="font-size:50px;">Room Booking Portal</h1></marquee>
</div>
<div class="container" align="center">	
<form action="rooms1.php" method="POST" name="roomform">
<div id="custom-select" style="width:100%; ">
<div style="float:left;"><b>Room Type:</b></div><br>
<select id="roomtypes" name="rtype" style="width: 100%; padding: 16px 20px; font-size: 100%; border: none; background: #f1f1f1; margin: 5px 0 22px 0;" onChange="getRoom(this.value);">
<option value="">select room type</option>
<?php
	$sql="SELECT * FROM room_type";
	$result=mysqli_query($dbhandle,$sql);
	while($rs=mysqli_fetch_assoc($result)){
		?>
		<option value="<?php echo $rs["type_id"]; ?>"><?php echo $rs["roomtype"]; ?></option>
<?php
	}
?>	
</select><br><br>
<div style="float:left;"><b>Room No:</b></div><br>
<select id="roomno" name="rnumber" style="width: 100%; padding: 16px 20px; font-size: 100%; border: none; background: #f1f1f1; margin: 5px 0 22px 0;">
<option value="">select room </option>
</select>
<br><br>
<button class="btn" value="submit" onClick="display();">Submit</button>
</div>
</form>
</div>

</body>
</html>