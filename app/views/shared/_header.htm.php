<?php $this->pageTitle = ($page_title) ? $page_title : $this->pageTitle; ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->pageTitle; ?></title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Le styles -->
	<?php echo $html->stylesheet(array(
		'bootstrap.min',
		'screen'
	)); ?>

	<?php echo $this->element('shared/favicons'); ?>
	<?php echo $this->element('shared/facebook_tags'); ?>
	<?php echo $html->script('libs/modernizr-2.5.3-respond-1.1.0.min.js'); ?>
  </head>

  <body>
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <div class="container">