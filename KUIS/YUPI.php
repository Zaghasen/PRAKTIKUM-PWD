<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YUPI CAFE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet">
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

    <section id="projek">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2>Daftar Menu</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.png" class="card-img-top" alt="Project 1">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Nasi Goreng</h5>
                            <p class="card-text">
                                Nasi goreng spesial dengan telur, ayam, sayuran, dan bumbu khas.
                            </p>
                            <h4 class="card-title">Harga: Rp. 25000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.png" class="card-img-top" alt="Project 2">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Mie Ayam</h5>
                            <p class="card-text">
                                Mie ayam lezat dengan irisan ayaam pangsit, dan kuah kaldu.
                            </p>
                            <h4 class="card-title">Harga: Rp. 20000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.png" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Sate Ayam</h5>
                            <p class="card-text">
                                Sate atam yang terkenal dengan bumbu kacang khas Indonesia.
                            </p>
                            <h4 class="card-title">Harga: Rp. 15000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.png" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Es Teh Manis</h5>
                            <p class="card-text">
                                Minuman teh manis dingin yang segar.
                            </p>
                            <h4 class="card-title">Harga: Rp. 5000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.png" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Kopi Susu</h5>
                            <p class="card-text">
                                Kopi susu dengan rasa yang nikmat dan kental.
                            </p>
                            <h4 class="card-title">Harga: Rp. 10000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <a href="<?php echo isset($_SESSION['email']) ? 'form_pembelian.php' : '#'; ?>"
                            onclick="<?php echo isset($_SESSION['email']) ? '' : 'alert(\'Anda perlu login terlebih dahulu!\')'; ?>">
                            <img src="1.png" class="card-img-top" alt="Project 3">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Pisang Goreng</h5>
                            <p class="card-text">
                                Gorengan Pisang yang garing diluar, lembut di dalam.
                            </p>
                            <h4 class="card-title">Harga: Rp. 8000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>