<div class="content-page">

	<!-- Start content -->
	<div class="content">

		<div class="container-fluid">



			<!-- Modal -->
			<div class="modal fade custom-modal" id="addPegawai" tabindex="-1" role="dialog" aria-labelledby="addPegawai" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-dark">
							<h5 class="modal-title" id="exampleModalLabel2">Add Pegawai </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row justify-content-center">
								<div class="col-lg-2">
									<form action="<?= base_url(); ?>DataPegawai/formPegawai" method="post">
										<button class="btn btn-outline-primary btn-sm">
											PNS
										</button>
									</form>

								</div>
								<div class="col-lg-3">
									<form action="<?= base_url(); ?>DataPegawai/formPegawaiBlu" method="post">
										<button class="btn btn-outline-primary btn-sm">
											Non PNS
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="modal fade custom-modal" id="deletePegawaiModal" tabindex="-1" role="dialog" aria-labelledby="deletePegawaiModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel2">Delete Pegawai</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url(); ?>DataPegawai/deletePegawai" method="post">
								<div class="row justify-content-center">
									<p>Apakah anda yakin menghapus pegawai </p>
									<p id="outputUserr"> ?</p>
								</div>
								<input type="hidden" readonly name="username" id="usernamee">
								<div class="row justify-content-center">
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
										<button class="btn btn-sm btn-danger" data-dismiss="modal">
											Tidak
										</button>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
										<button type="submit" class="btn btn-sm btn-primary yess">
											Ya
										</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom-modal" id="setPnsModal" tabindex="-1" role="dialog" aria-labelledby="setPnsModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel2">Set Pns</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?= base_url(); ?>DataPegawai/setPns" method="post">

								<input type="hidden" readonly name="id_golongan" id="usernamee">
								<input type="hidden" readonly name="nip" id="nip">
								<div class="form group row">
									<label for="" class="col-sm-2 col-form-label col-form-label-sm">
										NIP
									</label>
									<input type="hidden" id="old_nip" name="old_nip">
									<div class="col-sm-8">
										<input class="form-control form-control-sm" type="text" name="new_nip">
										<small class="form-text text-secondary">
											Minimal 18 digit
										</small>
									</div>
									<div class="col-2">
										<button class="btn btn-sm btn-twitter" type="submit">
											<i class="fa fa-save"></i>
										</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

			<!--Modal-->

			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Data Pegawai</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item active">Data Pegawai</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->


			<?php if ($this->session->flashdata('flash')) : ?>
			<div class="row mt-3 mr-2 ml-2">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data Pegawai <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="row mr-2 ml-2 mb-0">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Untuk pencetakan Excel, pastikan setiap pegawai telah terisi jabatan
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card mb-3">
						<div class="card-header tab blue" style="border-radius:2px;">
							<!-- <a  href="" data-target="#addPegawai" data-toggle="modal" class="btn btn-warning float-right btn-sm">Add Pegawai</a> -->
							<!-- <a  href="<?= base_url(); ?>ExportExcel/exportPegawai" class="btn btn-success float-right btn-sm mr-2">
															<i class="fa fa-file-excel-o"></i>
														</a> -->

							<button class="btn tablinkss" onclick="openLink(event, 'semua')" id="defaultOpen" style="width:120px;">Semua Pegawai</button>
							<button class="btn tablinkss" onclick="openLink(event, 'pns')" id="tabLinkPns">PNS</button>
							<button class="btn tablinkss" onclick="openLink(event, 'nonpns')" id="tabLinkNonPns">NON PNS</button>
							<button class="btn tablinkss" onclick="openLink(event, 'CPNS')">CPNS</button>
							<button class="btn tablinkss" onclick="openLink(event, 'CDTN')">CDTN</button>
							<button class="btn tablinkss" onclick="openLink(event, 'tgsbljr')">Tgs Belajar</button>
							<button class="btn tablinkss" onclick="openLink(event, 'pensiun')">Pensiun</button>
							<button class="btn tablinkss" onclick="openLink(event, 'dipekerjakan')" style="width:100px;">Dipekerjakan</button>
							<button class="btn tablinkss" onclick="openLink(event, 'berhenti')">Berhenti</button>
							<button class="btn tablinkss" onclick="openLink(event, 'All')">Semua data</button>
							<button data-target="#addPegawai" data-toggle="modal" class="btn tablinkss float-right" style="width:120px; background-color: #b53737">Tambah Pegawai</button>

						</div>


						<div class="card-body">
							<div id="semua" class="tabcontentt p-0 mt-0" style="border:none;">
								<a href="<?= base_url(); ?>ExportExcel/exportPegawai" class="btn btn-success float-right btn-sm mr-2">
									<i class="fa fa-file-excel-o"></i>
								</a>
								<table id="example1" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($semua as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
										<?php foreach ($dataa as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>

															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>

							</div>

							<div id="pns" class="tabcontentt p-0 mt-0" style="border:none;">
								<a href="<?= base_url(); ?>ExportExcel/exportPegawaiPNS" class="btn btn-success float-right btn-sm mr-2">
									<i class="fa fa-file-excel-o"></i>
								</a>
								<table id="tablePns" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($pns as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
										<?php foreach ($pnss as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td>
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>

															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="nonpns" class="tabcontentt p-0 mt-0" style="border:none;">
								<a href="<?= base_url(); ?>ExportExcel/exportPegawaiNonPNS" class="btn btn-success float-right btn-sm mr-2">
									<i class="fa fa-file-excel-o"></i>
								</a>
								<table id="tableNonPns" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($nonpns as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px"></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
										<?php foreach ($nonpnss as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>

															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="CPNS" class="tabcontentt p-0 mt-0" style="border:none;">

								<table id="tableCpns" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($cpns as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
										<?php foreach ($cpnss as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td>
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>

															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="CDTN" class="tabcontentt p-0 mt-0" style="border:none;">

								<table id="tableCdtn" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($cdtn as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">

														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="tgsbljr" class="tabcontentt p-0 mt-0" style="border:none;">

								<table id="tableTgsBljr" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($tgsbljr as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="pensiun" class="tabcontentt p-0 mt-0" style="border:none;">

								<table id="tablePensiunn" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($pensiun as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px"></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>


							<div id="dipekerjakan" class="tabcontentt p-0 mt-0" style="border:none;">

								<table id="tableDipekerjakan" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($dipekerjakan as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px"></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="berhenti" class="tabcontentt p-0 mt-0" style="border:none;">

								<table id="tableBerhenti" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($berhenti as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px"></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<button class="btn btn-sm btn-facebook setPnsModal mr-1" data-toggle="modal" data-target="#setPnsModal" data-id="<?= $row['nip'] ?>">set
															</button>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="All" class="tabcontentt p-0 mt-0" style="border:none;">
								<a href="<?= base_url(); ?>ExportExcel/exportPegawai" class="btn btn-success float-right btn-sm mr-2">
									<i class="fa fa-file-excel-o"></i>
								</a>
								<table id="tableall" class="table table-bordered table-responsive-md table-hover display">
									<thead>
										<tr>
											<th></th>
											<th>Nama</th>
											<th>Jabatan</th>
											<th>Bidang</th>
											<th>Keterangan</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody><?php $i = 1; ?>
										<?php foreach ($data as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px"></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>
															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
										<?php foreach ($dataa as $row) : ?>
										<tr>
											<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>">
												<div style="height:100%;width:100%">

													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'" class="p-1 pb-1" style="width:6%">
														<img src="<?= base_url(); ?>upload/foto/profile/<?= $row['foto'] ?>" class=" avatar-rounded ml-1 mr-1" style="width:45px;height:40px">
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<a href="<?= base_url(); ?>Profile/index/<?= $row['nip']; ?>"><?= $row['nama']; ?></a>
													</td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nm_jabatan'] ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'"><?= $row['nama_bidang']; ?></td>
													<td onclick="window.location='<?= base_url() ?>Profile/index/<?= $row['nip'] ?>'">
														<?= $row['keterangan']; ?>
													</td>
													<td class="p-1 pb-1">
														<div class="row justify-content-center">
															<?php if ($row['status_pgw'] == "BLU") : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawaiBlu/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai"> <i class="fa fa-edit"></i> </a>

															<?php else : ?>
															<a class="btn btn-sm btn-primary mr-1" href="<?= base_url(); ?>DataPegawai/editFormPegawai/<?= encrypt_url($row['nip']); ?>" title="Edit Pegawai">
																<i class="fa fa-edit"></i>
															</a>
															<?php endif; ?>
															<button class="btn btn-sm btn-danger DeletePegawaiModal" data-id="<?= $row['nip']; ?>" data-target="#deletePegawaiModal" data-toggle="modal" title="Delete Pegawai">
																<i class="fa fa-trash"></i>
															</button>
														</div>
													</td>
												</div>
											</a>
										</tr><?php $i++; ?>
										<?php endforeach; ?>
									</tbody>
								</table>

							</div>
						</div>
					</div><!-- end card-->
				</div>

			</div>



		</div>
		<!-- END container-fluid -->

	</div>
	<!-- END content -->

</div>