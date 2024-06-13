<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Sayfası</title>
    <link rel="stylesheet" href="../../css/login.css">
</head>

<body>
    <?php require ("../navbar/navbar.php"); ?>

    <!--Burada login formumuz verilmiştir-->
    <div class="container">
        <h2>Giriş Formu</h2>
        <form action="../contact/user_login.php" method="POST">
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Şifre:</label><br>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Giriş Yap">
            <input type="button" value="Hesabınız Yok mu? Kayıt Olun" id="register_button_login"
                onclick="go_register()">
        </form>
    </div>

    <!--Burada script verilmiştir-->

    <script>
        function go_register() {
            window.location.href = "../register/register.php";
        };
    </script>
    <!--Burada footer verilmiştir-->
    <footer>
        <?php require ("../footer/footer.php"); ?>
    </footer>
</body>

</html>