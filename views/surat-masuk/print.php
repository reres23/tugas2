<?php
?>
<html>
	<body onLoad="window.print()">
		<table rules="all" border="3" align="center" cellpadding="6" cellspacing="6" width="80%" height="50%">
		
		<tr>
			<th colspan="3"><font size="3"> 
				<p> MAJELIS PENDIDIKAN DASAR DAN MENENGAH</p>
				<p>SMK MUHAMMADIYAH KRAMAT</p>
				<p>Jalan Garuda No.9 Kemantran Kramat Kab.Tegal<br></p>
			</font></th>
		</tr>

		<tr>
			<th style="width:50%" colspan="3">
				<p><font size="3">LEMBAR DISPOSISI</font><p>
			</th>
		</tr>

		<tr>
			<td>No.Agenda Disposisi</td>
			<td width="65%" colspan="2"><?= $model->disposisi->no_agenda_disposisi; ?></td>
		</tr>

		<tr>
			<td> Nomor Surat</td>
			<td width="65%" colspan="2"><?= $model->no_agenda_masuk; ?></td>
		</tr>

		<tr>
			<td> Asal Surat</td>
			<td colspan="2"><?= $model->asal_surat; ?></td>
		</tr>

		<tr>
			<td> Tanggal Diterima</td>
			<td colspan="2"> <?= $model->tanggal_surat_diterima; ?></td>
		</tr>

		<tr>
			<td> Perihal Surat</td>
			<td colspan="2"> <?= $model->perihal->nama_klasifikasi; ?></td>
		</tr>

		<tr>
			<td colspan="3">Diteruskan Kepada	:</td>
		</tr>
		

		<?php foreach ($jabatan as $row) { ?>
		<?php if($row->id_jabatan != 7): ?>

        <tr>
			<td colspan="3">
			<input name="jabatan[]" type="checkbox" value=" <?= $row['id_jabatan']?>"

			<?php if ($model->id_jabatan == $row->id_jabatan) {
				echo "checked";
			}
			?>

			> <?= $row->nama_jabatan ?>
			</td>
			
		</tr>
		<?php endif; ?>
      <?php  } ?>

      	<tr>
			<td align="left" colspan="3">Instruksi :</td>
		</tr>

		<tr>
			<td align="left" colspan="3">
				<p> <?= $model->disposisi->instruksi; ?><br><br><p>
			</td>
		</tr>
    
		<tr>
			<td align="left" colspan="3"> Catatan :</td>
		</tr>

		<tr>
			<td align="left" colspan="3">
				<p> <?= $model->disposisi->catatan; ?><br><br><p>
			</td>
		</tr>

		</table>

	</bdoy>
</html>
<? //cellpadding digunakan untuk memberi jarak antara sel dengan tulisan
<? //cellspacing digunakan untuk menentukan jarak antar sel pada sebauh tabel
