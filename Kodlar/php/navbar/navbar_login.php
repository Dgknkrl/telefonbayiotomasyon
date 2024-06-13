<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/navbar.css">
</head>

<body>
    <div id="nav_div">
        <img alt="Logo" id="logo" onclick="link()"
            src="https://lh3.googleusercontent.com/u/0/drive-viewer/AKGpihYqd3kSkHdxvcw18NkCjs8iGZmTSHHyrR-C_IqYHNS8PC9xamzcwieWHPvvjA2SYrI04Mu3bRdQ2dojKKxupRI12sPmXOk5dAQ=w1920-h957">
        <ul>
            <?php 
            $id = $_GET['id'];
            $telefon_id = $_GET['telefon_id'];
            echo '<li><a href="../products/products.php?id=' . $id . '&telefon_id=' . $telefon_id . '">ÜRÜNLERİMİZ</a></li>
            <li><a href="../products/list.php?id=' . $id . '">SEPETE GİT</a></li>
            <li><a href="#">DESTEK</a></li>
            <li><a href="../users\hesap_ayar\hesap_islem\hesap_ayarlari_degis.php?id=' . $id . '&telefon_id=' . $telefon_id . '" id="log_in">HESABIM</a></li>';
            ?>
        </ul>
    </div>
    <script>
        function link() {
            window.location.href = "../home/home.php?id=' . $id . '&telefon_id=' . $telefon_id . '";
        }
    </script>
</body>

</html>
