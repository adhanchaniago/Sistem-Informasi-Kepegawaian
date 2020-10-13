
            <table id="example1" class="table table-bordered table-responsive-lg table-hover display">
                <thead>
                    <tr>
                        <th style="width:10%;">No</th>
                        <th>Eselon</th>
                        <?php if ($this->session->userdata('level')=='pegawai') : ?>

                        <?php else : ?>
                        <th>Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody><?php $i=1; ?>
                <?php foreach($eselon as $row) : ?>
                    <tr class="p-1">
                        <td style="width:10%;"><?= $i ?></td>
                        <td><?= $row['gol_eselon']; ?></td>

                        <?php if ($this->session->userdata('level')=='pegawai') : ?>

                        <?php else : ?>
                        <td class="p-1">
                        <div class="row justify-content-center">
                            <form action="<?= base_url();?>Struktural/deleteEselon" method="post">
                                <button class="btn btn-sm btn-danger "onclick="return ConfirmDelete();" type="submit" title="Delete user">
                                    <input type="hidden" value="<?=$row['id_eselon'];?>" name="id">
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