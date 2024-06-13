<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Depo İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">

</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include("../../../contact/contact.php"); ?>
    <div id="right_container" class="admin_container">
      <!--Buraya Ürün Bulmak için kodlar eklendi-->
      <div id="search_div">
        <h2>DEPO BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="warehouse_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Depo ID">
          <input type="text" name="search_town" id="search_town" placeholder="Depo Şehri">
          <button type="submit" id="search_info_button">Depoları Bul</button>
        </form>
      </div>
      <!--DEPO özellikleri görüntüleme-->

      <div id="warehouse_info_divs">
        <div class="card-container">
          <?php
          // Depo bilgilerini alma
          $query_warehouse_stock = mysqli_query($connection, 'SELECT * FROM depo_stok');
          $query_warehouse = mysqli_query($connection, 'SELECT * FROM depo');
          $telefon_cesidi = array(); // Telefon çeşitlerini tutacak dizi
          $all_data_depo_stok = array();
          // Tüm depo stoklarını al
          while ($take = mysqli_fetch_array($query_warehouse_stock)) {
            $data = [
              "depo_id" => $take["depo_id"],
              "phone_id" => $take["telefon_id"],
              "stok" => $take["stok"]
            ];
            $all_data_depo_stok[] = $data;
            // Telefon çeşitlerini diziye ekle
            $telefon_cesidi[] = $take["telefon_id"];
          }
          // Telefon çeşitlerini unique hale getir
          $telefon_cesidi = array_unique($telefon_cesidi);
          $all_data_depo = array();
          // Tüm depoları al
          while ($take = mysqli_fetch_array($query_warehouse)) {
            $data = [
              "depo_id" => $take["depo_id"],
              "sehir" => $take["sehir"]
            ];
            $all_data_depo[] = $data;
          }
          // Her bir depo için işlem yap
          foreach ($all_data_depo as $depo) {
            $depo_id = $depo['depo_id'];
            $depo_sehir = $depo['sehir'];
            $stok_miktari = 0; // Başlangıçta stok miktarını sıfırla
            // Depo stok miktarını hesapla
            foreach ($all_data_depo_stok as $depo_stok) {
              if ($depo_stok['depo_id'] == $depo_id) {
                $stok_miktari += $depo_stok['stok'];
              }
            }
            // Telefon çeşidi sayısını al
            $telefon_cesidi_sayisi = count($telefon_cesidi) + 1;


            // Kartları filtrele
            $search_id = isset($_POST["search_id"]) ? $_POST["search_id"] : "";
            $search_town = isset($_POST["search_town"]) ? $_POST["search_town"] : "";

            $display_style = "none";
            if (empty($search_id) && empty($search_town)) {
              $display_style = 'block';
            } else {
              if ($search_id == $depo["depo_id"] || $search_town == $depo["sehir"]) {
                $display_style = 'block';
              }
            }
            echo "  <div class='card' id ='warehouse_card_" . $depo_id . "' style='display: " . $display_style . "'>";

            echo "<h3>Depo Bilgileri</h3>";
            echo "<p><strong>Depo ID:</strong> " . $depo_id . "</p>";
            echo "<p><strong>Depo Şehri:</strong> " . $depo_sehir . "</p>";
            echo "<p><strong>Stok Miktarı:</strong> " . $stok_miktari . "</p>";
            echo "<p><strong>Telefon Çeşidi Sayısı:</strong>" . $telefon_cesidi_sayisi . "</p>";
            echo "<button type='button' class='warehouse_button' id='warhouse_exp_" . $depo_id . "'' >Depodaki Ürünleri Gör</button>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
      <div>
        <!--Depo silme-->
        <div id="warehouse_delete_form">
          <h4>Silmek İstediğiniz Depo ID'sini Giriniz:</h4>
          <form id="delete_warehouse_form" method="POST">
            <input type="text" name="delete_warehouse_id" id="delete_warehouse_id">
            <button type="submit">Sil</button>
          </form>
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_warehouse_id"])) {
            $delete_warehouse_id = $_POST["delete_warehouse_id"];

            // Depo veritabanından silme sorgusu
            $delete_query = mysqli_query($connection, "DELETE FROM depo WHERE depo_id = '$delete_warehouse_id'");

            if ($delete_query) {
              echo "<script>alert('Depo başarıyla silindi');</script>";
            } else {
              echo "<script>alert('Depo silinirken bir hata oluştu');</script>";
            }
          }
          ?>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
<script src="../../js/master_admin.js"></script>

</body>

</html>
