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
            if (isset($_GET['id']) && isset($_GET['telefon_id'])) {
                $id = $_GET['id'];
                $telefon_id = $_GET['telefon_id'];
                echo '<li><a href="../products/products.php?id=' . $id . '&telefon_id=' . $telefon_id . '">ÜRÜNLERİMİZ</a></li>
                <li><a href="../products/list.php?id=' . $id . '&telefon_id=' . $telefon_id . '">SEPETE GİT</a></li>
                <li><a href="#">DESTEK</a></li>
                <li><a href="../login/login.php?id=' . $id . '&telefon_id=' . $telefon_id . '" id="log_in">GİRİŞ YAP</a></li>';
            } else {
                $id = 0;
                $telefon_id = 0;
                echo '<li><a href="../products/products.php?id=' . $id . '&telefon_id=' . $telefon_id . '">ÜRÜNLERİMİZ</a></li>
                <li><a href="../products/list.php?id=' . $id . '">SEPETE GİT</a></li>
                <li><a href="#">DESTEK</a></li>
                <li><a href="../login/login.php?id=' . $id . '&telefon_id=' . $telefon_id . '" id="log_in">GİRİŞ YAP</a></li>';
            }
            ?>
        </ul>
    </div>
    <script>
        <script>
    function link() {
        <?php 
        if(isset($_GET['id']) && isset($_GET['telefon_id'])) {
            // Eğer id ve telefon_id varsa, bu değerleri JavaScript içinde kullanabilirsiniz.
            $id = $_GET['id'];
            $telefon_id = $_GET['telefon_id'];
            echo 'window.location.href = "../home/home.php?id=' . $id . '&telefon_id=' . $telefon_id . '";';
        } else {
            // Eğer id veya telefon_id belirtilmemişse, hata verilebilir veya başka bir işlem yapılabilir.
            echo 'console.log("Lütfen geçerli bir id ve telefon_id belirtin.");';
        }
        ?>
    }
</script>

    </script>
</body>

</html>