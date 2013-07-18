<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php //print $rdf_namespaces;?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php print $head; ?>
		
		<title><?php print $head_title; ?></title>
		
		<?php print $styles; ?>
		
		<!-- HTML5 element support for IE6-8 -->
		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<?php print $scripts; ?>
		
	</head>

	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		<?php require_once('header.tpl.php'); ?>
		
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
		
		<?php require_once('footer.tpl.php'); ?>
	</body>
	
</html>
