<?php
/**
 *  DateHelper provê funções de formatação de data.
 *	Modificado por DjalmaAraújo
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2009, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 */

class DateHelper extends Helper {
    /**
      *  Formata uma data.
      *
      *  @param string $format Formato de data
      *  @param string $date Data compatível com strtotime
      *  @return string Data formatada
      */
    public function format($format, $date) {
        $timestamp = strtotime($date);
        return date($format, $timestamp);
    }
    
    public function dayofweek($data) {
		$ano =  substr("$data", 0, 4);
		$mes =  substr("$data", 5, -3);
		$dia =  substr("$data", 8, 9);
	
		$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
	
		switch($diasemana) {
			case"0": $diasemana = "Domingo";       break;
			case"1": $diasemana = "Segunda-Feira"; break;
			case"2": $diasemana = "Terça-Feira";   break;
			case"3": $diasemana = "Quarta-Feira";  break;
			case"4": $diasemana = "Quinta-Feira";  break;
			case"5": $diasemana = "Sexta-Feira";   break;
			case"6": $diasemana = "Sábado";        break;
		}
	
		return $diasemana;
	}
	
	public function getMonth($d, $short = false) {
	     $arr = explode("-", $d);
	     switch ($arr[1]):
	      	case 1: $return = "Janeiro"; break;
	        case 2: $return = "Fevereiro"; break;
	      	case 3: $return = "Março"; break;
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
	
	function timeAgo($date)
	{
	    if(empty($date)) {
	        return "No date provided";
	    }

	    $periods         = array("segundo", "minuto", "hora", "dia", "semana", "mês", "ano", "década");
	    $lengths         = array("60","60","24","7","4.35","12","10");

	    $now             = time();
	    $unix_date         = strtotime($date);

	       // check validity of date
	    if(empty($unix_date)) {    
	        return "Bad date";
	    }

	    // is it future date or past date
	    if($now > $unix_date) {    
	        $difference     = $now - $unix_date;
	        $tense         = "atrás";

	    } else {
	        $difference     = $unix_date - $now;
	        $tense         = "de agora";
	    }

	    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	        $difference /= $lengths[$j];
	    }

	    $difference = round($difference);

	    if($difference != 1) {
	        $periods[$j].= "s";
	    }

	    return "$difference $periods[$j] {$tense}";
	}
	
	function format_date($date = '', $return = 'date', $separate = '/') {
		$time = substr($date,10);
		$date = substr($date,0,10);
		$tmp_date = explode('-',$date);
		
		if ($return == 'date') {
			$formated_date = $tmp_date[2] . $separate . $tmp_date[1] . $separate . $tmp_date[0];
		} else {
			$formated_date = $tmp_date[2] . $separate . $tmp_date[1] . $separate . $tmp_date[0] . ' às ' . $time;
		}
		
		return $formated_date;
	}
}