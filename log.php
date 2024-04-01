<?php
session_start();
include("conn.php");

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pwd = $_POST['pass'];
	$usertype = $_POST['utype'];
	$sql = "SELECT * FROM users WHERE email='$email' && psw='$pwd' && utype='$usertype' ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sss", $email, $pwd, $usertype);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	session_regenerate_id();
	$_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $row['utype'];
	$_SESSION['status'] = "true";
	session_write_close();

	if ($result->num_rows == 1 && $_SESSION['role'] == "agent") {
		header("location:admindashboard.php");
	} else if ($result->num_rows == 1 && $_SESSION['role'] == "customer") {
		header("location:index.php");
	} else {

		echo '<script> alert("OOPS !!, Your credentials does not match.");</script>';
	}
}
?>

<html>

<head>
	<style>
		* {
			box-sizing: border-box;
			font-size: 18px;
			margin: 0;
			padding: 0;
		}

		body {
			background: url("./images/rbg.jpg") center no-repeat;
			background-size: cover;
			color: #333;
		
			font-family: 'Open Sans', sans-serif;
		}

		.container {
			border-radius: 0.5em;
			box-shadow: 0 0 1em 0 rgba(51, 51, 51, 0.25);
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

		.container:before {
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

		.container:after {
			background: rgba(255, 255, 255, 0.6);
			content: '';
			display: block;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			z-index: -1;
			width: 100%;
		}

		form button.submit {
			background: rgba(255, 255, 255, 0.25);
			border: 1px solid #333;
			line-height: 1em;
			padding: 0.5em 0.5em;
			-webkit-transition: all 0.25s;
			transition: all 0.25s;
		}

		form button:hover,
		form button:focus,
		form button:active,
		form button.loading {
			background: #333;
			color: #fff;
			outline: none;
		}

		form button.success {
			background: #27ae60;
			border-color: #27ae60;
			color: #fff;
		}

		@-webkit-keyframes spin {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}

		@keyframes spin {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}

		form button span.loading-spinner {
			-webkit-animation: spin 0.5s linear infinite;
			animation: spin 0.5s linear infinite;
			border: 2px solid #fff;
			border-top-color: transparent;
			border-radius: 50%;
			display: inline-block;
			height: 1em;
			width: 1em;
		}

		form label {
			border-bottom: 1px solid #333;
			display: block;
			font-size: 1.25em;
			margin-bottom: 0.5em;
			-webkit-transition: all 0.25s;
			transition: all 0.25s;
		}

		form label.col-one-half {
			float: left;
			width: 50%;
		}

		form label.col-one-half:nth-of-type(even) {
			border-left: 1px solid #333;
			padding-left: 0.25em;
		}

		form label input {
			background: none;
			border: none;
			line-height: 1em;
			font-weight: 300;
			padding: 0.125em 0.25em;
			width: 100%;
		}

		form label input:focus {
			outline: none;
		}

		form label input:-webkit-autofill {
			background-color: transparent !important;
		}

		form label span.label-text {
			display: block;
			font-size: 0.6em;
			font-weight: bold;
			padding-left: 0.5em;
			text-transform: uppercase;
			-webkit-transition: all 0.25s;
			transition: all 0.25s;
		}

		form label.checkbox {
			border-bottom: 0;
			text-align: center;
		}

		form label.checkbox input {
			display: none;
		}

		form label.checkbox span {
			font-size: 0.5em;
		}

		form label.checkbox span:before {
			content: '\e157';
			display: inline-block;
			font-family: 'Open Sans', sans-serif;
			font-size: 1.125em;
			padding-right: 0.25em;
			position: relative;
			top: 1px;
		}

		form label.checkbox input:checked+span:before {
			content: '\e067';
		}

		form label.invalid {
			border-color: #c0392b !important;
		}

		form label.invalid span.label-text {
			color: #c0392b;
		}

		form label.password {
			position: relative;
		}

		form label.password button.toggle-visibility {
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
		form label.password button.toggle-visibility:active {
			color: #000;
			outline: none;
		}

		form label.password button.toggle-visibility span {
			vertical-align: middle;
		}

		h1 {
			font-size: 3em;
			margin: 0 0 0.5em 0;
			text-align: center;
			font-family: 'Cookie', cursive;
		}

		h1 img {
			height: auto;
			margin: 0 auto;
			max-width: 240px;
			width: 100%;
		}

		html {
			font-size: 18px;
			height: 100%;
		}

		.text-center {
			text-align: center;
		}

		.utype {
			margin-top: 20px;
			border-radius: 6px;

			background: none;
			margin-left: 50px;
		}
	</style>

</head>

<body>

	<div class="container">
		<header>

		</header>
		<h1 class="text-center">Log in</h1>
		<form class="registration-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

			<label>
				<span class="label-text">Email</span>
				<input type="text" name="email">
			</label>
			<label class="password">
				<span class="label-text">Password</span>
				<input type="password" name="pass">
			</label>
			<span class="label-text">User Type</span>
			<select class="utype" name="utype">
				<option value="agent">Agent </option>
				<option value="customer">Customer </option>
			</select> <br> <br> <br>

			<div class="text-center">
				<button style="border-radius:8px;" class="submit" name="submit">Log In</button>

			</div>
		</form>
	</div>
</body>

</html>