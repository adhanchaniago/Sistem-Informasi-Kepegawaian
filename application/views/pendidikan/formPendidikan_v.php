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
							<li class="breadcrumb-item active">Add Pendidikan</li>
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
                        <h3><i class="fa fa-id-card-o"></i> Form Data Pendidikan Pegawai 
                        </h3>
                        </div>


						<div class="card-body">
                            <div class="tengah-form" >
                            <form enctype="multipart/form-data" method="post">
                            
                            <div class="form-group row" <?= checkAkses() ?>>
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
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Tingkat </label>
                                    <div class="col-sm-9">
                                        <select name="tingkat" id="selectTingkat" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="..." >
                                            <option data-tokens="SD" value="SD" <?= checkOption("SD",$this->input->post('tingkat')) ?>>SD</option>
                                            <option data-tokens="SMP" value="SMP" <?= checkOption("SMP",$this->input->post('tingkat')) ?>>SMP</option>
                                            <option data-tokens="SMA" value="SMA" <?= checkOption("SMA",$this->input->post('tingkat')) ?>>SMA</option>
                                            <option data-tokens="D1" value="D1" <?= checkOption("D1",$this->input->post('tingkat')) ?>>D1</option>
                                            <option data-tokens="D2" value="D2" <?= checkOption("D2",$this->input->post('tingkat')) ?>>D2</option>
                                            <option data-tokens="D3" value="D3" <?= checkOption("D3",$this->input->post('tingkat')) ?>>D3</option>
                                            <option data-tokens="D4" value="D4" <?= checkOption("D4",$this->input->post('tingkat')) ?>>D4</option>
                                            <option data-tokens="S1" value="S1" <?= checkOption("S1",$this->input->post('tingkat')) ?>>S1</option>
                                            <option data-tokens="S2" value="S2"  <?= checkOption("S2",$this->input->post('tingkat')) ?>>S2</option>
                                            <option data-tokens="S3" value="S3" <?= checkOption("S3",$this->input->post('tingkat')) ?>>S3</option>
                                        </select>
                                        <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('tingkat'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Tahun Lulus</label>
                                    <div class="col-sm-5">
                                        <div class="input-group date">
                                            <div class="input-group-prepend input-group-sm">
                                               <div class="input-group-text">
                                                 <i class="fa fa-calendar" aria-hidden="true"></i>
                                               </div>
                                            </div>
                                            <input  type="number" class="form-control form-control-sm" value="<?=$this->input->post('tahun_lulus')?>" placeholder="Tahun Lulus"name="tahun_lulus">
                                        </div>
                                        <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('tahun_lulus'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Sekolah </label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('sekolah')?>" placeholder="Sekolah" name="sekolah">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('sekolah'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row hidePendidikan">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Jurusan </label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('jurusan')?>" placeholder="Jurusan" name="jurusan">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('jurusan'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row hidePendidikan">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Konsentrasi </label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('konsentrasi')?>" placeholder="Konsentrasi" name="konsentrasi">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('konsentrasi'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row hidePendidikan">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Gelar </label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" value="<?=$this->input->post('gelar')?>" placeholder="Gelar" name="gelar">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('gelar'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">File Ijazah </label>
                                    <div class="col-sm-9">
                                        <input type="file" name="file_pendidikan" id="filer_example2">
                                        <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('file_pendidikan'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$this->input->post('nip')?>/pendidikan">
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
