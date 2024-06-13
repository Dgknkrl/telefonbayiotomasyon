<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ÜRÜN İŞLEMLERİ</title>
  <link rel="stylesheet" href="../../../../css/master_admin.css">
</head>

<body>
  <div id="container">
    <div id="left_container">
      <?php include ("../left_bar.php"); ?>
    </div>

    <div id="right_container">
      <!-- Ürün ekleme formu -->
      <div id="products_add_divs">
        <h1>Telefon Ekleme</h1>
        <form action="#" method="post" id="products_add_form">
          <input type="text" id="add_telefon_markasi" name="add_telefon_markasi" placeholder="Telefon Markası" required>
          <input type="text" id="add_telefon_modeli" name="add_telefon_modeli" placeholder="Telefon Modeli" required>
          <input type="number" id="add_ram" name="add_ram" placeholder="Ram (GB)" required>
          <input type="number" id="add_hafiza" name="add_hafiza" placeholder="Hafıza (GB)" required>
          <input type="number" id="add_kamera" name="add_kamera" placeholder="Kamera (MP)" required>
          <input type="number" id="add_ekran_boyutu" name="add_ekran_boyutu" placeholder="Ekran Boyutu (inç)" required>
          <input type="text" id="add_islemci" name="add_islemci" placeholder="İşlemci" required>
          <input type="number" id="add_fiyat" name="add_fiyat" placeholder="Fiyat (TL)" required>
          <input type="text" id="link1" name="link1" placeholder="Birinci resim adresi">
          <input type="text" id="link2" name="link2" placeholder="İkinci resim adresi">
          <input type="text" id="link3" name="link3" placeholder="Üçüncü resim adresi">
          <input type="text" id="link4" name="link4" placeholder="Dördüncü resim adresi">
          <input type="number" id="add_bayi_id" name="add_bayi_id" placeholder="Bayi ID">
          <input type="number" id="add_depo_id" name="add_depo_id" placeholder="Depo ID">
          <input type="submit" value="Ekle">
        </form>
      </div>

      <!-- Telefon ekleme işlemi -->
      <?php
      include ("../../../contact/contact.php");

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $marka = $_POST['add_telefon_markasi'];
          $model = $_POST['add_telefon_modeli'];
          $ram = $_POST['add_ram'] . " GB"; // GB eklendi
          $hafiza = $_POST['add_hafiza'] . " GB"; // GB eklendi
          $kamera = $_POST['add_kamera'] . " MP"; // MP eklendi
          $ekran_boyutu = $_POST['add_ekran_boyutu'];
          $islemci = $_POST['add_islemci'];
          $fiyat = $_POST['add_fiyat'];
          $depo_id = $_POST['add_depo_id'];
          $bayi_id = $_POST['add_bayi_id'];
          
          // Resim linklerini alıyoruz
          $resim1 = $_POST['link1'];
          $resim2 = $_POST['link2'];
          $resim3 = $_POST['link3'];
          $resim4 = $_POST['link4'];
      
          // Telefon tablosuna ekleme işlemi
          $sql_telefon = "INSERT INTO telefon (marka, model, fiyat) VALUES ('$marka', '$model', '$fiyat')";
      
          if (mysqli_query($connection, $sql_telefon)) {
              $telefon_id = mysqli_insert_id($connection);
      
              // Özellikler tablosuna ekleme işlemi
              $sql_ozellik = "INSERT INTO ozellik (id, ram, hafiza, kamera, ekran_boyutu, islemci) 
                              VALUES ('$telefon_id' ,'$ram', '$hafiza', '$kamera', '$ekran_boyutu', '$islemci')";
      
              if (mysqli_query($connection, $sql_ozellik)) {
                  // Resimler tablosuna ekleme işlemi
                  $sql_resimler = "INSERT INTO resimler (id, resim1, resim2, resim3, resim4) 
                                   VALUES ('$telefon_id', '$resim1', '$resim2', '$resim3', '$resim4')";
                  
                  if (mysqli_query($connection, $sql_resimler)) {
                      header("Location: urun_gor.php?send_id=$telefon_id");
                      exit();
                  } else {
                      echo "<script>alert('Resimler tablosuna kayıt eklenemedi: " . mysqli_error($connection) . "');</script>";
                  }
              } else {
                  echo "<script>alert('Özellikler tablosuna kayıt eklenemedi: " . mysqli_error($connection) . "');</script>";
              }
          } else {
              echo "<script>alert('Telefon tablosuna kayıt eklenemedi: " . mysqli_error($connection) . "');</script>";
          }
      
          mysqli_close($connection);
      }
      
      ?>
    </div>
  </div>
</body>

</html>