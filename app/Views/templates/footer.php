<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <!-- Copyright -->
        <div class="copyright text-center my-auto">
            <span> &copy; 2022 Badan Pusat Statistik Kota Malang</span><br>
            <span> Jl. Janti Barat No. 47 Malang, Telp (0341)801164, Faks (0341)805871, Email: bps3573@bps.go.id</span><br>
            <span>
                <i class="fab fa-facebook"></i> : bpskotamalang <i class="fab fa-instagram"></i> : @bpskotamalang <br>
            </span>
        </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/js/demo/chart-area-demo.js"></script>
<script src="/assets/js/demo/chart-kuota.js"></script>

<script src="/assets/js/clock.js"></script>
<script src="/assets/js/absen.js"></script>

<script type="text/javascript" charset="utf8" src="https://releases.jquery.com/git/jquery-3.x-git.js"></script>
<script type="text/javascript" charset="utf8" src="/assets/js/demo/datatables-demo.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>


<script>
    $('#pendaftar').css('border-radius', '0px')
    $('#pendaftar').css('border-top-left-radius', '10px')
    $('#pendaftar').css('border-top-right-radius', '10px')
    $('#pendaftar').css('background-color', '#00264d')
    $('#aktif').css('border-radius', '0px')
    $('#aktif').css('border-top-left-radius', '10px')
    $('#aktif').css('border-top-right-radius', '10px')
    $('#aktif').css('background-color', '#fff')
    $('#deaktif').css('border-radius', '0px')
    $('#deaktif').css('border-top-left-radius', '10px')
    $('#deaktif').css('border-top-right-radius', '10px')
    $('#deaktif').css('background-color', '#fff')
    $('#pendaftar').click((e) => {
        $('#aktif').removeClass('active')
        $('#deaktif').removeClass('active')
        $(e.target).addClass('active')
        $(e.target).css('background-color', '#00264d')
        $('#aktif').css('background-color', '#fff')
        $('#deaktif').css('background-color', '#fff')
        $('#tabel-pendaftar').css('display', 'block')
        $('#tabel-aktif').css('display', 'none')
        $('#tabel-deaktif').css('display', 'none')

    })
    $('#aktif').click((e) => {
        $('#pendaftar').removeClass('active')
        $('#deaktif').removeClass('active')
        $(e.target).addClass('active')
        $(e.target).css('background-color', '#00264d')
        $('#pendaftar').css('background-color', '#fff')
        $('#deaktif').css('background-color', '#fff')
        $('#tabel-pendaftar').css('display', 'none')
        $('#tabel-aktif').css('display', 'block')
        $('#tabel-deaktif').css('display', 'none')
    })
    $('#deaktif').click((e) => {
        $('#pendaftar').removeClass('active')
        $('#aktif').removeClass('active')
        $(e.target).addClass('active')
        $(e.target).css('background-color', '#00264d')
        $('#pendaftar').css('background-color', '#fff')
        $('#aktif').css('background-color', '#fff')
        $('#tabel-pendaftar').css('display', 'none')
        $('#tabel-aktif').css('display', 'none')
        $('#tabel-deaktif').css('display', 'block')
    })
</script>
</body>

</html>