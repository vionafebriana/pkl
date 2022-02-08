<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark topbar static-top shadow fixed-top">
        <!-- Navbar -->
        <a class="navbar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="navbar-brand-icon">
                <img style="width:60px" src="/assets/img/logobps.png" alt="Logo BPS">
            </div>
            <div class="navbar-brand-text">SIMAG BPS KOTA MALANG</div>
        </a>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#content">Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#informasi"> Informasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alur"> Alur Pendaftaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil"> Profil BPS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak"> Kontak
                    </a>
                </li>
                <?php if(!session()->log): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('AuthGoogle'); ?>"> Login
                    </a>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AuthGoogle/logout'); ?>"> Logout
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Main Content -->
        <div id="content">

            <!-- ======= Logo ======= -->
            <div class="row text-sm-center text-center p-sm-5 m-sm-5">
                <div class="col-md-6 col-7 mx-auto">
                    <img style="width:80%" src="/assets/img/logobps.png" alt="BPS Logo">
                </div>
                <div class="col-md-6 text-md-end mt-sm-5 mt-3">
                    <h1 class="text-right grey-text">SISTEM INFORMASI</h1>
                    <h1 class="text-right grey-text">PRAKTIK KERJA LAPANGAN</h1>
                    <h1 class="text-right grey-text">BPS KOTA MALANG</h1>
                </div>
            </div>
            <!-- End Logo -->
            <hr>

            <!-- ======= Login & Daftar======= -->
            <div class="row simple-cards users-card justify-content-center p-sm-5">
                <div class="col-lg-3 col-xs-8 card-login" id="login-peserta">
                    <div id="container-peserta">
                        <div class="card user-card" data-toggle="modal" data-target="#modal-peserta">
                            <div class="card-header-img text-center">
                                <a href="<?= base_url('Login'); ?>">
                                    <img class="img-fluid rounded-circle p-sm-3" src="/assets/img/peserta.png">
                                    <h4 style="font-size:25px;">Peserta PKL</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-8 card-login" id="login-pembimbing">
                    <div id="container-pembimbing">
                        <div class="card user-card " data-toggle="modal" data-target="#modal-pembimbing">
                            <div class="card-header-img text-center">
                                <a href="<?= base_url('Login'); ?>">
                                    <img class="img-fluid rounded-circle p-sm-3" src="/assets/img/pembimbing.png">
                                    <h4 style="font-size:25px;">Pembimbing Lapangan</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-8 card-login" id="login-daftar">
                    <div id="container-daftar">
                        <div class="card user-card" data-toggle="modal" data-target="#modal-daftar">
                            <div class="card-header-img text-center">
                                <a href="<?= base_url('Registrasi'); ?>">
                                    <img class="img-fluid rounded-circle p-sm-3" src="/assets/img/pendaftaran.png">
                                    <h4 style="font-size:25px;">Pendaftaran PKL</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Login & Daftar -->
            <hr>

            <!-- ======= Informasi ======= -->
            <div class="row pt-sm-5 px-sm-5 mx-sm-5" id="informasi">
                <div class="col h1 text-dark mb-1">
                    INFORMASI</div>
            </div>
            <div class="row px-sm-5 mx-sm-5 justify-content-center">
                <!-- User days left -->
                <div class="col-lg-5 mt-5">

                    <?php foreach ($user as $index => $u) : ?>
                        <div class="icon-box d-flex align-items-center mb-3">
                            <div>
                                <div class="icon"><i class="fa fa-user"></i></div>
                            </div>
                            <div class="body-icon">
                                <h6 class="m-1"> <?= $u['nama'] . ' kurang ' . $u['sisaHari'] . ' hari'; ?>
                                </h6>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
                <!-- End user days left -->

                <!-- Pie Chart -->
                <div class="col-lg-5 mt-0">
                    <div class="card shadow mb-4">
                        <!-- Card Header-->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 text-primary">Kuota PKL di BPS Kota Malang</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Belum Terisi
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Sudah Terisi
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Pie Chart -->
            </div>
            <!-- End Informasi -->
            <hr>

            <!-- ======= Alur ======= -->
            <div class="container" id="alur">
                <div class="text-center pb-sm-5">
                    <h2 class="h2 mb-1 pt-sm-5 mt-sm-5">ALUR PENDAFTARAN</h2>
                    <h3 class="section-subheading text-muted">Alur Pendaftaran PKL di BPS Kota Malang.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge-left"><img class="rounded-circle img-fluid" src="/assets/img/timeline/1.png" alt=""></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Kunjungi SIMAG BPS Kota Malang</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Kunjungi halaman utama Sistem Informasi Magang BPS Kota Malang pada link ------ dan lihat kuota yang masih tersedia. Pastikan kuota tidak penuh saat akan mendaftar</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge-right"><img class="rounded-circle img-fluid" src="/assets/img/timeline/2.png" alt=""></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Ajukan Pendaftaran</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Ajukan pendaftaran dengan menekan tombol Ajukan PKL yang tertera pada halaman utama SIMAG BPS Kota Malang</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge-left"><img class="rounded-circle img-fluid" src="/assets/img/timeline/3.png"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Isi Data Diri</h4>
                            </div>
                            <div class="timeline-body">
                                <p> Isi dan Lengkapi data diri peserta PKL beserta dokumen pendukung sebagai syarat melaksanakan PKL di BPS Kota Malang. Pastikan data diri dan dokumen pendukung benar dan akurat.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge-right"><img class="rounded-circle img-fluid" src="/assets/img/timeline/4.png" alt=""></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Tunggu Hasil Konfirmasi Penerimaan</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Hasil konfirmasi penerimaan dapat dilihat saat masuk ke akun pada halaman Login Peserta PKL. Apabila dokumen yang dibutuhkan sesuai dan kuota terpenuhi maka peserta dinyatakan lolos untuk melaksanakan PKL di BPS Kota Malang.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge">
                            <div class="icon"><i class="fa fa-check"></i></div>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p>PKL dapat dilaksanakan sampai waktu yang sudah ditentukan</p>
                            </div>
                        </div>
                    </li>
            </div>
            <!-- End Alur -->
            <hr>

            <!-- ======= Profil ======= -->
            <div class="container" id="profil">
                <div class="row justify-content-center pt-sm-5 mt-sm-5">
                    <div class="col-xl-9 text-grey mb-1">
                        <h4 class="upper text-right">TENTANG</h4>
                        <h2 class="title mb-3 text-right">BPS KOTA MALANG</h2>
                    </div>
                    <div class="col-xl-9 h5 text-grey mb-1">
                        Badan Pusat Statistik adalah Lembaga Pemerintah Non-Departemen yang bertanggung jawab langsung kepada Presiden. Sebelumnya, BPS merupakan Biro Pusat Statistik, yang dibentuk berdasarkan UU Nomor 6 Tahun 1960 tentang Sensus dan UU Nomer 7 Tahun 1960 tentang Statistik. Sebagai pengganti kedua UU tersebut ditetapkan UU Nomor 16 Tahun 1997 tentang Statistik. Berdasarkan UU ini yang ditindaklanjuti dengan peraturan perundangan dibawahnya, secara formal nama Biro Pusat Statistik diganti menjadi Badan Pusat Statistik.</div>
                    <!-- ======= Visi ======= -->
                    <div class="row justify-content-center my-1">
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h3 text-primary mb-1">
                                                VISI</div>
                                            <div class="h5 mb-0 text-gray-800">Pelopor data statistik terpercaya untuk semua</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Visi -->
                        <!-- ======= Misi ======= -->
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h3 text-primary mb-1">
                                                MISI</div>
                                            <div class="h5 mb-0 text-gray-800">
                                                <ol>
                                                    <li> Menyediakan data statistik berkualitas melalui kegiatan statistik yang terintegrasi dan berstandar nasional maupun internasional.</li>
                                                    <li> Memperkuat Sistem Statistik Nasional yang berkesinambungan melalui pembinaan dan koordinasi di bidang statistik.</li>
                                                    <li> Membangun insan statistik yang profesional, berintegritas dan amanah untuk kemajuan perstatistikan</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Misi -->
                </div>
            </div>
            <!-- End Profil -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->