
        <table id="example1" class="table table-bordered table-responsive-lg table-hover display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Golongan</th>
                    <th>Pangkat</th>
                    <?php if ($this->session->userdata('level')=='pegawai') : ?>

                    <?php else : ?>
                    <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody><?php $i=1; ?>
            <?php foreach($golongan as $row) : ?>
                <tr class="p-1">
                    <td><?= $i ?></td>
                    <td><?=$row['id_golongan'];?></td>
                    <td><?= $row['pangkat']; ?></td>
                    <?php if ($this->session->userdata('level')=='pegawai') : ?>
                    <?php else : ?>
                    <td class="p-1">
                        <div class="row justify-content-center">
                            <form action="<?= base_url();?>Pangkat/deletePangkat" method="post">
                                <button class="btn btn-sm btn-danger " onclick="return ConfirmDelete();" type="submit" title="Delete user">
                                    <input type="hidden" value="<?=$row['id_golongan'];?>" name="id">
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
