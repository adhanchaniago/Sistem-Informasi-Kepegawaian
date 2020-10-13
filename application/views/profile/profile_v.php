<?php 
function getRemoteFilesize($url, $formatSize = true, $useHead = true)
{
    if (false !== $useHead) {
        stream_context_set_default(array('http' => array('method' => 'HEAD')));
    }
    $head = array_change_key_case(get_headers($url, 1));
    // content-length of download (in bytes), read from Content-Length: field
    $clen = isset($head['content-length']) ? $head['content-length'] : 0;

    // cannot retrieve file size, return "-1"
    if (!$clen) {
        return -1;
    }

    if (!$formatSize) {
        return $clen; // return size in bytes
    }

    $size = $clen;
    switch ($clen) {
        case $clen < 1024:
            $size = $clen .' B'; break;
        case $clen < 1048576:
            $size = round($clen / 1024, 2) .' KiB'; break;
        case $clen < 1073741824:
            $size = round($clen / 1048576, 2) . ' MiB'; break;
        case $clen < 1099511627776:
            $size = round($clen / 1073741824, 2) . ' GiB'; break;
    }

    return $size; // return formatted size
}
function checkAkses (){
	$ci =& get_instance();
	if ($ci->session->userdata('level')=='pegawai'){
		return 'hidden';
	}else{
		return '';
	}
}

function checkStruktural($struktural){
	if ($struktural != '4'){
		return 'hidden';
	}else{
		return '';
	}
}

?>
<!-- top bar navigation -->

<!-- End Navigation -->


<!-- Left Sidebar -->
<!-- End Sidebar -->


