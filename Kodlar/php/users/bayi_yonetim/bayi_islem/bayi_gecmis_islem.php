
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
    <h2>Satılan Ürünler</h2>

<table>
  <tr>
    <th>Bayi ID</th>
    <th>Müşteri ID</th>
    <th>Telefon ID</th>
    <th>Tarih</th>
  </tr>

  <?php
  include('../../../contact/contact.php');
  // Satılan ürünlerin verilerini al
  $query = mysqli_query($connection, "SELECT * FROM satilan_urun WHERE bayi_id='$id'");
  while ($row = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td>" . $row['bayi_id'] . "</td>";
    echo "<td>" . $row['musteri_id'] . "</td>";
    echo "<td>" . $row['telefon_id'] . "</td>";
    echo "<td>" . $row['tarih'] . "</td>";
    echo "</tr>";
  }
  ?>
</table>
          </div>
        </div>
</body>

</html>
