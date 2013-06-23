<?php
function PrintHeader($title)
{
	?>
<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>
<link href="/tmpl/style.css" type="text/css" rel="stylesheet">
</head>
<body>	
<div id="wrapper">
	<div id="content">
	<?php
}
function PrintFooter()
{
?>
	</div>
</div>
</body>
</html>
<?php
}

function Connect()
{
$host = "evercodetest.dev";
$dbname = "evercodebase";
$user ="root";
$base = new PDO("mysql:host=$host;dbname=$dbname", $user); 
$base -> query("set names utf8");
return $base;
}
?>