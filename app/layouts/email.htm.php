<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>E-mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Le styles -->
    <?php echo $html->stylesheet("application", array(), true, true); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  </head>

  <body>
    <div class="container">
    <?php echo $this->contentForLayout; ?>
  </div>
  </body>
</html>