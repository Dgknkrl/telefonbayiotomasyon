<?php
$id = $_GET['id'];

if (!empty($id)) {
    include '../navbar/navbar_login.php';
} else {
    include '../navbar/navbar.php';
}
include "../contact/contact.php";

$phoneID = $_GET['telefon_id'];
$query_resim = mysqli_query($connection, 'SELECT * FROM resimler WHERE id="' . $phoneID . '"');
$resim_row = mysqli_fetch_array($query_resim);
$resim1 = $resim_row['resim1'];
$resim2 = $resim_row['resim2'];
$resim3 = $resim_row['resim3'];
$resim4 = $resim_row['resim4'];

if(isset($_POST['sepete_ekle_button'])) {
    $id = $_GET['id'];
    $musteri_id = $id; 
    $adet = $_POST['adet'];
    $tel_id = $_GET['telefon_id'];
    
    $check_query = mysqli_query($connection, "SELECT * FROM sepet WHERE musteri_id='$musteri_id' AND tel_id='$tel_id'");
    if(mysqli_num_rows($check_query) > 0) {
        $row = mysqli_fetch_array($check_query);
        $new_adet = $row['adet'] + $adet;
        $update_query = "UPDATE sepet SET adet='$new_adet' WHERE musteri_id='$musteri_id' AND tel_id='$tel_id'";
        mysqli_query($connection, $update_query);
    }else {
        $insert_query = "INSERT INTO sepet (musteri_id, tel_id, adet) VALUES ('$musteri_id', '$tel_id', '$adet')";
        mysqli_query($connection, $insert_query);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/features_product.css">
    <style>
        #product_details h5 {
            margin-top: 0px;
        }
        #product_details h3 {
            margin-bottom: 2px;
        }
    </style>
</head>

<body>
    <div id="product_info_div">
        <div id="product_pictures_div">
            <div id="top_pictures">
                <img src="<?php echo $resim1; ?>" id="main_pictures_img">
            </div>
            <div id="bottom_pictures">
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img class="bottom_pictures_img" src="<?php echo $resim1; ?>">
                </div>
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img class="bottom_pictures_img" src="<?php echo $resim2; ?>">
                </div>
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img class="bottom_pictures_img" src="<?php echo $resim3; ?>">
                </div>
                <div class="in_bottom_pictures" onclick="choice_photo()">
                    <img class="bottom_pictures_img" src="<?php echo $resim4; ?>">
                </div>
            </div>
        </div>
        <div id="product_explain_div">
            <?php
            $sql_ozellik = mysqli_query($connection, "SELECT * FROM ozellik WHERE id ='$phoneID'");
            $sql_telefon = mysqli_query($connection, "SELECT * FROM telefon WHERE telefon_id ='$phoneID'");

            while ($ozellik = mysqli_fetch_array($sql_ozellik)) {
                $ram = $ozellik["ram"];
                $hafiza = $ozellik["hafiza"];
                $islemci = $ozellik["islemci"];
                $kamera = $ozellik["kamera"];
                $ekran_boyutu = $ozellik["ekran_boyutu"];
            }

            while ($telefon = mysqli_fetch_array($sql_telefon)) {
                $model = $telefon["model"];
                $marka = $telefon["marka"];
                $fiyat = $telefon["fiyat"];
            }

            $html = '<div id="product_details">
                        <h3>' . $model . '</h3>
                        <h5>' . $marka . '</h5>
                        <div id="urun_ozellik_div">
                            <h3>ÜRÜN ÖZELLİKLERİ</h3> 
                            <p><b> DAHİLİ HAFIZA: </b> ' . $hafiza . '</p>
                            <p><b> RAM KAPASİTESİ: </b> ' . $ram . '</p>
                            <p><b> EKRAN BOYUTU: </b> ' . $ekran_boyutu . ' inç</p>
                            <p><b> İŞLEMCİ: </b> ' . $islemci . '</p>
                        </div>
                        <div id="bottom_buttons_info_products">
                        <h1>' . $fiyat . ' TL</h1>
                        <form method="post">
                            <label for="adet">Adet Sayısı:</label>
                            <input type="number" name="adet" min="1" max="10" value="1" id="eklenecek_adet">
                            <button type="submit" name="sepete_ekle_button"><b>SEPETE EKLE</b></button>
                        </form>
                        </div>
                    </div>';

            echo $html;
            ?>
        </div>
    </div>
    <script src="../../js/features_product.js"></script>
</body>
</html>