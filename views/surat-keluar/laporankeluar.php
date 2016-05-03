<?php
?>

<html>

	<head>
	<style type="text/css">
	.page{padding:2cm;}
	table {border-spacing:0;border-collapse: collapse; width:100%;}
	table td, table th{border: 1px solid #ccc;}
	</style>
	</head>
<body>
	<div class="page">
	<h4 style="text-align: center;">MAJELIS PENDIDIKAN DASAR DAN MENENGAH</h4>
	<h4 style="text-align: center;">SMK MUHAMMADIYAH KRAMAT</h4>
	<h4 style="text-align: center;">Jalan Garuda No.9 Kemantran Kramat Kab.Tegal</h4>
	<h4 style="line-align: center;">-----------------------------------------------------------------------------------------------------------------------------------</h4>
	<h4 style="text-align: center;">LAPORAN SURAT KELUAR</h4>


		<table border="3" align="center" cellpadding="8" cellspacing="8">
		<!-- <tr>
			<th colspan="9"><font size="3"> 
				<p>MAJELIS PENDIDIKAN DASAR DAN MENENGAH</p>
				<p>SMK MUHAMMADIYAH KRAMAT</p>
				<p>Jalan Garuda No.9 Kemantran Kramat Kab.Tegal<br></p>
			</font></th>
		</tr>

		<tr>
			<th colspan="9">
				<p><font size="3">LAPORAN SURAT KELUAR</font></p>
			</th>
		</tr> -->


		<tr>
			<th>Nomor</th>
			<th>No. Agenda</th>
			<th>No. Surat Keluar</th>
			<th>Tgl. Surat Keluar</th>
			<th>Tgl. Surat Dikirim</th>
			<th>Klasifikasi Surat</th>
			<th>Tujuan Surat</th>
			<th>Keterangan</th>
			<th>File</th>
		</tr>
		
		
		<?php
		$no  = 1;
		 foreach($hasil as $output) { ?>

		<tr> 
			<td><?= $no++; ?> </td>
			<td><?= $output->no_agenda_keluar; ?></td>
			<td><?= $output->no_surat_keluar; ?></td>
			<td><?= $output->tanggal_surat_keluar; ?></td>
			<td><?= $output->tanggal_dikirim; ?></td>
			<td><?= $output->perihal->nama_klasifikasi; ?></td>
			<td><?= $output->tujuan_surat; ?></td>
			<td><?= $output->keterangan; ?></td>
			<td><?= $output->file_surat; ?></td>

			
			
		</tr>
	<?php } ?>
		
	
		</table>
	</div>
	</body>
</html>

