<?php

App::import('Vendor', 'phpActiveRecord' . DS . 'ActiveRecord');

class ActiveRecordModel extends ActiveRecord\Model
{
  public static function to_list($label = 'name')
  {
    $collection = array();
    
    foreach (self::all() as $key => $self) {
      $collection[$self->id] = $self->{$label};
    }
    
    return $collection;
  }
}