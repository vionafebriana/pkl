<?php
function get_time_ago($time)
{
    $time_difference = time() - $time;
    if ($time_difference < 1) {
        return 'baru saja ditambahkan';
    }
    $condition = array(
        12 * 30 * 24 * 60 * 60 =>  'tahun',
        30 * 24 * 60 * 60       =>  'bulan',
        24 * 60 * 60            =>  'hari',
        60 * 60                 =>  'jam',
        60                      =>  'menit',
        1                       =>  'detik'
    );
    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;
        if ($d >= 1) {
            $t = round($d);
            return 'sekitar' . $t . ' ' . $str . ' yang lalu';
        }
    }
} ?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Dashboard</h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <!-- Jumlah Pendaftar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col mr-2 text-right">
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $pendaftar; ?></div>
                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                Pendaftar Baru!</div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="#" id="pendaftarbaru">
                                <span>Selengkapnya</span>
                                <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Konfirmasi Absensi dan Laporan Aktivitas Harian Peserta PKL -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xs-3">
                            <i class="fa fa-bell fa-4x"></i>
                        </div>
                        <div class="col mr-2 text-right">
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $laporan; ?></div>
                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                Laporan Aktivitas Peserta!</div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="#" id="aktivitasbaru">
                                <span>Selengkapnya</span>
                                <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Jumlah Peserta PKL -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-4x"></i>
                        </div>
                        <div class="col mr-2 text-right">
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $aktif; ?></div>
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                Total Peserta PKL</div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="#" id="peserta">
                                <span>Selengkapnya</span>
                                <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Riwayat Peserta -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-4x"></i>
                        </div>
                        <div class="col mr-2 text-right">
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $riwayat; ?></div>
                            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                                Riwayat Peserta</div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <a href="#" id="riwayat">
                                <span>Selengkapnya</span>
                                <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Exspand Peserta Baru-->
        <div class="card" id="pendaftartab" style="width: 100%; display:none">
            <div class="card-header">
                <i class="fa fa-bell fa-fw"></i> Peserta Baru!
            </div>
            <!-- /.card-heading -->
            <div class="card-body">
                <table class="table" width="100%" cellspacing="0">
                    <tbody>
                        <?php foreach ($daftar as $key => $value) : ?>
                            <tr>
                                <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><i class="fa fa-user fa-fw"></i> <?= $value['nama']; ?></a></td>
                                <td> <span class="text-muted small">
                                        <em><?= get_time_ago(strtotime($value['created_at'])); ?></em>
                                    </span></td>
                                <td><a href="/Pembimbing/terimaPeserta/<?= $value['userId'] ?>"><a href=""><i class="fa fa-check"></i></a></td>
                                <td><a href="/Pembimbing/hapusPeserta/<?= $value['userId'] ?>"><a href=""><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- /.list-group -->
                <a href="/Pembimbing/dataPeserta" class="btn btn-default btn-block">Selengkapnya</a>
            </div>
        </div>

        <!-- Exspand Laporan aktivitas Baru-->
        <div class="card" id="aktivitastab" style="width: 100%; display:none">
            <div class="card-header">
                <i class="fa fa-bell fa-fw"></i> Laporan Aktivitas Harian Baru!
            </div>
            <!-- /.card-heading -->
            <div class="card-body">
                <table class="table" width="100%" cellspacing="0">
                    <tbody>
                        <?php foreach ($aktivitas as $key => $value) : ?>
                            <tr>
                                <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><i class="fa fa-user fa-fw"></i> <?= $value['nama']; ?></a></td>
                                <td> <span class="text-muted small"><em><?= $value['keterangan']; ?></em>
                                    </span></td>
                                <td><a href="/Pembimbing/terimaAktivitas/<?= $value['acid'] ?>"><a href=""><i class="fa fa-check"></i></a></td>
                                <td><a href="/Pembimbing/hapusAktivitas/<?= $value['acid'] ?>"><a href=""><i class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- /.list-group -->
                <a href="/Pembimbing/dataAktivitas" class="btn btn-default btn-block">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->