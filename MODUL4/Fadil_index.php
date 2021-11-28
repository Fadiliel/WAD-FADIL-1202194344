<?php
session_start();
require 'Fadil_function.php';
if (!isset($_SESSION["login"])) {
    header("Location: Fadil_login.php");
    exit;
}else {
  if (isset($_COOKIE['id']) && isset($_COOKIE['key'])){
          $id=$_COOKIE["id"];
        }else {
         $id=$_SESSION["id"];
       }
 

  $result=mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
  $row =mysqli_fetch_assoc($result);
  $nama=$row["nama"];

}

if (isset($_POST["tambah"])){
    
    if(tambahperjalanan($_POST)>0){
        echo "<script>
                alert('Perjalanan Berhasil ditambahkan'); 
            </script>";
            
    }else
    echo mysqli_error($conn);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <title>Home</title>
  </head>
  <body>
  <!-- Navbar -->
    <nav class="navbar bg-dark">
      <div class="container">
        <a class="navbar-brand " href="Fadil_index.php">EAD TRAVEL</a>
        <div class="d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-shopping-cart"></i> &nbsp; <?= $nama; ?>
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item text-primary" href="Fadil_profile.php"><i class="far fa-user"></i>&nbsp; Profile</a></li>
                    <li><a class="dropdown-item text-primary my-3" href="Fadil_cart.php"><i class="fas fa-shopping-cart"></i>&nbsp; Booking Cart</a></li>
                    <li><a class="dropdown-item text-primary" href="Fadil_logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                </ul>
            </li>
        </div>
      </div>
    </nav>
  <!-- End Navbar -->
  

  <!-- Content -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card my-2" style="width: 100%;background-color:dodgerblue;">
            <div class="card-body">
              <h4 class="card-title text-center text-light">EAD TRAVEL</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          <div class="card" style="width: 100%;">
            <img src="image/labuan_bajo.jpg" class="card-img-top" width="300px" height="300px">
            <div class="card-body">
              <h5 class="card-title "><b> Labuan Bajo, NTT </b></h5>
              <p class="card-text">Labuan Bajo merupakan salah satu kelurahan yang berada di kecamatan Komodo, Kabupaten Manggarai Barat, provinsi Nusa Tenggara Timur, Indonesia. Kelurahan Labuan Bajo juga merupakan ibu kota dari kecamatan Kecamatan Komodo dan ibu kota Kabupaten Manggarai Barat. Sedang diwacanakan pengembangan Kota Labuan Bajo.</p>
              <hr>
              <p><b>Rp. 10.000.000</b></p>
              <hr>
             <center> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggalpesan1" style="width: 95%">Pesan Tiket</button></center>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 100%;">
            <img src="image/gunung_bromo.jpeg" class="card-img-top" width="300px" height="300px">
            <div class="card-body">
              <h5 class="card-title "><b> Gunung Bromo, Malang </b></h5>
              <p class="card-text">Gunung Bromo atau dalam bahasa Tengger dieja "Brama", adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang.</p>
              <hr>
              <p><b>Rp. 5.000.000</b></p>
              <hr>
             <center> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggalpesan2" style="width: 95%">Pesan Tiket</button></center>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card" style="width: 100%;">
            <img src="image/raja_ampat.jpg" class="card-img-top" width="300px" height="300px">
            <div class="card-body">
              <h5 class="card-title "><b> Raja Ampat, NTT </b></h5>
              <p class="card-text">Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.Raja Ampat memiliki 4 pulau utama, yaitu Pulau Waigeo, Pulau Batanta, Pulau Salawati, dan Pulau Misool.</p>
              <hr>
              <p><b>Rp. 20.000.000</b></p>
              <hr>
             <center> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggalpesan3" style="width: 95%">Pesan Tiket</button></center>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  <!-- Content  -->

  <!-- modal pesan -->
    <div class="modal fade" id="tanggalpesan1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
         <form method="post" action="" >
         <div class="modal-body">
            <p><b>Tanggal Perjalanan</b></p>
            <input type="date" class="form-control" id="date" name="date" required>
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <input type="hidden" name="namatempat" value="Labuan Bajo">
            <input type="hidden" name="lokasi" value="NTT">
            <input type="hidden" name="harga" value="Rp. 10.000.000">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="tambah" class="btn btn-primary">Tambahkan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="tanggalpesan2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
         <form method="post" action="" >
         <div class="modal-body">
            <p><b>Tanggal Perjalanan</b></p>
            <input type="date" class="form-control" id="date" name="date" required>
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <input type="hidden" name="namatempat" value="Gunung Bromo">
            <input type="hidden" name="lokasi" value="Malang">
            <input type="hidden" name="harga" value="Rp. 7.000.000">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="tambah" class="btn btn-primary">Tambahkan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="tanggalpesan3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
         <form method="post" action="" >
         <div class="modal-body">
            <p><b>Tanggal Perjalanan</b></p>
            <input type="date" class="form-control" id="date" name="date" required>
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <input type="hidden" name="namatempat" value="Raja Ampat">
            <input type="hidden" name="lokasi" value="NTT">
            <input type="hidden" name="harga" value="Rp. 20.000.000">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="tambah" class="btn btn-primary">Tambahkan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!-- end modal pesan -->

  <!-- footer -->
      <footer class=" fix-bottom bg-dark text-light">
        <div class="container ">
          <div class="row text-center">
            <div class="col">
              <p>©2021 Copyright <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Fadil_1202194344</a></p>
            </div>
          </div>
        </div>
      </footer>
  <!-- end footer -->

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Nama &emsp;: Fadil </p>
            <p>NIM &emsp;&emsp;:  1202194344</p>
        </div>
        </div>
    </div>
    </div>
  <!-- end modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
  </body>
</html>