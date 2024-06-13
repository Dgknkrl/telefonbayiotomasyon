<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepet</title>
    <link rel="stylesheet" href="../../css/list_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container my-5">
        <?php
        include("../contact/contact.php");

        // Önceki sayfadan gelen id bilgisi ile kullanıcının adres bilgilerini al
        $id = $_GET['id'];
        $userSql = "SELECT * FROM kullanici WHERE musteri_id = $id";
        $userResult = $connection->query($userSql);

        if ($userResult->num_rows > 0) {
            $userRow = $userResult->fetch_assoc();
            $address = $userRow['adres'];
        } else {
            $address = "Adres bilgisi bulunamadı.";
        }

        // Telefon bilgilerini ve adet bilgisini al
        $sql = "SELECT telefon.marka, telefon.model, telefon.fiyat, sepet.adet, sepet.musteri_id, sepet.tel_id FROM telefon INNER JOIN sepet ON telefon.telefon_id = sepet.tel_id WHERE sepet.musteri_id = $id";
        $result = $connection->query($sql);

        $totalPrice = 0;

        if ($result->num_rows > 0) {
            // Sonuçları döngü ile göster
            while ($row = $result->fetch_assoc()) {
                $totalPrice += $row['fiyat'] * $row['adet'];
                echo "<div class='card'>";
                echo "<div class='row'>";
                echo "<div class='col-md-8'>";
                echo "<h3><a href='features_product.php?id=" . $row["musteri_id"] . "&telefon_id=" . $row["tel_id"] . "'>" . $row["marka"] . " " . $row["model"] . "</a></h3>";
                echo "<p> " . $row["fiyat"] . " TL</p>";
                echo "</div>";
                echo "<div class='col-md-4'>";
                echo "<div class='quantity-control'>";
                echo "<div class='quantity-btn' onclick='updateQuantity(" . $row["musteri_id"] . ", " . $row["tel_id"] . ", -1)'>-</div>";
                echo "<input type='text' class='quantity-input' id='quantity-" . $row["musteri_id"] . "-" . $row["tel_id"] . "' value='" . $row["adet"] . "' readonly>";
                echo "<div class='quantity-btn' onclick='updateQuantity(" . $row["musteri_id"] . ", " . $row["tel_id"] . ", 1)'>+</div>";
                echo "<button class='delete-btn' onclick='deleteItem(" . $row["musteri_id"] . ", " . $row["tel_id"] . ")'><i class='fa-regular fa-trash-can'></i></button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }

            // Siparişi Onayla kutusu
            echo "<div class='order-summary'>";
            echo "<h4>Sipariş Özeti</h4>";
            echo "<p>Toplam Tutar: " . $totalPrice . " TL</p>";
            echo "<p>Adres: " . $address . "</p>";
            echo "<button class='confirm-btn' onclick='confirmOrder($id)'>Siparişi Onayla</button>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-warning'>Sepetinizde ürün bulunmamaktadır.</div>";
        }

        $connection->close();
        ?>
    </div>

    <script>
        function updateQuantity(musteriId, telId, change) {
            var quantityInput = document.getElementById('quantity-' + musteriId + '-' + telId);
            var currentQuantity = parseInt(quantityInput.value);
            var newQuantity = currentQuantity + change;

            if (newQuantity < 1) {
                newQuantity = 1;
            }

            quantityInput.value = newQuantity;

            // Veritabanındaki sepet tablosunu güncelle
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Boş bırakıldı, aynı sayfada işlem yapılacak
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send('musteri_id=' + musteriId + '&tel_id=' + telId + '&adet=' + newQuantity);
        }

        function deleteItem(musteriId, telId) {
            // Veritabanındaki sepet tablosundan ürünü sil
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Boş bırakıldı, aynı sayfada işlem yapılacak
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    location.reload(); // Sayfayı yenile
                }
            };
            xhr.send('delete_musteri_id=' + musteriId + '&delete_tel_id=' + telId);
        }

        function confirmOrder(musteriId) {
            // Veritabanındaki satilan_urun tablosuna verileri ekle
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Boş bırakıldı, aynı sayfada işlem yapılacak
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert('Siparişiniz verilmiştir. Anasayfaya yönlendiriliyorsunuz...');
                    window.location.href = '../home/home.php?id=' + musteriId; // id'yi anasayfaya ileterek yönlendir
                }
            };
            xhr.send('confirm_musteri_id=' + musteriId);
        }
    </script>

    <?php
    // Adet güncelleme işlemi ve silme işlemi
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include("../contact/contact.php");

        if (isset($_POST['musteri_id']) && isset($_POST['tel_id']) && isset($_POST['adet'])) {
            $musteri_id = $_POST['musteri_id'];
            $tel_id = $_POST['tel_id'];
            $adet = $_POST['adet'];

            $sql = "UPDATE sepet SET adet = $adet WHERE musteri_id = $musteri_id AND tel_id = $tel_id";

            if ($connection->query($sql) === TRUE) {
                echo "Adet başarıyla güncellendi.";
            } else {
                echo "Hata: " . $sql . "<br>" . $connection->error;
            }
        }

        // Silme işlemi
        if (isset($_POST['delete_musteri_id']) && isset($_POST['delete_tel_id'])) {
            $musteri_id = $_POST['delete_musteri_id'];
            $tel_id = $_POST['delete_tel_id'];

            $sql = "DELETE FROM sepet WHERE musteri_id = $musteri_id AND tel_id = $tel_id";

            if ($connection->query($sql) === TRUE) {
                echo "Ürün başarıyla silindi.";
            } else {
                echo "Hata: " . $sql . "<br>" . $connection->error;
            }
        }

        // Sipariş onaylama işlemi
        if (isset($_POST['confirm_musteri_id'])) {
            $musteri_id = $_POST['confirm_musteri_id'];
            $date = date('Y-m-d H:i:s');

            // Sepetteki ürünleri satilan_urun tablosuna ekle
            $sql = "SELECT tel_id FROM sepet WHERE musteri_id = $musteri_id";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tel_id = $row['tel_id'];
                    $bayi_id = 1; // Bayi id sabit bir değer olarak girildi, bunu ihtiyaca göre değiştirebilirsiniz.
                    $insertSql = "INSERT INTO satilan_urun (bayi_id, musteri_id, telefon_id, tarih) VALUES ($bayi_id, $musteri_id, $tel_id, '$date')";

                    if ($connection->query($insertSql) === TRUE) {
                        echo "Sipariş başarıyla onaylandı.";
                    } else {
                        echo "Hata: " . $insertSql . "<br>" . $connection->error;
                    }
                }
            }

            // Sepeti temizle
            $deleteSql = "DELETE FROM sepet WHERE musteri_id = $musteri_id";
            if ($connection->query($deleteSql) === TRUE) {
                echo "Sepet başarıyla temizlendi.";
            } else {
                echo "Hata: " . $deleteSql . "<br>" . $connection->error;
            }
        }

        $connection->close();
    }
    ?>
</body>
</html>
