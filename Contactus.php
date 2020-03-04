<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#ab:link, #ab:visited {
    background-color: #C52D36 ;
    color: white;
    padding: 14px 25px;
    text-align: center; 
    margin-top:15px;
    display: inline-block;
    font-size:16px;
	font-family:"Arial Black", Gadget, sans-serif;
}

#ab:hover, #ab:active {
    background-color:;
	text-decoration:none;
}
u
{
	   padding-bottom:28px;
	 text-decoration: none;
}
u:hover
{
    border-bottom-width:large;
	border-bottom:10px solid #D6545C  ;
}
#b1 {
    background-color: #8CDD44    ; 
    border: none;
    color: white;
    text-align:center;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	position:absolute; 
	top:320px;  
	left : 20px;
	text-align: center;
	height:60px;
	width:110px;
}
#b1:hover
{
	background-color : #89C454  ;
}
#b2
{
	background-color:transparent;
	  border: 2px solid white;
    color: white;
  text-align:center;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	position:absolute; 
	left :50px;
	top :320px;
	text-align: center;
	margin-left:100px;
	height:60px;
	width:230px;
}
#b2:hover
{
	border:2px solid #B2BABB  ;
}
#id1:hover{
	opacity : 0.5;
}
#id2:hover
{
	display : block;
}
.invalid{
	color : red;
}
.valid
{
	color : green;
}
</style>
</head>
<body>
<?php
$host='localhost';
$user='root';
$pass='';
	$conn = mysqli_connect($host,$user,$pass,'saffron') ;

