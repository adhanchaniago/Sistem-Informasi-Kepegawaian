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
							<li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$kartu['nip']?>">
                            Data Pegawai
                            </a> </li>
							<li class="breadcrumb-item active">Add Kartu</li>
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
                        <h3><i class="fa fa-id-card-o"></i> Form Data Kartu Pegawai 
                        </h3>
                        </div>


						<div class="card-body">
                            <div class="tengah-form" >
                            <form enctype="multipart/form-data" method="post">
                            
                            <div class="form-group row"  <?=checkAkses()?>>
                                <label  class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                <div class="col-sm-9">
                                    <select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                        <?php foreach($pegawai as $row) :?>
                                            <?php if ($row['nip']==$kartu['nip']) : ?>
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
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Nama / Jenis Kartu </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$kartu['jenis_kartu']?>" placeholder="Nama / Jenis Kartu" name="jenis_kartu">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('jenis_kartu'); ?>
                                    </small>
                                </div>
                            </div>

                           <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">No Kartu </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$kartu['no_kartu']?>" placeholder="No Kartu" name="no_kartu">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('no_kartu'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">File Kartu </label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_kartu" id="filer_example2">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                    <?= form_error('file_kartu'); ?>
                                    </small>
                                </div>
                            </div>

                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$kartu['nip']?>/kartu">
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
