  <?php
  session_start();

  require 'Fadil_function.php';

  if (!isset($_SESSION["login"])) {
    header("Location: Fadil_login.php");
    return false;

  }else{
    $id=$_SESSION["id"];
    $result=mysqli_query($conn, "SELECT * FROM users WHERE id= '$id'");
    $row = mysqli_fetch_assoc($resort);


  }
    if(isset($_POST["simpan"])) {
        if(ubahuser($_POST)>0){
            echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href='Fadil_index.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href='Fadil_profile.php';
            </script>
            ";
        }
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
                  <a class="nav-link dropdown-toggle" href="p" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="fas fa-shopping-cart"></i> &nbsp; <?= $row['nama']; ?>
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


    <!-- Card Login -->
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-10 ">
                     <div class="card  " style="margin-top:70px; width: 100%;">
                      <div class="card-body p-4">
                              <h4 class="card-title text-center">Profile</h4>
                              <br>
                              <form method="POST" action="">
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                 <div class="mb-3 row">
                                      <label for="staticEmail" class="col-sm-3 col-form-label"><b>Email</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $row['email']?>">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="nama" class="col-sm-3 col-form-label"><b>Nama</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']?>">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="nohp" class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $row['no_hp']?>">
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="mb-3 row">
                                      <label for="password" class="col-sm-3 col-form-label"><b>Kata Sandi</b></label>
                                      <div class="col-sm-9">
                                      <input type="password" class="form-control" id="password" name="password">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="password2" class="col-sm-3 col-form-label"><b>Konfirmasi Kata Sandi</b></label>
                                      <div class="col-sm-9">
                                      <input type="password" class="form-control" id="password2" name="password2">
                                      </div>
                                  </div>
                                  <div class="mb-3 row">
                                      <label for="navbar" class="col-sm-3 col-form-label"><b>Warna Navbar</b></label>
                                      <div class="col-sm-9">
                                      <input type="text" class="form-control" id="navbar">
                                      </div>
                                  </div>
                                  <Center> <button type="submit" name="simpan" class="btn btn-primary" style= "width:140px">Simpan</button>
                                  &emsp;
                                 <a href="Fadil_index.php" class="btn btn-danger" style="width:140px">Cancel</a></Center>
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
