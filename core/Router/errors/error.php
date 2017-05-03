<?php 
require_once ROOT_DIR.'core/Router/includes/router_inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/app.css';?>">
	<title> Error 404 </title>
</head>
	<body>
	<div class="container" style="margin-top: 150px;">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"> ERROR </h1>
				<div id="err" class="text-center" style="color:red;"></div>
				<div class="text-center"> Return to <a href="<?php echo base_url();?>"> Main Page </a></div>
			</div>
			
		</div>
	</div>

	</body>
</html>