<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Aktivitas Harian</h6>
            <h6 class=" m-0 font-weight-bold text-primary text-right"><a href="AktivitasHarian/tambahAktivitas">tambah</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                            <tr id="<?= $value['id']; ?>">
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <?php if ($value['status'] == '0') : ?>
                                    <td>Belum Disetujui</td>
                                    <td class="text-center flex">
                                        <a href="AktivitasHarian/editAktivitas/<?= $value['id']; ?>"> <button type="submit" class="btn btn-success"> <i class="fa fa-edit"></i></button></a>
                                        <button type="submit" class="btn btn-danger remove"> <i class="fa fa-trash "></i></button>
                                    </td>
                                <?php else : ?>
                                    <td>Disetujui</td>
                                    <td></td>
                                <?php endif; ?>
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