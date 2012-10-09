<?php

Config::write('database', array(
  'development' => array(
    'driver' => 'mysql',
    'host' => 'localhost',
    'user' => 'dbuser',
    'password' => 'dbpassword',
    'database' => 'dbname',
    'prefix' => ''
  ),
  'testing' => array(
    'driver' => 'mysql',
    'host' => 'testinghost',
    'user' => 'dbuser',
    'password' => 'dbpassword',
    'database' => 'dbname',
    'prefix' => ''
  ),
  'production' => array(
    'driver' => 'mysql',
    'host' => 'domain.com',
    'user' => 'dbuser',
    'password' => 'dbpassword',
    'database' => 'dbname',
    'prefix' => ''
  )
));