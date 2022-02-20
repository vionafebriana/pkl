<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembimbing PKL</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tnggal Lahir</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aktivitas as $key => $value) : ?>
                            <tr>
                                <td></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['jenisKelamin']; ?></td>
                                <td><?= $value['tglLahir']; ?></td>
                                <td><?= ($value['status'] == '0' ? 'Tidak Aktif' : 'Aktif') ?></td>
                                <td class="text-center flex">
                                <a href="Admin/editPembimbing/<?= $value['id']; ?>"><i class="fa fa-edit"></i></a>
                                <a href="Admin/hapusPembimbing/<?= $value['id']; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->