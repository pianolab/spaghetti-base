<?php

class LangComponent extends Component
{
  /**
   * Lang variavel
   */
  private $lang;

  /**
   * Sets langs on app
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
    Config::write("language", $this->lang);
    Session::write("language", $this->lang);
  }
}
