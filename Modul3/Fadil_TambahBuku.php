<?php

require 'Fadil_Functions.php';

if (isset($_POST["submit"])) {

   if (tambah($_POST) > 0 ) {
       echo "<script> 
                alert('data berhasil ditambahkan!');
                document.location.href = 'Fadil_Home.php';
            </script>";
   }else {
       echo "<script> 
                alert('data gagal ditambahkan!');
                document.location.href = 'Fadil_TambahBuku.php';
            </script>";
   }
}
?>



<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Tambah  Buku</title>
  </head>
  <body>
   <div class="container">
       <div class="row text-center pt-5">
           <div class="col">
               <h1>Tambah Data Buku</h1>
           </div>
       </div>
       <div class="row">
           <div class="col">
               <form method="post" action="" enctype="multipart/form-data">
                        <!-- Judul -->
                        <label class="pb-2" for="judul"><b>Judul Buku</b></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh: Pemrograman Web Bersama EAD">
                        <br>

                        <!-- Penulis -->
                        <label class="pb-2" for="penulis"><b>Penulis</b></label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="Fadil_1202194344" readonly>
                        <br>

                        <!-- Tahun terbit -->
                        <label class="pb-2" for="thn_terbit"><b>Tahun Terbit</b></label>
                        <input type="text" class="form-control" id="thn_terbit" name="thn_terbit"placeholder="Contoh: 1990" >
                        <br>

                        <!-- Deskripsi -->
                        <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        <br>

                        <!-- Bahasa -->
                        <label  class="form-label pl-1"><b>Bahasa</b></label>
                        &emsp;
                        <input type="radio" id="html" name="bahasa" value="Indonesia">
                        <label for="Indonesia">Indonesia</label>
                        <input type="radio" id="lainnya" name="bahasa" value="Lainnya">
                        <label for="lainnya">Lainnya</label>
                        <br><br>

                        <!-- Tag -->
                        <label  class="form-label pl-1"><b>Tag</b></label>
                        &emsp;
                        <label><input type="checkbox" name="tag[]" value="Pemrograman">Pemrograman</label>&emsp;
                        <label><input type="checkbox" name="tag[]" value="Website">Website</label>&emsp;
                        <label><input type="checkbox" name="tag[]" value="Java">Java</label>&emsp;
                        <label><input type="checkbox" name="tag[]" value="OOP">OOP</label>&emsp;
                        <label><input type="checkbox" name="tag[]" value="MVC">MVC</label>&emsp;
                        <label><input type="checkbox" name="tag[]" value="Kalkulus">Kalkulus</label>&emsp;
                        <label><input type="checkbox" name="tag[]" value="Lainnya">Lainnya</label>&emsp;
                        <br>

                        <!-- Gambar -->
                        <div class="pt-3">
                            <label for="gambar" class="form-label"><b>Gambar</b></label>
                            <input class="form-control" type="file" id="gambar" name="gambar" required >
                        </div>
                        <br>
                        
                        <!-- Button -->
                    <center><button type="submit" name="submit" class="btn btn-primary" style= "width:400px">+Tambah</button></center>  
             </form>
           </div>
       </div>
   </div>


     <!-- footer -->
      <footer class="fix-bottom" style="background-color: #f5f5f5;">
        <div class="container ">
          <div class="row text-center">
            <div class="col">
              <img src="img/Logo.png" alt="">
              <h3>Perpustakaan EAD</h3>
              <p>©Fadil_1202194344</p>
            </div>
          </div>
        </div>
      </footer>
  <!-- end footer -->

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
  </body>
</html>