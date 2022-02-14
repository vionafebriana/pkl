<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Account Settings - Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="assets/img/peserta.png" style="width:60%;" alt="" />
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="button">Upload new image</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="inputNama">Nama Lengkap</label><br>
                                    <input type="text" class="form-control " id="inputNama" placeholder="Nama Lengkap" name="nama">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="inputJK">Jenis Kelamin</label><br>
                                        <select class="form-control" id="inputJK" placeholder="Jenis Kelamin" name="JK">
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="inputTanggalLahir">Tanggal Lahir</label><br>
                                        <input type="date" class="form-control " id="inputTanggalLahir" placeholder="Tanggal Lahir" name="tglLahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label><br>
                                    <input type="email" class="form-control " id="inputEmail" placeholder="Alamat Email" name="email" readonly value="<?= session()->email; ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="inputPassword">Kata Sandi</label><br>
                                        <input type="password" class="form-control " id="inputPassword" placeholder="Kata Sandi" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="repeatPassword">Ulangi Kata Sandi</label><br>
                                        <input type="password" class="form-control " id="repeatPassword" placeholder="Ulangi Kata Sandi" name="rePassword">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputInstansi">Instansi/Sekolah Asal</label><br>
                                    <input type="text" class="form-control " id="inputInstansi" placeholder="Instansi/Sekolah Asal" name="instansi">
                                </div>
                                Pelaksanaan PKL
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="inputMulai">Dari</label><br>
                                        <input type="date" class="form-control " id="inputMulai" placeholder="Dari" name="startDate">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="inputSelesai">Sampai</label><br>
                                        <input type="date" class="form-control " id="inputSelesai" placeholder="Sampai" name="endDate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSuratPengantar">Dokumen Surat Pengantar</label><br>
                                    <input type="file" id="inputSuratPengantar" placeholder="Dokumen Surat Pengantar" name="pengantar">
                                </div>
                                <div class="form-group">
                                    <label for="inputProposal">Dokumen Proposal</label><br>
                                    <input type="file" id="inputProposal" placeholder="Dokumen Proposal" name="proposal">
                                </div> <!-- Save changes button-->
                                <button class="btn btn-primary" type="button">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>