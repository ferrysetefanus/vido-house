<!-- loading bagian ferry -->

    <div id="loading"></div>
    <!--banner-->
    <!--bagian joviter banner id-->
    <section id="banner">
      <div class="bg-color">
        <?php $this->load->view('front/template/sidebar') ?>
        <div class="container">
          <div class="row">
            <div class="inner text-center">
              <h1 class="logo-name">Vido House Pontianak</h1>
              <h2>Nikmati Sensasi Rasa dan Kenikmatan Gaya Italia</h2>
              <!--h1 dan h2 Bagian Ryan Septian-->
              <!-- Marquee bagian Benny Supano -->
              <marquee vspace="40px" style="color: orange; font-weight: bolder;"> Welcome to Vido Gelato. Jl. Nusa Indah III No.99 Darat Sekip, Kota Pontianak. Hari Senin - Minggu. Jam buka 09.30 - 22.00. Selamat Menikmati. </marquee>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    
    <!-- bagian ferry -->
    <section class="section-padding">
      <div id="productCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#productCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#productCarousel" data-slide-to="1"></li>
          <li data-target="#productCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="<?= base_url('assets/frontend/img/k.jpg') ?>" style="width: 100%; height: 600px; padding: 50px;">
          </div>
          <div class="item">
            <img src="<?= base_url('assets/frontend/img/res01.jpg') ?>" style="width: 100%; height: 600px; padding: 50px;">
          </div>
          <div class="item">
            <img src="<?= base_url('assets/frontend/img/res02.jpg') ?>" style="width: 100%; height: 600px; padding: 50px;">
          </div>

          <!--bagian Benny Suparno-->
          <div class="item">
            <img src="<?= base_url('assets/frontend/img/makanan.jpeg') ?>" style="width: 100%; height: 600px; padding: 50px">
          </div>
          <div class="item">
            <img src="<?= base_url('assets/frontend/img/gustogelato.jpg') ?>" style="width: 100%; height: 600px; padding: 50px">>
          </div>
          <div class="item">
            <img src="<?= base_url('assets/frontend/img/vido01.jpg') ?>" style="width: 100%; height: 600px; padding: 50px">
          </div>
          <div class="item">
            <img src="<?= base_url('assets/frontend/img/vido02.jpeg') ?>" style="width: 100%; height: 600px; padding: 50px">
          </div>
          <!-- bagian Benny end-->

          <a class="left carousel-control" href="#productCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" style="margin-top: 250px;" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#productCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" style="margin-top: 250px;" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>
      <!-- bagian ferry finish -->
      <!-- / banner -->
      <!--about-->
      <section id="about" class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center marb-35">
              <!--Bagian Ricky Ananda-->
              <h1 class="header-h">Vido House Lezat</h1>
              <p class="header-p">Dengan ada nya Vido House Pontianak maka akan semakin Menyenangkan dan Lezat 
              </p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="col-md-6 col-sm-6">
                <div class="about-info">
                  <h2 class="heading">Atau hanya untuk ini</h2>
                  <p>Desert dingin khas itali di Vido House Pontianak, Nikmati sesansi rasa dan kenikmatan gaya Italia </p>
                  <div class="details-list">
                    <ul>
                      <li><i class="fa fa-check"></i>Harganya sangat terjangkau</li>
                      <li><i class="fa fa-check"></i>Enak dan gurih</li>
                      <li><i class="fa fa-check"></i>Porsinya pas bangat !!!</li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--bagian joviter-->
              <div class="col-md-6 col-sm-6">
                <img src="<?= base_url('assets/frontend/img/minuman.jpeg') ?>" alt="" class="img-responsive">
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
      </section>
      <!--/about-->
      <!-- event -->
      <!--bagian event id joviter-->
      <section id="event">
        <div class="bg-color" class="section-padding">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 text-center" style="padding:60px;">
                <!--Bagian Ricky Ananda-->
                <h1 class="header-h">Segerah Hadir</h1>
                <p class="header-p">Menu Terbaru Dari Kita</p>
              </div>
              <div class="col-md-12" style="padding-bottom:60px;">
                <div class="item active left">
                  <!--bagian joviter-->
                  <div class="col-md-6 col-sm-6 left-images">
                    <img src="<?= base_url('assets/frontend/img/makanan.jpeg') ?>" class="img-responsive">
                  </div>
                  <div class="col-md-6 col-sm-6 details-text">
                    <div class="content-holder">
                      <!--Bagian Ricky Ananda-->
                      <h2>Roti Bakar Keju</h2>
                      <p>Dengan Roti bakar dan taburan keju di sertai 2 waffle coklat nikmat, Menemani indah nya hari anda !!! </p>
                      <address>
                        <strong>Tempat : </strong>
                        Vido House Pontianak
                        <br>
                        <strong>Tanggal :</strong>
                        03-04-2020
                      </address>
                      <a class="btn btn-info btn-read-more" href="events-details.html">Read more</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!--/ menu -->
      <!-- contact -->
