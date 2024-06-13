<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "telefon_otomasyon"; // Veritabanı adı
$dbtable = "kullanici"; // Tablo adı

// Bağlantıyı oluştur
$dbConn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Bağlantı hatası kontrolü
if (!$dbConn) {
    die("Bağlantı kurulamadı: " . mysqli_connect_error());
}

// Formdan gelen verileri alma
$name = $_POST["register_name"];
$surname = $_POST["register_surname"];
$email = $_POST["register_email"];
$adres = $_POST["register_adres"];
$password = $_POST["register_password"];
$birthday = $_POST["register_birthday"];
$hesap_tipi = $_POST["hesap_tipi"];

// Şifreyi hashleme
// Kayıt sorgusu
$sql = "INSERT INTO $dbtable (ad, soyad, email, sifre, dogum_gunu, adres, hesap_tipi) VALUES ('$name', '$surname', '$email', '$password', '$birthday', '$adres', '$hesap_tipi')";
// Sorgunun çalıştırılması
if (mysqli_query($dbConn, $sql)) {
    echo "<script>alert('Kayıt Başarılı. Lütfen Giriş Yapın...');</script>";
    echo "<script>setTimeout(function() { window.location.href = '../users/master_admin/hesap_islem/hesap_ekle.php'; }, 1000);</script>";

    exit();
} else {
    echo "Kayıt işlemi başarısız: " . mysqli_error($dbConn);
}


// Bağlantıyı kapatma
mysqli_close($dbConn);
?>
