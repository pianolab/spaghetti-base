<?php
/**
 * TextHelper
 *
 * @package default
 * @author Djalma Araújo @djalmaaraujo
 **/

App::import("Helper", "html_helper");

class TextHelper extends Helper {

	/**
	 * Substr phrase
	 *
	 * Cut phrases without cutting words
	 * 
	 * @param string 	$text text
	 * @param integer $maxlenght Max numbers of characters for return text
	 * @param boolean $point Shows "..." in the end or not
	 * @param boolean $allow_exceed_word Allow to exceed the max lenght putting the last word or don't allow, cutting the phrase before.
	 * @return String
	 **/
	public function substr_phrase($text, $maxlenght = 54, $point = null, $allow_exceed_word = false)
	{
		
		$i = 0;
		$c = 0;
		
		if ($point) $point = "...";
		$total = strlen($text);
		
		if(strlen($text) <= $maxlenght):
			return $text;
		else:
			$text20 = substr($text, 0, $maxlenght);
			$i=0;
			while($i <= 1):
				$x = $text{$maxlenght+$c};
				if($x == " "):
					$i = 1;
					return  substr($text, 0, $maxlenght+$c).$point;
				else:
					$i = 0;
					if($maxlenght+$c >= $total):
						$i = 1;
						return $text;
					endif;
					$c = ($allow_exceed_word == null) ? $c = $c-1 : $c = $c+1;
				endif;
			endwhile;
		endif;
	}
} // END class