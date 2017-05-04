<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url('assets/app.css'); ?>" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css">

	<title><?php echo $error_type; ?></title>
</head>
	<body>
	<div class="container" style="margin-top: 180px;">
		<div class="row">
			<div class="col-md-12">

			<h1 class="text-center" style="font-weight: bold;">O O P P S S !!</h1>

				<div class="text-center"><?php echo $message; ?>.</div>
				<div class="text-center"><a href="<?php echo base_url();?>">Return Home</a></div>
				
			</div>
		</div>
	</div>
	</body>
</html>