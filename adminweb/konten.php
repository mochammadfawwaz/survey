<?php
include "../koneksi.php";
include "../fungsi/fungsi_indotgl.php";
include "../fungsi/class_paging.php";

$module = $_GET['module'];

if ($module == 'group') {
	include "modul/mod_group/group.php";
} elseif ($module == 'datauser') {
	include "modul/mod_datauser/datauser.php";
} elseif ($module == 'kuisioner') {
	include "modul/mod_kuisioner/kuisioner.php";
} elseif ($module == 'description') {
	include "modul/mod_deskripsi/deskripsi.php";
} elseif ($module == 'hasil') {
	include "modul/mod_report/hasil.php";
} elseif ($module == 'grafik') {
	include "modul/mod_report/grafik.php";
} elseif ($module == 'user') {
	include "modul/mod_user/user.php";
} else {
	include "modul/mod_home/home.php";
}
