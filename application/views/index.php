<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Employee data</h3>
        <div class="col-md-6">
            <p><a href="<?= base_url('data_karyawan/addNewEmployee'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Employee</a></p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                        <thead>
                            <tr>
                                <th>No Scan</th>
                                <th>Nama Karyawan</th>
                                <th>Department</th>
                                <th>Jabatan</th>
                                <th>Status Karyawan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- CLASS GRADE gradeC, gradeA, gradeU, gradeX -->
                            <?php
                            $queryEmployee = "SELECT * FROM tbl_makar ORDER BY NAMA ASC";
                            $dataEmployee = $this->db->query($queryEmployee)->result_array();
                            echo json_encode($dataEmployee);
                            $no = 1;
                            ?>
                            <?php foreach ($dataEmployee as $de) : ?>
                            <tr class="gradeX">
                                <td><?= $de['no_scan'] ?></td>
                                <td><?= $de['nama'] ?></td>
                                <td><?= $de['dept'] ?></td>
                                <td><?= $de['jabatan'] ?></td>
                                <td><?= $de['status_karyawan']  ?>
                                    <?php if ($de['tgl_resign'] == 0) {
                                        echo " ";
                                    } else {
                                        echo ", " . date('d F Y', $de['tgl_resign']);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('data_karyawan/edit_employee/') . $de['no_scan']; ?>"><i class="fa fa-check-circle-o"></i>Employee</a> |
                                    <a href="<?= base_url('data_karyawan/tampil/') . $de['no_scan']; ?>"><i class="fa fa-edit"></i>Edit</a> |
                                    <a href="#" data-toggle="modal" data-target="#modalDelete<?= $de['no_scan']; ?>"><i class="fa fa-trash"></i>Delete</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDelete<?= $de['no_scan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                        <form role="form" action="<?= base_url('data_karyawan/delete/') . $user['name'];  ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                    </div>
                                                    <input class="form-control input-sm" value="<?= $de['no_scan']; ?>" name="no_scan" type="hidden">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> |
                                    <a href="#" data-toggle="modal" data-target="#modalResign<?= $de['no_scan']; ?>"><i class="fa fa-sign-out"></i>Resign</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalResign<?= $de['no_scan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                        <form role="form" action="<?= base_url('data_karyawan/resign/') . $user['name'];  ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-sign-out"></i>Resign</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <label class="control-label col-lg-12">Masukan Tanggal Resign</label>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <input class="form-control input-sm" value="<?= $de['no_scan']; ?>" id="no_scan" name="no_scan" type="hidden">
                                                                <input class="form-control input-sm" id="tgl_resign" name="tgl_resign" type="date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr> <?php endforeach; ?> </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section> 