<?php
	$page = strtolower($this->uri->segment(1));

	if ($this->session->userdata('status') != 'login') {
		redirect('login');
	}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>AKIM DATA WARGA</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  	<!-- DataTables -->
  	<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  	<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/sweetalert/sweetalert.css">
  	<link rel="stylesheet" href="<?=base_url('assets/')?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<style type="text/css">
		.swal2-container {
		  z-index: 1000;
		}
	</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">
			<img src="<?=base_url('assets/')?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
			<span class="brand-text font-weight-light">AdminLTE 3</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="javascript:;" class="d-block"><?=$this->session->userdata('nama')?></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item">
						<a href="<?=base_url()?>" class="nav-link <?= ($page=='') ? 'active' : '' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('warga')?>" class="nav-link <?= ($page=='warga') ? 'active' : '' ?>"">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Data Warga
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('kartu_keluarga')?>" class="nav-link <?= ($page=='kartu_keluarga') ? 'active' : '' ?>"">
							<i class="nav-icon fas fa-address-card"></i>
							<p>
								Data Kartu Keluarga
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('mutasi')?>" class="nav-link <?= ($page=='mutasi') ? 'active' : '' ?>"">
							<i class="nav-icon fas fa-address-book"></i>
							<p>
								Data Mutasi
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('login/logout')?>" class="nav-link">
							<i class="nav-icon fas fa-sign-out-alt"></i>
							<p>
								Logout
							</p>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

