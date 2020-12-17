<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Admin Web <?= SITE_NAME;?></title>

	<meta name="description" content="top menu &amp; navigation" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assetsadmin/img/favicon-elecomp.png" type="image/x-icon" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsadmin/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsadmin/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsadmin/css/all.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsadmin/css/ace-fonts.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assetsadmin/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
	<link href="<?= base_url(); ?>assetsadmin/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assetsadmin/plugins/select2/select2.min.css" rel="stylesheet">
	<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assetsadmin/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assetsadmin/css/ace-ie.css" />
		<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?php echo base_url(); ?>assetsadmin/js/ace-extra.js"></script>
	<script src="<?= base_url(); ?>assetsadmin/jquery/jquery-2.1.4.min.js"></script>
	<script src="<?= base_url(); ?>assetsadmin/ckeditor/ckeditor.js"></script>

	<!-- ckeditor -->
	<!-- <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script> -->


	<!--[if lte IE 8]>
		<script src="../assetsadmin/js/html5shiv.js"></script>
		<script src="../assetsadmin/js/respond.js"></script>
		<![endif]-->

</head>
<script type="text/javascript">
	var table;
	// Clear Search & Reload Tabel
	function reload_table() {
		table.search('');
		table.ajax.reload(null, false);
	}

	function modal_show() {
		$('#modal_form').modal('show');
	}

	function modal_hide() {
		$('#modal_form').modal('hide');
	}

	function swal_berhasil() {
		swal({
			title: "SUCCESS",
			text: "Berhasil",
			type: "success",
			closeOnConfirm: true
		});
	}

	function swal_error(msg) {
		swal({
			title: "ERROR",
			text: msg,
			type: "warning",
			closeOnConfirm: true
		});
	}
	// Delete Data
	function delete_data(table, id) {
		swal({
				title: "Hapus Data",
				text: "Yakin akan menghapus data ini?",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Hapus",
				closeOnConfirm: true,
			},
			function() {
				$.ajax({
					url: "<?= site_url() ?>admin/delete/" + table + '/' + id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						$('#modal_form').modal('hide');
						swal({
							title: "SUCCESS",
							text: "Hapus Berhasil",
							type: "success",
							closeOnConfirm: true
						});
						reload_table();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						swal({
							title: "ERROR",
							text: "Error deleting data",
							type: "warning",
							closeOnConfirm: true
						});
					}
				});
			});
	}

	function undelete_data(table, id) {
		$.ajax({
			url: "<?= site_url() ?>admin/undelete/" + table + '/' + id,
			type: "POST",
			dataType: "JSON",
			success: function(data) {
				$('#modal_form').modal('hide');
				swal({
					title: "SUCCESS",
					text: "Data Berhasil Dikembalikan",
					type: "success",
					closeOnConfirm: true
				});
				reload_table();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				swal({
					title: "ERROR",
					text: "Error undeleting data",
					type: "warning",
					closeOnConfirm: true
				});
			}
		});
	}
</script>
<!-- <body class="hold-transition skin-blue sidebar-mini fixed"> -->

<body class="no-skin">
	<!-- #section:basics/navbar.layout -->
	<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
		<script type="text/javascript">
			try {
				ace.settings.check('navbar', 'fixed')
			} catch (e) {}
		</script>

		<div class="navbar-container" id="navbar-container">
			<div class="navbar-header pull-left">
				<!-- #section:basics/navbar.layout.brand -->
				<a href="#" class="navbar-brand">
					<small>
					 Admin <?= SITE_NAME;?>
					</small>
				</a>

				<!-- /section:basics/navbar.layout.brand -->

				<!-- #section:basics/navbar.toggle -->
				<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
					<span class="sr-only">Toggle user menu</span>

					<img src="<?= base_url(); ?>assetsadmin/avatars/avatar2.png" alt="Jason's Photo" />
				</button>

				<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/navbar.toggle -->
			</div>

			<!-- #section:basics/navbar.dropdown -->
			<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue user-min">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo base_url(); ?>assetsadmin/avatars/avatar6.png" alt="Jason's Photo" />
							<span class="user-info">
								<small>Welcome, <?php echo $this->session->userdata('admin_username'); ?></small>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="<?= base_url() ?>login/logout">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>

			<!-- /section:basics/navbar.dropdown -->
			<nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">

				<!-- /section:basics/navbar.form -->
			</nav>
		</div><!-- /.navbar-container -->
	</div>

	<!-- /section:basics/navbar.layout -->
	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.check('main-container', 'fixed')
			} catch (e) {}
		</script>

		<!-- #section:basics/sidebar.horizontal -->
		<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse">
			<script type="text/javascript">
				try {
					ace.settings.check('sidebar', 'fixed')
				} catch (e) {}
			</script>

			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="ace-icon fa fa-signal"></i>
					</button>

					<button class="btn btn-info">
						<i class="ace-icon fa fa-pencil"></i>
					</button>

					<!-- #section:basics/sidebar.layout.shortcuts -->
					<button class="btn btn-warning">
						<i class="ace-icon fa fa-users"></i>
					</button>

					<button class="btn btn-danger">
						<i class="ace-icon fa fa-cogs"></i>
					</button>

					<!-- /section:basics/sidebar.layout.shortcuts -->
				</div>

				<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>

					<span class="btn btn-info"></span>

					<span class="btn btn-warning"></span>

					<span class="btn btn-danger"></span>
				</div>
			</div><!-- /.sidebar-shortcuts -->

			<?php $this->load->view('admin/view_menu'); ?>

			<!-- #section:basics/sidebar.layout.minimize -->

			<!-- /section:basics/sidebar.layout.minimize -->
			<script type="text/javascript">
				try {
					ace.settings.check('sidebar', 'collapsed')
				} catch (e) {}
			</script>
		</div>

		<!-- /section:basics/sidebar.horizontal -->
		<div class="main-content">
			<div class="main-content-inner">
				<div class="page-content">
					<div class="row">
							<?php $this->load->view($view_file) ?>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content --><br />
		<?php $this->load->view('admin/vfooter'); ?>