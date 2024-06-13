

//ürün sayfasına gitme kodu
function go_products(tid,id) {
  var telefonID = tid; // Buton ID'sinden telefon ID'sini alıyoruz
  var url = "http://localhost/Kodlar/php/products/features_product.php?id=" + id + "&telefon_id=" + telefonID;
  window.location.href = url; // Yeni URL'ye yönlendirme işlemi
}

//4 Tane dosya yüklenmesini kontrol eder....
function checkFileCount(input) {
    // Seçilen dosyaların sayısını kontrol et
    if (input.files.length > 4 || input.files.length<4) {
        alert("Sadece 4 dosya seçebilirsiniz.");
        // Dosya seçimini temizle
        input.value = "";
    }
}


document.getElementById("register_form").addEventListener("submit", function (event) {
  event.preventDefault(); // Formun normal gönderimini engelle

  // Formdan gelen verileri alma
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var adres = document.getElementById("phone").value;
  var password = document.getElementById("password").value;
  var birthday = document.getElementById("birthday").value;
  var hesap_tipi = document.getElementById("hesap_tipi").value;

  // AJAX kullanarak formu gönder
  var xhr = new XMLHttpRequest();
  var url = "../contact/add_acount.php"; // Formun gönderileceği PHP dosyasının adı

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
          alert(xhr.responseText); // Sunucudan gelen cevabı göster
      }
  };

  var params = "register_name=" + name + "&register_surname=" + surname + "&register_email=" + email + "&register_adres=" + adres + "&register_password=" + password + "&register_birthday=" + birthday + "&hesap_tipi=" + hesap_tipi;
  xhr.send(params);
});
function confirm_delete(id) {
  document.getElementById('delete_confirm_yes').style.display = 'inline-block';
  document.getElementById('delete_confirm_no').style.display = 'inline-block';

  // Silinecek ürünün ID'sini sakla
  document.getElementById('delete_product_id').value = id;
}

function delete_product() {
  // Onaylandığında silinecek ürünün ID'sini al
  var product_id = document.getElementById('delete_product_id').value;

  // AJAX ile PHP scripti çağırarak ürünü sil
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Silme işlemi başarılıysa sayfayı yenile
      if (xhr.responseText === "success") {
        alert("Ürün başarıyla silindi.");
        window.location.reload();
      } else {
        alert("Ürün silinemedi.");
      }
    }
  };
  xhr.open("GET", "delete_product.php?id=" + product_id, true);
  xhr.send();
}


function cancel_delete() {
  // Silme işlemi iptal edildiğinde Evet ve Hayır butonlarını gizle
  document.getElementById('delete_confirm_yes').style.display = 'none';
  document.getElementById('delete_confirm_no').style.display = 'none';

  // Saklanan ürün ID'sini temizle
  document.getElementById('delete_product_id').value = '';
}


