<?php
require 'Fadil_function.php';

if (isset($_POST["daftar"])){
    
    if(registrasi($_POST)>0){
        echo "<script>
                alert('akun berhasil di daftarkan!'); 
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

    <title>Home</title>
  </head>
  <body>
  <!-- Navbar -->
    <nav class="navbar bg-dark">
      <div class="container">
        <a class="navbar-brand " href="#">EAD TRAVEL</a>
        <div class="d-flex">
        <a class="nav-link active disabled" aria-current="page" href="Fadil_register.php"> Register</a>
        <a class="nav-link login"href="Fadil_login.php"> Login</a>
        </div>
      </div>
    </nav>
  <!-- End Navbar -->
  

  <!-- Card Login -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 ">
                   <div class="card  " style="margin-top:70px; width: 28rem;">
                    <div class="card-body p-4">
                            <h4 class="card-title text-center">Register</h4>
                            <hr>
                            <form method="POST" action="">
                                <label for="nama"> <b>Nama</b></label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required>
                                <br>
                                <label for="email"> <b>Email</b></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat E-mail" required>
                                <br>
                                <label for="no_hp"> <b>Nomor Handphone</b></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone" required>
                                <br>
                                <label for="password"> <b>Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Anda" required>
                                <br>
                                <label for="password2"> <b>Komfirmasi Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Kata Sandi Anda" required>
                                <br>
                                <br>
                                <center><button type="submit" name="daftar" class="btn btn-primary" style="width: 140px;">Daftar</button></center>
                                <br>
                                <p class="text-center">Anda sudah punya akun? <a href="Fadiil_login.php">Login</a></p>
                            </form>       
                    </div>
                </div> 
            </div>
        </div>
    </div>
  <!-- End Card Login  -->


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