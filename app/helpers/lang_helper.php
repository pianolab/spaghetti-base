<?php
/**
 *  LangHelper provê conversão de texto em multilínguas
 *  por DjalmaAraújo
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *
 */
class LangHelper extends Helper {

    public $lang;
    public $default_lang = 'br';
    public $json;
    public $json_path;
    
    /**
     * Construtor
     */
    public function __construct()
    {
      if (Session::read('language')) {
        $this->lang = Session::read('language');
      } else {
        $this->lang = $this->default_lang;
      }
      $this->json_path = APP . '/webroot/locale/';
      $this->json = $this->getTranslate();
    }
    
    /**
     * Utilização da conversão na view
     */
    public function _($string)
    {
      return $this->output($this->translate($string));
    }
    
    /**
     * Tradução da string procurada no json
     */
    private function translate($string)
    {
      $translate = $this->json[$this->lang][$string];
      if (!isset($translate)) {
        return $string;
      } else {
        if (is_array($translate)) {
          $return = array();
          foreach ($translate['itens'] as $item) {
            $return[] = "<{$translate['tag']}>" . $item . "</{$translate['tag']}>";
          }
          $translate = implode(null, $return);
        }
        return $translate;
      }
    }
    /**
     * Captura o json da língua
     */
    private function getTranslate()
    {
      $file = $this->json_path . $this->lang . '.json';
      if (file_exists($file)) {
        $json = file_get_contents($file);
      } else {
        $file = $this->json_path . $this->default_lang . '.json';
        $json = file_exists($file) ? file_get_contents($file) : '{}';
      }
      return json_decode($json, true);
    }
}

