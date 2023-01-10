<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
error_reporting(0);
include "../../../koneksi.php";
include "../../../fungsi/fungsi_indotgl.php";

$companyName	= $_POST['name'];
$companyProduct = $_POST['gender'];
$companyAddress	= $_POST['company'];
$companyPF   	= $_POST['position'];
$suggestion		= $_POST['no_telephone'];
$date			= date('Y-m-d');
$companyId = date('Ymd his');

$no_hitung = 1;
$sql_hitung = mysql_query("SELECT * FROM tgroup");
$data_hitung2 = mysql_num_rows($sql_hitung);
while ($data_hitung = mysql_fetch_array($sql_hitung)) {
	$id_hitung = $data_hitung[groupId];
	$hasil_hitung = mysql_query("SELECT * FROM tdescription, tgroup WHERE tdescription.groupId = '$id_hitung' AND tdescription.groupId = tgroup.groupId ORDER BY tgroup.groupId");
	$i_hitung = 1;
	while ($r_hitung = mysql_fetch_array($hasil_hitung)) {
		$id_hitung = $data_hitung[groupId];
		$asfa_hitung = $_POST['asfa' . $i_hitung . $id_hitung];
		if (empty($asfa_hitung)) {
			echo "<script lang=javascript>
		 		window.alert('Anda belum mengisi kuisioner atau ada kuisioner yang belum terisi..!');
		 		history.back();
		 		</script>";
			exit;
		}

		$i_hitung++;
	}
	echo "<br>";
	$no_hitung++;
}


if (empty($companyName)) {
	echo $data_hitung2;
	exit;
} else {

	$no = 1;
	$sql = mysql_query("SELECT * FROM tgroup");
	mysql_query("INSERT INTO tcompany(companyId,companyName,companyAddress,companyPhoneHP,dateSurvey,suggestion,product)
	VALUES('$companyId','$companyName','$companyAddress','$companyPF','$date','$suggestion','$companyProduct')");
	while ($data = mysql_fetch_array($sql)) {
		$id = $data[groupId];
		$hasil = mysql_query("SELECT * FROM tdescription, tgroup WHERE tdescription.groupId = '$id' AND tdescription.groupId = tgroup.groupId ORDER BY tgroup.groupId");
		$i = 1;
		while ($r = mysql_fetch_array($hasil)) {
			$id = $data[groupId];
			$asfa = $_POST['asfa' . $i . $id];
			// echo "$i $asfa<br>";
			if ($asfa == 'A') {
				mysql_query("INSERT INTO tanswer (descriptionId,groupId,companyId,jawaban,jawabanA,jawabanB,jawabanC,jawabanD,jawabanE) 
				VALUES('$r[descriptionId]','$r[groupId]','$companyId','$asfa','1','0','0','0','0')");
			} elseif ($asfa == 'B') {
				mysql_query("INSERT INTO tanswer (descriptionId,groupId,companyId,jawaban,jawabanA,jawabanB,jawabanC,jawabanD,jawabanE) 
				VALUES('$r[descriptionId]','$r[groupId]','$companyId','$asfa','0','1','0','0','0')");
			} elseif ($asfa == 'C') {
				mysql_query("INSERT INTO tanswer (descriptionId,groupId,companyId,jawaban,jawabanA,jawabanB,jawabanC,jawabanD,jawabanE) 
				VALUES('$r[descriptionId]','$r[groupId]','$companyId','$asfa','0','0','1','0','0')");
			} elseif ($asfa == 'D') {
				mysql_query("INSERT INTO tanswer (descriptionId,groupId,companyId,jawaban,jawabanA,jawabanB,jawabanC,jawabanD,jawabanE) 
				VALUES('$r[descriptionId]','$r[groupId]','$companyId','$asfa','0','0','0','1','0')");
			} elseif ($asfa == 'E') {
				mysql_query("INSERT INTO tanswer (descriptionId,groupId,companyId,jawaban,jawabanA,jawabanB,jawabanC,jawabanD,jawabanE) 
				VALUES('$r[descriptionId]','$r[groupId]','$companyId','$asfa','0','0','0','0','1')");
			} else {
				mysql_query("INSERT INTO tanswer (descriptionId,groupId,companyId,jawaban,jawabanA,jawabanB,jawabanC,jawabanD,jawabanE) 
				VALUES('$r[descriptionId]','$r[groupId]','$companyId','$asfa','0','0','0','0','0')");
			}
			$i++;
		}
		echo "<br>";
		$no++;
	}

	echo "<center><font face='Tahoma' size='2'>
			Terima kasih atas waktu yang telah diluangkan untuk melengkapi kuisioner yang kami sediakan. <br>
			<a href='../../master.php?module=kuisioner'>
			<button  class='btn btn-lg btn-info'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			</center>";
}

?>