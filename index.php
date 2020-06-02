<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pendaftaran HeroAcademy</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body class="bg-light">

  <div class="bg-dark p-3 text-light text-center">
    <h4>HeroCode</h4>
    <p style="max-width: 640px; margin: 0 auto;">
      HeroCode adalah sebuah komunitas yang mewadahi teman-teman untuk berkembang menjadi manusia yang lebih baik, bermanfaat. Bersama-sama dalam ketaatan. Bersama-sama menuju surga-Nya Allah. Yosh.
    </p>
  </div>

  <div class="container mt-5">
    <div class="row">

      <div class="col-md-5">
        <h3>Pendaftaran Member HeroCode</h3>

        <div id="myForm">

          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" class="form-control">
          </div>

          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" class="form-control">
          </div>

          <div class="form-group">
            <label for="divisi">Pilih Divisi Apa?</label>
            <select id="divisi" class="form-control">
              <option>Kaderisasi</option>
              <option>Logistik</option>
              <option>Syiar</option>
              <option>Hubungan Masyarakat</option>
            </select>
          </div>

          <button id="simpan" class="btn btn-primary mt-2">Simpan</button>
          <button id="edit" class="btn btn-success mt-2">Edit</button>

        </div>
        
      </div>

      <div class="col-md-7">

        <h3>Daftar Calon Member</h3>

        <div class="form-group">
          <label for="search">Pencarian</label>
          <input type="text" id="search" class="form-control">
        </div>
        
        <table style="display: table;" class="table table-responsive table-striped table-hover">

          <thead>
            <tr>
              <th>#</th>
              <th>NIM</th>
              <th>Nama Lengkap</th>
              <th>Divisi</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody id="data">
            <!-- letakkan data nya disini -->
          </tbody>
          
        </table>
        
      </div>

      
    </div>
  </div>

  <script src="script.js"></script>
  
</body>
</html>