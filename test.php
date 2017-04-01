<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Das Schwarzebrett-2</title>
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
$hallu="admin";
$test = password_hash($hallu,PASSWORD_DEFAULT);
echo"$test";
?>
</body>
</html>
