<?php
App::import("Component", "m2brimagem.class");
class ImageResizeComponent extends Component
{
	public function resize($file, $width, $height)
	{
		$oImg = new m2brimagem($file);
		$validates = $oImg->valida();
		if ($validates == 'OK') {
			$oImg->redimensiona($width,$height,'crop');
		    $oImg->grava();
		} else {
			die($validates);
		}
	}
	
	public function grayscale($file, $width, $height)
	{
		$oImg = new m2brimagem($file,null,true);
		$validates = $oImg->valida();
		if ($validates == 'OK') {
			$oImg->redimensiona($width,$height,'crop');
		  	$oImg->grava();
		} else {
			die($validates);
		}
	}
}
?>