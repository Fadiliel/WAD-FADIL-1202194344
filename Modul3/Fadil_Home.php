<?php
require 'Fadil_Functions.php';
$sql = mysqli_query($conn, "SELECT * FROM buku_table");
$cek = mysqli_num_rows($sql);

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Home</title>
  </head>
  <body>

    <nav class="navbar navbar-light bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="Fadil_home.php"><img class="bg-img" src="img/Logo.png" alt="Logo"></a>
        <div class="">
        <a href="Fadil_TambahBuku.php"> <button class="btn btn-primary" type="submit">Tambah Buku</button></a>
        </div>
      </div>
    </nav>

    <?php
    if($cek == 0){
      echo'
      <br><br><br><br><br><br><br>
      <div class="container" style="padding-bottom: 120px;">
        <div class="row text-center " >
          <div class="col">
            <h3>Belum Ada Buku</h3>
            <hr size="5px" class="bg-primary">
            <h6>Silahkan Menambahkan Buku</h6>
          </div>
        </div>
      </div>';
    }
    ?>

    <br>
    <div class="isi container">
        <div class="row">
          <?php while ($row2 = mysqli_fetch_assoc($sql)) {?>
            <div class="col-4" >
              <div class="card " style="width: 350px; height: 500px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <img src="images/<?= $row2['gambar']?>" class="card-img-top" width="350px" height="350px">
                <div class="card-body">
                  <h5 class="card-title"><?= $row2 ['judul_buku']?></h5>
                  <p class="card-text"><?= $row2 ['deskripsi']?></p>
                  <a href="Fadil_DetailBuku.php?id=<?= $row2["id_buku"];?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                </div>
              </div>
            </div>
          <?php } ?>  
        </div>   
    </div>      



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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
  </body>
</html>