<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include("../left_bar.php"); ?>
    </div>
    <!--Sağ tarafta bulunan gövdenin özellikleri içeriği aşağıda verilmiştir.-->
    <?php include("../../../contact/take_all_data.php"); ?>
    <div id="right_container" class="admin_container">
      <!--Buraya Ürün Bulmak için kodlar eklendi-->
      <div id="products_search">
        <h2>ÜRÜN BİLGİLERİNİ GÖRÜNTÜLE</h2>
        <form id="search_info_form" method="POST">
          <input type="text" name="search_id" id="search_id" placeholder="Ürün ID">
          <input type="text" name="search_name" id="search_name" placeholder="Ürün Modeli">
          <button type="submit" id="search_info_button">Ürünü Ara</button>
        </form>
      </div>
      <!--Ürün özellikleri görüntüleme ve id isim ile bulma-->
      <div id="products_info_divs">

        <?php
        $search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';
        $search_name = isset($_POST['search_name']) ? $_POST['search_name'] : '';

        foreach ($telefon_ozellik as $ts) {
          $i = $ts['id'];
          $display_style = 'none'; // Başlangıçta tüm divler gizlenecek

          if (empty($search_id) && empty($search_name)) {
            $display_style = 'block'; // Eğer inputlardan gelen değerler yoksa, tüm divler görünür olacak
          } else {
            if ($search_id == $ts['id'] || $search_name == $ts['model']) {
              $display_style = 'block'; // Aranan ID ile eşleşen divler görünür hale gelecek
            }
          }

          echo '<div id="search_info_cards_' . $i . '"  class="search_info_cards" style="display: ' . $display_style . '">';
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
        ?>
      </div>

      <!--Ürün özelliklerini değiştirme-->
      <div id="products_settings_divs">
        <h1>Telefon Özelliklerini Değiştirme</h1>
        <form action="" method="POST" id="products_fix_form">
          <input type="number" id="fix_telefon_id" name="fix_telefon_id" placeholder="Telefon ID" required>
          <input type="text" id="fix_telefon_markasi" name="fix_telefon_markasi" placeholder="Telefon Markası" required>
          <input type="text" id="fix_telefon_adi" name="fix_telefon_adi" placeholder="Telefon Modeli" required>
          <input type="number" id="fix_ram" name="fix_ram" placeholder="Ram (GB)" required>
          <input type="number" id="fix_hafiza" name="fix_hafiza" placeholder="Hafıza (GB)" required>
          <input type="number" id="fix_ekran_boyutu" name="fix_ekran_boyutu" placeholder="Ekran Boyutu (inç)" required>
          <input type="number" id="fix_kamera" name="fix_kamera" placeholder="Kamera (MP)" required>
          <input type="text" id="fix_islemci" name="fix_islemci" placeholder="İşlemci" required>
          <input type="number" id="fix_fiyat" name="fix_fiyat" placeholder="Fiyat (TL)" required>
          <input type="text" id="fix_resim1" name="fix_resim1" placeholder="Resim 1 Linki" required>
          <input type="text" id="fix_resim2" name="fix_resim2" placeholder="Resim 2 Linki" required>
          <input type="text" id="fix_resim3" name="fix_resim3" placeholder="Resim 3 Linki" required>
          <input type="text" id="fix_resim4" name="fix_resim4" placeholder="Resim 4 Linki" required>

          <input type="submit" value="Değiştir">
        </form>
        <?php
        include("../../../contact/contact.php");
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fix_telefon_id'])) {
          // Formdan gelen verileri al
          $id = $_POST['fix_telefon_id'] ?? '';
          $marka = $_POST['fix_telefon_markasi'] ?? '';
          $model = $_POST['fix_telefon_adi'] ?? '';
          $ram = $_POST['fix_ram'] ?? '';
          $hafiza = $_POST['fix_hafiza'] ?? '';
          $ekran_boyutu = $_POST['fix_ekran_boyutu'] ?? '';
          $kamera = $_POST['fix_kamera'] ?? '';
          $islemci = $_POST['fix_islemci'] ?? '';
          $fiyat = $_POST['fix_fiyat'] ?? '';
          $resim1 = $_POST['fix_resim1'] ?? '';
          $resim2 = $_POST['fix_resim2'] ?? '';
          $resim3 = $_POST['fix_resim3'] ?? '';
          $resim4 = $_POST['fix_resim4'] ?? '';

          // Veritabanı güncelleme sorguları
          $sql_telefon = "UPDATE telefon SET 
                      marka='$marka', 
                      model='$model', 
                      fiyat=$fiyat 
                      WHERE telefon_id=$id";

          $sql_ozellik = "UPDATE ozellik SET 
                      ram=$ram, 
                      hafiza=$hafiza, 
                      ekran_boyutu=$ekran_boyutu, 
                      kamera=$kamera, 
                      islemci='$islemci' 
                      WHERE id=$id";

          $sql_resimler = "UPDATE resimler SET 
                       resim1='$resim1', 
                       resim2='$resim2', 
                       resim3='$resim3', 
                       resim4='$resim4' 
                       WHERE id=$id";

          if ($connection->query($sql_telefon) === TRUE && $connection->query($sql_ozellik) === TRUE && $connection->query($sql_resimler) === TRUE) {
            echo "Kayıt başarıyla güncellendi";
          } else {
            echo "Hata: " . $connection->error;
          }
        }

        $connection->close();
        ?>
      </div>
    </div>
  </div>
  <script src="../../../../js/master_admin.js"></script>
</body>

</html>
