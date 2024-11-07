<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //nama_variabel = "value/nilai";
    $nama = "ghalib";
    //print, echo, print_r, var_dump
    echo "hello world";
    $jumlah = 30;
    $harga = 4000;
    $total = $jumlah * $harga;
    $diskon = $total * 20 / 100;
    $total_bayar = $total - $diskon;
    ?>
    <br>
    <?php
    print "hello, $nama total belanja anda sebesar $total_bayar";
    ?>
    <br>
    <?php
    for ($angka = 1; $angka <= 10; $angka++) {
        echo " bilangan ke = $angka";
        if($angka%2 == 0){
            echo " adalah bilangan genap";
        }
        else{
            echo " adalah bilangan ganjil";
        }
        ?>
        <br>
        <?php
    }
    ?>
    <?php
    echo date("l, Y-m-d H:i:s", time());
    ?>
    <?php
    function greeting($nama){
        return "Selamat Datang, $nama!";
    }
    ?>
    <h1><?php echo greeting("ghalib") ?></h1>
</body>

</html>