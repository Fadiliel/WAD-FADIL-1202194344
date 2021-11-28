<?php
session_start();
require 'Fadil_function.php';

//cek ada cookie?
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT email FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
    }

}


if (isset($_SESSION["login"])) {
    header("Location: Fadil_index.php");
    exit;
}


if (isset ($_POST["login"])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
      

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ){
            // set session
            $_SESSION["login"] = true;
            $_SESSION["id"]=$row["id"];

            //cek remember me
            if (isset($_POST["remember"])) {
                // Buat COOKIE
                
                setcookie('id', $row['id'], time()+3600);
                setcookie('key', hash('sha256',$row['email']), time()+3600);
            }
            

            echo "
            <script>
                alert('Anda Berhasil Login');
                document.location.href='Fadil_index.php';
            </script>
            ";
            exit;
        }
        
    }

    $error = true;
    if (isset($error)) {
        echo "<script>
                alert('username atau password salah'); 
            </script>";
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

    <title>Home</title>
  </head>
  <body>
  <!-- Navbar -->
    <nav class="navbar bg-dark">
      <div class="container">
        <a class="navbar-brand " href="#">EAD TRAVEL</a>
        <div class="d-flex">
        <a class="nav-link register" aria-current="page" href="Fadil_register.php"> Register</a>
        <a class="nav-link disabled "href="Fadil_login.php"> Login</a>
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
                            <h4 class="card-title text-center">Login</h4>
                            <hr>
                            <form method="POST" action="">
                                <label for="email"> <b>Email</b></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat E-mail">
                                <br>
                                <label for="password"> <b>Kata Sandi</b></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Anda">
                                <br>
                                <input type="checkbox" name="remember" id="remember">                
                                <label for="remember">Remember Me </label>
                                <br><br>
                                <center><button type="submit" name="login" class="btn btn-primary" style="width: 140px;">Login</button></center>
                                <br>
                                <p class="text-center">Anda belum punya akun? <a href="Fadil_register.php">Register</a></p>
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
            <p>Nama &emsp;: Fadhil Ramadhan </p>
            <p>NIM &emsp;&emsp;:  1202194344</p>
        </div>
        </div>
    </div>
    </div>
  <!-- end modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
  </body>
</html>