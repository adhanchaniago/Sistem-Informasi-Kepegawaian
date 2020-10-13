
        <table id="example1" class="table table-bordered table-responsive-lg table-hover display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <?php if ($this->session->userdata('level')=='pegawai') : ?>

                    <?php else : ?>
                    <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody><?php $i=1; ?>
            <?php foreach($jabatan as $row) : ?>
                <tr class="p-1">
                    <td><?= $i ?></td>
                    <td><?=$row['id_jabatan'];?></td>
                    <td><?= $row['nm_jabatan']; ?></td>
                    <?php if ($this->session->userdata('level')=='pegawai') : ?>

                    <?php else : ?>
                    <td class="p-1">
                    <div class="row justify-content-center">
                        <form action="<?= base_url();?>Fungsional/deleteFungsional" method="post">
                            <button class="btn btn-sm btn-danger " onclick="return ConfirmDelete();" type="submit" title="Delete user">
                                <input type="hidden" value="<?=$row['id'];?>" name="id">
                                <input type="hidden" value="<?=$this->input->post('nip')?>" name="nip">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
        </table>