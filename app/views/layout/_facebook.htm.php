<?php $title = (Session::read('face.title')) ? Session::read('face.title') : FACE_TITLE; ?>
<?php if (!empty($title)): ?>
  <meta property="og:title" content="<?php echo $title; ?>" />
<?php endif ?>

<?php $type = (Session::read('face.type')) ? Session::read('face.type') : FACE_TYPE; ?>
<?php if (!empty($type)): ?>
  <meta property="og:type" content="<?php echo $type; ?>"/>
<?php endif ?>

<?php $description = (Session::read('face.description')) ? Session::read('face.description') : FACE_DESCRIPTION; ?>
<?php if (!empty($description)): ?>
  <meta property="og:description" content="<?php echo $description; ?>" />
<?php endif ?>

<?php $url = (Session::read('face.url')) ? Session::read('face.url') : FACE_URL; ?>
<?php if (!empty($url)): ?>
  <meta property="og:url" content="<?php echo $url; ?>"/>
<?php endif ?>

<?php $image = (Session::read('face.image')) ? Session::read('face.image') : FACE_IMAGE; ?>
<?php if (!empty($image)): ?>
  <meta property="og:image" content="<?php echo $image; ?>" />
<?php endif ?>

<?php $site_name = (Session::read('face.site_name')) ? Session::read('face.site_name') : FACE_SITE_NAME; ?>
<?php if (!empty($site_name)): ?>
  <meta property="og:site_name" content="<?php echo $site_name; ?>"/>
<?php endif ?>