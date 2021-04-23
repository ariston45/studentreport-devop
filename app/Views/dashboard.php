<!DOCTYPE html>
<html>
<!-- Head -->
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('/public')?>/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('/public')?>/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('/public')?>/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('/public')?>/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/public')?>/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/public')?>/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/public')?>/src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/public')?>/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<!-- body -->
<body>
  <!-- Header -->
  <div class="header">
    <!-- header left -->
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>	
		</div>
    <!-- header right -->
		<div class="header-right">
      <!-- user info & menu -->
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="<?=base_url('/public')?>/vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name">Ross C. Lopez</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="<?=base_url("/profile")?>"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="<?=base_url("/setting")?>"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="<?=base_url("/faq")?>"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="<?=base_url("/logout")?>"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

  <!-- left menu sidebar -->
	<div class="left-side-bar">
    <!-- logo instansi -->
		<div class="brand-logo">
			<a href="#">
				<img src="<?=base_url('/public')?>/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?=base_url('/public')?>/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>

    <!-- left menu -->
		<div class="menu-block customscroll"> 
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
						<ul class="submenu">
							<li><a href="index.html">Dashboard style 1</a></li>
							<li><a href="index2.html">Dashboard style 2</a></li>
							<li><a href="index3.html">Dashboard style 3</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext">Forms</span>
						</a>
						<ul class="submenu">
							<li><a href="form-basic.html">Form Basic</a></li>
							<li><a href="advanced-components.html">Advanced Components</a></li>
							<li><a href="form-wizard.html">Form Wizard</a></li>
							<li><a href="html5-editor.html">HTML5 Editor</a></li>
							<li><a href="form-pickers.html">Form Pickers</a></li>
							<li><a href="image-cropper.html">Image Cropper</a></li>
							<li><a href="image-dropzone.html">Image Dropzone</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
  <!-- mobile overlay menu -->
	<div class="mobile-menu-overlay"></div>

  <!-- main content / main container -->
	<div class="main-container">
		<div class="pd-ltr-20">
      <!-- content here -->
			<?= $this->renderSection('content') ?>
      <!-- <div class="min-height-100px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>blank</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">blank</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
              <a class="btn btn-primary" href="#" role="button">
								January 2018
							</a>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				</div>
			</div> -->
			<!-- end of content -->
		</div>
	</div>
  <!-- end of container -->


	<!-- js -->
	<script src="<?=base_url('/public')?>/vendors/scripts/core.js"></script>
	<script src="<?=base_url('/public')?>/vendors/scripts/script.min.js"></script>
	<script src="<?=base_url('/public')?>/vendors/scripts/process.js"></script>
	<script src="<?=base_url('/public')?>/vendors/scripts/layout-settings.js"></script>
	<script src="<?=base_url('/public')?>/src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="<?=base_url('/public')?>/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('/public')?>/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url('/public')?>/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url('/public')?>/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="<?=base_url('/public')?>/vendors/scripts/dashboard.js"></script>

</body>
</html>