<?php

namespace app\models;

use yii\base\Model;
// use app\models\Klasifikasi;


class FormLaporanKeluar extends Model {
	public $tanggalAwal;
	public $tanggalAkhir;
	
	// public $id_klasifikasi;

	public function rules() {

		return[
			[['tanggalAwal', 'tanggalAkhir'], 'required'],
			// [['tanggalAwal'], 'safe'],


		];
	}


}

?>