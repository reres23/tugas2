<?php

namespace app\console;

/**
* 
*/
class AccessRule extends \yii\filters\AccessRule {
	//This class represents an access rule defined by the [[AccessControl]] action filter

	/*
	* @inheritdoc
	*/
	protected function matchRole($user) {
		if (empty($this->roles)) {
			return true;
		} 

		//jika tidak punya hak akses maka tetap diperbolehkan masuk

		foreach ($this->roles as $role) {
			if ($role === '?') {
				// ? menunjukkan user yang belum login atau guest
				//jika yang login merupakan user yang tidak terdaftar atau guest
				if ($user->getIsGuest()) {
					return true;
				} //jika yang login merupakan user yang tidak terdaftar atau guest
				 //tetap diperbolehkan masuk				
			
			} elseif ($role ==='@') {
				if (!$user->getIsGuest()) {
					return true;
				}

				//berbeda halnya jika user yang login merupakan user authenticated user
				//maka tetap diperbolehkan mask
			}

			//dilakukan pengecekan
			//apakah user sudah login dan rolenya sesuai atau tidak

			elseif (!$user->getIsGuest() && $role === $user->identity->role) {
				return true;
			}
		}

			return false;
	}
}

?>