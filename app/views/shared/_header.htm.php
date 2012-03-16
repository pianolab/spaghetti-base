<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Le styles -->
	<?php echo $html->stylesheet(array(
		'bootstrap.min',
		'screen'
	)); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<?php echo $this->element('shared/favicons'); ?>
	<?php echo $this->element('shared/facebook_tags'); ?>
  </head>

  <body>
    <div class="container">