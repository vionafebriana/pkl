<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Aktivitas Harian</h6>
            <h6 class=" m-0 font-weight-bold text-primary text-right"><a href="TambahAktivitas">tambah</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Penjelasan Kegiatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aktivitas as $key => $value) : ?>
                            <tr>
                                <td>No</td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <td><?= ($value['status'] == '0' ? 'belum disetujui' : 'disetujui') ?></td>
                                <td class="text-center flex">
                                    <button><i class="fa fa-edit"></i></button>
                                    <button><i class="fa fa-trash"></i></button>
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