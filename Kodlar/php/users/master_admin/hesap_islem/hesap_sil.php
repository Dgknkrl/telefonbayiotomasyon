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
      <?php include("../left_bar.php"); ?>
    </div>
    <!-- Sağ tarafta bulunan gövdenin içeriği aşağıda verilmiştir. -->
    <?php include("../../../contact/take_all_data.php"); ?>
    <div id="right_container">

      <!-- Hesap Arama için kodlar eklendi -->
      <div id="account_search" class="search_div">
        <h2>HESAP BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="account_search_form" class="search_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Hesap ID">
          <input type="text" name="search_name" id="search_name" placeholder="Hesap Adı">
          <button type="submit" id="search_info_button" class="search_button">Hesap Ara</button>
        </form>
      </div>

      <!-- Hesap özellikleri görüntüleme -->
      <div id="account_info_divs">
        <h2>HESAP BİLGİLERİ</h2>
        <?php
        $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
        $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

        $found = false; // Hesap bulunup bulunmadığını kontrol etmek için bir bayrak

        foreach ($kullanici_datas as $data) {
          $i = $data["musteri_id"];
          $display_style = 'none';
          if (empty($search_id) && empty($search_name)) {
            $display_style = 'block';
          } else {
            if ($search_id == $data["musteri_id"] || $search_name == $data["ad"]) {
              $display_style = 'block';
              $found = true; // Hesap bulunduğunda bayrağı true yap
            }
          }

          echo '<div id="search_info_cards_' . $i . '"  class="search_info_cards" style="display: ' . $display_style . '">';
          echo "Müşteri ID: " . $data["musteri_id"] . "<br>";
          echo "Hesap Tipi: " . $data["hesap_tipi"] . "<br>";
          echo "Ad: " . $data["ad"] . "<br>";
          echo "Soyad: " . $data["soyad"] . "<br>";
          echo "E-posta: " . $data["email"] . "<br>";
          echo "Şifre: " . $data["sifre"] . "<br>";
          echo "Doğum Günü: " . $data["dogum_gunu"] . "<br>";
          echo "Adres: " . $data["adres"] . "<br>";
          echo "</div>";
          $i++;
        }

        // Hesap bulunamadıysa mesajı görüntüle
        if (!$found && ($_SERVER["REQUEST_METHOD"] == "POST")) {
          echo "<p>Hesap bulunamadı.</p>";
        }
        ?>
      </div>
      <!--Hesap silme-->
      <div id="account_delete_divs">
        <h4> Silmek istediğiniz hesabın ID'sini giriniz:</h4>
        <form id="delete_account_form" method="POST">
          <input type="text" name="delete_account_id" id="delete_account_id" placeholder="Hesap ID">
          <button type="submit">Sil</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_account_id"])) {
          $delete_account_id = $_POST["delete_account_id"];
          $delete_query = mysqli_query($connection, "DELETE FROM kullanici WHERE musteri_id = '$delete_account_id'");

          if ($delete_query) {
            echo "<script>alert('Hesap başarıyla silindi');</script>";
          } else {
            echo "<script>alert('Hesap silinirken bir hata oluştu');</script>";
          }
        }
        ?>
      </div>
    </div>
  </div>
  <script src="../../js/master_admin.js"></script>
</body>

</html>
