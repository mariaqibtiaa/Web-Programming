<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "maragocakee";
	
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");
	