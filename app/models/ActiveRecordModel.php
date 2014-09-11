<?php

App::import("Vendor", "php_active_record" . DS . "ActiveRecord");

class ActiveRecordModel extends ActiveRecord\Model
{
  public static $pagination;

  # scopes
  public static function to_list($label = "name")
  {
    $collection = array();

    foreach (self::all() as $key => $self) {
      $collection[$self->id] = $self->{$label};
    }

    return $collection;
  }

  public function lang($column)
  {
    if (isset($this->{$column . "_" . current_lang()})) {
      return $this->{$column . "_" . current_lang()};
    }
  }

  public static function others($limit = 5, $options = array()) {
    return self::all($options);
  }

  /**
   *  Retorna registros paginados.
   *
   *  @param array $params Parâmetros da busca e paginação
   *  @return array Resultados da página $params["page"]
   */
  public static function paginate($per_page = 20, $options = array())
  {
    $current_page = Mapper::getNamed("page");

    $page = has_data($current_page) ? $current_page : 1;
    $offset = ($page - 1) * $per_page;
    $total_records = has_data($options) ? self::count($options) : self::count();

    $options = array_merge(array(
      "limit" => $per_page,
      "offset" => $offset,
    ), is_array($options) ? $options : array());

    self::$pagination = array(
      "totalRecords" => $total_records,
      "totalPages" => ceil($total_records / $per_page),
      "perPage" => $per_page,
      "offset" => $offset,
      "page" => $page,
    );

    return self::find("all", $options);
  }

  public static function group_paginate($quantity, $per_page = 20, $options = array())
  {
    return array_chunk(self::paginate($per_page, $options), $quantity);
  }

  static public function group_all($quantity, $options = array())
  {
    return array_chunk(self::all($options), $quantity);
  }

  /**
   * Truncate text
   * @author Rayann Nayran
   */
  public function truncate($column_text, $size)
  {
    $dots = strlen($this->{$column_text}) > $size ? " ..." : null;
    if(strlen($this->{$column_text}) > $size){
      return mb_substr($this->{$column_text}, 0, strrpos(mb_substr($this->{$column_text}, 0, $size), " ")) . $dots;
    }else{
      return $this->{$column_text};
    }
  }

  public function format_date($column_date, $format)
  {
    $timestamp = strtotime($this->{$column_date});
    return date($format, $timestamp);
  }

  public function week_day($column_date)
  {
    $year = substr($this->{$column_date}, 0, 4);
    $month = substr($this->{$column_date}, 5, -3);
    $day = substr($this->{$column_date}, 8, 9);

    $week_day = date("w", mktime(0, 0, 0, $month, $day, $year) );

    switch($week_day) {
      case"0": $week_day = "Domingo"; break;
      case"1": $week_day = "Segunda-Feira"; break;
      case"2": $week_day = "Terça-Feira"; break;
      case"3": $week_day = "Quarta-Feira"; break;
      case"4": $week_day = "Quinta-Feira"; break;
      case"5": $week_day = "Sexta-Feira"; break;
      case"6": $week_day = "Sábado"; break;
    }

    return $week_day;
  }

  public function get_month($column_date, $short = false)
  {
    switch ($this->{$column_date}->format('m')):
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

  public function time_ago($column_name = "created_at")
  {
    $timestamp = time() - strtotime($this->{$column_name}->format("Y-m-d H:i:s"));

    if($timestamp < 1) {
      return "há 1 segundo atrás";
    }
    else {
      $type_times = array(
        12 * 30 * 24 * 60 * 60 => array("plural" => "anos", "singular" => "ano"),
        30 * 24 * 60 * 60 => array("plural" => "meses", "singular" => "mês"),
        24 * 60 * 60 => array("plural" => "dias", "singular" => "dia"),
        60 * 60 => array("plural" => "horas", "singular" => "hora"),
        60 => array("plural" => "mínutos", "singular" => "mínuto"),
        1 => array("plural" => "segundos", "singular" => "segundo"),
      );

      foreach($type_times as $seconds => $type) {
        $secs = $timestamp / $seconds;

        if ($secs >= 1) {
          $time = round($secs);
          return "há " . $time . " " . ($time > 1 ? $type["plural"] : $type["singular"]) . " atrás";
        }
      }
    }
  }
}