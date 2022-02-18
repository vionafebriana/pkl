<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Selamat Datang-->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card bg-c-white m-3">
                <div class="row align-items-center ml-3">
                    <i class="fa fa-user"></i>
                    <div class="p-3">
                        <h4>
                            <span class="m-b-5 font-weight-bold">Selamat Datang, <?= session()->nama; ?></span>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Absensi -->
        <div class="col-xl-7 col-md-12">
            <!-- Clock -->
            <div class="card bg-c-white m-3">
                <div class="row justify-content-center">
                    <div id="clock"></div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="card bg-c-white">
                        <button class="btn btn-mute" id="absen" style="font-size:25px;">Absen</button>
                    </div>
                </div>
                <!-- Status -->
                <div class="row justify-content-center mt-1 p-3">
                    <h5 id="message">Anda belum melakukan absensi!</h5>
                </div>
                <!-- Start time End time -->
                <div class="row justify-content-center p-1">
                    <div class="col text-center ">
                        <h4>START TIME</h4>
                        <h3 id="start-time">-- : --</h3>
                    </div>
                    <div class="col text-center ">
                        <h4>END TIME</h4>
                        <h3 id="end-time">-- : --</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->