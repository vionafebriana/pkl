<div class="container">
    <?php $val = Service('validation'); ?>
    <div class="row justify-content-center">
        <div class="card shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <?php echo session()->getFlashdata('success') ?>
                        </div>
                    <?php elseif (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <?php echo session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Pendaftaran Magang!</h1>
                    </div>
                    <form class="user" action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="inputNama">Nama</label><small class="text-danger">*</small><br>
                            <input type="text" class="form-control " id="inputNama" placeholder="Nama Lengkap" name="nama">
                            <?= ($val->hasError('nama')) ? '<small class="text-danger">' . $val->getError('nama') . '</small>' : ''; ?>
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
                                <?= ($val->hasError('tglLahir')) ? '<small class="text-danger">' . $val->getError('tglLahir') . '</small>' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label><br>
                            <input type="email" class="form-control " id="inputEmail" placeholder="Alamat Email" name="email" readonly value="<?= session()->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputInstansi">Instansi/Sekolah Asal</label><small class="text-danger">*</small><br>
                            <input type="text" class="form-control " id="inputInstansi" placeholder="Instansi/Sekolah Asal" name="instansi">
                            <?= ($val->hasError('instansi')) ? '<small class="text-danger">' . $val->getError('instansi') . '</small>' : ''; ?>
                        </div>
                        Pelaksanaan PKL
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="inputMulai">Dari</label><small class="text-danger">*</small><br>
                                <input type="date" class="form-control " id="inputMulai" placeholder="Dari" name="startDate">
                                <?= ($val->hasError('startDate')) ? '<small class="text-danger">' . $val->getError('startDate') . '</small>' : ''; ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputSelesai">Sampai</label><small class="text-danger">*</small><br>
                                <input type="date" class="form-control " id="inputSelesai" placeholder="Sampai" name="endDate">
                                <?= ($val->hasError('endDate')) ? '<small class="text-danger">' . $val->getError('endDate') . '</small>' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSuratPengantar">Dokumen Surat Pengantar</label><small class="text-danger">*</small><br>
                            <input type="file" id="inputSuratPengantar" placeholder="Dokumen Surat Pengantar" name="pengantar">
                            <?= ($val->hasError('pengantar')) ? '<small class="text-danger">' . $val->getError('pengantar') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="inputProposal">Dokumen Proposal</label><small class="text-danger">*</small><br>
                            <input type="file" id="inputProposal" placeholder="Dokumen Proposal" name="proposal">
                            <?= ($val->hasError('proposal')) ? '<small class="text-danger">' . $val->getError('proposal') . '</small>' : ''; ?>
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