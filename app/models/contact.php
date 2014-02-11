<?php
class Contact extends Model
{
  public $table = false;

  public $validates = array(
    'name' => array(
      'rule' => 'notEmpty',
      'message' => 'Nome é um campo obrigatório.',
    ),
    'email' => array(
      'rule' => 'email',
      'message' => 'Utilize um e-mail válido.',
    ),
  );
}