
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
</body>
<div class="page">
	
	<h4 style="text-align: center;">MAJELIS PENDIDIKAN DASAR DAN MENENGAH</h4>
	<h4 style="text-align: center;">SMK MUHAMMADIYAH KRAMAT</h4>
	<h4 style="text-align: center;">Jalan Garuda No.9 Kemantran Kramat Kab.Tegal</h4>
	<h4 style="line-align: center;">-----------------------------------------------------------------------------------------------------------------------------------</h4>
	<h4 style="text-align: center;">LAPORAN SURAT MASUK</h4>


		<table border="3" align="center" cellpadding="8" cellspacing="8">
		<thead>
		<!-- <tr>
			<th colspan="11"><font size="3"> 
				<p>MAJELIS PENDIDIKAN DASAR DAN MENENGAH</p>
				<p>SMK MUHAMMADIYAH KRAMAT</p>
				<p>Jalan Garuda No.9 Kemantran Kramat Kab.Tegal<br></p>
			</font></th>
		</tr>

		<tr>
			<th colspan="11">
				<p><font size="3">LAPORAN SURAT MASUK</font></p>
			</th>
		</tr> -->


		<tr>
			<th>Nomor</th>
			<th>No. Agenda</th>
			<th>No. Surat Masuk</th>
			<th>Tgl. Surat Masuk</th>
			<th>Tgl. Surat Diterima</th>
			<th>Jenis Surat</th>
			<th>Klasifikasi Surat</th>
			<th>Asal Surat</th>	
			<th>Keterangan</th>
			<th>File</th>
		</tr>
		</thead>

		
		<?php 
		$no = 1;
		// foreach($dataProvider->getModels() as $hasil) 
		foreach ($hasil as $output) 
		{?>

		<tr>
			<td><?= $no++; ?></td>
			<td><?= $output->no_agenda_masuk; ?></td>
			<td><?= $output->no_surat_masuk; ?></td>
			<td><?= $output->tanggal_surat_masuk; ?></td>
			<td><?= $output->tanggal_surat_diterima; ?></td>
			<td><?= $output->jenis_surat; ?></td>
			<td><?= $output->perihal->nama_klasifikasi; ?></td>
			<td><?= $output->asal_surat; ?></td>
			<td><?= $output->keterangan; ?></td>
			<td><?= $output->file_surat; ?></td>
		</tr>

		<?php } ?>
		
		
		</table>
		</div>
	</body>
</html>








