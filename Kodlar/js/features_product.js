function choice_photo() {
    var topImg = document.getElementById("main_pictures_img");
    var clickedImg = event.target;

    // Tıklanan resmin src'sini alıp üstteki ana resmin src'si ile değiştir
    topImg.src = clickedImg.src;

    // Tüm alt resimlerin etkin sınıfını kaldır
    var bottomImgs = document.getElementsByClassName("bottom_pictures_img");
    for (var i = 0; i < bottomImgs.length; i++) {
        bottomImgs[i].classList.remove("active");
    }

    // Tıklanan resmin etkin sınıfını ekle
    clickedImg.classList.add("active");
}
