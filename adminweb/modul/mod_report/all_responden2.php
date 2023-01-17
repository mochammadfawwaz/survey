<style>
	.btn {
		display: inline-block;
		padding: 6px 12px;
		font-size: 14px;
		font-weight: normal;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
		background-color: #5cb85c;
		padding: 5px 10px;
		font-size: 12px;
		line-height: 1.5;
		border-radius: 3px;
		margin-top: 10px;
		margin-bottom: 10px;
		color: white;
	}

	@font-face {
		font-family: 'Glyphicons Halflings';

		src: url('../../../fonts/glyphicons-halflings-regular.eot');
		src: url('../../../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../../../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../../../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../../../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../../../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
	}

	.glyphicon {
		position: relative;
		top: 1px;
		display: inline-block;
		font-family: 'Glyphicons Halflings';
		font-style: normal;
		font-weight: normal;
		line-height: 1;

		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}

	.glyphicon-print:before {
		content: "\e045";
	}

	.glyphicon-arrow-left:before {
		content: "\e091";
	}
</style>

<?php 
    include "../../../koneksi.php";
    include "../../../fungsi/fungsi_indotgl.php";
    
    $hasil = mysql_query("SELECT * FROM tdescription");
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $dateIndo = tgl_indo($date);
?>

<center><table border=0 cellpadding=10 cellspacing=5 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../master.php?module=hasil&sub=laporan'>
			<button style='margin-right:230px;' class='btn'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</button>
			</a>
			<b><font size=5>REKAP KUISIONER RESPONDEN</font></b>
			<!-- <a href='exportExcel.php'>
			<button style='margin-left:230px;' class='btn'><span class='glyphicon glyphicon-print'></span> Cetak</button></a> -->
                        <button onclick="window.print()" style='margin-left:230px;' class='btn'><span class='glyphicon glyphicon-print'></span> Cetak</button>
			</td>
		</tr>
		<tr>
			<td colspan=2>Dicetak : <b><?= $dateIndo; $time; ?></b></td>
		</tr>
		
		<tr>
			<td>
				<table cellpadding=2 border=2 bgcolor='#fff'>
					<tr>
					<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Nama Lengkap</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Nama Perusahaan</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Jabatan</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Jenis Kelamin</b></td>
                                        <?php 
                                        $tampil = mysql_query("SELECT descriptionId FROM tdescription");
                                        $no = 1;
                                        while ($r = mysql_fetch_array($tampil)) {
                                        ?>
					<td bgcolor=#c6e1f2 align='center'><?= $r['descriptionId']; ?></td>
					<?php $no++; } ?>
					<tr>
    <?php 
    $tampil = mysql_query("SELECT * FROM tcompany");
    $ni = 1;
    while ($r = mysql_fetch_array($tampil)) {
        $companyId = $r[companyId];
    ?>
    <tr valign=top>
			<td align='center'><?= $ni++; ?></td>
			<td align='center'><?= $r['companyAddress']; ?></td>
			<td align='center'><?= $r['companyName']; ?></td>
			<td align='center'><?= $r['companyPhoneHp']; ?></td>
			<td align='center'><?= $r['product']; ?></td>
                        <?php 
                        $sql = mysql_query("SELECT jawaban
                        FROM tanswer WHERE companyId = '$companyId'");
                        while ($oke = mysql_fetch_array($sql)) {
                        ?>
                        <td align='center'><?= $oke['jawaban']; ?></td>
                        <?php $no++; } ?>
	</tr>
    <?php  } ?>
    <?php 
    
    ?>
    <tr align='center'>
		<td bgcolor=#c6e1f2 colspan='5'><b>Total</b></td>
                <?php 
                $tampil1 = mysql_query("SELECT descriptionId FROM tdescription");
                $no = 1;
                while ($r = mysql_fetch_array($tampil1)) {
                        $companyId = $r[descriptionId];
                $sql1 = mysql_query("SELECT SUM(jawaban) as jawabanA
                FROM tanswer WHERE descriptionId = '$companyId'");
                while ($oke1 = mysql_fetch_array($sql1)) {
                ?>
		<td><b><?= $oke1['jawabanA'] ?></b></td>
		<?php  $no++; } ?>
                <?php  } ?>
		</tr>
                    
	</table>
	</td>
	</tr> 
	</table>
	</center>
    <table border=0 cellpadding=10 cellspacing=5 bgcolor= #e6e6e6>
		<tr >
			<td colspan='8'  bgcolor=#337ab7 style='border: none ;color:white;'>
			<a href='../../master.php?module=hasil&sub=laporan'>
			</a>
			<b style="text-align: center;"><font size=5>Hasil Perhitungan Metode McCALL</font></b>
			</td>
		</tr>
		
		<tr>
			<td>
				<table cellpadding=2 border=2 bgcolor='#fff'>
					<tr>
					<td bgcolor=#c6e1f2 align=center><b>NO</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Indikator</b></td>
					<td bgcolor=#c6e1f2 align=center><b>Keterangan</b></td> 
					<tr>
                    <tr valign=top>
                            <td align='center'>1</td>
                            <td align='left' colspan="1">Correctnes(Ketepatan)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Completeness(Kelengkapan)</td>
                            <td align='center'>w1c1+w2c2</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,3 x 4,3) + (0,4 x 4,1)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,29) + (1,64)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>2,93</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Consistency(Konsistensi)</td>
                            <td align='center'>w3c3+w4c4+w5c5+w6c6+w7c7</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,3 x 3,85) + (0,2 x 3,85) + (0,2 x 3,8) + (0,3 x 4) + (0,2 x 4,1) </td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,15) + (0,77) + (0,76) + (1,2) + (0,82)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>4,7</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Treaceability(lacak)</td>
                            <td align='center'>w8c8</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,4 x 4,1)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>1,64</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Jadi nilai Fa1 diselesaikan dengan cara berikut </td>
                            <td align='center'>Fa1 = completeness + consistency + treaceability / 3</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>2,93+4,7+1,64/3</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,09</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'>Melalui perolehan hasil atas perhitungannya di atas nilai Fa1 dilakukan perubahan kedalam persentase</td>
                            <td align='left'>Persentase = nilai yang didapat / nilai maksimal x 100%</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>3,09/5 x 100% = <b>61,8%</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'>2</td>
                            <td align='left' colspan="1">Usability(Kegunaan)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Communicativeness(komunikatif)</td>
                            <td align='center'>(w1c1+w2c2+w3c3)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,3 x 3,8) + (0,2 x 4,25) + (0,4 x 3,95)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,14) + (0,85) + (1,58)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,57</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Operability(operabilitas)</td>
                            <td align='center'>(w4c4 + w5c5)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,3 x 4,05) + (0,3 x 4,05)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,2) + (1,2)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>2,4</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Training(pelatihan)</td>
                            <td align='center'>(w4c4 + w5c5)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,4 x 4,2) + (0,4 x 3,85)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,68) + (1,54)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,22</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Jadi nilai Fa2 diselesaikan dengan cara berikut </td>
                            <td align='center'>Fa2 = Communicativeness + Operability + training / 3</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>3,57+2,4+3,22/3</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,06</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'>Melalui perolehan hasil atas perhitungannya di atas nilai Fa2 dilakukan perubahan kedalam persentase</td>
                            <td align='left'>Persentase = nilai yang didapat / nilai maksimal x 100%</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>3,06/5 x 100% = <b>61,2%</b></td>
                    </tr>
                    <!-- 3 -->
                    <tr valign=top>
                            <td align='center'>3</td>
                            <td align='left' colspan="1">Integrity(integritas)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Security(keamanan)</td>
                            <td align='center'>(w1c1 + w2c2)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,4 x 4,1) + (0,4 x 3,95)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,64) + (1,58)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,22</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'>Melalui perolehan hasil atas perhitungannya di atas nilai Fa3 dilakukan perubahan kedalam persentase</td>
                            <td align='left'>Persentase = nilai yang didapat / nilai maksimal x 100%</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>3,22/5 x 100% = <b>64,2%</b></td>
                    </tr>
                    <!-- 4 -->
                    <tr valign=top>
                            <td align='center'>4</td>
                            <td align='left' colspan="1">Reliability (kehandalan)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Accuracy (akurasi)</td>
                            <td align='center'>(w1c1 + w2c2 + w3c3 + w4c4 + w5c5 +w6c6)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,4 x 3,95) + (0,4 x 4,3) + (0,4 x 4,3) + (0,3 x 4)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,58) + (1,72) + (1,72) + (1,2)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>6,22</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Error Tolerancy(toleransi kesalahan)</td>
                            <td align='center'>w7c7</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,4 x 4,22)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>1,68</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Simplicity</td>
                            <td align='center'>w8c8+w9c9</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,4 x 4) + (0,3 x 4,05)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>1,6 + 1,2/td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>2,8</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Jadi nilai Fa4 diselesaikan dengan cara berikut </td>
                            <td align='center'>Fa4 = Accuracy  + Error Tolerancy + Simplicity / 3</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>6,22+1,68+2,8/3</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,57</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'>Melalui perolehan hasil atas perhitungannya di atas nilai Fa4 dilakukan perubahan kedalam persentase</td>
                            <td align='left'>Persentase = nilai yang didapat / nilai maksimal x 100%</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>3,57/5 x 100% = <b>71,3%</b></td>
                    </tr>
                    <!-- 5 -->
                    <tr valign=top>
                            <td align='center'>5</td>
                            <td align='left' colspan="1">Efficiency</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='left'>Security(keamanan)</td>
                            <td align='center'>(w1c1 + w2c2 + w3c3)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(0,3 x 4,2) + (0,3 x 4,2) + (0,3 x 4,25)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>(1,26) + (1,26) + (1,27)</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'><b>3,79</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'>Melalui perolehan hasil atas perhitungannya di atas nilai Fa5 dilakukan perubahan kedalam persentase</td>
                            <td align='left'>Persentase = nilai yang didapat / nilai maksimal x 100%</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'></td>
                            <td align='center'></td>
                            <td align='center'>3,79/5 x 100% = <b>75,8%</b></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'>*</td>
                            <td align='left' colspan="1">Maka, total kualitas perangkat lunak yang didapat adalah sebagai berikut</td>
                    </tr>
                    <tr valign=top>
                            <td align='center'>=</td>
                            <td align='left' colspan="1">(0,2xFa1)+(0,2xFa2)+(0,2xFa3)+(0,2xFa4)+(0,2xFa5)/nilai maksimum x 100%</td>
                            <td></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'>=</td>
                            <td align='left' colspan="1">(0,2x3,09)+(0,2x3,06)+(0,2x3,22)+(0,2x3,57)+(0,2x3,79)/5 x 100%</td>
                            <td></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'>=</td>
                            <td align='left' colspan="1">(6,18)+(6,12)+(6,4)+(7,14)+(7,58)/5 x 100%</td>
                            <td></td>
                    </tr>
                    <tr valign=top>
                            <td align='center'>=</td>
                            <td align='left' colspan="1"><b>66%</b></td>
                            <td></td>
                    </tr>

    <?php 
    $data_user = mysql_fetch_array(mysql_query("SELECT COUNT(fullname) from tdata"));
    $data_count = mysql_fetch_array(mysql_query
    ("SELECT SUM(soal1/20) As TotalA,
     SUM(soal2/20) As  TotalB,
     SUM(soal3/20) As  TotalC,
     SUM(soal4/20) As  TotalD,
     SUM(soal5/20) As  TotalE,
     SUM(soal6/20) As  TotalF,
     SUM(soal7/20) As  TotalG,
     SUM(soal8/20) As  TotalH,
     SUM(soal9/20) As  TotalI,
     SUM(soal10/20) As TotalJ,
     SUM(soal11/20) As TotalK,
     SUM(soal12/20) As TotalL,
     SUM(soal13/20) As TotalM,
     SUM(soal14/20) As TotalN,
     SUM(soal15/20) As TotalO,
     SUM(soal16/20) As TotalP,
     SUM(soal17/20) As TotalQ,
     SUM(soal18/20) As TotalR,
     SUM(soal18/20) As TotalS,
     SUM(soal19/20) As TotalT,
     SUM(soal20/20) As TotalU,
     SUM(soal21/20) As TotalV,
     SUM(soal22/20) As TotalW,
     SUM(soal23/20) As TotalX,
     SUM(soal24/20) As TotalY,
     SUM(soal25/20) As TotalZ,
     SUM(soal26/20) As TotalA1,
     SUM(soal27/20) As TotalA2,
     SUM(soal28/20) As TotalA3,
     SUM(soal29/20) As TotalA4
						FROM tdata"));
    ?>
	</table>
	</td>
	</tr>
	</table>