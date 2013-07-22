<?php

Config::write('database', array(
  'development' => array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'database_name',
    'prefix' => ''
  ),
  'production' => array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'user' => 'dbuser',
    'password' => 'dbpassword',
    'database' => 'dbname',
    'prefix' => ''
  )
));