<?php
namespace app\models;

use yii\base\Model;

/**
* 
*/
class FormLaporanMasuk extends Model {
	public $tanggalAwal;
	public $tanggalAkhir;
	public $jenisSurat;

	public function rules()	{
		return [
			[['tanggalAwal', 'tanggalAkhir', 'jenisSurat'], 'required'],
			// [['tanggalAwal'], 'date'],
			[['jenisSurat'], 'string'],
		];
	}
}

?>