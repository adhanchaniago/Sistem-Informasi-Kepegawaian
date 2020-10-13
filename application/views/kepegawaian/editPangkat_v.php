
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
                        <li class="breadcrumb-item active">Pangkat / Golongan</li>
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
                    Golongan <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>  
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
                    <h3><i class="fa fa-id-card-o"></i> Form Data Pangkat / Golongan
                    </h3>
                    </div>


                    <div class="card-body">
                        <div class="tengah-form" >
                        <form enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id_riwayat" value="<?=$riwayat['id_riwayat']?>">
                            <input type="hidden" name="status" value="<?=$riwayat['status']?>">
                            <div class="form-group row" <?= checkAkses() ?>>
                                <label  class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                <div class="col-sm-9">
                                    <select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                         <?php foreach($pegawai as $row) :?>
                                            <?php if ($row['nip']==$riwayat['nip']) : ?>
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
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Golongan </label>
                                <div class="col-sm-6">
                                     <select name="id_golongan"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                         <?php foreach($golongan as $row) :?>
                                            <?php if ($row['id_golongan']==$riwayat['id_golongan']) : ?>
                                                <option data-tokens="<?= $row['pangkat']?>" value="<?= $row['id_golongan']?>" selected><?= $row['pangkat']?></option>
                                            <?php else : ?>
                                                <option data-tokens="<?= $row['pangkat']?>" value="<?= $row['id_golongan']?>"><?= $row['pangkat']?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('id_golongan'); ?>
                                    </small>
                                </div>
                                <div class="col-sm-3">
                                    <a data-target="#addGolonganModal" data-toggle="modal" class="btn btn-outline-primary btn-sm text-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                     Golongan</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Jenis SK </label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="<?= $riwayat['jenis_sk'] ?>"  placeholder="Jenis SK" name="jenis_sk">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('jenis_sk'); ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">no SK, Tanggal SK </label>
                                <div class="col-sm-4">
                                     <input type="text" class="form-control form-control-sm" value="<?=$riwayat['no_sk']?>" placeholder="No SK" name="no_sk">
                                     <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('no_sk'); ?>
                                    </small>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">
                                             <i class="fa fa-calendar" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" value="<?=$riwayat['tanggal_sk'] ?>" class="form-control datepicker form-control-sm" placeholder="Tanggal SK"name="tanggal_sk">
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tanggal_sk'); ?>
                                    </small>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">TMT Golongan </label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">
                                             <i class="fa fa-calendar" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="TMT golongan"name="tmt_golongan" value="<?=$riwayat['tmt_golongan']?>">
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tmt_golongan'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">File SK </label>
                                <div class="col-sm-9">
                                    <input type="file" value="<?= $riwayat['file_sk']?>" name="file_sk" id="filer_example2">
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('file_sk'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$riwayat['nip']?>/golongan">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- end card-->
            </div>


        </div>

    <!--Modal-->
    <div class="modal fade custom-modal" id="addGolonganModal" tabindex="-1" role="dialog" aria-labelledby="addGolonganModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-dark">
                <h5 class="modal-title m-0" id="exampleModalLabel1">Tambah Pangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body"> 
        <form action="<?= base_url();?>Pangkat/addPangkat" method="post">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                            <label for="" class="col-form-label-sm">Golongan</label>
                            <input type="text" class="form-control form-control-sm" name="id_golongan">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                            <label for="" class="col-form-label-sm">Pangkat</label>
                            <input type="text" class="form-control form-control-sm" name="pangkat">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="col-form-label-sm">Save</label>
                         <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </div>
            
        </form> 
<?php 
 $data['golongan'] = $golongan;
    $this->load->view('kepegawaian/daftarpangkat_v',$data);
?>

        </div>
    </div>
    </div>
</div>
    <!--EndModal-->

    </div>
    <!-- END container-fluid -->

</div>
<!-- END content -->

</div>
