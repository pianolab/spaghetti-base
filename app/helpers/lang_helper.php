<?php
/**
 *  LangHelper provê conversão de texto em multilínguas
 *	por DjalmaAraújo
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *
 */

class LangHelper extends Helper {
    
    public $lang;
    public $default_lang = 'br';
    public $xml;
    public $xml_path;
    
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
    	$this->xml_path = APP . '/webroot/locale/';
    	$this->xml = new SimpleXmlElement($this->getTranslate());
    	
    }
    
    /**
     * Utilização da conversão na view
     */
    public function _($string)
    {
    	return $this->output($this->translate($string));
    }
    
    /**
     * Tradução da string procurada no XML
     */
    private function translate($string)
    {
    	foreach ($this->xml->item as $item):
				if ($this->lang == $this->default_lang):
					return $string;
				else:
					if (strtolower($item['id']) == strtolower($string)):
	    			return $item;
	    		endif;
				endif;
    	endforeach;
    }
    /**
     * Captura o XML da língua
     */
    private function getTranslate()
    {
    	$file = $this->xml_path . $this->lang . '.xml';
    	if (file_exists($file)):
    		return file_get_contents($file);
    	else:
    		exit('[LANG HELPER] O arquivo ' . $this->lang . '.xml não se encontra para tradução, crie um novo.');
    	endif;
    }
}
?>