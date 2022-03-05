<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Laporan Aktivitas Harian</h1>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bold" aria-current="page" href="#" id="setuju">Sudah Disetujui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="belumsetuju">Belum Disetujui</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <div class="table-responsive" id="tabel-setuju">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($setuju as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive" id="tabel-belumsetuju" style="display: none;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($belumsetuju as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <td class="text-center flex">
                                    <a href="/Pembimbing/terimaAktivitas/<?= $value['acid'] ?>"><i class="fa fa-check"></i></a>
                                    <b>|</b>
                                    <a href="/Pembimbing/hapusAktivitas/<?= $value['acid'] ?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->