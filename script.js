
// FUNGSI MENAMPILKAN DATA DARI JSON VIA GET.PHP 
function loadData() {
  
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get.php");
  xhr.onload = function() {
    var data = document.getElementById("data").innerHTML = this.responseText;
  }
  
  xhr.send();
}

// PANGGIL FUNGSI LOAD DATA
loadData();


var btnSimpan = document.getElementById("simpan");
btnSimpan.addEventListener("click", simpanData);

// FUNGSI SIMPAN DATA
function simpanData() {

  // AMBIL DATA 
  var nim = document.getElementById("nim");
  var nama = document.getElementById("nama");
  var divisi = document.getElementById("divisi");
  
  var xhr = new XMLHttpRequest();

  xhr.open("GET", "simpan.php?nim=" + nim.value + "&nama=" + nama.value + "&divisi=" + divisi.value);
  
  xhr.onload = function() {
    // console.log(this.responseText);
    loadData();
  }
  
  xhr.send();
  
  // KOSONGKAN INPUT
  nim.value = "";
  nama.value = "";
  divisi.value = "Kaderisasi";
}

// FUNGSI HAPUS DATA
function hapusData(idMember) {

  if ( confirm("Apakah kamu yakin ingin menghapus data ini?") ) {
    
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "hapus.php?id=" + idMember);
  
    xhr.onload = function() {
      var data = document.getElementById("data").innerHTML = this.responseText;
    }
    
    xhr.send();
    
  }
  
}

var inputSearch = document.getElementById("search");
inputSearch.addEventListener("keyup", cari);

function cari() {
  var keyword = document.getElementById("search").value;
  console.log(keyword);

  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get.php?keyword=" + keyword);

  xhr.onload = function() {
    data.innerHTML = this.responseText;
  }
  
  xhr.send();
}

// FUNGSI AMBIL DATA
function getEditData(idMember) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "dataEdit.php?id=" + idMember);

  xhr.onload = function() {
    console.log(this.responseText);
    data = JSON.parse(this.responseText);

    var nim = document.getElementById("nim");
    nim.value = data.nim;
    var nama = document.getElementById("nama");
    nama.value = data.nama;
    var divisi = document.getElementById("divisi");
    divisi.value = data.divisi;
  }
  
  xhr.send();
}

// FUNGSI EDIT DATA
var btnEdit = document.getElementById("edit");
btnEdit.addEventListener("click", editData);

function editData() {
  
  // AMBIL DATA 
  var nim = document.getElementById("nim");
  var nama = document.getElementById("nama");
  var divisi = document.getElementById("divisi");
  
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "edit.php?nim=" + nim.value + "&nama=" + nama.value + "&divisi=" + divisi.value);

  xhr.onload = function() {
    console.log(this.responseText);
    var data = document.getElementById("data").innerHTML = this.responseText;
    alert("Data telah berhasil diupdate!");
  }
  
  xhr.send();

  nim.value = "";
  nama.value = "";
  divisi.value = "";

}