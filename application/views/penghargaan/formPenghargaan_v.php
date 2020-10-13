<?php
    function checkOption($x,$y){
        if($x==$y)
            return "selected";
        else
            return "";
    }
?>
<div class="content-page">

	<!-- Start content -->
	<div class="content">

		<div class="container-fluid">

       

			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h1 class="main-title float-left">Data Pegawai</h1>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$this->input->post('nip')?>">
                            Data Pegawai
                            </a> </li>
							<li class="breadcrumb-item active">Add Penghargaan</li>
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

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="card mb-3">
						<div class="card-header blue p-2">
                        <h3><i class="fa fa-id-card-o"></i> Form Data Penghargaan Pegawai 
                        </h3>
                        </div>


						<div class="card-body">
                            <div class="tengah-form" >
                            <form enctype="multipart/form-data" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                <div class="col-sm-9">
                                    <select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                        <?php foreach($pegawai as $row) :?>
                                            <?php if ($row['nip']==$this->input->post('nip')) : ?>
                                            <option data-tokens="<?= $row['nip'].', '.$row['nama']?>" value="<?= $row['nip']?>" selected ><?= $row['nip'].', '.$row['nama'] ?></option>
                                            <?php else : ?>
                                            <option data-tokens="<?= $row['nip'].', '.$row['nama']?>" value="<?= $row['nip']?>"><?= $row['nip'].', '.$row['nama']?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('nip'); ?>
                                    </small>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Nama Penghargaan </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('nama_penghargaan')?>" placeholder="Nama Penghargaan" name="nama_penghargaan">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('nama_penghargaan'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Tanggal </label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">
                                             <i class="fa fa-calendar" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="Tanggal penghargaan"name="tanggal_penghargaan" value="<?= $this->input->post('tanggal_penghargaan') ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tanggal_penghargaan'); ?>
                                    </small>
                                </div>
                           </div>

                           <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">No Surat </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('no_surat')?>" placeholder="No Surat" name="no_surat">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('no_surat'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Instansi </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('instansi')?>" placeholder="Instansi" name="instansi">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('instansi'); ?>
                                    </small>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Keterangan </label>
                                <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" name="keterangan"><?=$this->input->post('keterangan')?></textarea>
                                        <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('keterangan'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">File Penghargaan </label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_penghargaan" id="filer_example2">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                    <?= form_error('file_penghargaan'); ?>
                                    </small>
                                </div>
                            </div>

                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$this->input->post('nip')?>/penghargaan">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Tambah
                                    </button>
                                </div>
                            </form>
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
