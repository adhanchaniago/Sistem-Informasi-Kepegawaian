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
    function checkAnak($anakke){
        if ($anakke=='0'){
            return 'd-none';
        }else{
            return ' ';
        }
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
							<li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$keluarga['nip']?>">
                            Data Pegawai
                            </a> </li>
							<li class="breadcrumb-item active">Add Keluarga</li>
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
                        <h3><i class="fa fa-id-card-o"></i> Form Data Keluarga Pegawai 
                        </h3>
                        </div>


						<div class="card-body">
                            <div class="tengah-form" >
                            <form enctype="multipart/form-data" method="post">
                            <input type="hidden" value="<?=$keluarga['nip']?>" name="nip">
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Nama Keluarga </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?=$keluarga['nama_klg']?>" placeholder="Nama Keluarga" name="nama_klg">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('nama_klg'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Status Keluarga </label>
                                <div class="col-sm-4">

                                    <div class="btn-group mb-0" data-toggle="buttons">
                                    <?php if ($keluarga['status_klg']=='Suami'||$keluarga['status_klg']=='Istri') : ?>
                                            <?php if ($pegawai['jenis_kelamin']=='Laki-Laki') : ?>
                                            <label class="btn btn-primary btn-sm mb-0 suamiistri <?= activeOption('Istri',$keluarga['status_klg'])?>" data-status='Perempuan'>
                                            <input type="radio" name="status_klg" id="option1" autocomplete="off" value="Istri"<?= checkOption('Istri',$keluarga['status_klg'])?> > Istri
                                            </label>
                                            <?php else : ?>
                                            <label class="btn btn-primary btn-sm mb-0 suamiistri <?= activeOption('Suami',$keluarga['status_klg'])?>" data-status='Laki-Laki'>
                                            <input type="radio" name="status_klg" id="option1" autocomplete="off" value="Suami" <?= checkOption('Suami',$keluarga['status_klg'])?> > Suami
                                            </label>
                                            <?php endif; ?>
                                    <?php else : ?>
                                        <label class="btn btn-primary btn-sm mb-0 anak  <?= activeOption('Anak',$anak)?>">
                                            <input type="radio" id="option2"  name="status_klg" autocomplete="off" value="Anak" <?= checkOption('Anak',$anak)?>> Anak
                                        </label>
                                    <?php endif; ?>
                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('status_klg'); ?>
                                    </small>
                                </div>
                                <div class="col-sm-4 <?=checkAnak($anakke);?>" id="anakke">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">   
                                             <i class="fa fa-child" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="number" class="form-control form-control-sm" placeholder="Anak Ke"name="anak_ke" value="<?= $anakke ?>" >
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-group row <?=checkAnak($pasangan);?>" id="formtglmenikah">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Tanggal Menikah </label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">
                                             <i class="fa fa-calendar" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="Tanggal Menikah"name="tl_menikah" value="<?= $keluarga['tl_menikah'] ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tl_menikah'); ?>
                                    </small>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin </label>
                                <div class="col-sm-9">
                                
                                    <div class="btn-group mb-0" data-toggle="buttons">
                                    <?php if ($keluarga['status_klg']=='Suami') : ?>
                                        <label class="btn btn-primary btn-sm mb-0 mr-2 <?= activeOption('Laki-Laki',$keluarga['jk_klg'])?>" id="jkLaki">
                                            <i class="fa fa-male"></i>
                                            <input type="radio" name="jk_klg" id="option1" autocomplete="off" class="jk_laki" value="Laki-Laki"   <?= checkOption('Laki-Laki',$keluarga['jk_klg'])?>> 
                                        </label>
                                    <?php elseif ($keluarga['status_klg']=='Istri') : ?> 
                                        <label class="btn btn-primary btn-sm mb-0 <?= activeOption('Perempuan',$keluarga['jk_klg'])?>" id="jkPerempuan">
                                            <i class="fa fa-female"></i>
                                            <input type="radio" name="jk_klg" id="option2" autocomplete="off" class="jk_perempuan" value="Perempuan"  <?= checkOption('Perempuan',$keluarga['jk_klg'])?>>  
                                        </label>
                                    <?php else : ?>
                                        <label class="btn btn-primary btn-sm mb-0 mr-2 <?= activeOption('Laki-Laki',$keluarga['jk_klg'])?>" id="jkLaki">
                                            <i class="fa fa-male"></i>
                                            <input type="radio" name="jk_klg" id="option1" autocomplete="off" class="jk_laki" value="Laki-Laki"   <?= checkOption('Laki-Laki',$keluarga['jk_klg'])?>> 
                                        </label> 
                                        <label class="btn btn-primary btn-sm mb-0 <?= activeOption('Perempuan',$keluarga['jk_klg'])?>" id="jkPerempuan">
                                            <i class="fa fa-female"></i>
                                            <input type="radio" name="jk_klg" id="option2" autocomplete="off" class="jk_perempuan" value="Perempuan"  <?= checkOption('Perempuan',$keluarga['jk_klg'])?>>  
                                        </label>
                                    <?php endif; ?>

                                    </div>

                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('jk_klg'); ?>
                                    </small>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir </label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">
                                             <i class="fa fa-calendar" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="Tanggal Lahir"name="tl_klg" value="<?= $keluarga['tl_klg'] ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tl_klg'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Catatan</label>
                                <div class="col-sm-9">
                                <textarea name="catatan" id="" cols="10" rows="3" class="form-control form-control-sm"><?=$keluarga['catatan']?></textarea>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('catatan'); ?>
                                    </small>
                                </div>
                            </div>

                    
                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$keluarga['nip']?>/keluarga/keluarga">
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
