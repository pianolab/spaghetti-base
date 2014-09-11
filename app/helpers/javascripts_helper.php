<?php

class JavascriptsHelper extends HtmlHelper
{
  public $scripts = array(
    # jQuery v1.11.1
    "vendors/jquery/jquery.js",
    # Bootstrap v3.0.2
    "vendors/bootstrap/bootstrap",
    # Modernizr v2.8.2
    "vendors/modernizr",
    # jquery.meio.mask 1.1.14
    "vendors/meiomask/meiomask",
    "vendors/meiomask/meiomask.init",
    # jQuery Validation Plugin 1.11.1
    "vendors/validate/jquery.validate",
    "vendors/validate/jquery.validate.init",
    # Application
    "application",
  );

  public function compress() {
    $output = null;

    foreach ($this->scripts as $key => $script) {
      $output .= file_get_contents(SCRIPTS_PATH . DS . $this->get_file_url($script, true));
    }

    return $output;
  }

  public function scripts($attr = array(), $inline = true, $full = false)
  {
    foreach ($this->scripts as $key => $script) {
        if (env_is("production")) {
          $output[] = $this->get_file_url($script, true);
        }
        else {
          $output[] = $this->script($script, $attr, $inline, $full);
        }
    }

    if (env_is("production")) {
      rsort($output);
      $source = Mapper::url("/javascripts/application-" . filemtime( SCRIPTS_PATH . DS . current($output) ) . ".js");
      $output = $this->tag("script", null, array("src" => $source));
    }
    else {
      $output = implode("\n", $output);
    }

    return $output;
  }

  public function get_file_url($source)
  {
    $source = explode(".", $source);
    if (end($source) == "js") array_pop($source);
    $source = implode(".", $source);

    $min_source = $this->extension($source . ".min", "js");

    if (is_file(SCRIPTS_PATH . DS . $min_source)) {
      $source = $min_source;
    }
    else {
      $source = $this->extension($source, "js");
    }

    return $source;
  }
}
