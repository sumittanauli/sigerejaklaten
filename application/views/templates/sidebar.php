<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon">
			<i class="fas fa-church "></i>
		</div>
		<div class="sidebar-brand-text mx-3">GBI JOGOSETRAN </div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider ">


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

	<li class="nav-item bg-dark">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
		   aria-controls="collapseTwo">
			<i class="fas fa-book"></i>
			<span>DOKUMEN</span>
		</a>
		<div id="collapseTwo" class="collapse show bg-dark" aria-labelledby="headingTwo"
			 data-parent="#accordionSidebar">
			<div class="bg-gradient-dark py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data</h6>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Jemaat')?>">
					<i class="fa fa-users"></i>  Data Jemaat
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Pendeta')?>">
					<i class="fas fa-user-tie"></i>  Data Pendeta
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Pengurus')?>">
					<i class="fas fa-user-friends"></i>  Data Pengurus
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Baptis')?>">
					<i class="fas fa-swimming-pool"></i>  Data Baptis
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Nikah')?>">
					<i class="fas fa-ring"></i>  Data Pernikahan
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('PindahJemaat')?>">
					<i class="fas fa-users-slash"></i>  Data Pindah Jemaat
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Cerai')?>">
					<i class="fas fa-heart-broken"></i>  Data Perceraian
				</a>
				<a class="collapse-item alert-dark dark mb-3" href="<?= base_url('Mati')?>">
					<i class="fas fa-cross"></i>  Data Kematian
				</a>
			</div>
		</div>
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
