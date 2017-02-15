<!DOCTYPE html>
<html>
<head>
	<title>Conditions générales d'utilisation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<?php 
		$json = file_get_contents("data.json");
		$parsed_json = json_decode($json);
		$cgu = $parsed_json->{'cgu'};
	?>
</head>
<body>
	<h1 style="font-size: 28pt; text-align: center;">Conditions générales d'utilisation</h1>
	<?php echo $cgu; ?>
</body>
</html>