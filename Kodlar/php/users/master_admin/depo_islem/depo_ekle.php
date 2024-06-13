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
      <?php include ("../left_bar.php"); ?>
    </div>
    <?php include ("../../../contact/contact.php"); ?>
    <div id="right_container" class="admin_container">
      <div id="warehouse_add_form_div">
        <h1>Depo Ekleme</h1>
        <form action="#" method="post" id="warehouse_add_form">
          <input type="text" id="warehouse_town" name="warehouse_town" placeholder="Depo Şehri" required>
          <input type="submit" value="Ekle" class="warehouse_button">
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['warehouse_town'])) {
          $sehir = mysqli_real_escape_string($connection, $_POST['warehouse_town']);
          $add_town = "INSERT INTO depo (sehir) VALUES ('$sehir')";
          
          if (mysqli_query($connection, $add_town)) {
            echo "<script>alert('Depo başarıyla eklendi');</script>";
          } else {
            echo "<script>alert('Depo eklenirken bir hata oluştu: " . mysqli_error($connection) . "');</script>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>
