<?php
/**
* @license	 http://www.opensource.org/licenses/mit-license.php The MIT License
* @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
*
* 
* Date Helper class
*
* Example:
* 
* $start = "2010-02-01 10:00:00";
* $end = "2010-04-01 10:00:00";
* echo Date::dateDiff($start, $end, "d"); results: int with day
* 
*/ 

class Date {

	/**
	 *	Get day of week between a date
	 *	@param string $date : Date compatible with strtotime()
	 *	@return string : Week day
	 */

	public static function dayofweek($data) {
		$ano =	substr("$data", 0, 4);
		$mes =	substr("$data", 5, -3);
		$dia =	substr("$data", 8, 9);

		$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

		switch($diasemana):
			case"0": $diasemana = "Domingo";			 break;
			case"1": $diasemana = "Segunda-Feira"; break;
			case"2": $diasemana = "TerÃ§a-Feira";	 break;
			case"3": $diasemana = "Quarta-Feira";	 break;
			case"4": $diasemana = "Quinta-Feira";	 break;
			case"5": $diasemana = "Sexta-Feira";	 break;
			case"6": $diasemana = "SÃ¡bado";				 break;
		endswitch;
		return $diasemana;
	}

	/**
	 *	Get name of the month
	 *	@param integer $d : number of month starting from 1
	 *	@param boolean $short : To return a shot month name
	 *	@return string : Month name
	 */

	public static function getMonth($d, $short = false) {
		$arr = explode("-", $d);
		 switch ($arr[1]):
			case 1: $return = "Janeiro"; break;
			case 2: $return = "Fevereiro"; break;
			case 3: $return = "MarÃ§o"; break;
			case 4: $return = "Abril"; break;
			case 5: $return = "Maio"; break;
			case 6: $return = "Junho"; break;
			case 7: $return = "Julho"; break;
			case 8: $return = "Agosto"; break;
			case 9: $return = "Setembro"; break;
			case 10: $return = "Outubro"; break;
			case 11: $return = "Novembro"; break;
			case 12: $return = "Dezembro"; break;
		endswitch;
		return ($short) ? substr($return,0,3) : $return;
	}

	/**
	 *	Calculates time between a date and current date
	 *	@param string $date : a datetime string
	 *	@return string : passend time (like: 3 hours ago)
	 */

	public static function timeAgo($date)
	{
		if(empty($date)):
			return "No date provided";
		endif;

		$periods				 = array("segundo", "minuto", "hora", "dia", "semana", "mÃªs", "ano", "dÃ©cada");
		$lengths				 = array("60","60","24","7","4.35","12","10");

		$now						 = time();
		$unix_date			 = strtotime($date);

		# check validity of date
		if(empty($unix_date)):	 
			return "Bad date";
		endif;

		# is it future date or past date
		if($now > $unix_date):		
				$difference		= $now - $unix_date;
				$tense				= "atrÃ¡s";
		else:
				$difference		= $unix_date - $now;
				$tense				= "de agora";
		endif;

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
				$difference /= $lengths[$j];
		}

		$difference = round($difference);

		if($difference != 1):
				$periods[$j].= "s";
		endif;

		return "$difference $periods[$j] {$tense}";
	}

	/**
	 *	Format a date
	 *	@param string $date : Date compatible with strtotime()
	 *	@param string $return : Date's format (date or datetime)
	 *	@return string : Formated date
	 */

	function formatDate($date = '', $return = 'date', $separate = '/') {
		$time = substr($date,10);
		$date = substr($date,0,10);
		$tmp_date = explode('-',$date);

		if ($return == 'date'):
			$formated_date = $tmp_date[2] . $separate . $tmp_date[1] . $separate . $tmp_date[0];
		else:
			$formated_date = $tmp_date[2] . $separate . $tmp_date[1] . $separate . $tmp_date[0] . ' Ã s ' . $time;
		endif;

		return $formated_date;
	}

	/**
	 *	Get the difference between two dates
	 *	@param string $start : Initial date
	 *	@param string $date : End date
	 *	@param string $method : Output's unit ( s => seconds, i => minutes, h => hours, d => days, w => weeks, m => months, y => years)
	 *	@return int : Difference between two dates
	 */

	public static function dateDiff($start, $end, $method) {
		$start = strtotime($start);
		$end = strtotime($end);
		$diff = ($end - $start);

		switch ($method):
			// return seconds
			case "s":	 return $diff; break;
			// return minutes
			case "i":	 return floor($diff/60); break;
			// return hours
			case "h":	 return floor($diff/3600); break;
			// return days
			case "d":	 return floor($diff/86400); break;
			// return weeks
			case "w":	 return floor($diff/604800); break;
			// return months
			case "m":	 return floor($diff/2592000); break;
			// return years
			case "y":	 return floor($diff/31536000); break;
		endswitch;
	}
}