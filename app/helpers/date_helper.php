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
    
    function dayofweek($data) {
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

?>