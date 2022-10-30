var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var bungkus = document.getElementById('bungkus');

keyword.addEventListener('keyup', function() {

    //ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            bungkus.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/ajaxDataLocal.php?keyword=' + keyword.value, true);
    xhr.send();

})
