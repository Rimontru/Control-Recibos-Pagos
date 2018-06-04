<?php  
	class Middleware {
    const HASH = PASSWORD_DEFAULT;
    const COST = 15;
    const KEY  = 'mo1#0v7*S6'; /*save in the db*/
    
    public static function randing($length) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public static function crypting($process, $cadena, $keyRandom){
			switch ($process) {
				case 1:#encripta la cadena
					$key=$keyRandom;  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
				    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
				    return $encrypted; //Devuelve el string encriptado
				break;
					
				case 2:#desencripta la cadena
					$key=$keyRandom;  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
		     		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		   			 return $decrypted;  //Devuelve el string desencriptado
				break;
			}
		}

		public static function hashing($stringPswd, $stringHash){
			if($stringHash == ""){ #So i'm encrypting
				return password_hash($stringPswd, self::HASH , ['cost' => self::COST] );
			}
			else{ #So i'm comparation
				return password_verify($stringPswd, $stringHash);
			}
		}

	}/* END CLASS */