<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIGA DEWA ADVENTURE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS.css">
</head>

<body id="home">
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: #F5DEB3;">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projek">Paket Open Trip</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item">
                            <a class="nav-link">Hello, ' . $_SESSION['email'] . '</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a href="riwayat_transaksi.php" class="btn btn-secondary">Riwayat Transaksi</a>
                        </li>';
                    } else {
                        echo '<li>
                            <a href="login.php" class="btn btn-primary">Login</a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="jumbotron text-center">
        <img src="LOGO_1.jpeg" alt="foto" width="500" class="rounded-circle img-thumbnail mt-3"
            style="background-color: #F5DEB3;">

    </section>

    <section id="about" class="bg-light py-5 text-center" style="margin-top: 100px;">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <h2 class="text-center mb-3">TIGA DEWA ADVENTURE</h2>
                    <p class="lead text-center">Bergabunglah dengan Tiga Dewa Adventure untuk menikmati
                        petualangan hiking yang tak terlupakan, menembus jalur-jalur menakjubkan penuh
                        keindahan alam. Tiga Dewa Adventure menawarkan pengalaman hiking yang unik,
                        menggabungkan tantangan fisik dan keindahan panorama alam yang mempesona.</p>
                    <p class="lead text-center">Dengan pengetahuan dan pengalaman para Hikers kami
                        tentang teknik pendakian dan keselamatan,
                        kami siap membawa Anda lebih jauh dan lebih tinggi.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="projek">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Paket Open Trip</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.jpg" class="card-img-top" alt="Project 1">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">OPEN TRIP MERBABU VIA SUWANTING</h5>
                            <p class="card-text">- Mepo Jogja -</p>
                            <p class="card-text">Include</p>
                            <p class="card-text">
                                - Transportasi PP<br>
                                - Simaksi<br>
                                - Rumah Singgah<br>
                                - Makan 3x<br>
                                - Dokumentasi<br>
                                - Tenda Kap. 4<br>
                                - Guide<br>
                                - Porter Team<br>
                                - Stiker
                            </p>
                            <p class="card-text">Exclude</p>
                            <p class="card-text">
                                - Perlatan Pribadi<br>
                                - Camilan Pribadi<br>
                                - Obat-obatan Pribbadi<br>
                                - Surat Sehat<br>
                                - Air Mineral
                            </p>
                            <h4 class="card-title">Harga: IDR 500.000 / pax</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="2.jpg" class="card-img-top" alt="Project 2">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">OPEN TRIP LAWU VIA CEMORO SEWU</h5>
                            <p class="card-text">- Mepo Jogja -</p>
                            <p class="card-text">Include</p>
                            <p class="card-text">
                                - Transportasi PP<br>
                                - Simaksi<br>
                                - Rumah Singgah<br>
                                - Makan 3x<br>
                                - Dokumentasi<br>
                                - Tenda Kap. 4<br>
                                - Guide<br>
                                - Porter Team<br>
                                - Stiker
                            </p>
                            <p class="card-text">Exclude</p>
                            <p class="card-text">
                                - Perlatan Pribadi<br>
                                - Camilan Pribadi<br>
                                - Obat-obatan Pribbadi<br>
                                - Surat Sehat<br>
                                - Air Mineral
                            </p>
                            <h4 class="card-title">Harga: IDR 1.000.000 / pax</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="3.jpg" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">OPEN TRIP KERINCI VIA KERSIK TUO</h5>
                            <p class="card-text">- Mepo Jogja -</p>
                            <p class="card-text">Include</p>
                            <p class="card-text">
                                - Transportasi PP<br>
                                - Simaksi<br>
                                - Rumah Singgah<br>
                                - Makan 9x<br>
                                - Dokumentasi<br>
                                - Tenda Kap. 4<br>
                                - Guide<br>
                                - Porter Team<br>
                                - Stiker
                            </p>
                            <p class="card-text">Exclude</p>
                            <p class="card-text">
                                - Perlatan Pribadi<br>
                                - Camilan Pribadi<br>
                                - Obat-obatan Pribbadi<br>
                                - Surat Sehat<br>
                                - Air Mineral
                            </p>
                            <h4 class="card-title">Harga: IDR 1.500.000 / pax</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="4.jpg" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">OPEN TRIP RINJANI VIA SEMBALUN TOREAN</h5>
                            <p class="card-text">- Mepo Jogja -</p>
                            <p class="card-text">Include</p>
                            <p class="card-text">
                                - Transportasi PP<br>
                                - Simaksi<br>
                                - Rumah Singgah<br>
                                - Makan 9x<br>
                                - Dokumentasi<br>
                                - Tenda Kap. 4<br>
                                - Guide<br>
                                - Porter Team<br>
                                - Stiker
                            </p>
                            <p class="card-text">Exclude</p>
                            <p class="card-text">
                                - Perlatan Pribadi<br>
                                - Camilan Pribadi<br>
                                - Obat-obatan Pribbadi<br>
                                - Surat Sehat<br>
                                - Air Mineral
                            </p>
                            <h4 class="card-title">Harga: IDR 1.750.000 / pax</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="5.jpg" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">OPEN TRIP LEUSER VIA KEDAH</h5>
                            <p class="card-text">- Mepo Jogja -</p>
                            <p class="card-text">Include</p>
                            <p class="card-text">
                                - Transportasi PP<br>
                                - Simaksi<br>
                                - Rumah Singgah<br>
                                - Makan 33x<br>
                                - Dokumentasi<br>
                                - Tenda Kap. 4<br>
                                - Guide<br>
                                - Porter Team<br>
                                - Stiker
                            </p>
                            <p class="card-text">Exclude</p>
                            <p class="card-text">
                                - Perlatan Pribadi<br>
                                - Camilan Pribadi<br>
                                - Obat-obatan Pribbadi<br>
                                - Surat Sehat<br>
                                - Air Mineral
                            </p>
                            <h4 class="card-title">Harga: IDR 2.000.000 / pax</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>