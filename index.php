<?php 
session_start();
include 'config/konek.php';
if (isset($_POST['login'])) { 		
	$pass = $_POST['password'];
	$username = $_POST['username']; 	
	$sql = mysqli_query($con, "SELECT * FROM login WHERE username = '$username' && password = '$pass'"); 
	$cek = mysqli_num_rows($sql);
	$f = mysqli_fetch_array($sql);  
	if($cek > 0){ 
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $f['nama'];
		echo "<script>alert('Selamat Datang $username');document.location.href='Dashboard'</script>";
	}else{
		echo "<script>alert('Username Atau Password Salah')</script>";
	}
}

 ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>SuperVisor | Login</title>
	<link rel="stylesheet" href="Css/css.css">
</head>
<body>
	<div class="form">
		<form class="form-login" method="post">
			<div class="banner">
				<h2>FROM LOGIN</h2>
			</div>
			<div class="input-box">
				<input type="text" name="username" placeholder="Username" required>
			</div>
			<div class="input-box">
				<input type="password" name="password" placeholder="Password" required>
			</div>
			<div class="input-box login">
				<input type="submit" name="login" value="LOGIN">
			</div>
		</form>
	</div>
</body>
</html>