<div class="content-page">

	<!-- Start content -->
	<div class="content">

		<div class="container-fluid">

			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Profile</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item"><a href="<?=base_url();?>DataPegawai">Data Pegawai</a> </li>
							<li class="breadcrumb-item active">Profile</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->

		<?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-1 mr-1 ml-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('flash'); ?>  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>

		<?php if ($this->session->flashdata('flashgagal')) : ?>
        <div class="row mt-1 mr-1 ml-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('flashgagal'); ?>  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>


			<div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                    <div class="card mb-3 p-0" style="max-width: 20rem;">
                        <div class="card-header text-white bg-primary p-2 m-0" style="height:35px;">
							<h6><i class="fa fa-user mb-0"></i> Profile 
							
                            <a class="btn btn-light btn-sm float-right mt-2" href="<?=base_url();?>Profile/laporan_pdf/<?=$profil['nip']?>" style="border: 0.5px solid #428bca;" title="Cetak CV">
                                <i class="fa fa-file-pdf-o mb-0 text-danger"></i>
							</a>
							<?php if ($this->session->userdata('level')=='admin') : ?>
							<?php if ($profil['status_pgw']=="BLU") : ?>
                            <a href="<?=base_url();?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($profil['nip']) ?>" class="btn btn-light btn-sm float-right mt-2 mr-1" style="border: 0.5px solid #428bca;" title="Edit">
                                <i class="fa fa-edit mb-0 text-dark"></i>
                            </a>
							<?php else : ?>
                            <a href="<?=base_url();?>DataPegawai/editFormPegawai/<?=encrypt_url($profil['nip']) ?>" class="btn btn-light btn-sm float-right mt-2 mr-1" style="border: 0.5px solid #428bca;" title="Edit">
                                <i class="fa fa-edit mb-0 text-dark"></i>
                            </a>
							<?php endif; ?>
							<?php endif; ?>
                            </h6>
                        </div>
                        <div class="card-body pb-1">
                             <img src="<?=base_url();?>upload/foto/profile/<?=$profil['foto']; ?>" class="foto-table rounded mx-auto d-block" alt="...">
                             <div class="text-center">
                                <h6 class="mb-1"><?= $profil['nama']; ?></h6>
								<?php if($profil['status_pgw']=="BLU") : ?>
								<p></p>
								<?php else : ?>
                                <p><?= $profil['nip']; ?></p>
								<?php endif; ?>
							 </div>
                             <div class="ket m-0">
								 <i class="fa fa-vcard float-left" style="font-size: 18px;"></i>
								 <p class=" float-right mb-1 ">
								<?php if (isset($profil['golongan'])){
									
									 echo $profil['golongan']['id_golongan'].' - '.$profil['golongan']['pangkat']; 
									}else{
										echo "-";
									}
								 ?>
								 </p>
							 </div>
							 <div class="clearfix">
							 </div>
                             <div class="ket m-0">
								 <i class="fa fa-id-badge float-left" style="font-size: 18px;"></i>
								 <?php if(isset($profilStrukturalTerakhir)) : ?>
									<?php if($profil['status_pgw']=="BLU")  : ?>	
											<a href="<?=base_url();?>Struktural/editStruktural/<?=encrypt_url($profilStrukturalTerakhir['id_struktural'])?>" class="badge btn badge-success float-right mb-1 ml-1"  <?=checkAkses()?>>edit</a>
											<p class=" float-right mb-2 " style="font-size:12px"><?=$profilStrukturalTerakhir['nm_jabatan']?></p>					
									<?php else : ?>
										 <p class=" float-right mb-2 " style="font-size:12px"><?=$profilStrukturalTerakhir['nm_jabatan']?></p>
									<?php endif; ?>
								 <?php else : ?>
								 <form action="<?=base_url();?>Struktural/index" method="post"  <?=checkAkses()?>>
									 <input type="hidden" name="nip" value="<?=$profil['nip']?>">	
									 <button  class="badge btn badge-success float-right mb-1 ">set Jabatan</button>
								 </form>
								<?php endif; ?>
							 </div>
							 <div class="clearfix">
							 </div>
                             <div class="ket m-0">
								 <i class="fa fa-id-badge float-left" style="font-size: 18px;"></i>
								 
								 <p class=" float-right mb-1 "><?=$profil['keterangan']?></p>
							 </div>
                        </div>
                    </div>
                </div>

				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 col-xl-9 mb-3">
				<!-- tablink -->
					<div class="card">

						<div class="card-header tab bg-primary ">
								<button class="btn  tablinks " onclick="openCity(event, 'London')" id="defaultOpen">Profile</button>
								<button class="btn tablinks" onclick="openCity(event, 'Keluarga')" id="tabLinkkeluarga">Keluarga</button>
								<button class="btn tablinks" onclick="openCity(event, 'Bahasa')" id="tabLinkbahasa">Bahasa</button>
						</div>
						<div id="London" class="tabcontent">
								<!-- profil awal -->
								<div class="card-body p-0">
                            <div class="" >
							<?php if ($profil['status_pgw']=="BLU") : ?>

							<?php else : ?>
								<div class="form-group row mb-0 ">
                                    <label  class="col-sm-3  ">NIP</label>
                                    <div class="col-sm-9">
										<?=$profil['nip']?>
                                    </div>
                                </div>
								<div class="form-group row mb-0 ">
                                    <label  class="col-sm-3  ">NIP Lama</label>
                                    <div class="col-sm-9">
										<?=$profil['nip_lama']?>
                                    </div>
                                </div>
							<?php endif; ?>
                             
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Nama </label>
                                    <div class="col-sm-9">
										<?=$profil['nama']?>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Tanggal bergabung </label>
                                    <div class="col-sm-9">
										<?=$profil['tanggal_bergabung']?>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Tempat, Tanggal Lahir </label>
                                    <div class="col-sm-9">
										<?=$profil['tempat_lahir'].', '.$profil['tanggal_lahir'];?>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Agama </label>
                                    <div class="col-sm-9">
										<?=$profil['nama_agama']?>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Jenis Kelamin </label>
                                    <div class="col-sm-9">
										<?=$profil['jenis_kelamin']?>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Bidang </label>
                                    <div class="col-sm-7">
										<?=$profil['nama_bidang']?>
                                    </div>
                                </div>
                                <div class="form-group row mb-0" <?=checkStruktural($profilStrukturalTerakhir['level_jabatan'])?> >
                                    <label  class="col-sm-3  ">Sub Bidang </label>
									<?php if (empty($profilSubbid)) : ?>
									<div class="col-sm-2" <?=checkAkses()?>>
										<div class="dropdown">
										<a  class="dropdown-toggle text-success" data-toggle="dropdown" >
											Masukan
										</a>
										<div class="dropdown-menu p-2 shadow-sm">
											<div class="form-group m-0">
											<form action="<?=base_url()?>Profile/addStaffSubbid" method="post">
											<label for="" class="col-form-label-sm col-form-label" style="font-size:12px">Pilih Subbidang</label>
												<input type="hidden" name="nip" value="<?=$profil['nip']?>">
												<select name="id_subbidang"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
														<option data-tokens=".." value="..">..</option>
													<?php foreach($subbid as $row) :?>
														<option data-tokens="<?= $row['nama_subbidang']?>" value="<?= $row['id_subbidang']?>"><?= $row['nama_subbidang']?></option>
													<?php endforeach; ?>
												</select>
												<!-- <small id="passwordHelpBlock" class="form-text text-danger m-0" style="font-size:10px">
												satuan GB
												</small> -->
												<button type="submit" class="btn btn-sm btn-primary m-0" style="height:20px; font-size:10px">Submit</button>
											</form>
											</div>
										</div>
										</div>
									</div>
									<?php else : ?>
                                    <div class="col-sm-4">
										<?=$profilSubbid['nama_subbidang']?>
                                    </div>
									<div class="col-sm-2" <?=checkAkses()?>>
										<div class="dropdown">
											<a  class="dropdown-toggle text-success" data-toggle="dropdown">
												Ubah
											</a>
											<div class="dropdown-menu p-2 shadow-sm ">
											<div class="form-group m-0">
											<form action="<?=base_url()?>Profile/editStaffSubbid" method="post">
											<label for="" class="col-form-label-sm col-form-label" style="font-size:12px">Pilih Subbidang</label>
												<input type="hidden" name="id_staffsubbid" value="<?=$profilSubbid['id_staffsubbid']?>">
												<input type="hidden" name="nip" value="<?=$profil['nip']?>">
												<select name="id_subbidang"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
													<?php foreach($subbid as $row) :?>
														<?php if ($profilSubbid['nama_subbidang']==$row['nama_subbidang']) : ?>
														<option data-tokens="<?= $row['nama_subbidang']?>" value="<?= $row['id_subbidang']?>" selected><?= $row['nama_subbidang']?></option>
														<?php else : ?>
														<option data-tokens="<?= $row['nama_subbidang']?>" value="<?= $row['id_subbidang']?>"><?= $row['nama_subbidang']?></option>
														<?php endif; ?>
													<?php endforeach; ?>
												</select>
												<!-- <small id="passwordHelpBlock" class="form-text text-danger m-0" style="font-size:10px">
												satuan GB
												</small> -->
												<button type="submit" class="btn btn-sm btn-primary m-0" style="height:20px; font-size:10px">Submit</button>
											</form>
											</div>
										</div>
										</div>
									</div>
									<?php endif; ?>
                                </div>
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Jabatan Pelaksana </label>
                                    <div class="col-sm-7">
										<?=$profil['jabatan_pelaksana']?>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">Alamat </label>
                                    <div class="col-sm-9">
										<?=$profil['alamat']?>
                                    </div>
                                </div>
            
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3  ">No Telepon </label>
                                    <div class="col-sm-9">
										<?=$profil['no_telp']?>
                                    </div>
                                </div>
                            </div>
						</div>
								<!-- end profil -->
							</div>

							<div id="Keluarga" class="tabcontent">
							<?php if ($this->session->userdata('level')=='admin') : ?>
								<form action="<?=base_url()?>Keluarga/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
							<?php endif; ?>
								<table id="tableKeluarga" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Nama</th>
											<th class="p-1 text-center">Status Keluarga</th>
											<th class="p-1 text-center">Jenis Kelamin</th>
											<th class="p-1 text-center">Tanggal Lahir</th>
											<th class="p-1 text-center">Tanggal Menikah</th>
											<th class="p-1 text-center">Catatan</th>
											<th class="p-1 text-center">Action</th>
											<!-- <th class="p-1 text-center">Set</th> -->
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilKeluarga as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['nama_klg']?></td>	
												<td class="p-1" ><?=$row['status_klg']?></td>	
												<td class="p-1" ><?=$row['jk_klg']?></td>	
												<td class="p-1" ><?=$row['tl_klg']?></td>
												<?php if($row['status_klg']=='Suami' || $row['status_klg']=='Istri') : ?>
												<td class="p-1" ><?=$row['tl_menikah']?></td>
												<?php else : ?>
												<td>-</td>
												<?php endif; ?>
												<td class="p-1" ><?=$row['catatan']?></td>
												<td class="p-1 text-center" >
														<input type="hidden" value="<?=$row['id_keluarga']?>" name="id_keluarga">
													<a  href="<?=base_url();?>keluarga/editKeluarga/<?=encrypt_url($row['id_keluarga'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<?php if ($this->session->userdata('level')=='admin') : ?>
													<a href="" data-toggle="modal" data-target="#deleteKeluargaModal" data-id="<?=$row['id_keluarga'];?>" class="btn btn-danger btn-sm DeleteKeluargaModal">
														<i class="fa fa-trash"></i>
													</a>
													<?php endif; ?>
												</td>
												<!-- <td class="p-1 text-center">
													<a href="" class="badge badge-success m-0" title="jadikan golongan terakhir">
														Set
													</a>
												</td> -->
												
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>
									
							</div>


							<div id="Bahasa" class="tabcontent">

								<form action="<?=base_url()?>Bahasa/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<table id="tablebahasa" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Bahasa</th>
											<th class="p-1 text-center">Kemampuan Bahasa</th>
											<th class="p-1 text-center">Action</th>
											<!-- <th class="p-1 text-center">Set</th> -->
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilBahasa as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['bahasa']?></td>	
												<td class="p-1" ><?=$row['kemampuan_bahasa']?></td>	
												<td class="p-1 text-center" >
														<input type="hidden" value="<?=$row['id_bahasa']?>" name="id_bahasa">
													<a  href="<?=base_url();?>bahasa/editbahasa/<?=encrypt_url($row['id_bahasa'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteBahasaModal" data-id="<?=$row['id_bahasa'];?>" class="btn btn-danger btn-sm DeleteBahasaModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
												<!-- <td class="p-1 text-center">
													<a href="" class="badge badge-success m-0" title="jadikan golongan terakhir">
														Set
													</a>
												</td> -->
												
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>
									
							</div>

					</div>
				<!-- end-tablink -->
				</div>
			</div>

			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
					<div class="card">

						<div class="card-header tab bg-primary">
								<?php if($profil['status_pgw']=='BLU') : ?>
								<button class="btn tablinkss" onclick="openLink(event, 'Pendidikan')" id="tabLinkpendidikan">Pendidikan</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Pengalaman')"style='width:100px;' id="tabLinkpengalaman">Pengalaman</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Pelatihan')" id="tabLinkpelatihan">Pelatihan</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Seminar')" id="tabLinkseminar">Seminar</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Kartu')" id="tabLinkkartu">Kartu</button>
								<button class="btn tablinkss" onclick="openLink(event, 'SK Lainnya')" id="tabLinksk">SK Lainnya</button>
								<?php else : ?>
								<button class="btn tablinkss" onclick="openLink(event, 'test')" id="defaultOpens">Golongan</button>
								<button class="btn tablinkss" onclick="openLink(event, 'test2')" id="tabLinkfungsional">Fungsional</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Struktural')" id="tabLinkstruktural">Struktural</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Pendidikan')"id="tabLinkpendidikan">Pendidikan</button>
								<button class="btn tablinkss " onclick="openLink(event, 'Pelatihan')" id="tabLinkpelatihan">Pelatihan</button>
								<button class="btn tablinkss " onclick="openLink(event, 'Seminar')" id="tabLinkseminar">Seminar</button>
								<button class="btn tablinkss " onclick="openLink(event, 'Penghargaan')" style='width:100px;' id="tabLinkpenghargaan">Penghargaan</button>
								<button class="btn tablinkss " onclick="openLink(event, 'Pengalaman')"style='width:100px;' id="tabLinkpengalaman">Pengalaman</button>
								<button class="btn tablinkss" onclick="openLink(event, 'Kartu')" id="tabLinkkartu">Kartu</button>
								<button class="btn tablinkss" onclick="openLink(event, 'SK Lainnya')" id="tabLinksk">SK Lainnya</button>
								<?php endif; ?>
						</div>
							<div id="test" class="tabcontentt">
							<?php if ($this->session->userdata('level')=='admin') : ?>
								<form action="<?=base_url()?>Pangkat/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
							<?php endif; ?>
								<table id="example1" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Jenis SK</th>
											<th class="p-1 text-center">No SK</th>
											<th class="p-1 text-center">Tanggal SK</th>
											<th class="p-1 text-center">Golongan</th>
											<th class="p-1 text-center">TMT Golongan</th>
											<th class="p-1 text-center">File SK</th>
											
							<?php if ($this->session->userdata('level')=='admin') : ?>
											<th class="p-1 text-center">Action</th>
											<th class="p-1 text-center">Set</th>
											
							<?php endif; ?>
											<!-- <th class="p-1 text-center">Set</th> -->
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilGolongan as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['jenis_sk']?></td>	
												<td class="p-1" ><?=$row['no_sk']?></td>	
												<td class="p-1" ><?=$row['tanggal_sk']?></td>	
												<td class="p-1" ><?=$row['id_golongan'].' - '.$row['pangkat']?></td>
												<td class="p-1" ><?=$row['tmt_golongan']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/sk/<?=$row['file_sk']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<?php if ($this->session->userdata('level')=='admin') : ?>
												<td class="p-1 text-center" >
														<input type="hidden" value="<?=$row['id_riwayat']?>" name="id_riwayat">
													<a  href="<?=base_url();?>Pangkat/editPangkat/<?=encrypt_url($row['id_riwayat'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteGolonganModal" data-id="<?=$row['id_riwayat'];?>" class="btn btn-danger btn-sm DeleteGolonganModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>

												<td class="p-1 text-center">
													<a href="" data-toggle="modal" data-target="#setGolonganModal" data-id="<?=$row['id_riwayat'];?>" class="btn btn-success btn-sm setGolonganModal">
														<i class="fa fa-cogs"></i>
													</a>
												</td>
												<?php endif; ?>
												<!-- <td class="p-1 text-center">
													<a href="" class="badge badge-success m-0" title="jadikan golongan terakhir">
														Set
													</a>
												</td> -->
												
											</tr>

										<?php endforeach; ?>
											
									</tbody>
								</table>
							</div>

							<div id="test2" class="tabcontentt">
							<?php if ($this->session->userdata('level')=='admin') : ?>
								<form action="<?=base_url()?>Fungsional/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<?php endif; ?>
								<table id="example2" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Jabatan</th>
											<th class="p-1 text-center">No SK</th>
											<th class="p-1 text-center">Tanggal SK</th>
											<th class="p-1 text-center">TMT Jabatan</th>
											<th class="p-1 text-center">Status Fungsional</th>
											<th class="p-1 text-center">File SK</th>
											<?php if ($this->session->userdata('level')=='admin') : ?>
											<th class="p-1 text-center">Action</th>
											<th class="p-1 text-center">Set</th>
											<?php endif; ?>

										</tr>
									</thead>
									<tbody>
										<?php foreach($profilFungsional as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['nm_jabatan'].' - '.$row['id_jabatan']?></td>	
												<td class="p-1" ><?=$row['no_sk']?></td>	
												<td class="p-1" ><?=$row['tanggal_sk']?></td>	
												<td class="p-1" ><?=$row['tmt_jabatan']?></td>
												<td class="p-1" ><?=$row['status_fungsional']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/sk/<?=$row['file_sk']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<?php if ($this->session->userdata('level')=='admin') : ?>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Fungsional/editFungsional/<?=encrypt_url($row['id_fungsional'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteFungsionalModal" data-id="<?=$row['id_fungsional'];?>" class="btn btn-danger btn-sm DeleteFungsionalModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
												<td class="p-1 text-center">
													<a href="" data-toggle="modal" data-target="#setFungsionalModal" data-id="<?=$row['id_fungsional'];?>" class="btn btn-success btn-sm setFungsionalModal">
														<i class="fa fa-cogs"></i>
													</a>
												</td>
												<?php endif; ?>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>

							<div id="Struktural" class="tabcontentt">
													
								<?php if ($this->session->userdata('level')=='admin') : ?>
								<form action="<?=base_url()?>Struktural/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<?php endif; ?>
								<table id="example3" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Jabatan</th>
											<th class="p-1 text-center">Eselon</th>
											<th class="p-1 text-center">No SK</th>
											<th class="p-1 text-center">Tanggal SK</th>
											<th class="p-1 text-center">TMT Jabatan</th>
											<th class="p-1 text-center">Status Struktural</th>
											<th class="p-1 text-center">File SK</th>
											<?php if ($this->session->userdata('level')=='admin') : ?>
											<th class="p-1 text-center">Action</th>
											<th class="p-1 text-center">Set</th>
											<?php endif; ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilStruktural as $row) : ?>
											<tr>
												<?php if($row['level_jabatan']=="4") : ?>
												<td class="p-1" ><?=$row['nm_jabatan']?></td>	
												<td class="p-1" ></td>	
												<td class="p-1" ></td>	
												<td class="p-1" ></td>	
												<td class="p-1" ></td>
												<td class="p-1" ></td>
												<td class="p-1 text-center" >
													
												</td>
												<?php if ($this->session->userdata('level')=='admin') : ?>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Struktural/editStruktural/<?=encrypt_url($row['id_struktural'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteStrukturalModal" data-id="<?=$row['id_struktural'];?>" class="btn btn-danger btn-sm DeleteStrukturalModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
												<td class="p-1 text-center">
													<a href="" data-toggle="modal" data-target="#setStrukturalModal" data-id="<?=$row['id_struktural'];?>" class="btn btn-success btn-sm setStrukturalModal">
														<i class="fa fa-cogs"></i>
													</a>
												</td>
												<?php endif; ?>
												<?php else : ?>
												<td class="p-1" ><?=$row['nm_jabatan']?></td>	
												<td class="p-1" ><?=$row['gol_eselon']?></td>	
												<td class="p-1" ><?=$row['no_sk']?></td>	
												<td class="p-1" ><?=$row['tanggal_sk']?></td>	
												<td class="p-1" ><?=$row['tmt_jabatan']?></td>
												<td class="p-1" ><?=$row['status_struktural']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/sk/<?=$row['file_sk']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<?php if ($this->session->userdata('level')=='admin') : ?>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Struktural/editStruktural/<?=encrypt_url($row['id_struktural'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteStrukturalModal" data-id="<?=$row['id_struktural'];?>" class="btn btn-danger btn-sm DeleteStrukturalModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
												<td class="p-1 text-center">
													<a href="" data-toggle="modal" data-target="#setStrukturalModal" data-id="<?=$row['id_struktural'];?>" class="btn btn-success btn-sm setStrukturalModal">
														<i class="fa fa-cogs"></i>
													</a>
												</td>
												
												<?php endif; ?>
												<?php endif; ?>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>
							
							<div id="Pendidikan" class="tabcontentt">

								<form action="<?=base_url()?>Pendidikan/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								
								<table id="tablePendidikan" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Tingkat</th>
											<th class="p-1 text-center">Tahun Lulus</th>
											<th class="p-1 text-center">Sekolah</th>
											<th class="p-1 text-center">Jurusan</th>
											<th class="p-1 text-center">Konsentrasi</th>
											<th class="p-1 text-center">Gelar</th>
											<th class="p-1 text-center">Ijasah</th>
											<th class="p-1 text-center">Action</th>
											<th class="p-1 text-center">Set</th>
											<!-- <th class="p-1 text-center">Set</th> -->
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilPendidikan as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['tingkat']?></td>	
												<td class="p-1" ><?=$row['tahun_lulus']?></td>	
												<td class="p-1" ><?=$row['sekolah']?></td>	
												<td class="p-1" ><?=$row['jurusan']?></td>
												<td class="p-1" ><?=$row['konsentrasi']?></td>
												<td class="p-1" ><?=$row['gelar']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/pendidikan/<?=$row['file_pendidikan']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<td class="p-1 text-center" >
														<input type="hidden" value="<?=$row['id_pendidikan']?>" name="id_pendidikan">
													<a  href="<?=base_url();?>Pendidikan/editPendidikan/<?=encrypt_url($row['id_pendidikan'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deletePendidikanModal" data-id="<?=$row['id_pendidikan'];?>" class="btn btn-danger btn-sm DeletePendidikanModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>

												<td class="p-1 text-center">
													<a href="" data-toggle="modal" title="set Pendidikan Terakhir" data-target="#setPendidikanModal" data-id="<?=$row['id_pendidikan'];?>" class="btn btn-success btn-sm setPendidikanModal">
														<i class="fa fa-cogs"></i>
													</a>	
												</td>
												<!-- <td class="p-1 text-center">
													<a href="" class="badge badge-success m-0" title="jadikan golongan terakhir">
														Set
													</a>
												</td> -->
												
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>
									
							</div>

							<div id="Pelatihan" class="tabcontentt">
								<form action="<?=base_url()?>Diklat/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<table id="tablePelatihan" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Nama</th>
											<th class="p-1 text-center">Mulai-Selesai</th>
											<th class="p-1 text-center">Tanda Lulus</th>
											<th class="p-1 text-center">Tempat</th>
											<th class="p-1 text-center">Negara</th>
											<th class="p-1 text-center">Sponsor</th>
											<th class="p-1 text-center">Keterangan</th>
											<th class="p-1 text-center">File</th>
											<th class="p-1 text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilDiklat as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['nama_diklat']?></td>	
												<td class="p-1" ><?=$row['mulai_diklat']." ~ ".$row['selesai_diklat'];?></td>	
												<td class="p-1" ><?=$row['tanda_lulus_diklat']?></td>	
												<td class="p-1" ><?=$row['tempat_diklat']?></td>	
												<td class="p-1" ><?=$row['negara_diklat']?></td>
												<td class="p-1" ><?=$row['sponsor_diklat']?></td>
												<td class="p-1" ><?=$row['keterangan']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/diklat/<?=$row['file_diklat']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Diklat/editDiklat/<?= encrypt_url($row['id_diklat']);?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteDiklatModal" data-id="<?=$row['id_diklat'];?>" class="btn btn-danger btn-sm DeleteDiklatModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>

							<div id="Seminar" class="tabcontentt">
								<form action="<?=base_url()?>Seminar/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<table id="tableSeminar" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Nama</th>
											<th class="p-1 text-center">Peran</th>
											<th class="p-1 text-center">Tanggal</th>
											<th class="p-1 text-center">Tempat</th>
											<th class="p-1 text-center">File </th>
											<th class="p-1 text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilSeminar as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['nama_seminar']?></td>	
												<td class="p-1" ><?=$row['peran']?></td>	
												<td class="p-1" ><?=$row['tanggal_seminar']?></td>	
												<td class="p-1" ><?=$row['tempat_seminar']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/seminar/<?=$row['file_seminar']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>seminar/editseminar/<?=encrypt_url($row['id_seminar'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteSeminarModal" data-id="<?=$row['id_seminar'];?>" class="btn btn-danger btn-sm DeleteSeminarModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>

							<div id="Penghargaan" class="tabcontentt">
								<form action="<?=base_url()?>Penghargaan/index" method="post">
								
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<table id="tablePenghargaan" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Penghargaan</th>
											<th class="p-1 text-center">Tanggal</th>
											<th class="p-1 text-center">No Surat</th>
											<th class="p-1 text-center">Instansi</th>
											<th class="p-1 text-center">Keterangan</th>
											<th class="p-1 text-center">File</th>
											<th class="p-1 text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilPenghargaan as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['nama_penghargaan']?></td>	
												<td class="p-1" ><?=$row['tanggal_penghargaan']?></td>
												<td class="p-1" ><?=$row['no_surat']?></td>
												<td class="p-1" ><?=$row['instansi']?></td>
												<td class="p-1" ><?=$row['keterangan']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/penghargaan/<?=$row['file_penghargaan']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Penghargaan/editPenghargaan/<?=encrypt_url($row['id_penghargaan'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deletePenghargaanModal" data-id="<?=$row['id_penghargaan'];?>" class="btn btn-danger btn-sm DeletePenghargaanModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>

							<div id="Pengalaman" class="tabcontentt">
								<form action="<?=base_url()?>Pengalaman/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<table id="tablePengalaman" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">Perusahaan</th>
											<th class="p-1 text-center">Jabatan</th>
											<th class="p-1 text-center">Mulai Kerja</th>
											<th class="p-1 text-center">Selesai Kerja</th>
											<th class="p-1 text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilPengalaman as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['perusahaan_kerja']?></td>	
												<td class="p-1" ><?=$row['jabatan_kerja']?></td>
												<td class="p-1" ><?=$row['mulai_kerja']?></td>
												<td class="p-1" ><?=$row['selesai_kerja']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Pengalaman/editPengalaman/<?=encrypt_url($row['id_kerja'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deletePengalamanModal" data-id="<?=$row['id_kerja'];?>" class="btn btn-danger btn-sm DeletePengalamanModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>

							<div id="SK Lainnya" class="tabcontentt">
								<form action="<?=base_url()?>Sk_lain/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<table id="tableSk" class="table table-bordered table-responsive-md table-hover display">
									<thead >
										<tr>
											<th class="p-1 text-center">No SK</th>
											<th class="p-1 text-center">Tanggal SK</th>
											<th class="p-1 text-center">Jenis SK</th>
											<th class="p-1 text-center">Keterangan </th>
											<th class="p-1 text-center">File SK </th>
											<th class="p-1 text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($profilSk as $row) : ?>
											<tr>
												<td class="p-1" ><?=$row['no_sk']?></td>	
												<td class="p-1" ><?=$row['tanggal_sk']?></td>
												<td class="p-1" ><?=$row['jenis_sk']?></td>
												<td class="p-1" ><?=$row['keterangan']?></td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>upload/pdf/sklain/<?=$row['file_sk']?>" class="btn btn-sm btn-outline-danger" target="_blank">
														<i class="fa fa-file-pdf-o"></i>
													</a>
												</td>
												<td class="p-1 text-center" >
													<a href="<?=base_url();?>Sk_lain/editSk_lain/<?=encrypt_url($row['id_sk'])?>" class="btn btn-primary btn-sm mr-1">
														<i class="fa fa-edit"></i>
													</a>
													<a href="" data-toggle="modal" data-target="#deleteSk_lainModal" data-id="<?=$row['id_sk'];?>" class="btn btn-danger btn-sm DeleteSk_lainModal">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
											
									</tbody>
								</table>

							</div>

							<div id="Kartu" class="tabcontentt p-2">
								<form action="<?=base_url()?>Kartu/index" method="post">
									<input type="hidden" name="nip" value="<?=$profil['nip']?>">
									<button class="btn btn-sm btn-success float-right">
										Tambah
									</button>
								</form>
								<?php if (empty($profilKartu)) : ?>
								
								<form id="tambahKartu" action="<?=base_url()?>Kartu/index" method="post">
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Data Kartu <strong>tidak ada</strong>. tambah data ?
										<span>
											<input type="hidden" name="nip" value="<?=$profil['nip']?>">
											<u><a href="javascript:{}" onclick="document.getElementById('tambahKartu').submit()">Ya</a></u>
										</span> 
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								
								</form>
								</div>
								<?php endif; ?>
								<div class="grid-container">
									<?php foreach ($profilKartu as $row) : ?>
									<div class="card bayangan card-default bootcards-file" >
										<div class="card-header p-2">
											<h7 class="card-title"><?=$row['jenis_kartu']?></h7>
										</div>
											<ul class="list-group list-group-flush">
												<li class="list-group-item p-2">
													<div class="row">
														<div class="col-md-4">
															<?php 
																$file = $row['file_kartu'];
																$extension = explode('.',$file);
															?>
															<?php if ($extension[1]=='pdf') : ?>
															<i class="fa fa-file-pdf-o text-danger fa-3x"></i>
															<?php else :  ?>
															<i class="fa fa-file-image-o text-danger fa-3x"></i>
															<?php endif; ?>
														</div>
														<div class="col-md-8">
															<div class="row">
																<div class="col-md-12">
																	<?php 
																		echo $extension[1];
																	?>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<?php 
																		echo getRemoteFilesize(base_url().'upload/pdf/kartu/'.$row['file_kartu']);
																	?>
																</div>
															</div>
														</div>
													</div>
												</li>
												<li class="list-group-item p-2">
														<?=$row['no_kartu']?>
												</li>
											</ul>
										<div class="card-footer p-2">
											<div class="row justify-content-md-center">
												<div class="col-md text-center">
													<a href="<?=base_url();?>upload/pdf/kartu/<?=$row['file_kartu']?>" class="" target="_blank">
														<i class="fa fa-download fa-1x "></i>
													</a>
												</div>
												<div class="col-md text-center">
													<a href="<?=base_url();?>Kartu/editkartu/<?=encrypt_url($row['id_kartu'])?>">
														<i class="fa fa-edit fa-1x"></i>
													</a>
												</div>
												<div class="col-md text-center">
													<a href="" data-toggle="modal" class="DeleteKartuModal" data-target="#deleteKartuModal" data-id="<?=$row['id_kartu'];?>">
														<i class="fa fa-trash fa-1x"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>

							<div id="test3" class="tabcontentt">
								<h3>Pendidikan</h3>
								<p>Isi Pendidikan</p>
							</div>
					</div>

				</div>
			</div>

			<!-- end row -->

			<!-- modal -->

			<div class="modal fade custom-modal" id="deleteGolonganModal" tabindex="-1" role="dialog" aria-labelledby="deleteGolonganModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Golongan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Pangkat/deleteGolonganPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Golongan </p>
							<p id="outputUserr"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_golongan" id="usernamee">
						<input type="hidden" readonly name="nip" id="nip">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteFungsionalModal" tabindex="-1" role="dialog" aria-labelledby="deleteFungsionalModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Fungsional</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Fungsional/deleteFungsionalPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Fungsional </p>
							<p id="outputUserr"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_fungsional" id="id_fungsional">
						<input type="hidden" readonly name="nip" id="nipfungsional">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteStrukturalModal" tabindex="-1" role="dialog" aria-labelledby="deleteStrukturalModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Struktural</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Struktural/deleteStrukturalPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Struktural </p>
							<p id="outputUserr"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_struktural" id="id_strukturalDel">
						<input type="hidden" readonly name="nip" id="nipstrukturalDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deletePendidikanModal" tabindex="-1" role="dialog" aria-labelledby="deletePendidikanModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Pendidikan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Pendidikan/deletePendidikanPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Pendidikan </p>
							<p id="outputUserr"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_pendidikan" id="id_pendidikanDel">
						<input type="hidden" readonly name="nip" id="nippendidikanDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteDiklatModal" tabindex="-1" role="dialog" aria-labelledby="deleteDiklatModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Diklat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Diklat/deleteDiklatPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Diklat </p>
							<p id="outputUserr"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_diklat" id="id_diklatDel">
						<input type="hidden" readonly name="nip" id="nipdiklatDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteSeminarModal" tabindex="-1" role="dialog" aria-labelledby="deleteSeminarModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Seminar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Seminar/deleteSeminarPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus seminar </p>
							<p id="outputUserr"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_seminar" id="id_seminarDel">
						<input type="hidden" readonly name="nip" id="nipseminarDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteBahasaModal" tabindex="-1" role="dialog" aria-labelledby="deleteBahasaModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete bahasa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>bahasa/deleteBahasaPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus kemampuan bahasa </p>
							<p id="bahasaId"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_bahasa" id="id_bahasaDel">
						<input type="hidden" readonly name="nip" id="nipbahasaDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deletePenghargaanModal" tabindex="-1" role="dialog" aria-labelledby="deletePenghargaanModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Penghargaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Penghargaan/deletePenghargaanPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Penghargaan </p>
							<p id="PenghargaanId"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_penghargaan" id="id_PenghargaanDel">
						<input type="hidden" readonly name="nip" id="nipPenghargaanDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deletePengalamanModal" tabindex="-1" role="dialog" aria-labelledby="deletePengalamanModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete Pengalaman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Pengalaman/deletePengalamanPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus Pengalaman di </p>
							<p id="PengalamanId"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_kerja" id="id_PengalamanDel">
						<input type="hidden" readonly name="nip" id="nipPengalamanDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteSk_lainModal" tabindex="-1" role="dialog" aria-labelledby="deleteSk_lainModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete SK</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Sk_lain/deleteSkPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus SK </p>
							<p id="SkId"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_sk" id="id_SkDel">
						<input type="hidden" readonly name="nip" id="nipSkDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteKeluargaModal" tabindex="-1" role="dialog" aria-labelledby="deleteKeluargaModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete keluarga</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>keluarga/deleteKeluargaPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus kemampuan keluarga </p>
							<p id="keluargaId"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_keluarga" id="id_keluargaDel">
						<input type="hidden" readonly name="nip" id="nipkeluargaDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="deleteKartuModal" tabindex="-1" role="dialog" aria-labelledby="deleteKartuModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Delete kartu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>kartu/deleteKartuPegawai" method="post">
						<div class="row justify-content-center">
							<p>Apakah anda yakin menghapus kartu </p>
							<p id="kartuId"> ?</p>
						</div> 
						<input type="hidden" readonly name="id_kartu" id="id_kartuDel">
						<input type="hidden" readonly name="nip" id="nipkartuDel">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="setGolonganModal" tabindex="-1" role="dialog" aria-labelledby="setGolonganModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Set pangkat terakhir </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Pangkat/setPangkatTerakhir" method="post">
						<div class="row justify-content-center">
							<p>Jadikan pangkat terakhir ? </p>
						</div> 
						<input type="hidden" readonly name="id_riwayat" id="id_riwayats">
						<input type="hidden" readonly name="nip" id="nip_riwayat">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="setFungsionalModal" tabindex="-1" role="dialog" aria-labelledby="setFungsionalModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Set jabatan fungsional terakhir</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Fungsional/setFungsionalTerakhir" method="post">
						<div class="row justify-content-center">
							<p>Jadikan jabatan fungsional terakhir ? </p>
						</div> 
						<input type="hidden" readonly name="id_fungsional" id="id_fungsionalSet">
						<input type="hidden" readonly name="nip" id="nipfungsionalSet">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="setStrukturalModal" tabindex="-1" role="dialog" aria-labelledby="setStrukturalModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Set jabatan struktural terakhir</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Struktural/setStrukturalTerakhir" method="post">
						<div class="row justify-content-center">
							<p>Jadikan jabatan struktural terakhir ? </p>
						</div> 
						<input type="hidden" readonly name="id_struktural" id="id_strukturalSet">
						<input type="hidden" readonly name="nip" id="nipstrukturalSet">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	

			<div class="modal fade custom-modal" id="setPendidikanModal" tabindex="-1" role="dialog" aria-labelledby="setPendidikanModal" aria-hidden="true">
				<div class="modal-dialog pulse animated" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Set Pendidikan Terakhir</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<form action="<?= base_url();?>Pendidikan/setPendidikanTerakhir" method="post">
						<div class="row justify-content-center">
							<p>Jadikan <p id="tingkatOutput"></p> pendidikan terakhir ? </p>
						</div> 
						<input type="hidden" readonly name="id_pendidikan" id="id_pendidikanSet">
						<input type="hidden" readonly name="nip" id="nippendidikanSet">
						<div class="row justify-content-center">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button class="btn btn-sm btn-danger" data-dismiss="modal">
									Tidak
								</button>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
								<button  type="submit" class="btn btn-sm btn-primary yess"> 
									Ya
								</button>
							</div>
						</div>
					</form>

					</div>
				</div>
				</div>
			</div>	
	
					
			<!-- endmodal -->
			<div class="row">


			</div>
			<!-- end row -->




		</div>
		<!-- END container-fluid -->

	</div>
	<!-- END content -->

</div>
<!-- END content-page -->

<footer class="footer">
</footer>

</div>


<script src="<?= base_url(); ?>assets/js/modernizr.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/moment.min.js"></script>

	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

	<script src="<?= base_url(); ?>assets/js/detect.js"></script>
	<script src="<?= base_url(); ?>assets/js/fastclick.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.nicescroll.js"></script>

	<!-- App js -->
	<script src="<?= base_url(); ?>assets/js/pikeadmin.js"></script>

	<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<!-- Counter-Up-->
	<script src="<?= base_url(); ?>assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/counterup/jquery.counterup.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/sweetalert/sweetalert.js"></script>

	<script>
			$('#example1').DataTable();
			// data-tables
			$('#example2').DataTable();
			$('#example3').DataTable();
			$('#tablePendidikan').DataTable();
			$('#tablePelatihan').DataTable();
			$('#tableSeminar').DataTable();
			$('#tablebahasa').DataTable();
			$('#tablePenghargaan').DataTable();
			$('#tablePengalaman').DataTable();
			$('#tableKeluarga').DataTable();
			$('#tableSk').DataTable();
	</script>
	<script>
	
    $(document).ready(function () {

$('.selectpicker').selectpicker();
		  });
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openLink(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontentt");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinkss");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("<?=$tablink2?>").click();
<?php if ($profil['status_pgw']=='BLU') : ?>
document.getElementById("tabLinkpendidikan").click();
<?php else : ?>
document.getElementById("<?=$tablink?>").click();
<?php endif; ?>
	</script>
	
</body>

</html>