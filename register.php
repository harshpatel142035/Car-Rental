<?php
include("conn.php");

if(isset($_POST['submit']))
{
	error_reporting(E_ALL ^ E_NOTICE);
	$email = $_POST['email'];
	error_reporting(E_ALL ^ E_NOTICE);
	$utype = "agent";
	error_reporting(E_ALL ^ E_NOTICE);
	$psw = $_POST['psw'];
	error_reporting(E_ALL ^ E_NOTICE);
	$psw1 = $_POST['psw1'];
	error_reporting(E_ALL ^ E_NOTICE);
	$pno = $_POST['pno'];

	$query = "INSERT INTO `users` (`email`, `utype`, `psw`, `psw1`, `pno`) VALUES ( '$email', '$utype', '$psw', '$psw1', '$pno')";
	if(mysqli_query($conn,$query))
	{
		echo '<script> alert("Your account has been created successfully You can login now!"); </script>';
	}else
	{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <style>

*{
	box-sizing: border-box;
	font-size: 18px;
	margin: 0;
	padding: 0;
}
body{
	background: url("./images/rbg.jpg") center no-repeat;
	background-size: cover;
	color: #333;
	font-size: 18px;
	font-family: 'Open Sans', sans-serif;
}
.container{
	border-radius: 0.5em;
	box-shadow: 0 0 1em 0 rgba(51,51,51,0.25);
	display: block;
	max-width: 480px;
	overflow: hidden;
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	padding: 2em;
	position: absolute;
		top: 50%;
		left: 50%;
		z-index: 1;
	width: 98%;
}
.container:before{
	background: url('http://tfgms.com/sandbox/dailyui/bg-1.jpg') center no-repeat;
	background-size: cover;
	content: '';
	-webkit-filter: blur(10px);
	filter: blur(10px);
	height: 100vh;
	position: absolute;
		top: 50%;
		left: 50%;
		z-index: -1;
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	width: 100vw;
}
.container:after{
	background: rgba(255,255,255,0.6);
	content: '';
	display: block;
	height: 100%;
	position: absolute;
		top: 0;
		left: 0;
		z-index: -1;
	width: 100%;
}
form button.submit{
	background: rgba(255,255,255,0.25);
	border: 1px solid #333;
	line-height: 1em;
	padding: 0.5em 0.5em;
	-webkit-transition: all 0.25s;
	transition: all 0.25s;
}
form button:hover,
form button:focus,
form button:active,
form button.loading{
	background: #333;
	color: #fff;
	outline: none;
}
form button.success{
	background: #27ae60;
	border-color: #27ae60; 
	color: #fff;
}
@-webkit-keyframes spin{
	from{ transform: rotate(0deg); }
	to{ transform: rotate(360deg); }
}
@keyframes spin{
	from{ transform: rotate(0deg); }
	to{ transform: rotate(360deg); }
}
form button span.loading-spinner{
	-webkit-animation: spin 0.5s linear infinite;
	animation: spin 0.5s linear infinite;
	border: 2px solid #fff;
	border-top-color: transparent;
	border-radius: 50%;
	display: inline-block;
	height: 1em;
	width: 1em;
}

form label{
	border-bottom: 1px solid #333;
	display: block;
	font-size: 1.25em;
	margin-bottom: 0.5em;
	-webkit-transition: all 0.25s;
	transition: all 0.25s;
}
form label.col-one-half{
	float: left;
	width: 50%;
}
form label.col-one-half:nth-of-type(even){
	border-left: 1px solid #333;
	padding-left: 0.25em;
}
form label input{
	background: none;
	border: none;
	line-height: 1em;
	font-weight: 300;
	padding: 0.125em 0.25em;
	width: 100%;
    
}
form label input:focus{
	outline: none;
}
form label input:-webkit-autofill{
	background-color: transparent !important;
}
form label span.label-text{
	display: block;
	font-size: 0.6em;
	font-weight: bold;
	padding-left: 0.5em;
	text-transform: uppercase;
	-webkit-transition: all 0.25s;
	transition: all 0.25s;
}
form label.checkbox{
	border-bottom: 0;
	text-align: center;
}
form label.checkbox input{
	display: none;
}
form label.checkbox span{
	font-size: 0.5em;
}
form label.checkbox span:before{
	content: '\e157';
	display: inline-block;
	font-family: 'Open Sans', sans-serif;
	font-size: 1.125em;
	padding-right: 0.25em;
	position: relative;
		top: 1px;
}
form label.checkbox input:checked + span:before{content: '\e067';}
form label.invalid{border-color: #c0392b !important;}
form label.invalid span.label-text{color: #c0392b;}
form label.password{position: relative;}
form label.password button.toggle-visibility{
	background: none;
	border: none;
	cursor: pointer;
	font-size: 0.75em;
	line-height: 1em;
	position: absolute;
		top: 50%;
		right: 0.5em;
	text-align: center;
	-webkit-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	transform: translateY(-50%);
	-webkit-transition: all 0.25s;
	transition: all 0.25s;
}
form label.password button.toggle-visibility:hover,
form label.password button.toggle-visibility:focus,
form label.password button.toggle-visibility:active{
	color: #000;
	outline: none;
}
form label.password button.toggle-visibility span{vertical-align: middle;}

h1{
	font-size: 3em;
	margin: 0 0 0.5em 0;
	text-align: center;
	font-family: 'Cookie', cursive;
}
h1 img{
	height: auto;
	margin: 0 auto;
	max-width: 240px;
	width: 100%;
}
html{
	font-size: 18px;
	height: 100%;
}

.text-center{
	text-align: center;
    
}
.text-cente{
    font-size: 40px;
   
}

        </style>

    </head>
    <body>
   
    <div class="container">
	<header>
		<h1>
			
		</h1>
	</header>
	<h1 class="text-cente">Agent Sign Up</h1> <br> <br>
	<form class="registration-form" method="post">
	
		<label>
			<span class="label-text">Email</span>
			<input type="text" name="email">
		</label>
		<label class="password">
			<span class="label-text">Password</span>
			<input type="password" name="psw">
		</label>
        <label class="password">
			<span class="label-text"> Confirm Password</span>
			<input type="password" name="psw1">
		</label>
        <label>
			<span class="label-text">Phone </span>
			<input type="text" name="pno">
		</label>
		
		<div class="text-center">
			<button class="submit" style="border-radius:8px;"  name="submit">Sign Up</button> <br> <br>
			<P> Already Signed Up? <a href="log.php"> Log In Now</a> </p>
		</div>
	</form>
</div>
    </body>
</html>