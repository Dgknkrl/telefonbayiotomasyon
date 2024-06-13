<?php
// Veritabanı bağlantısı
$servername = "localhost"; // Veritabanı sunucusu (genellikle localhost)
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "telefon_otomasyon"; // Kullanılacak veritabanı adı

// Veritabanı bağlantısını oluştur
$connection = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($connection->connect_error) {
    die("Veritabanı bağlantısında hata: " . $connection->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/home.css">
</head>

<body>
    <?php 
    $id = $_GET['id'];
    if (!empty($id)) {
        include '../navbar/navbar_login.php';
    } else {
        include ('../navbar/navbar.php');
    }
     ?>

    <div>
        <div id="banner_div">
            <img src="../../ekler/png/banner.png" id="banner_img">
        </div>
        <div id="products_body_div">

            <?php
            $id = $_GET['id'];
            include '../contact/contact.php';
            $query = mysqli_query($connection, 'select * from telefon limit 8');
            while ($take = mysqli_fetch_array($query)) {
                $telefon_id = $take["telefon_id"];
                $marka = $take["marka"];
                $model = $take["model"];
                $fiyat = $take["fiyat"];

                //resimleri alma kodu
                $query_resim = mysqli_query($connection, 'select * from resimler where id="' . $telefon_id . '"');
                $resim_row = mysqli_fetch_array($query_resim);
                $resim = $resim_row['resim1'];

                // Her ürünün detaylarına yönlendirme yapacak olan URL'yi oluşturuyoruz
                $url = '../products\features_product.php?id=' . $id . '&telefon_id=' . $telefon_id;

                // Ürün kartını HTML olarak oluşturuyoruz
                $html = '
                <div id="card' . $telefon_id . '" class="card">
                    <a href="' . $url . '"><img src="' . $resim . '" alt="' . $model . '"></a>
                    <h3>' . $model . '</h3>
                    <p>' . $marka . ' GB</p>
                    <h3 id="product_fiyat">' . $fiyat . ' TL</h3>
                </div>';
                echo $html;
            }
            ?>
        </div>
        <footer>
            <?php
            include '../footer/footer.php';
            ?>
        </footer>

        <script src="../../js/products.js">
        </script>
</body>

</html>

<?php
// Veritabanı bağlantısını kapat
$connection->close();
?>
