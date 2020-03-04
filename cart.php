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
	top:370px;  
	left : 13px;
	text-align: center;
	height:60px;
	width:110px;
	padding :17px 2px 2px 2px ;
}
#b3
{
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
	top:1050px;  
	left : 13px;
	text-align: center;
	height:70px;
	width:150px;
	padding :6px 2px 2px 2px ;

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

#b3:hover
{
	border:2px solid #B2BABB  ;
	background-color: #07C850  ;
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
.valid
{
color:green;	
}
.invalid
{
	color:red;
}
#div1:hover{
	border : 4px solid #DCD7D7  ;
}

</style>
</head>
<body>
<?php
$host='localhost';
$user='root';
$pass='';
$conn = mysqli_connect($host,$user,$pass,'saffron') ;
$tErr=$qErr=$nErr=$oErr=$eErr=$aErr=$mErr=$sErr=$cErr=$pErr="";
$t=$q=$name=$o=$e=$a=$m=$s=$c=$p=$co="";
$dd1=0;
$d1=3000;
$d2=2500;
$d3=2000;
$d4=4500;
$q2;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if($_POST["quantity"]=="")
	{
		$qErr="Fill";
	}
	else
	{
		$q2=$q=$_POST["quantity"];
		$t=$_POST["type"];
		if($t=="d1")
		{
			$q= $q*$d1;
		}
		else if($t=="d2")
		{
		    	$q= $q*$d2;	
		}
		else if($t=="d3")
		{
		    	$q= $q*$d3;	
		}
		else{
		    	$q= $q*$d4;	
		}
		
	}
		
  if (empty($_POST["name"])) {
    $nErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	$dd1=$dd1+1;
  }
  if (empty($_POST["organisation"])) {
    $oErr = "Organisation name is required";
  } else {
    $o = test_input($_POST["organisation"]);
	$dd1=$dd1+1;
  }
  if (empty($_POST["email"])) {
    $eErr = "Email is required";
  }
  else {
    $e = test_input($_POST["email"]);
	 if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
	 $eErr = "Invalid email format"; }
	  else
	  {
		  $dd1=$dd1+1;
	  }
    }
if(is_numeric($_POST["mobile"]))
{  
    if (empty($_POST["mobile"])) {
    $mErr = "Mobile is required";
      } 
  else if(strlen($_POST["mobile"])<10 || strlen($_POST["mobile"])>10)
  {
	$mErr="Mobile Number is of 10 digits only";
  }
  else
  {    
    $m = $_POST["mobile"];
	$dd1=$dd1+1;
  }
}
else
{
  $mErr="Enter Digit Only";
}

    if(is_numeric($_POST["pincode"]))
	{
  if (empty($_POST["address"])) {
    $aErr = "Address is required";
  } else {
    $a= test_input($_POST["address"]);
	$dd1=$dd1+1;
  }
	}
	else
	{
		$pErr="Enter Digit Only";
	}
  if (empty($_POST["state"])) {
    $sErr = "State is required";
  } else {
    $s = $_POST["state"];
	$dd1=$dd1+1;
  }
  
  if (empty($_POST["city"])) {
    $cErr = "City is required";
  } else {
    $c = $_POST["city"];
	$dd1=$dd1+1;
  }
  if (empty($_POST["pincode"])) {
    $pErr = "Pincode is required";
  } 
  else if(strlen($_POST["pincode"])<6 || strlen($_POST["pincode"])>6)
  {
	$pErr="Pin code is of six digit only";
  }
  else
  {    
    $p = $_POST["pincode"];
	$dd1=$dd1+1;
  }

