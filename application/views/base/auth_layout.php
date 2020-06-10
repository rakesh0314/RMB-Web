<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?> | <?= $this->config->item('APP_NAME'); ?></title>
  <?php 
	include_once "shared/common_css.php";
  ?>
</head>
<body>
        <?= $content; ?>

  <?php 
		include_once "shared/common_js.php";
	?>
</body>
</html>