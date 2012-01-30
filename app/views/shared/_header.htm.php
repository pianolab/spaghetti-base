<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo $page_title; ?></title>
	<meta name="author" content="Pianolab">
	<?php echo $html->stylesheet(array("sample.css")); ?>
	<?php echo $html->script(array(
		"jquery-1.6.1.min.js", 
		"modernizr-2.0.6.min.js", 
		"application.js", 
		"utils.js")); 
	?>
	<!--[if lt IE 9]><script src="<?php echo Mapper::url('/scripts/html5.js', true); ?>"></script><![endif]-->
	<?php echo $this->element('shared/analytics'); ?>
</head>
<body>
	<section id="container">
		<header></header>