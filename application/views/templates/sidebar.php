<div class="left main-sidebar">
<?php
	function checkStatus (){
		$ci =& get_instance();
		if ($ci->session->userdata('status')=='PNS'){
            return 'hidden';
        }else{
            return '';
        }
	}
?> 
	<div class="sidebar-inner leftscroll">

		<div id="sidebar-menu">

			<ul>
				<?php if ($this->session->userdata('level')=='admin') : ?>
				<li class="submenu">
					<a class="nav-link" href="<?= base_url(); ?>Dashboard"><i class=" fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
				</li>
				<li class="submenu">
					<a class="nav-link" href="<?= base_url(); ?>DataPegawai"><i class="fa fa-fw fa-id-card-o"></i><span> Data Pegawai </span> </a>
				</li>
				
				<li class="submenu">
					<a class="nav-link" href="<?= base_url(); ?>Datauser"><i class="fa fa-fw fa-user-o"></i><span> Data user </span> </a>
				</li>

				<?php elseif ($this->session->userdata('level')=='pegawai' && $this->session->userdata('keterangan')!='NON PNS') :  ?>
				<li class="submenu">
					<a class="nav-link" href="<?= base_url(); ?>Menu"><i class="fa fa-fw fa-tasks"></i><span> Dashboard </span> </a>
				</li>
				<?php else : ?>
				<li class="submenu">
				<a class="nav-link" href="<?= base_url(); ?>Menu"><i class="fa fa-fw fa-tasks"></i><span> Dashboard </span> </a>
				</li>
				<li class="submenu">
				<a class="nav-link" href="<?= base_url(); ?>Izin_cuti"><i class="fa fa-fw fa-tasks"></i><span> Izin/Cuti </span> </a>
				</li>
				<li class="submenu">
				<a class="nav-link" href="<?= base_url(); ?>Absen"><i class="fa fa-fw fa-tasks"></i><span> Absensi </span> </a>
				</li>
				<!--
				<li class="submenu">
					<a href="#"><i class="fa fa-fw fa-th"></i> <span> Kepegawaian </span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled">
						<li <?=checkStatus();?>>
								<form id="formGolongan" action="<?=base_url()?>Pangkat/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formGolongan').submit();">Golongan</a>
								</form>
						</li>
						<li <?=checkStatus();?>>
								<form id="formFungsional" action="<?=base_url()?>Fungsional/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formFungsional').submit();">Fungsional</a>
								</form>
						</li>
						<li <?=checkStatus();?>>
								<form id="formStruktural" action="<?=base_url()?>Struktural/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formStruktural').submit();">Struktural</a>
								</form>
						</li>
						<li >
								<form id="formPendidikan" action="<?=base_url()?>Pendidikan/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formPendidikan').submit();">Pendidikan</a>
								</form>
						</li>
						<li>
								<form id="formPelatihan" action="<?=base_url()?>Diklat/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formPelatihan').submit();">Pelatihan</a>
								</form>
						</li>
						<li>
								<form id="formKeluarga" action="<?=base_url()?>Keluarga/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formKeluarga').submit();">Keluarga</a>
								</form>
						</li>
						<li>
								<form id="formSeminar" action="<?=base_url()?>Seminar/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formSeminar').submit();">Seminar</a>
								</form>
						</li>
						<li>
								<form id="formPengalaman" action="<?=base_url()?>Pengalaman/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formPengalaman').submit();">Pengalaman Kerja</a>
								</form>
						</li>
						<li>
								<form id="formBahasa" action="<?=base_url()?>Bahasa/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formBahasa').submit();">Kemampuan Bahasa</a>
								</form>
						</li>
						<li>
								<form id="formKartu" action="<?=base_url()?>Kartu/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formKartu').submit();">Kartu</a>
								</form>
						</li>
						<li>
								<form id="formSk_lain" action="<?=base_url()?>Sk_lain/index" method="post">
									<input type="hidden" name="nip" value="<?=$this->session->userdata('nip')?>">
									<a href="javascript:{}" onclick="document.getElementById('formSk_lain').submit();">SK Lainnya</a>
								</form>
						</li>
					</ul>
				</li> -->
				<?php endif; ?>
			</ul>

			<div class="clearfix"></div>

		</div>

		<div class="clearfix"></div>

	</div>

</div>