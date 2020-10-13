<?php
    function checkOption($x,$y){
        if($x==$y)
            return "checked";
        else
            return "";
    }
    function activeOption($x,$y){
        if($x==$y)
            return "active";
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
							<li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$seminar['nip']?>">
                            Data Pegawai
                            </a> </li>
							<li class="breadcrumb-item active">Ubah Seminar</li>
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
                        <h3><i class="fa fa-id-card-o"></i> Form Data Seminar Pegawai 
                        </h3>
                        </div>


						<div class="card-body">
                            <div class="tengah-form" >
                            <form enctype="multipart/form-data" method="post">
                            
                            <div class="form-group row" <?=checkAkses()?>>
                                <label  class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                <div class="col-sm-9">
                                    <select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                        <?php foreach($pegawai as $row) :?>
                                            <?php if ($row['nip']==$seminar['nip']) : ?>
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
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Nama Seminar </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$seminar['nama_seminar']?>" placeholder="Nama Seminar" name="nama_seminar">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('nama_seminar'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Peran </label>
                                <div class="col-sm-9">

                                    <div class="btn-group mb-0" data-toggle="buttons">
                                        <label class="btn btn-primary btn-sm mb-0 <?= activeOption('Peserta',$seminar['peran'])?>">
                                            <input type="radio" name="peran" id="option1" autocomplete="off" value="Peserta" <?= checkOption('Peserta',$seminar['peran'])?>> Peserta
                                        </label>
                                        <label class="btn btn-primary btn-sm mb-0 <?=activeOption('Narasumber',$seminar['peran'])?>" >
                                            <input type="radio" name="peran" id="option2" autocomplete="off" value="Narasumber" <?= checkOption('Narasumber',$seminar['peran'])?>> Narasumber
                                        </label>
                                        <label class="btn btn-primary btn-sm mb-0 <?= activeOption('Moderator',$seminar['peran'])?>" >
                                            <input type="radio" name="peran" id="option3" autocomplete="off" value="Moderator" <?= checkOption('Moderator',$seminar['peran'])?>> Moderator
                                        </label>
                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('peran'); ?>
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
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="Tanggal Seminar"name="tanggal_seminar" value="<?= $seminar['tanggal_seminar'] ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tanggal_seminar'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Tempat </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$seminar['tempat_seminar']?>" placeholder="Tempat Seminar" name="tempat_seminar">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tempat_seminar'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">File  </label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_seminar" id="filer_example2" value="<?= $seminar['file_seminar'] ?>" >
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('file_seminar'); ?>
                                    </small>
                                </div>
                            </div>

                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$seminar['nip']?>/seminar">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Ubah
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
