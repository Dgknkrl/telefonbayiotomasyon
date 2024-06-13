<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayi İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
  <style>
  </style>
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include("../left_bar.php"); ?>
    </div>
    <!-- Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir. -->
    <?php include("../../../contact/contact.php"); ?>
    <div id="right_container">
      <div id="bayi_add_form_div">
        <h1>Bayi Ekleme</h1>
        <form action="#" method="post" id="bayi_add_form">
          <input type="text" id="bayi_town_il" name="bayi_town_il" placeholder="Bayi İli">
          <input type="text" id="bayi_town" name="bayi_town" placeholder="Bayi İlçe">
          <input type="submit" value="Ekle" id='dealer_add_button'>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bayi_town']) && isset($_POST['bayi_town_il'])) {
          $il = mysqli_real_escape_string($connection, $_POST['bayi_town_il']);
          $ilce = mysqli_real_escape_string($connection, $_POST['bayi_town']);

          $get_depo_id = "SELECT depo_id FROM depo WHERE sehir='$il'";
          $result_depo_id = $connection->query($get_depo_id);
          $depo_row = $result_depo_id->fetch_assoc();
          $depo_id = $depo_row['depo_id'];

          if (!empty($il) && !empty($ilce)) {
            $email = $ilce . "@gmail.com";
            $sifre = $ilce;
            $hesap_tipi = "bayi";
            $dogum_gunu = date("Y-m-d");

            $add_town = "INSERT INTO bayi (ilce, eposta, depo_id) VALUES ('$ilce', '$email', '$depo_id')";

            if ($connection->query($add_town) === TRUE) {
              echo "<script>alert('Bayi başarıyla eklendi');</script>";
            } else {
              echo "<script>alert('Bayi eklenirken bir hata oluştu: " . $connection->error . "');</script>";
            }

            // Kullanıcı ekleme
            $add_user = "INSERT INTO kullanici (ad, soyad, email, sifre, hesap_tipi, dogum_gunu, adres) 
                        VALUES ('$il', '$ilce', '$email', '$sifre', '$hesap_tipi', '$dogum_gunu', '$il/$ilce')";

            if ($connection->query($add_user) === TRUE) {
              echo "<script>alert('Kullanıcı başarıyla eklendi');</script>";
            } else {
              echo "<script>alert('Kullanıcı eklenirken bir hata oluştu: " . $connection->error . "');</script>";
            }
          } else {
            echo "<script>alert('Lütfen tüm alanları doldurunuz.');</script>";
          }
        }
        $connection->close(); // Veritabanı bağlantısını kapat
        ?>
      </div>
    </div>
  </div>
</body>

</html>
