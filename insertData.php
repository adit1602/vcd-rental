<?php
session_start();
include "koneksi.php";
include "functions.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIREVO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container"> <a class="navbar-brand navbar-logo" href="#"> <img src="img/sirevoLogo.png" alt="logo" class="logo-1"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"> <a class="nav-link" href="" data-scroll-nav="0">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="1">About</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="2">Tambah Data VCD</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="3">Registrasi Member</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="4">Peminjaman</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#" data-scroll-nav="5">Contact</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <!-------Banner Start------->
    <section class="banner" data-scroll-index='0'>
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="banner-text">
                            <h2 class="white">SIREVO</h2>
                            <h6 class="white">Sistem Informasi Rental VCD Sewadong <a href="http://w3Template.com" target="_blank" rel="dofollow" </a>.</h6>
                            <p class="banner-text white">Pengembangan perangkat lunak ini diharapkan dapat membantu
                                Sewadong Rental dalam menyediakan layanan penyewaan VCD kepada
                                pelanggan dengan system yang efisien dan terkomputerisasi dalam
                                mengelola data VCD, anggota, dan proses penyewaan. Sehingga dapat
                                meningkatkan efisiensi dan kecepatan dalam melayani pelanggan serta
                                untuk mengurangi potensi kesalahan manusia dalam pencatatan dan
                                perhitungan. Proyek ini pastinya perlu untuk didanai karena implementasi
                                sistem perangkat lunak merupakan investasi yang diperlukan untuk
                                menjaga daya saing dan keberlanjutan bisnis Sewadong Rental Video
                                Disc.</p>
                            <ul>
                                <li><a href="#"><img src="img/sirevo.png" class="wow fadeInUp" data-wow-delay="0.4s" /></a></li>
                                <li><a href="#"><img src="img/sirevo.png" class="wow fadeInUp" data-wow-delay="0.7s" /></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12"> <img src="img/sirevoLogo.png" class="img-fluid wow fadeInUp" /> </div>
                </div>
            </div>
        </div>
        <span class="svg-wave"> <img class="svg-hero" src="images/applight-wave.svg"> </span>
    </section>

    <!-------Banner End------->

    <!-------About End------->

    <body>
        <!-- Bagian Manajemen Data VCD -->
        <section class="vcd-management section-padding" data-scroll-index='7'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sectioner-header text-center">
                            <h3>Manajemen Data VCD</h3>
                            <span class="line"></span>
                            <p>Sistem harus mampu mencatat, mengelola, dan menyimpan data VCD.</p>
                        </div>
                        <div class="section-content">
                            <!-- Form untuk menambahkan data VCD -->
                            <form action="process.php" method="post">
                                <label for="kode">Kode VCD:</label>
                                <input type="text" id="kode" name="kode" required>

                                <label for="judul">Judul VCD:</label>
                                <input type="text" id="judul" name="judul" required>

                                <label for="kategori">Kategori VCD:</label>
                                <input type="text" id="kategori" name="kategori" required>

                                <button type="submit" name="submit">Tambahkan Data VCD</button>
                            </form>

                            <!-- Menampilkan data VCD yang telah ada -->
                            <h4>Data VCD:</h4>
                            <table style="width: 100%;">
                                <tr>
                                    <th>Kode VCD</th>
                                    <th>Judul VCD</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                // Panggil fungsi untuk mendapatkan data VCD
                                $dataVCD = getDataVCD();

                                // Tampilkan data VCD
                                foreach ($dataVCD as $vcd) {
                                    echo "<tr>";
                                    echo "<td>{$vcd['kode_vcd']}</td>";
                                    echo "<td>{$vcd['judul_vcd']}</td>";
                                    echo "<td>{$vcd['kategori']}</td>";
                                    echo "<td>{$vcd['status']}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <!-- End Peminjaman Section -->

    <!-------Team Start------->
    <section class="team section-padding" data-scroll-index='3'>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h3>Our Team</h3>
                        <span class="line"></span>
                        <p>Kelompok 7 Rekayasa Perangkat Lunak.</p>
                    </div>
                    <div class="section-content text-center">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="team-detail wow bounce" data-wow-delay="0.2s"> <img src="" class="img-fluid" />
                                    <h4>Anabel Fiorenza Rizkyllah</h4>
                                    <p>09031182227002</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-detail wow bounce" data-wow-delay="0.4s"> <img src="" class="img-fluid" />
                                    <h4>Muhammad Izzan Fieldi</h4>
                                    <p>09031182227010</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="team-detail wow bounce" data-wow-delay="0.6s"> <img src="" class="img-fluid" />
                                    <h4>Musdalifa Putri Casanova</h4>
                                    <p>09031282227040</p>
                                </div>
                            </div>
                            <div class="section-content text-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="team-detail wow bounce" data-wow-delay="0.8s"> <img src="" class="img-fluid" />
                                            <h4>Nico Sabar Manahan</h4>
                                            <p>09031282227044</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="team-detail wow bounce" data-wow-delay="0.9s"> <img src="" class="img-fluid" />
                                            <h4>Yesya Najwa Widasari</h4>
                                            <p>09031282227035</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    <!-------Team End------->

    <footer class="footer-copy">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p>2023 &copy; Kelompok 7 Rekayasa Perangkat Lunak</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <!-- scrollIt js -->
    <script src="js/scrollIt.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        wow = new WOW();
        wow.init();
        $(document).ready(function(e) {

            $('#video-icon').on('click', function(e) {
                e.preventDefault();
                $('.video-popup').css('display', 'flex');
                $('.iframe-src').slideDown();
            });
            $('.video-popup').on('click', function(e) {
                var $target = e.target.nodeName;
                var video_src = $(this).find('iframe').attr('src');
                if ($target != 'IFRAME') {
                    $('.video-popup').fadeOut();
                    $('.iframe-src').slideUp();
                    $('.video-popup iframe').attr('src', " ");
                    $('.video-popup iframe').attr('src', video_src);
                }
            });

            $('.slider').bxSlider({
                pager: false
            });
        });

        $(window).on("scroll", function() {

            var bodyScroll = $(window).scrollTop(),
                navbar = $(".navbar");

            if (bodyScroll > 50) {
                $('.navbar-logo img').attr('src', 'images/logo-black.png');
                navbar.addClass("nav-scroll");

            } else {
                $('.navbar-logo img').attr('src', 'images/logo.png');
                navbar.removeClass("nav-scroll");
            }

        });
        $(window).on("load", function() {
            var bodyScroll = $(window).scrollTop(),
                navbar = $(".navbar");

            if (bodyScroll > 50) {
                $('.navbar-logo img').attr('src', 'images/logo-black.png');
                navbar.addClass("nav-scroll");
            } else {
                $('.navbar-logo img').attr('src', 'images/logo-white.png');
                navbar.removeClass("nav-scroll");
            }

            $.scrollIt({

                easing: 'swing', // the easing function for animation
                scrollTime: 900, // how long (in ms) the animation takes
                activeClass: 'active', // class given to the active nav element
                onPageChange: null, // function(pageIndex) that is called when page is changed
                topOffset: -63
            });
        });
    </script>
    </script>
</body>

</html>