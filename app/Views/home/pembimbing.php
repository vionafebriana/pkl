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
                            <span class="m-b-5 font-weight-bold">Selamat Datang, Viona Febriana!</span>
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
            </div>
            <div class="row justify-content-center text-center">
                <div class="card bg-c-white">
                    <h4 style="font-size:25px;">Absen</h4>
                </div>
            </div>
        </div>

        <div class="col col-xl-5 col-md-12">
            <div class="row col-md-12">
                <div class="card bg-c-white m-3">
                    <h4>Tingkat Kehadiran</h4>
                    <div class="card-body">
                        <div class="chart-pie">
                            <canvas id="myPieChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn">Selengkapnya</button>
                    </div>
                </div>
            </div>
            <!-- Status -->
            <hr>
            <div class="row justify-content-center">
                <h5>Anda belum melakukan absensi!</h5>
            </div>
            <!-- Start time End time -->
            <div class="row justify-content-center p-1">
                <div class="col text-center ">
                    <h4>START TIME</h4>
                    <h3>-- : --</h3>
                </div>
                <div class="col text-center ">
                    <h4>END TIME</h4>
                    <h3>-- : --</h3>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Javascript -->

<!-- Clock JS -->

<script>
    function currentTime() {
        var date = new Date(); /* creating object of Date class */
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        hour = updateTime(hour);
        min = updateTime(min);
        sec = updateTime(sec);
        document.getElementById("clock").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">` + hour + " : " + min + " : " + sec + `</span>
</div>
`;
        //       document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
        var t = setTimeout(function() {
            currentTime()
        }, 1000); /* setting timer */
    }

    function updateTime(k) {
        if (k < 10) {
            return "0" + k;
        } else {
            return k;
        }
    }
    currentTime(); /* calling currentTime() function to initiate the process */
</script>