<?php
/**
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2010, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 *  Generators for Spaghetti Framework 0.2 (@djalmaaraujo - http://www.djalmaaraujo.com.br/)
 * 
 **/
require_once 'utils/utils.php';

class Model extends Utils
{

	public $extension = '.php';
	private $args;
	private $output;
	private $document_root;
	private $file;
	
	public function __construct($args) {
		$this->args = $args;
		$this->document_root = dirname(__FILE__) . "/../../../app/models/";
	}
	
	public function match()
	{
		$this->output[] = "[Model] Criando Modelos.. \n";
		if ($this->args->names):
			for ($x = 0; $x < count($this->args->names) ; $x++):
			
				$this->file->file = $this->underscore($this->args->names[$x] . $this->extension);
				if (file_exists($this->document_root . $this->file->file)):
					$this->output[] = '[Model] O arquivo ' . $this->file->file . ' já existe.'; 
				else:
					//New file attributes
					$new_file->file = $this->document_root . $this->file->file;
					$new_file->name = $this->camelize($this->args->names[$x]);
					$new_file->table = ($this->args->table[$x]) ? $this->underscore($this->args->table[$x]) : $this->underscore($this->camelize($this->args->names[$x]));
					$this->output[] = ($this->create_file($new_file)) ? '[Model] ' . $this->file->file . ' criado com sucesso.' : $this->output[] = '[Model] Erro ao criar o arquivo: ' . $this->file->file . '.';
				endif;
				
			endfor;
			return $this->output;
		else:
			return false;
		endif;
	}
	
	/**
	 * Create File
	 **/
	private function create_file($file)
	{
		try {
			$handle = fopen ($file->file, "w+");
			$content = "<?php \n";
			$content .= "class " . $file->name . " extends AppModel {\n";
			$content .= '	public $table = "' . $file->table . '";' . "\n";
			$content .= '	public $order = "id DESC";' . "\n";
			$content .= '	public $searchableFields = array();' . "\n";
			$content .= '	public $cantBeEqualFields = array();' . "\n";
			$content .= " \n";
			$content .= "	public $validates = array(\n";
			$content .= "		'field' => array('rule' => 'notEmpty', 'message' => 'Campo obrigatório')\n";
			$content .= "	);\n";
			$content .= " \n";			
			$content .= "}";
			fwrite($handle, $content);
			fclose($handle);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}
}