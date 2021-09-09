<?php

	include_once("function/koneksi.php");
	include_once("function/helper.php");
	
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$captcha = $_POST['captcha'];
	
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");
	
	if(mysqli_num_rows($query) == 0){
		header("location:". BASE_URL . "index.php?page=login&notif=true");
	}else{
	
		$row = mysqli_fetch_assoc($query);
		
		session_start();
		
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		
		if(isset($_SESSION["proses_pesanan"])){
			unset($_SESSION["proses_pesanan"]);
			header("location: ".BASE_URL."data-pemesan.html");
		}else{
			header("location: ".BASE_URL."index.php");
		}

		if($_SESSION['captcha'] == $captcha){
				echo "<center><label class='text-success'>Login successfully</label></center>";
			}else{
				echo "<center><label class='text-danger'>Invalid captcha!</label></center>";
			}
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	}