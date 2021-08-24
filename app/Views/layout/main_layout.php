<?= $this->extend('layout/extend_layout')?>

<?= $this->section('title') ?>
	<?=$title?>
<?=$this->endSection()?>

<?= $this->section('style') ?>
<?php
	if ($style != false ) {
		foreach ($style as $key => $value) {
			echo view($value);
		}
	}
?>
<?=$this->endSection()?>

<?= $this->section('header-left') ?>
	<div class="header-left">
		<div class="menu-icon dw dw-menu">
		</div>	
	</div>
<?=$this->endSection()?>

<?= $this->section('header-right') ?>
	<div class="header-right">
		<div class="user-info-dropdown">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
						<img src="<?=base_url('public')?>/vendors/images/photo1.jpg" alt="">
					</span>
					<span class="user-name"><?= $this->renderSection('username') ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="<?=base_url("/profile")?>"><i class="dw dw-user1"></i> Profile</a>
					<a class="dropdown-item" href="<?=base_url("/setting")?>"><i class="dw dw-settings2"></i> Konfigurasi</a>
					<a class="dropdown-item" href="<?=base_url("/faq")?>"><i class="dw dw-help"></i> Bantuan</a>
					<a class="dropdown-item" href="<?=base_url("/logout")?>"><i class="dw dw-logout"></i> Keluar</a>
				</div>
			</div>
		</div>
	</div>
<?=$this->endSection()?>

<?= $this->section('logo') ?>
	<div class="brand-logo">
		<a href="<?=base_url()?>">
			<img src="<?=base_url('public')?>/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
			<img src="<?=base_url('public')?>/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
<?=$this->endSection()?>

<?= $this->section('menus') ?>
	<?=view($menu)?>
<?=$this->endSection()?>

<?= $this->section('contentheader') ?>
	<?=view($heading)?>
<?=$this->endSection()?>

<?= $this->section('content') ?>
	<?=view($content['content_body'])?>
<?=$this->endSection()?>

<?=$this->section('modal') ?>
<!-- modal content -->
<?=$this->endSection()?>

<?=$this->section('javascript') ?>
	<?php
	if ($javascript != false) {
		foreach ($javascript as $key => $value) {
			echo view($value);
		}
	}
	?>
<?=$this->endSection()?>