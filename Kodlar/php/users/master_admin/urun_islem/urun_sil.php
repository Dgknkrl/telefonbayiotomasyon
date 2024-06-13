<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ürün İşlemleri</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include("../left_bar.php"); ?>
    </div>

    <div id="right_container">
      <!-- Ürün Bulmak için kodlar eklendi -->
      <div id="products_search">
        <h2>ÜRÜN BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="search_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Ürün ID">
          <input type="text" name="search_name" id="search_name" placeholder="Ürün Modeli">
          <button type="submit" id="search_info_button">Ürünü Ara</button>
        </form>
      </div>

      <!-- Ürün özellikleri görüntüleme -->
      <div id="products_info_divs">
        <?php
        include('../../../contact/take_all_data.php');
        $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
        $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

        foreach ($telefon_ozellik as $ts) {
          $i = $ts['id'];
          $display_style = 'none';

          if (empty($search_id) && empty($search_name)) {
            $display_style = 'block';
          } else {
            if ($search_id == $ts['id'] || $search_name == $ts['model']) {
              $display_style = 'block';
            }
          }

          echo '<div id="search_info_cards_' . $i . '" class="search_info_cards" style="display: ' . $display_style . '">';
          echo "Telefon ID: " . $ts['id'] . "<br>";
          echo "Telefon Modeli: " . $ts['model'] . "<br>";
          echo "RAM: " . $ts['ram'] . " GB" . "<br>";
          echo "Ekran Boyutu: " . $ts['ekran_boyutu'] . " inç" . "<br>";
          echo "Hafıza: " . $ts['hafiza'] . " GB" . "<br>";
          echo "İşlemci: " . $ts['islemci'] . "<br>";
          echo "<button type='button' onclick='go_products(" . $ts['id'] . ")' id='go_store_button_" . $i . "' class='go_store_button'>Mağazada Gör</button>";

          echo "</div>";
          $i++;
        }
        $connection->close();
        ?>
      </div>

      <!-- Ürün silme -->
      <div id="products_delete_divs">
        <h4>Silmek İstediğiniz Ürün ID'sini giriniz.</h4>
        <form action="#" method="POST">
          <input type="text" name="delete_product" id="delete_product" placeholder="Ürün ID">
          <input type="submit" name="delete_button_submit" id="delete_button_submit" value="Sil">
        </form>
        <?php
        include('../../../contact/contact.php');
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $del_id = intval($_POST['delete_product']);
          $sql = "DELETE FROM ozellik WHERE id = $del_id";
          if ($connection->query($sql) === TRUE) {
            if ($connection->affected_rows > 0) {
                echo "<script> alert('Kayıt silindi'); </script>";
            }
        } else {
            echo "Hata: " . $sql . "<br>" . $connection->error;
        }
          // Veritabanı bağlantısını kapat
          $connection->close();
        }
        ?>
      </div>
    </div>
  </div>
  <script src="../../../../js/master_admin.js"></script>
</body>

</html>
