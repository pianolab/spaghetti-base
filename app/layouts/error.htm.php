<?php header("HTTP/1.0 404 Page not Found"); ?>
<?php $this->pageTitle = $page_title ? $page_title : $this->pageTitle; ?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <?php echo $html->stylesheet("application", array(), true, true); ?>
  <title><?php echo $this->pageTitle; ?></title>
</head>
<body>
  <!-- header
  ================================================== -->
  <?php echo $this->element("layout/header"); ?>
  <section class="hero-unit container">
    <h1>Error.page.404</h1>

    <?php echo $this->contentForLayout; ?>
    <p><?php echo $html->link("Go to HOME", "/", array("class" => "btn btn-default btn-large")) ?></p>
  </section> <!-- /container -->
  <!-- footer
  ================================================== -->
  <?php echo $this->element("layout/footer"); ?>
</body>
</html>