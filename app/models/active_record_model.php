<?php

App::import('Vendor', 'phpActiveRecord' . DS . 'ActiveRecord');

class ActiveRecordModel extends ActiveRecord\Model
{
  public static $pagination;

  # scopes
  public static function to_list($label = 'name')
  {
    $collection = array();
    
    foreach (self::all() as $key => $self) {
      $collection[$self->id] = $self->{$label};
    }
    
    return $collection;
  }

  /**
   *  Retorna registros paginados.
   *
   *  @param array $params Parâmetros da busca e paginação
   *  @return array Resultados da página $params['page']
   */
  public static function paginate($per_page = 20, $options = array())
  {
    $current_page = Mapper::getNamed('page');

    $page = has_data($current_page) ? $current_page : 1;
    $offset = ($page - 1) * $per_page;
    $total_records = self::count();

    $options = array_merge(array(
      'offset' => $offset,
      'limit' => $per_page,
    ), $options);


    self::$pagination = array(
      'totalRecords' => $total_records,
      'totalPages' => ceil($total_records / $per_page),
      'perPage' => $per_page,
      'offset' => $offset,
      'page' => $page
    );

    return self::all($options);
  }

  public static function group_paginate($quantity, $per_page = 20, $options = array())
  {
    return array_chunk(self::paginate($per_page, $options), $quantity);
  }

  static public function group_all($quantity)
  {
    return array_chunk(self::all(), $quantity);
  }

  # methods
  public function truncate($column, $size)
  {
    $dots = strlen($this->{$column}) > $size ? ' ...' : null;
    return mb_substr($this->{$column}, 0, $size) . $dots;
  }
}