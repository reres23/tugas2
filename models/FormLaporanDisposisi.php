<?php
namespace app\models;

use yii\base\Model;


class FormLaporanDisposisi extends Model {
	public $tanggalAwal;
	public $tanggalAkhir;


	public function rules() {

		return[
			[['tanggalAwal', 'tanggalAkhir'],'required'],
		];

	}
}