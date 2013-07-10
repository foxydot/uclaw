<html>
	<head>
		<title>Fix</title>
	</head>
	<body>
<?php
	$input = trim($_POST['input']);
	
	$array = explode("\n", $input);
	
	echo '<textarea>';
	foreach($array as $new) {
		echo '<li><a href="#">' . trim($new) . '</a></li>' . "\n";	
	}
	echo '</textarea>';
	
?>


<br /><br />


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
	<textarea name="input"></textarea>
	<input type="submit" value="Process">
</form>