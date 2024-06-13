<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayi İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include ("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include ("../../../contact/contact.php"); ?>
    <div id="right_container">

      <!--Buraya Bayi Bulmak için kodlar eklendi-->
      <div id="dealers_search">
        <h2>BAYİ BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="dealer_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Bayi ID">
          <input type="text" name="search_city" id="search_city" placeholder="Bayi Şehri">
          <button type="submit" id="search_info_button">Bayileri Bul</button>
        </form>
      </div>
      <!--Bayi bilgilerini görüntüleme-->

      <div id="dealer_info_divs">

        <div class="card-container">
          <?php
          // Bayi bilgilerini alma
          $query_dealer_stock = mysqli_query($connection, 'SELECT * FROM bayi_stok');
          $query_dealer = mysqli_query($connection, 'SELECT * FROM bayi');
          $product_types = array(); // Ürün tiplerini tutacak dizi
          $all_data_dealer_stock = array();
          // Tüm bayi stoklarını al
          while ($take = mysqli_fetch_array($query_dealer_stock)) {
            $data = [
              "dealer_id" => $take["bayi_id"],
              "phone_id" => $take["telefon_id"],
              "stock" => $take["stok"]
            ];
            $all_data_dealer_stock[] = $data;
            // Ürün tiplerini diziye ekle
            $product_types[] = $data["phone_id"];
          }
          // Ürün tiplerini unique hale getir
          $product_types = array_unique($product_types);
          $all_data_dealer = array();
          // Tüm bayileri al
          while ($take = mysqli_fetch_array($query_dealer)) {
            $data = [
              "dealer_id" => $take["bayi_id"],
              "city" => $take["ilce"]
            ];
            $all_data_dealer[] = $data;
          }
          // Her bir bayi için işlem yap
          foreach ($all_data_dealer as $dealer) {
            $dealer_id = $dealer['dealer_id'];
            $dealer_city = $dealer['city'];
            $stock_amount = 0; // Başlangıçta stok miktarını sıfırla
            // Bayi stok miktarını hesapla
            foreach ($all_data_dealer_stock as $dealer_stock) {
              if ($dealer_stock['dealer_id'] == $dealer_id) {
                $stock_amount += $dealer_stock['stock'];
              }
            }
            // Ürün tipi sayısını al
            $product_type_count = count($product_types) + 1;

            // Kartları filtrele
            $search_id = isset($_POST["search_id"]) ? $_POST["search_id"] : "";
            $search_city = isset($_POST["search_city"]) ? $_POST["search_city"] : "";

            $display_style = "none";
            if (empty($search_id) && empty($search_city)) {
              $display_style = 'block';
            } else {
              if ($search_id == $dealer["dealer_id"] || $search_city == $dealer["city"]) {
                $display_style = 'block';
              }
            }
            echo "  <div class='card' id ='dealer_card_" . $dealer_id . "' style='display: " . $display_style . "'>";
            echo "<h3>Bayi Bilgileri</h3>";
            echo "<p><strong>Bayi ID:</strong> " . $dealer_id . "</p>";
            echo "<p><strong>Bayi Şehri:</strong> " . $dealer_city . "</p>";
            echo "<p><strong>Stok Miktarı:</strong> " . $stock_amount . "</p>";
            echo "<p><strong>Ürün Tipi Sayısı:</strong>" . $product_type_count . "</p>";
            echo "<button type='button' class='dealer_button' id='dealer_exp_" . $dealer_id . "'' >Bayideki Ürünleri Gör</button>";
            echo "</div>";

          }
          ?>
        </div>
        <!--Ürün silme-->
        <div id="warehouse_delete_form">
          <h4> Silmek İstediğiniz Bayi ID'sini Giriniz:</h4>
          <!-- Ürün silme formu -->
          <form id="delete_dealer_form" method="POST">
            <input type="text" name="delete_dealer_id" id="delete_dealer_id">
            <button type="submit" id="delete_button">Sil</button>
          </form>
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_dealer_id"])) {
            $delete_dealer_id = $_POST["delete_dealer_id"];

            // Bayi veritabanından silme sorgusu
            $delete_query = mysqli_query($connection, "DELETE FROM bayi WHERE bayi_id = '$delete_dealer_id'");

            if ($delete_query) {
        
            } else {
              echo "<script>alert('Bayi silinirken bir hata oluştu');</script>";
            }
          }
          ?>

        </div>
      </div>
    </div>

  </div>
</body>

</html>