<!DOCTYPE html>
<html>

<?php include('./component/head.php')?>
<style>

</style>
<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    <nav class="navbar navbar-light navbar-expand-md fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#">Saparua</a><button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-link"><a class="nav-link active" href="#sejarah">Sejarah</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#galeri">GALERI</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#videos">VIDEOS</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="login.php">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background: url(&quot;assets/img/DSCF0010.jpg&quot;) center / cover no-repeat;">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- Start: Animated Typing With Blinking -->
                        <div class="text-nowrap d-flex justify-content-center align-items-center animated-text noSelect" style="background: rgba(255,255,255,0);border-style: none;margin-top: 16px;width: 50%;margin-right: auto;margin-left: auto;">
                            <!-- Start: Animated Type Heading --><div class="caption v-middle text-center">
    <h1 class="cd-headline clip">
        <span class="blc"></span>
        <span class="cd-words-wrapper">
          <b class="is-visible">Welcome</b>
          <b>TO</b>
          <b>Saparua.</b>
        </span>
        <span class="blinking">|</span>
    </h1>
</div><!-- End: Animated Type Heading -->
                        </div><!-- End: Animated Typing With Blinking -->
                        <p class="intro-text">"SAKSI BISU MUSIK CADAS"</p><a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa fa-angle-double-down animated"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="text-center content-section" id="sejarah">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>sejarah</h2>
                    <?php include("./sejarah.php")?>
                    <!-- End: Responsive Left Image Card -->
                </div>
            </div>
        </div>
    </section>
    <section class="text-center download-section content-section" id="galeri">
        <h1 style="transform: translateY(-77px);">Galeri foto</h1>
        <div class="container">
    <!-- Start: Masonry gallery cards responsive -->
    <div>
        <!-- Start: cards -->
        <div class="row" data-masonry="{&quot;percentPosition&quot;: true }">
            <?php
            require "config.php";
            $read = $pdo->prepare("SELECT * FROM artikel");
            $read->execute();
            while ($data = $read->fetch(PDO::FETCH_DEFAULT)) {
                $id = $data['id'];
                $judul = $data['judul'];
                $artikel = $data['artikel'];
                $foto = $data['foto'];

                echo "
                <!-- Start: card-1 -->
                <div class='col-sm-6 col-lg-4 mb-4'>
                    <!-- Start: card -->
                    <div class='card'>
                        <picture type=' srcset='>
                            <img class='card-img-top p-3' src='img/$foto' alt='' style='border-radius: 24px; object-fit: cover; height: 200px;'>
                        </picture>
                        <!-- Start: texto -->
                        <div class='card-body' style='height: 150px;'>
                            <p class='card-text text-black'>$judul<br></p>
                        </div>
                        <!-- End: texto -->
                    </div>
                    <!-- End: card -->
                </div>
                <!-- End: card-1 -->
                ";
            }
            ?>
        </div><!-- End: cards -->
    </div><!-- End: Masonry gallery cards responsive -->
</div>

        </div>
    </section>
    <section class="text-center content-section" id="videos">
    <h2 class="mb-4">Dokumentasi Video</h2>
    <div class="container mt-4 w-full">
  <div class="d-flex flex-row flex-wrap gap-3">
 
    <?php
            require "config.php";
            $no=0;
            $read=$pdo->prepare("SELECT * FROM docvid");
            $read->execute();
            while ($data = $read->fetch(PDO::FETCH_DEFAULT)) {
                $vid=$data['vid'];
                echo "
                <div class='col-md-4  mb-4'>
                <div class='card'>
                  <div class='card-body'>
                    <iframe width='100%' height='200' src='$vid' frameborder='0' allowfullscreen></iframe>
                  </div>
                </div>
              </div>
                ";
            }
            ?>
  


 
</div>

</section>

    <section class="text-center content-section" id="berita" ">
        <h2 style="transform: translateY(-77px);">berita</h2>
        <div class="container">
    <!-- Start: Masonry gallery cards responsive -->
    <div>
        <!-- Start: cards -->
        <div class="row" data-masonry="{&quot;percentPosition&quot;: true }">
            <?php
            require "config.php";
            $read = $pdo->prepare("SELECT * FROM berita");
            $read->execute();
            while ($data = $read->fetch(PDO::FETCH_DEFAULT)) {
                $id = $data['id'];
                $judul = $data['judul'];
                $artikel = $data['artikel'];
                $foto = $data['foto'];

                echo "
                <div class='col-sm-6 col-lg-4 mb-4'>
                <div class='card'>
                    <picture type=' srcset='>
                        <img class='card-img-top p-3' src='img/$foto' alt='' style='border-radius: 24px; object-fit: cover; height: 200px;'>
                    </picture>
                    <div class='card-body d-flex flex-column'>
                        <p class='card-text text-black'>$judul<br></p>
                        <p class='card-text text-black flex-grow-1'>$artikel<p>
                    </div>
                </div>
            </div>
                ";
            }
            ?>
        </div><!-- End: cards -->
    </div><!-- End: Masonry gallery cards responsive -->
</div>

        </div>
    </section><!-- Start: Map Clean -->
    <div class="map-clean">
        <h1 class="text-center">LOCATION:</h1><iframe allowfullscreen="" frameborder="0" loading="lazy" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDJD6H6B4jiktn32dPykKD6L2Wz7qTqrhM&amp;q=gor+saparua&amp;zoom=17&amp;maptype=satellite" width="100%" height="450"></iframe>
    </div><!-- End: Map Clean -->
    <footer>
        <div class="container text-center">
            <p>Copyright ©&nbsp;INDRA 2023</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="assets/js/Animated-Typing-With-Blinking.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>

</html>