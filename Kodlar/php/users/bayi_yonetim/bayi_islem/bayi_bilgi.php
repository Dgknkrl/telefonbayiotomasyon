
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayi İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
      margin: auto;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }
  </style>
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php 
      $id=$_GET['id'];
      include("../bayi_left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include("../../../contact/contact.php"); ?>
    <div id="right_container" class="admin_container">

      <!--Buraya Bayi Bulmak için kodlar eklendi-->
      <div id="dealers_search">
        <h2>BAYİ BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <!--Bayi bilgilerini görüntüleme-->

        <div id="dealer_info_divs">

          <div class="card-container">
            <?php
            // Bayi bilgilerini alma
            $query_dealer_stock = mysqli_query($connection, "SELECT * FROM bayi_stok WHERE bayi_id='$id'");
            $query_dealer = mysqli_query($connection, "SELECT * FROM bayi WHERE bayi_id='$id'");
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
              if ($dealer['dealer_id'] == $id) {
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
                $product_type_count = count($product_types);


                echo "<div class='card' id ='dealer_card_" . $dealer_id . "' >";
                echo "<h3>Bayi Bilgileri</h3>";
                echo "<p><strong>Bayi ID:</strong> " . $dealer_id . "</p>";
                echo "<p><strong>Bayi Şehri:</strong> " . $dealer_city . "</p>";
                echo "<p><strong>Stok Miktarı:</strong> " . $stock_amount . "</p>";
                echo "<p><strong>Ürün Tipi Sayısı:</strong>" . $product_type_count . "</p>";
                echo "</div>";

                // Bayinin stoklarında bulunan tüm telefonları listele
                
                echo "<table border='1'> 
                      <tr>
                      <th>Telefon ID</th>
                      <th>Stok Miktarı</th>
                      </tr>";

                foreach ($all_data_dealer_stock as $dealer_stock) {
                  if ($dealer_stock['dealer_id'] == $dealer_id) {
                    echo "<tr>";
                    echo "<td>" . $dealer_stock['phone_id'] . "</td>";
                    echo "<td>" . $dealer_stock['stock'] . "</td>";
                    echo "</tr>";
                  }
                }

                echo "</table>";
              }
            }

            ?>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
