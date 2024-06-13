<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hesap İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php
      $id = $_GET['id'];
      include("../bayi_left_bar.php");
      include("../../../contact/take_all_data.php");
      ?>
    </div>
    <!-- Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir. -->

    <div id="right_container">

      <!-- Hesap özellikleri görüntüleme -->
      <div id="acount_info_divs">
        <h2>HESAP BİLGİLERİ</h2>
        <?php

        // Bayi tablosunda id'ye göre eşleşen satırı seç ve eposta bilgisini al
        $user_id_query = mysqli_query($connection, "SELECT eposta FROM bayi WHERE bayi_id='$id'");
        $user_id_row = mysqli_fetch_array($user_id_query);
        $user_email = $user_id_row['eposta'];

        // Kullanici tablosunda eposta bilgisine göre kullanıcıyı seç
        $query_kullanici = mysqli_query($connection, "SELECT * FROM kullanici WHERE email='$user_email'");
        if (mysqli_num_rows($query_kullanici) > 0) {
          $data = mysqli_fetch_array($query_kullanici);
          // Kullanıcı bilgilerini ekrana yazdır
          echo "<div id='$id'  class='search_info_cards'>";
          echo "Ad: " . $data["ad"] . "<br>";
          echo "Soyad: " . $data["soyad"] . "<br>";
          echo "E-posta: " . $data["email"] . "<br>";
          echo "Şifre: " . $data["sifre"] . "<br>";
          echo "Doğum Günü: " . $data["dogum_gunu"] . "<br>";
          echo "Adres: " . $data["adres"] . "<br>";
          echo "</div>";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Formdan gelen bilgileri al
            $new_ad = $_POST['ad'];
            $new_soyad = $_POST['soyad'];
            $new_email = $_POST['email'];
            $new_sifre = $_POST['sifre'];
            $new_dogum_gunu = $_POST['dogum_gunu'];
            $new_adres = $_POST['adres'];

            // Kullanıcı tablosundaki ilgili kaydı güncelle
            $update_query = "UPDATE kullanici SET ad='$new_ad', soyad='$new_soyad', email='$new_email', sifre='$new_sifre', dogum_gunu='$new_dogum_gunu', adres='$new_adres' WHERE email='$user_email'";

            if (mysqli_query($connection, $update_query)) {
              echo "Kullanıcı bilgileri başarıyla güncellendi.";
            } else {
              echo "Hata: " . $update_query . "<br>" . mysqli_error($connection);
            }
          }
        } else {
          echo "Bu ID'ye sahip kullanıcı bulunamadı.";
        }
        ?>
      </div>
      <div id="products_add_divs">
        <h1>Bilgileri Değiştir</h1>
        <form action="#" method="post" id="products_add_form">
          <input type="text" id="ad" name="ad" placeholder="İlçe" required>
          <input type="text" id="soyad" name="soyad" placeholder="İl" required>
          <input type="email" id="email" name="email" placeholder="E-posta" required>
          <input type="password" id="sifre" name="sifre" placeholder="Şifre" required>
          <input type="date" id="dogum_gunu" name="dogum_gunu" placeholder="Kuruluş" required>
          <input type="text" id="adres" name="adres" placeholder="Adres" required>
          <input type="submit" value="Değiştir">
        </form>
      </div>
    </div>
  </div>
  <script src="../../js/master_admin.js"></script>
</body>

</html>
