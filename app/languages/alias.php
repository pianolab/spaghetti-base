<?php
App::import('Helper', 'lang_helper');

function t($string, $file_name = false)
{
  $lang = new LangHelper();
  return $lang->_($string, $file_name);
}