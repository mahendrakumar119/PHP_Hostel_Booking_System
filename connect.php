<?php
session_start();
?>
<?php
$host="localhost:3310";
$user="root";
$password="";
$db_name="hostel database";

// Create connection
$db_handle = new mysqli($host, $user, $password, $db_name);

if (isset($_POST['register'])){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$rollno=$_POST['rollno'];
$email=$_POST['email'];
$pass=$_POST['password'];
$gender=$_POST['gender'];
$mobilenumber=$_POST['mobilenumber'];
$year=$_POST['year'];
$reg_date=$_POST['reg_date'];




// Check connection
if ($db_handle->connect_error) {
    die("Connection failed: " . $db_handle->connect_error);
} 

$pass=md5($pass);

$sql = "INSERT INTO student VALUES ('$firstname', '$lastname', '$rollno', '$email','$pass', '$gender', '$mobilenumber', '$year','$reg_date')";

if ($db_handle->query($sql) === TRUE) {
	$_SESSION['register']=$rollno;
    echo "New record created successfully";
	header('location: book.php');	
} else {
    echo "Error: " . $sql . "<br>" . $db_handle->error;
}
include "classes/class.phpmailer.php"; // include the class name
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP();         // enable SMTP
            $mail->SMTPDebug = 1;    // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true;  // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587  465
            $mail->IsHTML(true);
            $mail->Username = "chaudhary12mahendra@gmail.com";
            $mail->Password = "MahendraSsc@2015";
            $mail->SetFrom("chaudhary12mahendra@gmail.com");
            $mail->Subject = "Hostel Allocaton Details";
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
			
			
			
			
			$query="SELECT * FROM student WHERE student.rollno='$rollno'";
			$result=mysqli_query($db_handle,$query);
			
			
			while($rows=mysqli_fetch_assoc($result))
			{
			
			
			$body = "Name : ".$rows['firstname'].$rows['lastname']."\n";
			$body.="roll : ".$rows['rollno'];
			}
            $mail->Body = $body;
			$query="SELECT email FROM `student` WHERE rollno='$rollno'";
            $result=mysqli_query($db_handle,$query);
			$row=$result->fetch_assoc();			
            $Email=$row['email'];
            $mail->AddAddress("$Email") ;
                                                        
                    
                       if(!$mail->Send())
                         {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                         }
                         else
                        {
                            echo"<h1><center>Mail Sent </h1></center>"; 
                        }
}
else{
}
$db_handle->close();
?>