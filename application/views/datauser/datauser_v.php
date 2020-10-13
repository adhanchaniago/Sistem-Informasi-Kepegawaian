<div class="content-page">

	<!-- Start content -->
	<div class="content">

		<div class="container-fluid">

       

			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Data User</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item active">Data User</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card mb-3">
						<div class="card-header blue p-2">
                        <h3><i class="fa fa-users"></i> Data User
                            <button  data-target="#addUserModal" data-toggle="modal" class="btn btn-warning float-right btn-sm">Tambah akun</button>
                        </h3>
                        </div>
                        
                        <?php if ($this->session->flashdata('flash')) : ?>
                            <div class="row mt-3 mr-2 ml-2">
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
        
								<!-- Modal -->
								<div class="modal fade custom-modal" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Tambah Akun </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
													<form action="<?= base_url();?>Datauser/addUser" method="post">
															<div class="row">
																<div class="col-xl-12">
																	<div class="form-group">
																			<label for="">Pegawai</label>
																			<select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                                             <?php foreach($pegawai as $row) :?>
																						 		<?php if($row['status_pgw']=="BLU") : ?>
                                                <option data-tokens="<?= $row['nip'].', '.$row['nama'];?>" value="<?= $row['nip']?>"><?= $row['nama']; ?></option>
																								<?php else : ?>
                                                <option data-tokens="<?= $row['nip'].', '.$row['nama'];?>" value="<?= $row['nip']?>"><?= $row['nip'].', '.$row['nama']; ?></option>
																								<?php endif; ?>
																						<?php endforeach; ?>
                                        </select>
																			
																			</div>
																	</div>
															</div>
															<div class="row">
																	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
																			<div class="form-group">
																					<label for="inputusername">Username</label>
																					<input  type="text" name="username" class="form-control">
																			</div>
																	</div>
																	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
																			<div class="form-group">
																					<label for="inputpassword">Password</label>
																					<input type="password" name="password" class="form-control">
																			</div>
																	</div>
															</div>
															<div class="form-group">
																		<label for="">Hak Akses</label>
																		<select class="form-control form-control-sm" name="level">
																				<option></option>
																				<option value="admin">Admin</option>
																				<option value="pegawai">Pegawai</option>
																				<option value="Atasan">Atasan</option>
																		</select>
														</div> 
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        
                                        </form> 
									  </div>
									</div>
								  </div>
								</div>
<!--
								<div class="modal fade custom-modal" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Reset password</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
                                        <form action="<?= base_url();?>Datauser/resetPass" method="post">
                                            <div class="row justify-content-center">
																								<p>Apakah anda yakin mereset password untuk user </p>
																								<p id="outputUser"> ?</p>
																							</div> 
																							<input type="hidden" readonly name="username" id="username">
																							<div class="row justify-content-center">
																								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
																									<button class="btn btn-sm btn-danger" data-dismiss="modal">
																										Tidak
																									</button>
																								</div>
																								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
																									<button type="submit" class="btn btn-sm btn-primary"> 
																										Ya
																									</button>
																								</div>
                                          </div>
																					</form>

									  </div>
									</div>
								  </div>
								</div>
-->
								<div class="modal fade custom-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Delete User</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
                                        <form action="<?= base_url();?>Datauser/deleteUser" method="post">
                                            <div class="row justify-content-center">
																								<p>Apakah anda yakin menghapus user </p>
																								<p id="outputUserr"> ?</p>
																							</div> 
																							<input type="hidden" readonly name="username" id="usernamee">
																							<div class="row justify-content-center">
																								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
																									<button onclick="sweet()" class="btn btn-sm btn-danger" data-dismiss="modal">
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
								

								<!--Modal-->

						<div class="card-body">

							<table id="example1" class="table table-bordered table-responsive-md table-hover display">
								<thead>
									<tr>
										<th>Username</th>
										<th>Nama</th>
										<th>level</th>
										<!--<th>password</th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($data as $row) : ?>
									<tr>
										<td><?= $row['username']; ?></td>
										<td><a href="<?=base_url();?>Profile/index/<?=$row['nip'];?>">
											<?= $row['nama'] ?>
										</a></td>
										<td><?= $row['level']; ?></td>
										<!-- <td>
										<?php 
											echo decrypt_url($row['password']);
										?>
										</td>
										-->
										<td>
										<div class="row justify-content-center">
											<a class="btn btn-sm btn-primary ResetModal mr-1" href="<?= base_url(); ?>Akun/ubahPassword/<?= $this->session->userdata('username') ?>" >
										<i class="fa fa-lock"></i>  </a>
										<!-- </a><button class="btn btn-sm btn-primary ResetModal mr-1" data-id="<?= $row ['username']; ?>"  data-toggle="modal" title="Ubah Password"> 
												<i class="fa fa-refresh"></i> 
											</button>-->
											<button class="btn btn-sm btn-danger DeleteModal" data-id="<?= $row['username']; ?>" data-target="#deleteModal" data-toggle="modal" title="Delete user">
												<i class="fa fa-trash"></i>
											</button>
										</div>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>

						</div>
					</div><!-- end card-->
				</div>


			</div>



		</div>
		<!-- END container-fluid -->

	</div>
	<!-- END content -->

</div>