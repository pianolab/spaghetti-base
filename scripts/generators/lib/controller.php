<?php
/**
 *  @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 *  @copyright Copyright 2008-2010, Spaghetti* Framework (http://spaghettiphp.org/)
 *
 *  Generators for Spaghetti Framework 0.2 (@djalmaaraujo - http://www.djalmaaraujo.com.br/)
 * 
 **/
require_once 'utils/utils.php';

class Controller extends Utils
{

	public $extension = '.php';
	public $sufix = '_controller';
	public $document_root;
	private $args;
	private $output;
	
	public function __construct($args) {
		$this->args = $args;
		$this->document_root = dirname(__FILE__) . "/../../../app/controllers/";
	}
	
	public function match()
	{
		$this->output[] = "[Controller] Criando controllers.. \n";
		if ($this->args->names):
			for ($x = 0 ; $x<count($this->args->names) ; $x++):
				$new_controller->file_name = $this->underscore($this->args->names[$x] . $this->sufix . $this->extension);
				$new_controller->file = $this->document_root . $new_controller->file_name;
				$new_controller->name = $this->camelize($this->args->names[$x]);
				
				/**
				 * Methods
				 **/
				if ($this->args->methods):
					$new_controller->methods = '';
					foreach ($this->args->methods as $method):
						$new_controller->methods .= "\n";
						$new_controller->methods .= "	public function " . $method . "()\n";
						$new_controller->methods .= "	{\n";
						$new_controller->methods .= "	}\n";
						$new_controller->methods .= "\n";
					endforeach;
				else:
					$new_controller->methods = false;
				endif;
				
				if ($this->create_file($new_controller)):
					$this->output[] = '[Controller] ' . $new_controller->file_name . " criado com sucesso";
					
					/**
					 * Params
					 **/
					if ($this->args->params):
						foreach ($this->args->params as $param):
							switch ($param):
								case 'v':
									require_once('view.php');
									$objView->folder = strtolower($new_controller->name);
									$objView->files = $this->args->methods;
									$view = new View($objView);
									$view->match();
									$this->output[] = '[Controller/View] Views criadas com sucesso';
									break;
								case 'm':
									require_once('model.php');
									$objModel->names = array($new_controller->name);
									$objModel->table = array($new_controller->name);
									$model = new Model($objModel);
									$model->match();
									$this->output[] = '[Controller/Models] Models criados com sucesso';
									break;
							endswitch;
						endforeach;
					endif;
				else:
					$this->output[] = '[Controller] Falha ao criar ' . $new_controller->file_name;
				endif;
			endfor;
		else:
			$this->output = '[Controller] Não foram criados os controllers.';
		endif;
		return $this->output;
	}
	
	/**
	 * Create File
	 **/
	private function create_file($controller)
	{
		try {	
			$handle = fopen ($controller->file, "w+");
			$content = "<?php \n";
			$content .= "class " . $controller->name . "Controller extends AppController {\n";
			$content .= ($controller->methods) ? $controller->methods : '';
			$content .= "}";
			fwrite($handle, $content);
			fclose($handle);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}
}