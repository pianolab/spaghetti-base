<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title><?php echo Config::read('app.name'); ?> - ERRO 404 - Página não encontrada</title>
	<?php
	    //CSS
	    echo $html->stylesheet(array("screen.css")); 
	?>
	
</head>
<body style="background-image:none !important;">
	<div id="container" style="background-image:none !important; width:500px; margin:20px auto">
		<?php
		if (Config::read('debug')):
			echo $this->contentForLayout;
		endif;
		?>
	</div>
</body>
</html>