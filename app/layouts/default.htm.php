<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $page_title; ?></title>
	<meta name="author" content="Pianolab">
	<?php
		echo $html->stylesheet(array("screen.css"));
		echo $html->script(array("jquery-1.4.2.min.js", "functions.js"));
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<a href="<?php echo Mapper::url('/'); ?>"><img src="<?php echo Mapper::url('/images/logo.png'); ?>" width="258" height="246" alt="Logo" /></a>
			<ul id="nav">
				<li></li>
			</ul>
		</div>
		<div id="content">
			<?php echo $this->contentForLayout; ?>
		</div>
	</div>
	<div id="footer"><div>
</body>
</html>