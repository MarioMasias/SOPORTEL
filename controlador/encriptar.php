<?php
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','SoPoRtE');
	define('SECRET_IV','101712');
	class SED {
		public static function encrip($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			//$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($iv);
			return $output;
		}
		public static function desencrip($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
	}