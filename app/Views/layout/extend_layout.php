
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $this->renderSection('title') ?></title>
	<?= view('layout/style_base')?>
	<?= $this->renderSection('style') ?>
</head>
<body class="header-dark">
  <div class="header">
		<?= $this->renderSection('header-left') ?>
		<?= $this->renderSection('header-right') ?>
	</div>
	<div class="left-side-bar">
		<?= $this->renderSection('logo') ?>
		<div class="menu-block customscroll"> 
			<div class="sidebar-menu">
				<ul id="accordion-menu">
    			<?= $this->renderSection('menus') ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="min-height-100px">
				<?= $this->renderSection('contentheader');?>
	      <?= $this->renderSection('content') ?>
			</div>	
		</div>
	</div>
  <?= $this->renderSection('modal') ?>
	<?= view('layout/javascript_base')?>
	<?= $this->renderSection('javascript') ?>
</body>
</html>