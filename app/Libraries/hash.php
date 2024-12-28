<?php  
namespace App\Libraries;

class Hash
{
	public static function make($password){
		//return md5($password);
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public static function check($field_pass, $db_pass){
		if (password_verify($field_pass, $db_pass)) {
			return true;
		}else{
			return false;
		}
	}
}
?>