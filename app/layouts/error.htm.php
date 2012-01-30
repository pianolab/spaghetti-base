<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Erro encontrado!</title>
	<meta name="author" content="Pianolab">
	<?php echo $html->stylesheet(array("sample.css")); ?>
	<?php echo $this->element('shared/analytics'); ?>
</head>
<body>
	<section id="container">
		<header></header>
		<div id="content">
			<div id="wrapper">
			    <h1>Error.page.404</h1>
			    <?php if (Config::read('debug')): ?>
					<?php echo $this->contentForLayout; ?>
				<?php endif; ?>
		  </div>
		</div>
	</section> <!-- End Container -->
	<footer></footer>
</body>
</html>
