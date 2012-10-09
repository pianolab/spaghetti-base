<?php $this->pageTitle = $page_title ? $page_title : $this->pageTitle; ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <?php echo $this->element('layout/head'); ?>
</head>

<body>
  <!-- header 
  ================================================== -->
  <?php echo $this->element('layout/header'); ?>

  <section class="container">
    <?php echo $this->contentForLayout; ?>
  </section> <!-- /container -->

  <!-- footer 
  ================================================== -->
  <?php echo $this->element('layout/footer'); ?>
</body>
<!-- Le javascript
================================================== -->
<?php echo $this->element('layout/scripts'); ?>

<!-- Le alert modal
================================================== -->
<?php echo $this->element('layout/alert_modal'); ?>

<!-- Le analytics
================================================== -->
<?php echo $this->element('layout/analytics'); ?>
</html>