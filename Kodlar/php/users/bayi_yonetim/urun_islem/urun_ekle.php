<?php 
      $telefon_id=null;
      $add_stok=null;
      ?>
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
      <?php
      $id = $_GET['id'];
      include ("../bayi_left_bar.php"); ?>
    </div>

    <div id="right_container">
      <!-- Ürün ekleme formu -->
      <div id="products_add_divs">
        <h1>Telefon Ekleme</h1>
        <form action="#" method="post" id="products_add_form">
          <input type="number" id="add_telefon_id" name="add_telefon_id" placeholder="Telefon ID">
          <input type="number" id="add_stok" name="add_stok" placeholder="Stok">
          <input type="submit" value="Ekle">
        </form>
      </div>

      <!-- Telefon ekleme işlemi -->
      <?php
      include ("../../../contact/contact.php");

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $telefon_id = $_POST['add_telefon_id'];
        $add_stok = $_POST['add_stok'];

        // Bayi stok tablosunda aynı telefon var mı kontrol et
        $check_query = "SELECT * FROM bayi_stok WHERE bayi_id = $id AND telefon_id = $telefon_id";
        $check_result = mysqli_query($connection, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
          // Eğer telefon zaten varsa, stok miktarını güncelle
          $row = mysqli_fetch_assoc($check_result);
          $previous_stok = $row['stok'];
          $new_stok = $previous_stok + $add_stok;

          $update_query = "UPDATE bayi_stok SET stok = $new_stok WHERE bayi_id = $id AND telefon_id = $telefon_id";

          if (mysqli_query($connection, $update_query)) {
            echo "<script>alert('Stok miktarı güncellendi.');</script>";
          } else {
            echo "Hata: " . $update_query . "<br>" . mysqli_error($connection);
          }
        } else {
          // Eğer telefon yoksa, yeni bir giriş ekle
          $insert_query = "INSERT INTO bayi_stok (bayi_id, telefon_id, stok) VALUES ($id, $telefon_id, $add_stok)";

          if (mysqli_query($connection, $insert_query)) {
            echo "<script>alert('Telefon başarıyla eklendi.');</script>";
          } else {
            echo "Hata: " . $insert_query . "<br>" . mysqli_error($connection);
          }
        }
      }
      mysqli_close($connection);
      ?>


    </div>
  </div>
</body>

</html>