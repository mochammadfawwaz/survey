<script language="javascript">
	function validasi(form) {
		if (form.username.value == "") {
			alert("Anda belum mengisikan username.");
			form.username.focus();
			return (false);
		}

		if (form.password.value == "") {
			alert("Anda belum mengisikan password.");
			form.password.focus();
			return (false);
		}

		if (form.nama.value == "") {
			alert("Anda belum mengisikan Nama Lengkap.");
			form.nama.focus();
			return (false);
		}
	}
</script>
<?php
if ($_SESSION[level] == 'Super' || $_SESSION[level] == 'User') {
	$aksi = "modul/mod_user/aksi_user.php";
	switch ($_GET[act]) {
			// Tampil User
		default:
?>

			<div class="row">
				<div class="panel-body">
					<form method='POST' action='modul/mod_kuisioner/aksi_kuisioner.php' onSubmit=\"return validasisurvey(this)\">
						<script language="javascript">
							function validasisurvey(form) {
								if (form.companyName.value == "") {
									alert("Anda belum mengisikan nama Anda.");
									form.companyName.focus();
									return (false);
								}
								if (form.companyAddress1.value == "") {
									alert("Anda belum mengisikan alamat Anda.");
									form.companyAddress1.focus();
									return (false);
								}
							}
						</script>
						<table class="table">
							<?php
							$edit = mysql_query("SELECT * FROM tuser WHERE userId='$_SESSION[userId]'");
							$r = mysql_fetch_array($edit);
							?>
							<tr>
								<td>
									<div class="form-horizontal" style="margin-top:20px;background-color:#fff;padding-top:20px;padding-bottom:20px;">
										<div class="page-header" style="margin-left:30px;">
											<h3>Informasi Pelanggan</h3>
										</div>
										<div class="form-group">
											<label for="nama_pelanggan" class="control-label col-sm-2">Nama Lengkap</label>
											<div class="col-sm-3">
												<div class="input-group">
													<input type="text" id="nama_pelanggan" class="form-control" name="name" value="<?= $r[fullname]; ?>" placeholder="Nama Pelanggan">
												</div>
											</div>
										</div>

										<div class="form-group">
											<label for="nama" class="col-sm-2 control-label">Jenis Kelamin</label>
											<div class="col-sm-4">
												<div class="input-group">
													<select name="gender" id="" class="form-control">
														<option value="<?= $r[gender]; ?>"><?= $r[gender]; ?></option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="nama_pelanggan" class="control-label col-sm-2">Nama Perusahaan</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" id="nama_pelanggan" class="form-control" name="company" value="<?= $r[company]; ?>" placeholder="Nama Perusahaan">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="nama_pelanggan" class="control-label col-sm-2">Jabatan</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" id="nama_pelanggan" class="form-control" name="position" value="<?= $r[position]; ?>" placeholder="Jabatan">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="nama_pelanggan" class="control-label col-sm-2">Nomor Telepon</label>
											<div class="col-sm-4">
												<div class="input-group">
													<input type="text" id="nama_pelanggan" class="form-control" name="no_telephone" value="<?= $r[no_telephone]; ?>" placeholder="Jabatan">
												</div>
											</div>
										</div>

										<div class="form-group">
											<label for="tgl" class="control-label col-sm-2">Tanggal</label>
											<div class="col-sm-3">
												<div class="input-group">
													<div class="input-group-addon">
														<span class="glyphicon glyphicon-calender"></span>
													</div>
													<?php
													include "fungsi/fungsi_indotgl.php";
													$tanggal = date('Y-m-d');
													$tglFinal = tgl_indo($tanggal);
													?>
													<input type="text" id="tgl" class="form-control" disabled="" name="date" value="<?php echo $tglFinal; ?>">
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td width="97%" valign="top" align="center" colspan="5" style="border-style: none; border-width: medium">
									<font face="Arial" size="1"><b>Mohon kesediaan Anda untuk memberikan
											penilaian dan masukan kepada GraPari Telkomsel, dimana hal ini sangat bermanfaat
											untuk meningkatkan kualitas layanan kami.<br>
										</b><i>Silahkan diisi dengan mengklik option radio
											serta keterangan sesuai dengan penilaian Anda
											pada kolom yang telah disediakan</i></font>
								</td>
							</tr>
							<tr>
								<td colspan="9">
									<table class="table table-striped table-bordered">
										<thead>
											<th width='3%'><b>
													<font face='Tahoma' size='2'>No</font>
												</b></th>
											<th colspan='2'>
												<p align='center'><b>
														<font face='Tahoma' size='2'>DESKRIPSI</font>
													</b>
											</th>
											<th colspan="5" bgcolor='#FFFF00'>
												<p align='center'>
													<font face='Tahoma' size='2'>KUALITAS</font>
											</th>
										</thead>
										<tbody>
											<?php
											include "koneksi.php";
											error_reporting(0);
											$no = 1;
											$sql = mysql_query("SELECT * FROM tgroup");
											while ($data = mysql_fetch_array($sql)) {
												$id = $data[groupId];
												echo "<tr valign='top'>
                                                          <td><font face='Tahoma' size='2' colspan='1'><b> $no</b></font></td>
                                                          <td colspan='2'><font face='Tahoma' size='2'><b>$data[groupName]</b></font></td>
                                                          
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>1<br>(Sangat Buruk)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>2<br>(Buruk)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>3<br>(Cukup)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>4<br>(Baik)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>5<br>(Sangat Baik)</font></td>
                                                      </tr>";

												$hasil = mysql_query("SELECT * FROM tdescription, tgroup WHERE tdescription.groupId = '$id' AND tdescription.groupId = tgroup.groupId ORDER BY tgroup.groupId");
												$i = 1;
												while ($r = mysql_fetch_array($hasil)) {

													echo "<tr>
                                                              <td colspan='1'></td>
                                                             
                                                              <td colspan='2'><font face='Tahoma' size='2'> $r[description]</font></td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='A'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='B'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='C'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='D'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='E'> </td>
                                                              </tr>";
													$i++;
												}
												echo "<br>";
												$no++;
											}
											?>
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="8">
									<center><button type="submit" class="btn btn-primary btn-lg">Submit</button></center>
								</td>
							</tr>
							<tr>
								<td width="97%" valign="top" align="center" colspan="5" style="border-style: none; border-width: medium">
									<center class="well">
										<font face="Arial" size="1"><b>Terima Kasih Atas Waktu dan Masukan yang anda berikan,Semua masukan yang anda berikan </b> </i></font>
										<font face="Arial" size="1"><b>akan kami terima sebagai sarana bagi kami untuk meningkatkan kulaitas pelanan kami</b> </i></font>
									</center>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>

			<?php
			break;

			?>
	<?php
	}
} else {
	?>
	<div class="alert alert-danger">
		<p><i>"Anda Tidak Berhak Mengakses Modul ini"</i></p>
	</div>
<?php
}
?>