<?php
$title = (Session::read('face.title')) ? Session::read('face.title') : Config::read('face.title');
$type = (Session::read('face.type')) ? Session::read('face.type') : Config::read('face.type');
$description = (Session::read('face.description')) ? Session::read('face.description') : Config::read('face.description');
$url = (Session::read('face.url')) ? Session::read('face.url') : Config::read('face.url');
$image = (Session::read('face.image')) ? Session::read('face.image') : Config::read('face.image');
$site_name = (Session::read('face.site_name')) ? Session::read('face.site_name') : Config::read('face.site_name');
?>
<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:type" content="<?php echo $type; ?>"/>
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:url" content="<?php echo $url; ?>"/>
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:site_name" content="<?php echo $site_name; ?>"/>