$nameErr = $emailErr = $subErr = $messageErr = "";
$name = $email = $message = $subject="";
$d=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	$d=$d+1;
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
  else {
    $email = test_input($_POST["email"]);
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $emailErr = "Invalid email format"; }
	  else
	  {
		  $d=$d+1;
	  }
    }
  
    
  if (empty($_POST["subject"])) {
    $subErr = "Subject is required";
  } else {
    $subject= test_input($_POST["subject"]);
	$d=$d+1;
  }

  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = $_POST["message"];
	$d=$d+1;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($d==4)
{
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO contactus (id , name, email, subject , message)
VALUES ('','".$name."','".$email."','".$subject."','".$message."')";

if (mysqli_query($conn, $sql)) {
     echo "<script type='text/javascript'>alert('Submitted successfully  Will Revert To You soon...')</script>";
	sleep(2);
	echo "<script>window.top.location='Contactus.php'</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<div class="container-fluid">
<div class="row" >
<div class="col-sm-12" style="height:60px;background-color:#3E3E42   ">
<div class="col-sm-3" style="height:60px;" >
<img src="1st.png"></img>
<a href="#"><font style="font-family:Georgia, serif;color:white">Shop Now for US</font></a>
</div>
<div class="col-sm-3" >
<img src="2nd.png"></img>
<a href="#"><font style="font-family:Georgia, serif;color:white">Shop Now For EU countries</font></a>
</div>
<div class="col-sm-3" >
<font style="position:absolute;top:20px;font-family:Georgia, serif;color:white">&#x260F;+31 6162 46 981</font>
</div>
<div class="col-sm-3" >
<a href="#"><font style="position:absolute;top:20px;font-family:Georgia, serif;color:white">Whole Sale Saffron bulbs(Roco Sativus)</font></a>

</div>
</div>
</div>
<div class="row" style="box-shadow: 2px 2px #AFAFAF  ;">
<div class="col-sm-4" style="height:90px;background-image: url('i1.png');background-repeat: no-repeat;background-position:center center">
</div>
<div class="col-sm-8" style="height:90px;background-color:#C52D36  ">
<a id="ab" href="Home.php" ><u>Home</u></a>
<a id="ab" href="Aboutus.php" ><u>About Us</u></a>
<a id="ab" href="Ourquality.php" ><u>Our Quality</u></a>
<a id="ab" href="Shop.php" ><u>Shop</u></a>
<a id="ab" href="Blog.php" ><u>The Saffron Blog</u></a>
<a id="ab" href="Contactus.php" checked><u>Contact Us</u>	</a>
</div>
</div>
<div class="row" style="background-color:#F3EAE8;height:150px">
<h1 style="margin-left:70px;font-family:Georgia, serif;font-size:50px">Contact Us</h1>

<font color="grey" style="margin-left:70px">Please contact Roco Saffron for additional information on Saffron and Wholesale Saffron bulbs (Crocus Sativus)</font>
</div>
<div class="row" style="margin-top: 20px;background-color:#FCFBFB ">
<div class="col-sm-1">
</div>
<div class="col-sm-4" style="border:3px solid lightgrey;">
<img src="a1.jpg" style="margin-left:37px;margin-top:30px" height="220px" width="320px"></img><br>
<img src="a3.jpg" height="220px" style="margin-left:37px;margin-top:30px" width="320px"></img><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Feel free to ask any questions regarding </font><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Roco Saffron, Saffron or wholesale Saffron</font>
<br> <font style="margin-left:37px;font-family:Georgia, serif;color:grey">bulbs (Crocus Sativus).</font><br><br>

<font style="margin-left:37px;font-family:Georgia, serif;color:grey">We speak Dutch, English, Spanish, German, </font>
<br><font style="margin-left:37px;font-family:Georgia, serif;color:grey">and a bit of Italian.</font>
<br><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Contact Hans Rotteveel directly by phone,</font>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey"> <br>WhatsApp or e-mail:</font><br>
<font style="font-size:30px;margin-left:37px;font-family:Georgia, serif;" color="#8CDD44">
 <i class="fa fa-whatsapp" style="font-size:36px"></i>
 +31 616246981
 </font>
 <br>
<font style="font-size:30px;margin-left:37px;font-family:Georgia, serif;" color="#8CDD44">
&#9743;
 +31 616246981
 </font>
 <br>
 <font style="margin-left:37px;font-family:Georgia, serif;color:grey">You can also contact our professional local </font>
 <br><font style="margin-left:37px;font-family:Georgia, serif;color:grey">agent in your country:</font>
<br><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Bulgaria</font><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Elena Nedyalkova</font><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">elena@rocosaffron.com</font><br>
 <font style="margin-left:37px;font-family:Georgia, serif;color:grey">&#9743;+359 885 20 48 96</font><br>
<br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Canada</font><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">Micheline Sylvestre</font><br>
<font style="margin-left:37px;font-family:Georgia, serif;color:grey">micheline.sylvestre@emporium-safran.com</font><br>
 <font style="margin-left:37px;font-family:Georgia, serif;color:grey">&#9743;450-835-0780</font><br><br>
 </div>
<div class="col-sm-7">
<font color="grey" style="font-family:Georgia, serif;">Feel free to ask any questions regarding Saffron Bulbs over the phone, WhattsApp, or get in touch via our contact form below. Your message will be dispatched directly to our staff who will answer as soon as they can.
<br><br>
We speak Dutch, English, Spanish, German, and a bit of Italian.</font>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
<font color="grey">Your Name&nbsp;</font><span class="invalid">*<?php echo $nameErr;?></span><br>
<br><input type="text" name="name" value="<?php echo $name;?>" style="width:750px;height:40px;border: 2px solid lightgrey;background-color:#F3EAE8"/>
<br><br>
<font color="grey">Your Email&nbsp;</font><span class="invalid">* <?php echo $emailErr;?></span><br>
<br>
<input type="text" name="email" value="<?php echo $email;?>" style="width:750px;height:40px;border: 2px solid lightgrey;background-color:#F3EAE8"/>
<br><br>
<font color="grey">Subject&nbsp; </font><span class="invalid">*<?php echo $subErr;?></span><br>
<br>
<input type="text" name="subject" value="<?php echo $subject;?>" style="width:750px;height:40px;border: 2px solid lightgrey;background-color:#F3EAE8"/>
<br><br>
<font color="grey">Message &nbsp;</font><span class="invalid">*<?php echo $messageErr;?></span><br>
<br>
<textarea type="text" name="message"  rows="10" cols="104px" style="border: 2px solid lightgrey;background-color:#F3EAE8">
<?php echo $message;?></textarea>
<br>
<input type="submit" value="SUBMIT" style="color:black;text-align:center;height:40px;width:120px;border:1px solid #8CDD44 ;background-color:#8CDD44"/>
</form>
</div>
</div>
<div class="row" style="margin-top:7px;background-color:#FAEAE7">
<h2 style="text-align:center;font-family:Georgia, serif;font-size:50px"> <font color="#8CDD44 ">Our Location</font></h2>
<br><font color="grey" style="margin-left:395px;font-family:Georgia, serif">Roco Saffron is located right in the center of Holland's world famous flower bulb district.</font>
<iframe style="margin-top:4px;margin-left:5px" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3410.799932356943!2d75.70530476507564!3d31.253961337312866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1523523884504" width="1340" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="row" style="margin-top:5px;height:400px;background-color:#0C0C0C">
<div class="col-sm-3">
<font style="position:absolute;top:50px;left:130px" color="white"><h3 >Jump To :</h3></font>
<div style="position:absolute;top:130px;left:130px">
 &rarr; <a href="Home.php"><font color="white">Home</font></a>
 <br><br>
  &rarr; <a href="Aboutus.php"><font color="white">About Us</font></a>
<br> <br>
 &rarr; <a href="#"><font color="white">Our Quality</font></a>
  <br><br>
  &rarr; <a href="Contactus.php"><font color="white">Contact Us</font></a>
 </div>
 </div>
<div class="col-sm-3">
<font style="position:absolute;top:50px;left:130px" color="white"><h3 >The Saffron Blog:</h3></font>

<div style="position:absolute;top:130px;left:130px">
<img src="last1.jpg" height="30px" width="30px"></img>&nbsp;&nbsp;<a href="#" style="text-decoration:none"><font size="2px" color="red">Growing Saffron in Southern<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hemisphere Markets</font></a>
<br><br>
<img src="last2.png" height="30px" width="30px"></img>&nbsp;&nbsp;<a href="#" style="text-decoration:none"><font size="2px" color="red">Bulb Size of Crocus Sativus <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;versus Saffron yield</font></a>
<br><br>
<img src="last3.png" height="30px" width="30px"></img>&nbsp;&nbsp;<a href="#" style="text-decoration:none"><font size="2px" color="red">Growing Saffron in Southern<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hemisphere Markets</font></a>
<br><br>

<img src="last4.png" height="30px" width="30px"></img>&nbsp;&nbsp;<a href="#" style="text-decoration:none"><font size="2px" color="red">Growing Saffron in Southern<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hemisphere Markets</font></a>
</div>
</div>
<div class="col-sm-3">
<font style="position:absolute;top:50px;left:130px" color="white"><h3 >Popular Topics :</h3></font>
<div style="position:absolute;top:130px;left:130px">
<a href="#" id="a1" style="padding:10px 10px 10px 10px;text-decoration:none;border:1px solid black"><font color="#C6C5C5">Crocus Sativus</font></a>
<br><br><a href="#" id="a1" style="padding:10px 10px 10px 10px;text-decoration:none;border:1px solid black"><font color="#C6C5C5">Maximise Saffron Harvest</font></a>
<br><br><a href="#" id="a1" style="padding:10px 10px 10px 10px;text-decoration:none;border:1px solid black"><font color="#C6C5C5">Reproduction Saffron Bulbs</font></a>
<br><br><a href="#" id="a1" style="padding:10px 10px 10px 10px;text-decoration:none;border:1px solid black"><font color="#C6C5C5">Saffron Bulbs</font></a>
</div>
</div>
<div class="col-sm-3">
<font style="position:absolute;top:50px;left:100px" color="white"><h3 >Catagories :</h3></font>
<div style="position:absolute;top:130px;left:100px">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="www.facebook.com"><i class="fa fa-facebook-official" style="font-size:24px"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="www.youtube.com"><i class="fa fa-youtube-play" style="font-size:24px"></i></a>

</div>
</div>

</div>

<div class="row" style="height:50px;background-color:black">
<div class="col-sm-3">
<font style="position:absolute;top:20px;left:50px">©2018 - Roco Saffron</font>
</div>
<div class="col-sm-1">
</div>
<div class="col-sm-4">
<div style="position:absolute;top:20px;left:170px">
<img src="h1.png" height="20px" width="20px"></img>
<img src="h2.png" height="20px" width="20px"></img>
<img src="h3.jpg" height="20px" width="20px"></img>
</div>
<font style="position:absolute;top:20px;left:100px">Pay With</font>



</div>

<div class="col-sm-1">

</div>
<div class="col-sm-3">
<font style="position:absolute;top:20px">Wholesale Saffron Bulbs (Crocus Sativus)</font>
</div>
</div>
</body>
</html>
