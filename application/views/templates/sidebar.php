<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-church "></i>
		</div>
<!--		<div class="sidebar-brand-icon">-->
<!--			<img src="--><?//= base_url('/assets/img/Logo GBI Jogosetran.png') ?><!--" class="img-circle elevation-2" width="40" height="43">-->
<!--		</div>-->
		<div class="sidebar-brand-text mx-3">GBI JOGOSETRAN </div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider ">

	<!-- Heading -->
	<div class="sidebar-heading" style="color: #fafafa;">
		Menu
	</div>

	<!-- QUERY MENU -->

	<?php
	$role_id = $this->session->userdata('role_id');
	$queryMenu = "SELECT `user_menu`.`id`,`menu`
  					FROM `user_menu` JOIN `user_access_menu`
  				 	ON  `user_menu`.`id` = `user_access_menu`.`menu_id`
 					WHERE `user_access_menu`.`role_id` = 1
					ORDER BY `user_access_menu`.`menu_id` ASC 
 					";
	$menu = $this->db->query($queryMenu)->result_array();


	?>



	<!-- LOOPING MENU -->
	<?php foreach ($menu as $m) : ?>
		<div class="sidebar-heading">
			<?= $m['menu']; ?>
		</div>


		<!-- SIAPKAN SUB-MENU SESUAI MENU -->
		<?php
		$menuId = $m['id'];
		$querySubMenu = "SELECT *
  							FROM `user_sub_menu` JOIN `user_menu`
  							ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
  							WHERE `user_sub_menu`.`menu_id` = $menuId
							AND `user_sub_menu`.`is_active` = 1
  							      ";
		$subMenu = $this->db->query($querySubMenu)->result_array();
		?>

		<?php foreach ($subMenu as $sm) : ?>
			<?php if ($title == $sm['title']) : ?>
				<li class="nav-item active">
			<?php else : ?>
				<li class="nav-item">
			<?php endif; ?>
			<a class="nav-link" href="<?= base_url($sm['url']); ?>">
				<i class="f<?= $sm['icon']; ?>"></i>
				<span><?= $sm['title']; ?></span></a>
			</li>

		<?php endforeach;?>



	<?php endforeach;?>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Admin')?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>DASHBOARD</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Jemaat')?>">
			<i class="fa fa-users"></i>
			<span>DATA JEMAAT</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Pendeta'); ?>">
			<i class="fas fa-user-tie"></i>
			<span>DATA PENDETA</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Pengurus'); ?>">
			<i class="fas fa-user-friends"></i>
			<span>DATA PENGURUS</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Baptis'); ?>">
			<i class="fas fa-swimming-pool"></i>
			<span>DATA BAPTIS</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Nikah'); ?>">
			<i class="fas fa-ring"></i>
			<span>DATA PERNIKAHAN</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('PindahJemaat'); ?>">
			<i class="fas fa-users-slash"></i>
			<span>DATA PINDAH JEMAAT</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Cerai'); ?>">
			<i class="fas fa-heart-broken"></i>
			<span>DATA PERCERAIAN</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('Mati'); ?>">
			<i class="fas fa-cross"></i>
			<span>DATA KEMATIAN</span>
		</a>
	</li>



	<!-- Nav Item - Charts -->
	<li class="nav-item bg-dark">
		<a class="nav-link" href="<?= base_url('auth/logout')?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>



	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
