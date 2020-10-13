
<div class="content-page">
<?php
    function checkOption($x,$y){
        if($x==$y)
            return "selected";
        else
            return "";
    }

    function checkStat($status){
        if ($status=='BLU'){
            return 'hidden';
        }else{
            return '';
        }
    }
?>
<!-- Start content -->
<div class="content">

    <div class="container-fluid">

   

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Data Pegawai</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Jabatan Struktural</li>
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
                <div class="card mb-3" >
                    <div class="card-header blue p-2">
                    <h3><i class="fa fa-id-card-o"></i> Form Data Jabatan Struktural
                    </h3>
                    </div>


                    <div class="card-body" >
                        <div class="tengah-form" style="min-height:300px;" >
                        <form enctype="multipart/form-data" method="post">
                            <div class="form-group row" <?= checkAkses() ?>>
                                <label  class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                <div class="col-sm-9">
                                    <select name="nip"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                    <?php 
                                        if ($this->session->userdata('level')=='admin'){
                                            $nip = $this->input->post('nip');
                                        }
                                        else if ($this->session->userdata('level')=='pegawai'){
                                            $nip = $this->session->userdata('nip');
                                        }
                                    ?>
                                        <?php foreach($pegawai as $row) :?>
                                            <?php if ($row['nip']==$nip) : ?>
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
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Jabatan </label>
                                <div class="col-sm-6">
                                     <select id="" name="id_jabatan"class="selectpicker form-control form-control-sm strukturalSelect" data-live-search="true" data-size="6" title="...">
                                   
                                         <?php foreach($jabatan as $row) :?>
                                            <?php if ($row['id_jabatan']==$this->input->post('id_jabatan')) : ?>
                                            <option data-tokens="<?= $row['nm_jabatan']?>" class="option" data-value="<?=$row['nm_jabatan']?>" value="<?= $row['id_jabatan']?>" selected>
                                            <?= $row['nm_jabatan']?>
                                            </option>
                                            <?php else : ?>
                                            <option data-tokens="<?= $row['nm_jabatan']?>"class="option" data-value="<?=$row['nm_jabatan']?>" value="<?= $row['id_jabatan']?>">
                                            <?= $row['nm_jabatan']?>
                                            <?php endif; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('id_jabatan'); ?>
                                    </small>
                                </div> 
                                <div class="col-sm-3">
                                    <a data-target="#addJabatanModal" data-toggle="modal" class="btn btn-outline-primary btn-sm text-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                     Jabatan</a>
                                </div>
                            </div>

                            <div class="form-group row eselonSelect">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Eselon </label>
                                <div class="col-sm-6">
                                     <select  name="id_eselon"class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                         <?php foreach($eselon as $row) :?>
                                            <?php if ($row['id_eselon']==$this->input->post('id_eselon')) : ?>
                                            <option data-tokens="<?=$row['gol_eselon']?>" value="<?= $row['id_eselon']?>" selected>
                                            <?=$row['gol_eselon']?>
                                            </option>
                                            <?php else : ?>
                                            <option data-tokens="<?=$row['gol_eselon']?>" value="<?= $row['id_eselon']?>">
                                            <?=$row['gol_eselon']?>
                                            </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('id_eselon'); ?>
                                    </small>
                                </div> 
                                <div class="col-sm-3">
                                    <a data-target="#addEselonModal" data-toggle="modal" class="btn btn-outline-primary btn-sm text-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                     Eselon</a>
                                </div>
                            </div>

                            <div class="form-group row eselonSelect">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">Status Struktural </label>
                                <div class="col-sm-9">
                                    <select name="status_struktural" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                        <option value="Aktif" <?=checkOption('Aktif',$this->input->post('status_struktural'))?>>Aktif</option>
                                        <option value="Non Aktif" <?=checkOption('Non Aktif',$this->input->post('status_struktural'))?>>Non Aktif</option>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('status_struktural'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row eselonSelect">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">no SK, Tanggal SK </label>
                                <div class="col-sm-4">
                                     <input type="text" class="form-control form-control-sm"  placeholder="No SK" name="no_sk" value="<?= $this->input->post('no_sk') ?>" >
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
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="Tanggal SK"name="tanggal_sk" value="<?= $this->input->post('tanggal_sk') ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tanggal_sk'); ?>
                                    </small>
                                </div>
                            </div>

                            
                            <div class="form-group row eselonSelect">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">TMT jabatan </label>
                                <div class="col-sm-5">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-sm">
                                           <div class="input-group-text">
                                             <i class="fa fa-calendar" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" class="form-control datepicker form-control-sm" placeholder="TMT Jabatan"name="tmt_jabatan" value="<?= $this->input->post('tmt_jabatan') ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('tmt_jabatan'); ?>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4 eselonSelect">
                                <label  class="col-sm-3 col-form-label col-form-label-sm">File SK </label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_sk" id="filer_example2" value="<?= $this->input->post('file_sk') ?>" >
                                    <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                        <?= form_error('file_sk'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <a class="btn btn-sm btn-secondary mr-4" href="<?=base_url();?>Profile/index/<?=$nip?>/struktural">
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
    <div class="modal fade custom-modal" id="addJabatanModal" tabindex="-1" role="dialog" aria-labelledby="addJabatanModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                    <h5 class="modal-title m-0" id="exampleModalLabel1">Tambah Jabatan Struktural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body"> 
            <form action="<?= base_url();?>Struktural/addStruktural" method="post">
                <div class="row justify-content-center mt-0">
                    <div class="col-md-9">
                        <div class="form-group">
                                <label for="" class="col-form-label-sm">Jabatan</label>
                                <input type="text" class="form-control form-control-sm" name="nm_jabatan">
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
            $data['jabatan'] = $jabatan;
                $this->load->view('kepegawaian/daftarstruktural_v',$data);
            ?>

            </div>
        </div>
        </div>
    </div>

    <div class="modal fade custom-modal" id="addEselonModal" tabindex="-1" role="dialog" aria-labelledby="addEselonModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                    <h5 class="modal-title m-0" id="exampleModalLabel1">Tambah Eselon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body"> 
            <form action="<?= base_url();?>Struktural/addEselon" method="post">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                                <label for="" class="col-form-label-sm">Eselon</label>
                                <input type="text" class="form-control form-control-sm" name="gol_eselon">
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
            $data['eselon'] = $eselon;
                $this->load->view('kepegawaian/daftareselon_v',$data);
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
