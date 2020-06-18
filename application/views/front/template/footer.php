<footer class="footer text-center">
  <div class="footer-top">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 text-center">
        <div class="widget">
          <h4 class="widget-title">Vido House Pontianak</h4>
          <address>Jl. Nusa Indah III No. 99<br>Pontianak, Indonesia 78243</address>
          <h5> Monday to Sunday </h5>
          <h5> 09.30 - 22.00 </h5>
          <br>
          <h4>Contact us</h4>
          <div class="social-list">
            <a href="https://www.instagram.com/vidohouseptk/"target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/pages/Vido-House-Pontianak/399252367259482"target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://api.whatsapp.com/send?phone=+6281282088706"target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
          </div>
          <p class="copyright clear-float">
            © 6A3 Team. All Rights Reserved
            <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Delicious
                -->
              Designed by 6A3 Team <br>
              <a href="#banner" style="text-decoration: none; color: #717f86;">Back to Top</a>
            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- / footer -->

<script src="<?= base_url('assets/frontend/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/frontend/js/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/frontend/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/frontend/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/frontend/contactform/contactform.js') ?>"></script>

<!-- loading bagian ferry -->
<script type="text/javascript">
  $(window).load(function() { $("#loading").fadeOut("slow"); })
</script>

<!-- live chat bagian ferry -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5dd1731ed96992700fc7dbd7/1e500pto4';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>

</html>