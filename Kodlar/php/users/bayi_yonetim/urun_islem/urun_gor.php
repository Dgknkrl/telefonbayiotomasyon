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
      <?php include ("../bayi_left_bar.php"); ?>
    </div>

    <?php include ("../../../contact/take_all_data.php"); ?>

    <div id="right_container">
      <h2>ÜRÜN BİLGİLERİNİ GÖRÜNTÜLE</h2>
      <div id="products_search">
        <form id="search_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Ürün ID">
          <input type="text" name="search_name" id="search_name" placeholder="Ürün Modeli">
          <button type="submit" name="search_info_button" id="search_info_button">Ürünü Ara</button>
        </form>
      </div>

      <div id="products_info_divs">
        <?php
        // Önceki sayfadan gelen bayi ID'sini al
        $id = $_GET['id'];

        // Bayi stok tablosunda bu bayi ID'sine sahip olan telefonları sorgula
        $query_bayi_stok_telefon = mysqli_query($connection, "SELECT telefon_id FROM bayi_stok WHERE bayi_id = $id");

        // Bu sorgudan dönen sonuçları diziye aktar
        $telefon_ids = array();
        while ($row = mysqli_fetch_assoc($query_bayi_stok_telefon)) {
          $telefon_ids[] = $row['telefon_id'];
        }

        // POST ile gelen değerleri al
        $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
        $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

        // Telefon ve özellik tablolarından ilgili telefonların bilgilerini sorgula
        foreach ($telefon_ids as $telefon_id) {
          $query_telefonlar = mysqli_query($connection, "SELECT * FROM telefon WHERE telefon_id = $telefon_id");
          $query_ozellik = mysqli_query($connection, "SELECT * FROM ozellik WHERE id = $telefon_id");
          $telefon = mysqli_fetch_assoc($query_telefonlar);
          $ozellik = mysqli_fetch_assoc($query_ozellik);

          $display_style = 'none'; // Başlangıçta tüm divler gizlenecek

          if (empty($search_id) && empty($search_name)) {
            $display_style = 'block'; // Eğer inputlardan gelen değerler yoksa, tüm divler görünür olacak
          } else {
            if ($search_id == $telefon['telefon_id'] || $search_name == $telefon['model']) {
              $display_style = 'block'; // Aranan ID ile eşleşen divler görünür hale gelecek
            }
          }

          // Telefon bilgilerini ve özelliklerini ekranda göster
          echo '<div class="search_info_cards" style="display: ' . $display_style . '">';
          echo "Telefon ID: " . $telefon['telefon_id'] . "<br>";
          echo "Telefon Modeli: " . $telefon['model'] . "<br>";
          echo "RAM: " . $ozellik['ram'] . " GB" . "<br>";
          echo "Ekran Boyutu: " . $ozellik['ekran_boyutu'] . " inç" . "<br>";
          echo "Hafıza: " . $ozellik['hafiza'] . " GB" . "<br>";
          echo "İşlemci: " . $ozellik['islemci'] . "<br>";
          echo "<button type='button' onclick='go_products(" . $telefon['telefon_id'] . ", $id)' class='go_store_button'>Mağazada Gör</button>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
    <script src="../../../../js/master_admin.js">
    </script>
  </div>
</body>

</html>
