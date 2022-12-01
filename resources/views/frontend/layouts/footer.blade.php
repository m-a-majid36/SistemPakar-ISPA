<!-- ======= Footer ======= -->
<footer id="footer" style=" position: fixed; bottom: 0; width: 100%;">
    <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Created by <strong><span>Ayunda Mita Aprilia</span></strong>. {{ date('Y') }}
            </div>
            <div class="credits">
                Created for <strong>Tugas Akhir </strong>
                <a href="https://tekkom.ft.undip.ac.id/">Teknik Komputer Undip</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            @if ($data->twitter)
                <a href="{{ $data->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
            @endif
            @if ($data->facebook)
                <a href="{{ $data->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
            @endif
            @if ($data->instagram)
                <a href="{{ $data->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
            @endif
            @if ($data->linkedin)
                <a href="{{ $data->linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            @endif
        </div>
    </div>
</footer><!-- End Footer -->
