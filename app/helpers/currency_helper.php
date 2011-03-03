<?php
/**
 ************************
 ***** Currency Helper *****
 ************************
 * Allows you to show alert messages to user setting a flashSession or passing aroung the html easily
 *
 * developed by pianolab.com.br
 *
 */

class CurrencyHelper extends Helper
{
	public $currency;
	public $name;
	public $decimals;
	public $decPoint;
	public $thousandsSep;
	
	public function __construct()
	{
		$this->currency 		= Config::read('app.currency');
		$this->name 			= Config::read('app.currency_name');
		$this->decimals 		= Config::read('app.currency_format_decimals');
		$this->decPoint 		= Config::read('app.currency_format_dec_point');
		$this->thousandsSep 	= Config::read('app.currency_format_thousands_sep');
	}
	
	public function show($value = null, $with_currency = true)
	{
		$formated_number = number_format($value, $this->decimals, $this->decPoint, $this->thousandsSep);
		return ($with_currency) ? $this->currency . $formated_number : $formated_number;
	}
}