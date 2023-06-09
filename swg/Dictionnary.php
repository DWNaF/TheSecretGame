<?php

    class Dictionnary{

        private static string $FILENAME = "../data/dico_fr.txt";



		public static function retirerAccents($varMaChaine)
		{
			$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
			//Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
			$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

			$varMaChaine = str_replace($search, $replace, $varMaChaine);
			return $varMaChaine; //On retourne le résultat
		}

        public static function generateWord() : string{
            $dictionnary_words = file(self::$FILENAME);
            if ($dictionnary_words == null) exit();
            $word = $dictionnary_words[rand(0,count($dictionnary_words)-1)];
            $word = trim(self::retirerAccents(utf8_encode($word)));
            return $word;
        }
    }

?>