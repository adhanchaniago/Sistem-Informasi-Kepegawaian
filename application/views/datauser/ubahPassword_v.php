<?php
function checkOption($x, $y)
{
    if ($x == $y)
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
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>DataPegawai">
                                    Data Pegawai
                                </a> </li>
                            <li class="breadcrumb-item active">Ubah Password</li>
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
                            <h3><i class="fa fa-id-card-o"></i> Form Data Password Pegawai
                            </h3>
                        </div>


                        <div class="card-body">
                            <div class="tengah-form">
                                <form enctype="multipart/form-data" method="post">

                                    <div class="form-group row d-none">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Username </label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control form-control-sm" value="<?= $user['username'] ?>" placeholder="Username" name="username">

                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Password Baru</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control form-control-sm" value="" placeholder="Password" name="password_baru">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('password'); ?>
                                            </small>
                                            <?php if ($this->session->flashdata('flashgagal')) : ?>
                                                <small class="form-text text-danger mb-0">
                                                    <?= $this->session->flashdata('flashgagal'); ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Password Baru (Konfirmasi)</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control form-control-sm" value="" placeholder="Password" name="password">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('password'); ?>
                                            </small>
                                        </div>

                                    </div>



                                    <div class="row justify-content-center ">
                                        <?php if ($this->session->userdata('level') == 'admin') : ?>
                                            <a class="btn btn-sm btn-secondary mr-4" href="<?= base_url(); ?>DataPegawai">
                                                Kembali
                                            </a>
                                        <?php elseif ($this->session->userdata('level') == 'pegawai') : ?>
                                            <a class="btn btn-sm btn-secondary mr-4" href="<?= base_url(); ?>Menu">
                                                Kembali
                                            </a>
                                        <?php endif; ?>
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