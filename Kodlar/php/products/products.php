<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/products.css">
</head>

<body>
    <?php
    $id = $_GET['id'];
    if (!empty($id)) {
        include '../navbar/navbar_login.php';
    } else {
        include ('../navbar/navbar.php');
    } ?>

    <div id="products_body_div">

        <?php
        include '../contact/contact.php';
        $phoneID = $_GET['telefon_id'];
        $query = mysqli_query($connection, 'select * from telefon');
        while ($take = mysqli_fetch_array($query)) {
            $p_id = $take["telefon_id"];
            $marka = $take["marka"];
            $model = $take["model"];
            $fiyat = $take["fiyat"];
            //resimleri alma kodu
            $query_resim = mysqli_query($connection, 'select * from resimler where id="' . $p_id . '"');
            $resim_row = mysqli_fetch_array($query_resim);
            $resim = $resim_row['resim1'];
            $url = '../products/features_product.php?id=' . $id . '&telefon_id=' . $p_id;
            $html = '
                <div id="card' . $p_id . '" class="card">
                    <a href="' . $url . '"><img src="' . $resim . '" alt="' . $model . '"></a>
                    <h3>' . $model . '</h3>
                    <p>' . $marka . ' GB</p>
                    <h3 id="product_fiyat">' . $fiyat . ' TL</h3>
                </div>';
            echo $html;
        }
        ?>
    </div>
    <footer>
        <?php include '../footer/footer.php'; ?>
    </footer>

    <script src="../../js/products.js"></script>
</body>

</html>