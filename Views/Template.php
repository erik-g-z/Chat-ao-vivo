<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-compatible" content="ie=edge">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="Assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css">
		<script type="text/javascript" src="Assets/js/scripts.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	</head>

	<body>
		<div class="environment" style="background-color: <?php 
				if (isset($_SESSION['area']) && $_SESSION['area'] == 'suporte') {
					echo "#ff0000";
				}else if(isset($_SESSION['area']) && $_SESSION['area'] == 'cliente'){
					echo "#00ff00";
				}else{
					echo "#000";
				} ?>">
		</div>

		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</body>
</html>