
            <table id="example1" class="table table-bordered table-responsive-lg table-hover display">
                <thead>
                    <tr>
                        <th>No</th>
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
                        <td><?= $row['nm_jabatan']; ?></td>

                        <?php if ($this->session->userdata('level')=='pegawai') : ?>

                        <?php else : ?>
                        <td class="p-1">
                        <div class="row justify-content-center">
                            <form action="<?= base_url();?>Struktural/deleteStruktural"onclick="return ConfirmDelete();" type="submit" method="post">
                                <button class="btn btn-sm btn-danger " title="Delete user">
                                    <input type="hidden" value="<?=$row['id_jabatan'];?>" name="id">
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