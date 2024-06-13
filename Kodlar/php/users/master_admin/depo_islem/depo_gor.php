<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../../css/master_admin2.css">

</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include ("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include ("../../../contact/contact.php"); ?>
    <div id="right_container">

      <!--Buraya Ürün Bulmak için kodlar eklendi-->
      <div id="products_search_warehouse">
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
            echo "<form method='post' action=''>
            <input type='hidden' name='depo_id' value='" . $depo_id . "'>
            <button type='submit' class='warehouse_button' id='warehouse_exp_" . $depo_id . "'>Depodaki Ürünleri Gör</button>
            </form>";

            echo "</div>";
          }

          ?>
        </div>
        <?php
        // Butona tıklanınca depo_id'yi al
        if (isset($_POST['depo_id'])) {
          $depo_id = $_POST['depo_id'];

          // Depo_stok tablosundan telefon_id'leri al
          $sql = "SELECT telefon_id FROM depo_stok WHERE depo_id = $depo_id";
          $result = $connection->query($sql);

          if ($result->num_rows > 0) {
            // Tablo başlıkları
            echo "<div id='table_container'>";
            echo "<table border='1' id='table_id_120'>";
            echo "<tr><th>Telefon ID</th><th>Telefon Modeli</th><th>Telefon Adı</th><th>Fiyat</th></tr>";

            // Her bir telefon için
            while ($row = $result->fetch_assoc()) {
              $telefon_id = $row["telefon_id"];

              // Telefon tablosundan telefon bilgilerini al
              $telefon_sql = "SELECT * FROM telefon WHERE telefon_id = $telefon_id";
              $telefon_result = $connection->query($telefon_sql);

              if ($telefon_result->num_rows > 0) {
                // Her bir telefonun bilgilerini tabloya ekle
                while ($telefon_row = $telefon_result->fetch_assoc()) {

                  echo "<tr id='table_id'>";
                  echo "<td>" . $telefon_row["telefon_id"] . "</td>";
                  echo "<td>" . $telefon_row["marka"] . "</td>";
                  echo "<td>" . $telefon_row["model"] . "</td>";
                  echo "<td>" . $telefon_row["fiyat"] . "</td>";
                  echo "</tr>"; 
                }
              } else {
                echo "Telefon bulunamadı";
              }
            }
            echo "</table>";
            echo "</div>";
          } else {
            echo "Depoda ürün bulunamadı";
          }
        }

        // Veritabanı bağlantısını kapat
        $connection->close();
        ?>
      </div>
    </div>
  </div>
</body>

</html>