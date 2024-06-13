<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$telefon_id = isset($_GET['telefon_id']) ? $_GET['telefon_id'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hesap İşlemleri</title>
    <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
    <div id="nav_div">
        <img alt="Logo" id="logo" onclick="link()"
            src="https://lh3.googleusercontent.com/u/0/drive-viewer/AKGpihYqd3kSkHdxvcw18NkCjs8iGZmTSHHyrR-C_IqYHNS8PC9xamzcwieWHPvvjA2SYrI04Mu3bRdQ2dojKKxupRI12sPmXOk5dAQ=w1920-h957">
        <ul>
            <li><a href="../../../products/products.php?id=<?php echo htmlspecialchars($id); ?>&telefon_id=<?php echo htmlspecialchars($telefon_id); ?>">ÜRÜNLERİMİZ</a></li>
            <li><a href="../../../products/list.php?id=<?php echo htmlspecialchars($id); ?>&telefon_id=<?php echo htmlspecialchars($telefon_id); ?>">SEPETE GİT</a></li>
            <li><a href="#">DESTEK</a></li>
            <li><a href="../../../users/hesap_ayar/hesap_islem/hesap_ayarlari_degis.php?id=<?php echo htmlspecialchars($id); ?>&telefon_id=<?php echo htmlspecialchars($telefon_id); ?>" id="log_in">HESABIM</a></li>
        </ul>
    </div>
    <div id="container">
        <div id="left_container">
            <?php include("../hesap_left_bar.php"); ?>
        </div>
        <!-- Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir. -->
        <?php include("../../../contact/take_all_data.php"); ?>
        <div id="right_container">
            <div id="account_info_divs">
                <h2>HESAP BİLGİLERİ</h2>

                <?php
                foreach ($kullanici_datas as $data) {
                    if ($data["musteri_id"] == $id) {
                        echo '<div id="search_info_cards_' . htmlspecialchars($id) . '"  class="search_info_cards">';
                        echo "Müşteri ID: " . htmlspecialchars($data["musteri_id"]) . "<br>";
                        echo "Hesap Tipi: " . htmlspecialchars($data["hesap_tipi"]) . "<br>";
                        echo "Ad: " . htmlspecialchars($data["ad"]) . "<br>";
                        echo "Soyad: " . htmlspecialchars($data["soyad"]) . "<br>";
                        echo "E-posta: " . htmlspecialchars($data["email"]) . "<br>";
                        echo "Şifre: " . htmlspecialchars($data["sifre"]) . "<br>";
                        echo "Doğum Günü: " . htmlspecialchars($data["dogum_gunu"]) . "<br>";
                        echo "Adres: " . htmlspecialchars($data["adres"]) . "<br>";
                        echo "</div>";
                        break; // Sadece eşleşen bir müşteri için kartı yazacak ve döngüyü sonlandıracak.
                    }
                }
                ?>

                <form method="POST" id="update_form" name="update_form" action="">
                    <h2>Hesap Bilgilerini Güncelle</h2>
                    <label for="name">İsim</label><br>
                    <input type="text" id="name" name="register_name" required value="<?php echo htmlspecialchars($data["ad"]); ?>"><br><br>
                
                    <label for="surname">Soyisim</label><br>
                    <input type="text" id="surname" name="register_surname" required value="<?php echo htmlspecialchars($data["soyad"]); ?>"><br><br>
                
                    <label for="email">E-mail</label><br>
                    <input type="email" id="email" name="register_email" required value="<?php echo htmlspecialchars($data["email"]); ?>"><br><br>
                
                    <label for="password">Şifre</label><br>
                    <input type="password" id="password" name="register_password" required value="<?php echo htmlspecialchars($data["sifre"]); ?>"><br><br>
                
                    <label for="birthday">Doğum Günü</label><br>
                    <input type="date" id="birthday" name="register_birthday" required value="<?php echo htmlspecialchars($data["dogum_gunu"]); ?>"><br><br>
                
                    <label for="address">Adres</label><br>
                    <input type="text" id="address" name="register_address" required value="<?php echo htmlspecialchars($data["adres"]); ?>"><br><br>
                
                    <input type="submit" value="Güncelle">
                </form>
            <?php
            //formdan verileri php ye aktar


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["register_name"];
                $surname = $_POST["register_surname"];
                $email = $_POST["register_email"];
                $password = $_POST["register_password"];
                $birthday = $_POST["register_birthday"];
                $address = $_POST["register_address"];



                // Verileri kullanarak gerekli işlemleri yapabilirsiniz

                // Örneğin, verileri veritabanına kaydetmek için bir SQL sorgusu oluşturabilirsiniz
                $sql2 = "UPDATE kullanici SET ad='$name', soyad='$surname', email='$email', sifre='$password', dogum_gunu='$birthday', adres='$address' WHERE musteri_id='$id'";

                // SQL sorgusunu çalıştırabilirsiniz
                // Örnek olarak mysqli kullanarak:
                if (mysqli_query($connection, $sql2)) {
                    echo "<script>alert('Kayıt Başarılı. Lütfen Giriş Yapın...');</script>"; // Kayıt başarılı olduğunda bildirim kutusu göster
                
                    // 5 saniye sonra kullanıcıyı login sayfasına yönlendir
                } else {
                    echo "Kayıt işlemi başarısız: " . mysqli_error($connection);
                }
            }
                // Bağlantıyı kapatma
                mysqli_close($connection);
            ?>
            </div>
        </div>
    </div>
    <script>
        function link() {
            window.location.href = "../../../home/home.php?id=<?php echo $id; ?>&telefon_id=<?php echo $telefon_id; ?>";
        }
    </script>
    <script src="../../js/master_admin.js"></script>
</body>

</html>
