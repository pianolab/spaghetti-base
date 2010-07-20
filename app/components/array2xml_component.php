<?php
App::import("Component", "array2xml");
class Array2xmlComponent extends Component
{
	private $xml;
	public $root = 'root';
	public $node_name = 'node';
	
	public function returnXml($array)
	{

		$this->xml = new array2xml($this->root, $this->node_name);
	    $this->xml->createNode( $array );
	    return $this->xml;
	}
}
?>