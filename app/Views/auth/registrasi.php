<div class="container">
    <?php $val = Service('validation'); ?>
    <div class="row justify-content-center">
        <div class="card shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Pendaftaran PKL!</h1>
                    </div>
                    <form class="user" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="inputNama">Nama</label><small class="text-danger">*</small><br>
                            <input type="text" class="form-control " id="inputNama" placeholder="Nama Lengkap" name="nama">
                            <?= ($val->hasError('nama')) ? '<small class="text-danger">' .$val->getError('nama'). '</small>' : ''; ?>
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
                                <label for="inputTanggalLahir">Tanggal Lahir</label><small class="text-danger">*</small><br>
                                <input type="date" class="form-control " id="inputTanggalLahir" placeholder="Tanggal Lahir" name="tglLahir">
                                <?= ($val->hasError('tglLahir')) ? '<small class="text-danger">' .$val->getError('tglLahir'). '</small>' : ''; ?>
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
                        </div>
                        <button class="btn btn-primary btn-user btn-block" name="submit" type="submit">
                            Ajukan Pendaftaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>