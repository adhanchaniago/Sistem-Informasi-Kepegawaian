<?php
    function checkOption($x,$y){
        if($x==$y)
            return "selected";
        else
            return "";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Pusyantek Humoris</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url();?>assets/logo/bppt.png">

	<!-- Bootstrap CSS -->
	<link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Font Awesome CSS -->
	<link href="<?= base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />


	<!-- BEGIN CSS for this page -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
	<!-- END CSS for this page -->

	<!--Plugin-->
    <link href="<?= base_url();?>assets/plugins/datetimepicker/css/daterangepicker.css" rel="stylesheet" /> 
    
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/bootstrap-select/css/bootstrap-select.css">

	<link href="<?=base_url();?>assets/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/daterangepicker.css" rel="stylesheet" /> 

</head>
<body class="adminbody">
<div id="main">
<?php 
            $this->load->view('templates/headerbar.php');
            $this->load->view('templates/sidebar.php');
?>
<?php 
 function checkAkses(){
    $ci =& get_instance();
        if ($ci->session->userdata('level')=='pegawai'){
            return 'hidden';
        }else{
            return '';
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
							<li class="breadcrumb-item"><a href="<?=base_url();?>Profile/index/<?=$diklat['nip']?>">
                            Data Pegawai
                            </a> </li>
							<li class="breadcrumb-item active">Ubah Pelatihan</li>
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
                        <h3><i class="fa fa-id-card-o"></i> Form Data Pelatihan Pegawai 
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
                                            <?php if ($row['nip']==$diklat['nip']) : ?>
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
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Nama Pelatihan <small class="text-danger">*</small></label>
                                <div class="col-sm-9">
                                <textarea name="nama_diklat" id="" cols="10" rows="3" class="form-control form-control-sm"><?=$diklat['nama_diklat']?></textarea>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('nama_diklat'); ?>
                                    </small>
                                </div>
                            </div>


                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm" >Mulai - Selesai <small class="text-danger">*</small></label>
                                    <div class="col-sm-5">
                                        <div class="input-group date">
                                            <div class="input-group-prepend input-group-sm">
                                               <div class="input-group-text">
                                                 <i class="fa fa-calendar" aria-hidden="true"></i>
                                               </div>
                                            </div>
                                            <input type='text' class="form-control" name="daterange" value="<?=$diklat['mulai_diklat']." - ".$diklat['selesai_diklat']?>" />	
                                              
                                        </div>
                                        <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('daterange'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Tanda Lulus <small class="text-danger">*</small> </label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?=$diklat['tanda_lulus_diklat']?>" placeholder="Tanda Lulus" name="tanda_lulus_diklat">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('tanda_lulus_diklat'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row hidePendidikan">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Tempat <small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?=$diklat['tempat_diklat']?>" placeholder="Tempat" name="tempat_diklat">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('tempat_diklat'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row hidePendidikan">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Negara <small class="text-danger">*</small></label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" value="<?=$diklat['negara_diklat']?>" placeholder="Negara " name="negara_diklat">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('negara_diklat'); ?>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row hidePendidikan">
                                    <label  class="col-sm-3 col-form-label col-form-label-sm">Sponsor</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" value="<?=$diklat['sponsor_diklat']?>" placeholder="Sponsor " name="sponsor_diklat">
                                       <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                            <?= form_error('sponsor_diklat'); ?>
                                        </small>
                                    </div>
                                </div>
                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Keterangan</label>
                                <div class="col-sm-9">
                                <textarea name="keterangan" id="" cols="10" rows="3" class="form-control form-control-sm"><?=$diklat['keterangan']?></textarea>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('keterangan'); ?>
                                    </small>
                                </div>
                            </div>

                            
                            <div class="form-group row mb-4">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">File <small class="text-danger">*</small></label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_diklat" id="filer_example2" value="<?= $diklat['file_diklat'] ?>" >
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('file_diklat'); ?>
                                    </small>
                                </div>
                            </div>

                                <div class="row justify-content-center ">
                                    <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$diklat['nip']?>/pelatihan">
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

	<script src="<?= base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery.filer/js/jquery.filer.min.js"></script>
  
<script src="<?= base_url(); ?>assets/plugins/datetimepicker/js/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datetimepicker/js/daterangepicker.js"></script>
<script>
                                                $(function() {
                                                    $('input[name="daterange"]').daterangepicker({
                                                       
                                                    });
                                                });
                                                </script>
  <script>
    
    $('#filer_example2').filer({
        limit: 1,
        maxSize: 3,
        extensions: ['jpg', 'jpeg', 'png', 'pdf', 'psd'],
        changeInput: true,
        showThumbs: true,
        addMore: false
    });

    $(document).ready(function () {

      $('.selectpicker').selectpicker();
				});


  </script>

</body>

</html>