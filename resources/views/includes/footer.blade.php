  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Career Guild</h3>
              <p class="pb-3">Career Guild is a support system for young professionals to connect them with training, online resources, coaching to ace the marketplace, and get access to internship and job opportunities.</p>
              <p>
                <br><br>
                <strong>Address:</strong> Palmgroove Lagos, Nigeria<br>
                <strong>Email:</strong> support@careerguild.com.ng<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/career_guild" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://facebook.com/Careerguild/?_rdc=1&_rdr" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://instagram.com/career_guild/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://linkedin.com/company/career-guild/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#details">Resource</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('teammember') }}">Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('careerstater') }}">CSS5</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog') }}">Blog</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact us</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Join Us</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://forms.gle/hF3uECz4nqUS3w1G9" target="_blank">Join Volunteer Team</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://forms.gle/5gihmund8EDbZt848" target="_blank">Join as a Coach</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Get the latest updates concerning your career</p>
            <form action="{{ route('subscribe') }}" method="post">
                @csrf
              <input type="email" name="email" required><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Career Guild</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>
  </footer><!-- End Footer -->
