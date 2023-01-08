<?php
error_reporting(1);
include "../koneksi.php";

    $pass = md5($_POST['password']);
    $username = $_POST['username'];

	$aksi =mysql_query("INSERT INTO tuser(username,
								   password,
                                   level)
							VALUES('$username',
								   '$pass',
                                   'User')");
	
	if($aksi)
	{
	header('location:../index.php');
	}
	else {echo "gagal".$username.$pass;}


