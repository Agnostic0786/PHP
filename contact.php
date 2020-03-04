<?php
$host='localhost';
$user='root';
$pass='';
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];
$conn = mysqli_connect($host,$user,$pass,'saffron') ;
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO contactus (id , name, email, subject , message)
VALUES ('','".$name."','".$email."','".$subject."','".$message."')";

if (mysqli_query($conn, $sql)) {
     echo "<script type='text/javascript'>alert('Submitted successfully  Will Revert To You soon...')</script>";
	echo "<script>window.top.location='Contactus.php'</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>