$co=$_POST["country"];
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($dd1==8)
{
	
if(!$conn)
{
	 die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO order1 (Id , type, quantity, price , name ,oname,email,mobile,address,country,state,city,pincode)
VALUES ('','".$t."','".$q2."','".$q."','".$name."','".$o."','".$e."','".$m."','".$a."','".$co."','".$s."','".$c."','".$p.	"')";

if (mysqli_query($conn, $sql)) {
    $last_id = $conn->insert_id;
    echo "<script type='text/javascript'>alert('Order is placed Successfuly Placed. Our Dealer will contact  you soon...') </script>";
	sleep(4);
	echo "<script>window.top.location='Shop.php'</script>";
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
<a id="ab" href="Contactus.php" ><u>Contact Us</u>	</a>
</div>
</div>

<div class="row" style="background-color:#F3EAE8;height:150px">
<h1 style="text-align:center;margin-left:40px;font-family:Georgia, serif;font-size:50px">Roco Saffron Shop</h1>
<font color="grey" style="position:absolute;left:470px;margin-left:70px">Order our Premium Quality Saffron Bulbs now!</font>
</div>
<div class="row">
<div class="col-sm-2">
</div>
<div id="div1"  class="col-sm-8" style="margin-top:3px;height:1200px;background-color:#F3EAE8">
<h1 style="text-align:center;margin-left:40px;font-family:Georgia, serif;font-size:30px">Enter Type And Quantity</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-top:3px" method="post">
<font style="font-family:Georgia, serif;">Select Type :</font>
<select name="type" style="height:30px;width:340px;border:1px solid #B2BABB  ;background-color:white">
  <option value="d1">d1</option>
  <option value="d2">d2</option>
  <option value="d3">d3</option>
  <option value="d4">d4</option>
</select>
<span class="invalid">*</span>
<font style="font-family:Georgia, serif;">Quantity :</font>
<input type="number" name="quantity" style="height:30px;width:340px;border:1px solid #B2BABB  ;background-color:white"/><span class="invalid">*</span>
<br><br>
<font style="font-family:Georgia, serif;">Total Price :<span class="invalid">*</span></font><br>
<input type="text" value="<?php echo $q;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>

<hr style="background-color:grey;color:grey;height:1px">

<h1 style="text-align:center;margin-left:50px;font-family:Georgia,serif;font-size:30px">Enter Address</h1>	
<font style="font-family:Georgia, serif;">Name :</font><span class="invalid">*<?php  echo $nErr;?></span><br>
<input type="text" name="name" value="<?php echo $name;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<br><br>
<font style="font-family:Georgia, serif;">Organisation Name :</font><span class="invalid">*<?php  echo $oErr;?></span><br>
<input type="text" name="organisation" value="<?php echo $o;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<br><br>

<font style="font-family:Georgia, serif;">Email :</font><span class="invalid">*<?php  echo $eErr;?></span><br>
<input type="text" name="email" value="<?php echo $e;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<br><br>
<font style="font-family:Georgia, serif;">Mobile :</font><span class="invalid">*<?php  echo $mErr;?></span><br>
<input type="text" name="mobile" value="<?php echo $m;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<br><br>

<font style="font-family:Georgia, serif;">Address :</font><span class="invalid">*<?php  echo $aErr;?></span><br>
<textarea type="text" name="address" rows="5" style="width:100%;border:1px solid #B2BABB  ;background-color:white">
<?php echo $a;?>
</textarea>
<br><br>
<br>
<font style="font-family:Georgia, serif;">Select Country :</font><span class="invalid">*</span><br>
<select name="country" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white">
  <option value="India">India</option>
  <option value="Pakistan">Pakistan</option>
  <option value="Bangladesh">Bangladesh</option>
  <option value="Singapore">Singapore</option>
</select>
<br><br>
<font style="font-family:Georgia, serif;">State:</font><span class="invalid">*<?php  echo $sErr;?></span><br>
<input type="text" name="state" value="<?php  echo $s;?>"style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<br><br>
<font style="font-family:Georgia, serif;">City :</font><span class="invalid">*<?php  echo $cErr;?></span><br>
<input type="text" name="city" value="<?php  echo $c;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<br><br>
<font style="font-family:Georgia, serif;">Pincode:</font><span class="invalid">*<?php  echo $pErr;?></span><br>
<input type="text" name="pincode" value="<?php  echo $p;?>" style="height:30px;width:100%;border:1px solid #B2BABB  ;background-color:white"/>
<h3>Payment Method is Only Cash on Delivery<span class="invalid">*</span>
</h3>
<br><br>
<input type="submit" id="b3"></input>
</form>
</div>
<div class="col-sm-2">
</div>
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
<font style="position:absolute;top:50px;left:100px" color="white"><h3 >Popular Topics :</h3></font>
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