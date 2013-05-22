<?php
/**
 ************************
 ***** Currency Helper *****
 ************************
 *
 * developed by pianolab.com.br
 *
 */

class CurrencyHelper extends Helper
{
  public $name;
  public $currency;
  public $decimals;
  public $decimalSeparator;
  public $thousandsSeparator;
  
  public function __construct() {
    $this->name = CURRENCY_NAME;
    $this->currency = CURRENCY;
    $this->decimals = CURRENCY_DECIMAL_PLACE;
    $this->decimalSeparator = CURRENCY_DECIMAL_SEPARATOR;
    $this->thousandsSeparator = CURRENCY_THOUSANDS_SEPARATOR;
  }
  
  public function show($value = null, $with_currency = true) {
    $formated_number = number_format($value, $this->decimals, $this->decimalSeparator, $this->thousandsSeparator);
    return ($with_currency) ? $this->currency . $formated_number : $formated_number;
  }
}