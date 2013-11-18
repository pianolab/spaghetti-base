<?php

App::import('Vendor', 'minify' . DS . 'Minify' . DS . 'Loader');

class MinifyHelper extends HtmlHelper
{
  public function __construct()
  {
    Minify_Loader::register();
  }

  public function min()
  {
    pr($this);
    pr(str_replace(APP, null, __FILE__) . '~>' . __LINE__);die;
    return JSMinPlus::minify($textIn);
  }

  public function addUrl($url)
  {
    $content = file_get_contents( Mapper::url($url, true) );
    $this->addString($content);
  }
  
  public function addString($string)
  {
    $this->string .= ' ' . $string;
  }
}