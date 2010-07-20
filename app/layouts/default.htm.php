<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>titulo do site</title>
	<meta name="author" content="Pianolab">
	<!-- Date: 2010-05-26 -->
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<?php
		echo $html->stylesheet(array("screen.css"));
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<img src="<?php echo Mapper::url('/images/logo.png'); ?>" width="258" height="246" alt="Logo" />
			<ul id="menu">
			<li></li>
			</ul>
		</div>
		<div id="content">
			<?php echo $this->contentForLayout; ?>
		</div>
	</div>
	<div id="footer">
	</div>
</body>
</html>