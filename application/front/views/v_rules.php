<!DOCTYPE html>
<html>
<head>
	<title>Règles du concours</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php 
		$json = file_get_contents("data.json");
		$parsed_json = json_decode($json);
		$rules = $parsed_json->{'rules'};
	?>
</head>
<body>
	<h1 style="font-size: 28pt; text-align: center;">Règles du concours</h1>
	<?php echo $rules; ?>
</body>
</html>