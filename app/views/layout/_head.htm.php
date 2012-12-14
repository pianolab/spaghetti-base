<meta charset="utf-8">
<title><?php echo $this->pageTitle; ?></title>
<meta name="viewport" content="width=device-width">
<meta name="description" content="" />
<meta name="author" content="" />

<!-- Le IE dependeces
================================================== -->
<!--[if lt IE 7]>
  <p class=chromeframe>
    Your browser is <em>ancient!</em> 
    <a href="http://browsehappy.com/">Upgrade to a different browser</a> or 
    <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> 
    to experience this site.
  </p>
<![endif]-->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]><?php echo $html->script('html5'); ?><![endif]-->

<!-- Le styles 
================================================== -->
<?php echo $html->stylesheet(array('reset', 'bootstrap/bootstrap.min', 'screen', 'jcheck')); ?>
<?php echo $this->stylesForLayout; ?>

<!-- Le favicons 
================================================== -->
<?php echo $this->element('layout/favicons'); ?>

<!-- Le facebook tags 
================================================== -->
<?php echo $this->element('layout/facebook'); ?>