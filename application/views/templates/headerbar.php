<div class="headerbar">

	<!-- LOGO -->
	<div class="headerbar-left">

		<?php if ($this->session->userdata('level')=='admin') : ?>
		<a href="<?= base_url(); ?>Dashboard" class="logo"><img alt="Logo" src="<?= base_url(); ?>assets/logo/Logo_BPPT.png" /> <span>HRMS</span></a>
		<?php elseif ($this->session->userdata('level')=='pegawai') :  ?>
		<a href="<?= base_url(); ?>Menu" class="logo"><img alt="Logo" src="<?= base_url(); ?>assets/logo/Logo_BPPT.png" /> <span>HRMS</span></a>
		<?php endif; ?>
	</div>

	<nav class="navbar-custom">

		<ul class="list-inline float-right mb-0">


			<li class="list-inline-item dropdown notif">
				<a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
					<img src="<?= base_url(); ?>upload/foto/profile/<?= $this->session->userdata('foto') ?>" alt="Profile image" class="avatar-rounded">
				</a>
				<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
					<!-- item-->
					<div class="dropdown-item noti-title ">
						<h5 class="text-overflow"><small>Hello, <?= $this->session->userdata('username') ?></small> </h5>
					</div>

					<!-- item-->
					<a href="<?= base_url(); ?>Profile/index/<?= $this->session->userdata('nip') ?>" class="dropdown-item notify-item">
						<i class="fa fa-user"></i> <span>Profile</span>
					</a>
					<a href="<?= base_url(); ?>Akun/ubahPassword/<?= $this->session->userdata('username') ?>" class="dropdown-item notify-item">
						<i class="fa fa-lock"></i> <span>Ubah Password</span>
					</a>

					<!-- item-->
					<a href="<?= base_url(); ?>Dashboard/logout" class="dropdown-item notify-item">
						<i class="fa fa-power-off"></i> <span>Logout</span>
					</a>

				</div>
			</li>

		</ul>

		<ul class="list-inline menu-left mb-0">
			<li class="float-left">
				<button class="button-menu-mobile open-left">
					<i class="fa fa-fw fa-bars"></i>
				</button>
			</li>
		</ul>

	</nav>

</div>