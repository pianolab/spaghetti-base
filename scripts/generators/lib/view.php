<?php
/**
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2010, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 *  Generators for Spaghetti Framework 0.2 (@djalmaaraujo - http://www.djalmaaraujo.com.br/)
 * 
 **/
require_once 'utils/utils.php';

class View extends Utils
{

	private $args;
	private $output;
	private $document_root;
	public $extension = '.htm.php';
	
	public function __construct($args) {
		$this->args = $args;
		$this->document_root = dirname(__FILE__) . "/../../../app/views/";
	}
	
	public function match()
	{
		$this->output[] = "[View] Criando views.. \n";
		$this->args = $this->args;
		
		//Folder Check
		if (!file_exists($this->document_root . $this->args->folder)):
			mkdir($this->document_root . $this->args->folder);
			$this->output[] = "[View] Criando pasta " . $this->args->folder;
		endif;
		
		$view_folder = $this->document_root . $this->args->folder . '/';
		
		//Create files
		if ($this->args->files):
			foreach ($this->args->files as $file):
				$file = strtolower($file . $this->extension);
				$file_path = $view_folder . $file;
				if (file_exists($file_path)):
					$this->output[] = '[View] O arquivo ' . $file .' já existe.'; 
				else:
					if ($this->create_file($file_path)):
						$this->output[] = '[View] ' . $file . ' criado com sucesso.';
					else:
						$this->output[] = '[View] Erro ao criar o arquivo: ' . $file . '.';
					endif;
				endif;
			endforeach;
			return $this->output;
		else:
			return false;
		endif;
	}
	
	/**
	 * Create File
	 **/
	
	private function create_file($file_path)
	{
		try {	
			$handle = fopen ($file_path, "w+");
			$content = "<?php \n";
			$content .= "/** \n";
			$content .= " * Generated time: " . date('Y-m-d H:i:s') . " \n";
			$content .= "**/ \n";
			$content .= "?>\n";
			fwrite($handle, $content);
			fclose($handle);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}
}