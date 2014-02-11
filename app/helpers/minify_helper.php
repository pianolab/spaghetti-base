<?php

App::import("Vendor", "minify" . DS . "Minify" . DS . "Loader");

class MinifyHelper extends HtmlHelper
{
  private $JS_DIR;
  private $TEMP_FILES_DIR;
  private $TYPE_FILE_ALLOWED = array("js", "temp");

  public function __construct()
  {
    Minify_Loader::register();

    $this->js = new stdClass;

    $this->TEMP_FILES_DIR = ROOT . DS . "temp" . DS;
    $this->JS_DIR = APP . DS . "webroot" . DS . "scripts" . DS;

    $this->JSMinPlus = new JSMinPlus;
  }

  public function jsAddUrl($url)
  {
    $urls = is_array($url) ? $url : array($url);

    foreach ($urls as $key => $url) {
      $content = file_get_contents($this->jsPrepareUrl($url));
      $this->jsAddString($content);
      $this->js->urls[] = $url;
    }
  }

  public function jsAddExtraUrl($url)
  {
    $urls = is_array($url) ? $url : array($url);

    foreach ($urls as $key => $url) {
      $content = file_get_contents($this->jsPrepareUrl($url));
      $this->jsAddString($content);
      $this->js->extra_urls[] = $url;
    }
  }

  public function jsAddString($string)
  {
    $this->js->string .= " " . $string;
  }

  public function jsAddScript($script)
  {
    if (get_current_env() == "production") {
      $this->jsAddString($script);
    }
    else {
      echo $this->tag("script", $script, array("type" => "text/javascript")) . "\n";
    }
  }

  public function jsPrepareUrl($url)
  {
    if (!$this->external($url)) {
      $url = $this->JS_DIR . $this->extension($url, "js");
      $this->js->hash .= filemtime($url);
    }
    return $url;
  }

  public function jsMin()
  {
    if (get_current_env() == "production") {
      $prefix_name = "application-";
      $output_name = $prefix_name . sha1($this->js->hash) . ".min";

      if (!file_exists($this->JS_DIR . $output_name . ".js")) {
        $this->jsRemove();
        $output = $this->JSMinPlus->minify($this->js->string);
        $this->createFile($output, $output_name);
      }
    }
    else {
      $urls = is_array($this->js->urls) ? $this->js->urls : array();
      $extra_urls = is_array($this->js->extra_urls) ? $this->js->extra_urls : array();
      $output_name = array_merge($urls, $extra_urls);
    }

    return $this->script($output_name);
  }

  protected function jsRemove()
  {
    $list = new RecursiveDirectoryIterator($this->JS_DIR);
    $recursive = new RecursiveIteratorIterator($list);

    foreach($recursive as $folder){
      if (strpos($folder->getFilename(), $prefix_name) !== false) {
        unlink($path . $folder->getFilename());
      }
    }
  }

  protected function createFile($content, $file_name = false)
  {
    if ($file_name) {
      return $this->_createFile($content, $this->JS_DIR, $file_name, "js");
    }
    else {
      return $this->_createFile($content, $this->TEMP_FILES_DIR, sha1($this->js->hash), "txt");
    }
  }

  protected function _createFile($content, $folder, $file_name, $extension)
  {
    $file_name = $this->extension($folder . $file_name, $extension);

    $fopen = fopen($file_name, "w") or die("cant_create_file");
    fwrite($fopen, $content);

    fclose($fopen);

    return $file_name;
  }
}