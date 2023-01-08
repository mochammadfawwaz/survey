<?php
error_reporting(0);
session_start();
include "../../../koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus user
if ($module=='user' AND $act=='hapus'){
	mysql_query("DELETE FROM tuser WHERE userId = '$_GET[id]'");
	header('location:../../master.php?module=user');
}
// Update user
elseif ($module=='datauser' AND $act=='update'){
	$nama 			= $_POST['nama'];
	$company 		= $_POST['company'];
	$position 		= $_POST['position'];
	$no_telephone 	= $_POST['no_telephone'];
	$gender 		= $_POST['gender'];
	$id 			= $_POST['id'];

	$aksi = mysql_query("UPDATE tuser SET 	fullname	= '$nama',
									company		= '$company',
									position 	= '$position',
									no_telephone = '$no_telephone',
									gender 		= '$gender' WHERE userId = '$id'");
	if($aksi) {
		header('location:../../master.php?module=datauser');
	} else {
		echo "gagal".$nama.$company.$position.$no_telephone.$gender;
	}
}


?>
