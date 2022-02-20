<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembimbing PKL</h6>
            <h6 class=" m-0 font-weight-bold text-primary text-right"><a href="tambahPembimbing">tambah</a></h6>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $key => $value) : ?>
                            <tr>
                                <td></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= ($value['jenisKelamin'] == '1' ? 'Laki-Laki' : 'Perempuan') ?></td>
                                <td><?= $value['tglLahir']; ?></td>
                                <td class="text-center flex">
                                    <a href="editPembimbing/<?= $value['id']; ?>"><i class="fa fa-edit"></i></a>
                                    <a href="hapusPembimbing/<?= $value['id']; ?>"><i class="fa fa-trash"></i></a>
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