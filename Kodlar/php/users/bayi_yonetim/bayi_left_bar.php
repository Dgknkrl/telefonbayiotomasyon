<?php
 // Varsayılan bir id değeri ekledim, sizin kullanmanız gereken gerçek bir değeri buraya eklemelisiniz.
$id = $_GET['id'];
echo "<h2>Ürün İşlemleri</h2>";
echo '<ul>
  <li><a href="../urun_islem/urun_gor.php?id='.$id.'">Ürün Görüntüleme</a></li>
  <li><a href="../urun_islem/urun_ekle.php?id='.$id.'">Ürün Ekleme</a></li>
  <li><a href="../urun_islem/urun_sil.php?id='.$id.'">Ürün Silme</a></li>
</ul>';

echo "<h2>Bayi İşlemleri</h2>";
echo '<ul>
  <li><a href="../bayi_islem/bayi_gecmis_islem.php?id='.$id.'">Geçmiş İşlemler</a></li>
  <li><a href="../bayi_islem/bayi_bilgi.php?id='.$id.'">Bayi Bilgileri</a></li>
</ul>';

echo "<h2>Hesap İşlemleri</h2>";
echo '<ul>
  <li><a href="../hesap_islem/hesap_ayarlari_degis.php?id='.$id.'">Hesap Değiştir</a></li>
  <li><a href="../hesap_islem/hesap_destek.php?id='.$id.'">Destek</a></li>
  <li><a href="../hesap_islem/cikis_yap.php">Çıkış Yap</a></li>
</ul>';
?>
