<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <title>Preview - Spaghetti*</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="preview/styles.css" media="all" />
</head>

<body>
    <h1>Preview - Spaghetti*</h1>
    <?php
        include "preview/textile.php";
        $content = file_get_contents("{$_GET['file']}.textile");
        $textile = new Textile();
        echo $textile->TextileThis($content);
    ?>
</body>
</html>