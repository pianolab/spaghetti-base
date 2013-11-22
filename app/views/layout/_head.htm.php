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
<?php echo $html->stylesheet('application'); ?>
<?php echo $this->stylesForLayout; ?>

<!-- Le favicons 
================================================== -->
<?php echo $this->element('layout/favicons'); ?>

<!-- Le facebook tags 
================================================== -->
<?php echo $this->element('layout/facebook'); ?>

<?php $minify->jsAddUrl(array(
  # jQuery v1.10.2 
  'vendors/jquery/jquery',
  # Bootstrap v3.0.2
  'vendors/bootstrap/bootstrap', 
  'vendors/bootstrap/prompt.modal',
  # Modernizr 2.7.0 (Custom Build)
  'vendors/modernizr',
  # jquery.meio.mask 1.1.11
  'vendors/meio.mask/jquery.meio.mask',
  'vendors/meio.mask/jquery.meio.mask.init',
  # jQuery Validation Plugin 1.11.1
  'vendors/validate/jquery.validate',
  'vendors/validate/jquery.validate.init'
)); ?>