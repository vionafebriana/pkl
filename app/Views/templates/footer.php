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
<script src="/assets/js/demo/chart-pie-demo.js"></script>

<script>
    $('#absen').click( () => {
        $.post(
            '/Peserta/addAbsen' , 
            (data) => {
                console.log(data)
            }
        )
    })

    dataAbsen = {}
    setInterval(() => {
        $.get(
            '/Peserta/getAbsen' , 
            (data) => {
                if(data){
                    if(JSON.stringify(data) == JSON.stringify(globalThis.dataAbsen)){
                        console.log('same')
                    }else{
                        globalThis.dataAbsen = data
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])
                        $('#message').html('Anda sudah absen')
                    }
                }else{
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])
                        $('#message').html('Anda belum absen')
                }
            }
        )
    }, 1000);
</script>

</body>

</html>