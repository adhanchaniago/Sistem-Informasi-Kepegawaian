<?php
function select($x, $y)
{
    if ($x == $y) {
        return 'selected';
    } else
        return '';
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
                            <li class="breadcrumb-item active">Edit Pegawai PNS</li>
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
                            Bidang <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
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
                            <h3><i class="fa fa-id-card-o"></i> Form Data Pegawai PNS
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="tengah-form">
                                <form enctype="multipart/form-data" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?= $pegawai['nip'] ?>" class="form-control form-control-sm" placeholder="NIP" name="nip">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('nip'); ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">NIP Lama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" value="<?= $pegawai['nip_lama'] ?>" placeholder="NIP Lama" name="nip_lama">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('nip_lama'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama </label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?= $pegawai['nama'] ?>" class="form-control form-control-sm" placeholder="Nama" name="nama">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('nama'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row" <?= checkAkses() ?>>
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Keterangan </label>
                                        <div class="col-sm-9">
                                            <select name="keterangan" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                                                <option value="PNS" <?= select("PNS", $pegawai['keterangan']) ?>>PNS</option>
                                                <option value="NON PNS" <?= select("NON PNS", $pegawai['keterangan']) ?>>NON PNS</option>
                                                <option value="CPNS" <?= select("CPNS", $pegawai['keterangan']) ?>>CPNS</option>
                                                <option value="CDTN" <?= select("CDTN", $pegawai['keterangan']) ?>>CDTN</option>
                                                <option value="Tugas Belajar" <?= select("Tugas Belajar", $pegawai['keterangan']) ?>>Tugas Belajar</option>
                                                <option value="Pensiun" <?= select("Pensiun", $pegawai['keterangan']) ?>>Pensiun</option>
                                                <option value="Ditugaskan" <?= select("Ditugaskan", $pegawai['keterangan']) ?>>Dipekerjakan</option>
                                                <option value="Berhenti" <?= select("Berhenti", $pegawai['keterangan']) ?>>Berhenti</option>
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('keterangan'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row" <?= checkAkses() ?>>
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Jabatan pelaksana </label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?= $pegawai['jabatan_pelaksana'] ?>" class="form-control form-control-sm pelaksanaInput typeahead" placeholder="Jabatan pelaksana" name="jabatan_pelaksana" value="<?= $pegawai['jabatan_pelaksana'] ?>">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">

                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Tanggal Bergabung</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date">
                                                <div class="input-group-prepend input-group-sm">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control datepicker form-control-sm" placeholder="Tanggal Bergabung " name="tanggal_bergabung" value="<?= $pegawai['tanggal_bergabung'] ?>">
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('tanggal_bergabung'); ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Tempat, Tanggal Lahir </label>
                                        <div class="col-sm-4">
                                            <input type="text" value="<?= $pegawai['tempat_lahir'] ?>" class="form-control form-control-sm" placeholder="Tempat" name="tempat_lahir">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('tempat_lahir'); ?>
                                            </small>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group date">
                                                <div class="input-group-prepend input-group-sm">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <input type="text" value="<?= $pegawai['tanggal_lahir'] ?>" class="form-control datepicker form-control-sm" placeholder="Tanggal Lahir" name="tanggal_lahir">
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('tanggal_lahir'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row" <?= checkAkses() ?>>
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Agama </label>
                                        <div class="col-sm-7">
                                            <select name="id_agama" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                                <?php foreach ($agama as $row) : ?>
                                                    <?php if ($pegawai['id_agama'] == $row['id_agama']) : ?>
                                                        <option data-tokens="<?= $row['nama_agama'] ?>" value="<?= $row['id_agama'] ?>" selected><?= $row['nama_agama'] ?></option>
                                                    <?php else : ?>
                                                        <option data-tokens="<?= $row['nama_agama'] ?>" value="<?= $row['id_agama'] ?>"><?= $row['nama_agama'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('id_agama'); ?>
                                            </small>
                                        </div>
                                        
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Jenis Kelamin </label>
                                        <div class="col-sm-9">
                                            <select name="jenis_kelamin" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                                                <option data-tokens="Laki-Laki" value="Laki-Laki" <?= select($pegawai['jenis_kelamin'], 'Laki-Laki') ?>>Laki-Laki</option>
                                                <option data-tokens="Perempuan" value="Perempuan" <?= select($pegawai['jenis_kelamin'], 'Perempuan') ?>>Perempuan</option>
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('jenis_kelamin'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row" <?= checkAkses() ?>>
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Pensiun Usia </label>
                                        <div class="col-sm-9">
                                            <select name="pensiun" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="4" title="...">
                                                <option data-tokens="58" value="58" <?= select("58", $pegawai['pensiun']) ?>>58 </option>
                                                <option data-tokens="60" value="60" <?= select("60", $pegawai['pensiun']) ?>>60 </option>
                                                <option data-tokens="65" value="65" <?= select("65", $pegawai['pensiun']) ?>>65 </option>
                                                <option data-tokens="70" value="70" <?= select("70", $pegawai['pensiun']) ?>>70 </option>
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('pensiun'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row" <?= checkAkses() ?>>
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Bidang </label>
                                        <div class="col-sm-7">
                                            <select name="id_bidang" class="selectpicker form-control form-control-sm" data-live-search="true" data-size="3" title="...">
                                                <?php foreach ($bidang as $row) : ?>
                                                    <?php if ($pegawai['id_bidang'] == $row['id_bidang']) : ?>
                                                        <option data-tokens="<?= $row['nama_bidang'] ?>" value="<?= $row['id_bidang'] ?>" selected><?= $row['nama_bidang'] ?></option>
                                                    <?php else : ?>
                                                        <option data-tokens="<?= $row['nama_bidang'] ?>" value="<?= $row['id_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('id_bidang'); ?>
                                            </small>
                                        </div>
                                        <div class="col-sm-2">
                                            <a data-target="#addBidangModal" data-toggle="modal" class="btn btn-outline-primary btn-sm text-primary">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Bidang</a>
                                        </div>
                                    </div>

                                    <input type="hidden" name="old_image" value="<?= $pegawai['foto'] ?>">
                                    <input type="hidden" name="old_nip" value="<?= $pegawai['nip'] ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Alamat </label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" name="alamat"><?= $pegawai['alamat'] ?></textarea>
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('alamat'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">No Telepon </label>
                                        <div class="col-sm-9">
                                            <input type="number" id="telephone" class="form-control form-control-sm" placeholder="No Telepon" name="no_telp" value="<?= $pegawai['no_telp'] ?>">
                                            <small id="passwordHelpBlock" class="form-text text-danger mb-0">
                                                <?= form_error('no_telp'); ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-sm-3 col-form-label col-form-label-sm">Foto </label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" id="filer_example2">
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <a class="btn btn-sm btn-secondary mr-4" href="<?= base_url(); ?>Profile/index/<?= $pegawai['nip'] ?>/sdkws">
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

            <!--Modal-->
            <div class="modal fade custom-modal" id="addBidangModal" tabindex="-1" role="dialog" aria-labelledby="addBidangModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title m-0" id="exampleModalLabel1">Tambah Bidang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>DataPegawai/addBidang" method="post">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="" class="col-form-label-sm">Nama Bidang</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" name="nama_bidang">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-save"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <table id="example1" class="table table-bordered table-responsive-lg table-hover display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bidang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody><?php $i = 1; ?>
                                    <?php foreach ($bidang as $row) : ?>
                                        <tr class="p-1">
                                            <td><?= $i ?></td>
                                            <td><?= $row['nama_bidang']; ?></td>

                                            <td class="p-1">
                                                <div class="row justify-content-center">
                                                    <form action="<?= base_url(); ?>DataPegawai/deleteBidang" method="post">
                                                        <button onclick="return ConfirmDelete();" type="submit" class="btn btn-sm btn-danger " title="Delete user">
                                                            <input type="hidden" value="<?= $row['id_bidang']; ?>" name="id">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

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