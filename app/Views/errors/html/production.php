<?php $error_id = uniqid('error', true);?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">

	<title>Whoops!</title>

	<style type="text/css">
		<?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
	</style>
</head>
<body>

	<div class="container text-center">
		<h1 class="headline">Something Wrong :(</h1>
		<?php 
		if (esc($title) === 'CodeIgniter\Database\Exceptions\DatabaseException') { ?>
			<p class="lead">Can't connect to database right now, please check your database connector configuration.</p>
			<p class="lead"><a href="<?=base_url('/customers')?>">Go Back</a></p>
		<?php	
		}else { ?>
			<p class="lead">We seem to have hit a snag. Please try again later...</p>
		<?php
		} ?>
	</div>
</body>
</html>
