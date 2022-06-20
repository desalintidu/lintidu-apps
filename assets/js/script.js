let keyword = document.getElementById('keyword');
let tombolCari = document.getElementById('tombol-cari');
let container = document.getElementById('container');

keyword.addEventListener('keyup', function(){
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200 ) {
    container.innerHTML = xhr.responseText;
    }
  }
  xhr.open('GET', 'ajax/coba.txt', true);
  xhr.send;
});