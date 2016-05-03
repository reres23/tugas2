<?php

use yii\helpers\Html;
use app\models\Jabatan;

$this->title = 'Profil';

?>


<!-- <div class="panel-body"> -->
	<div class="row">

	  <div class ="col-md-10 col-lg-10">
		<table class= "table">
		
		<tbody>
			<tr>
				<td>Nomor Induk Pegawai</td>
				<td> <?= $data->nip_pegawai;?> </td>
			</tr>
			<tr>
				<td>Nama Pegawai</td>
				<td> <?= $data->nama_pegawai;?> </td>
			</tr>
			<tr>
				<td>Email Pegawai</td>
				<td> <?= $data->email;?> </td>
			</tr>
			<tr>
				<td>Foto Pegawai</td>
				<td> <img src="<?= $data->foto;?>" width="150px" height="150px" /> </td>
			</tr>
			<tr>
				<td>Jabatan Pegawai</td>
				<td> <?= $data->posisi->nama_jabatan;?> </td>
			</tr>
		</tbody>

		</table>
	 </div>

	</div>
</div>



