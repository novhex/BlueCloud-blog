<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url().'assets/app.css'; ?>" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'; ?>" rel="stylesheet" type="text/css">

	<title><?php echo $error_type; ?></title>
</head>
	<body>
	<div class="container" style="margin-top: 70px;">
		<div class="row">
			<div class="col-md-12">

				<div class="text-center"><?php echo $message; ?>.</div>
				<div class="text-center">Click<a href="<?php echo base_url();?>">Here</a> to return home.</div>
				<div class="text-center">Powered by <i style="color:cyan;" class="fa fa-cloud"></i></div>
			</div>
		</div>
	</div>
	</body>
</html>