<?php
session_start();
require 'Fadil_function.php';
if (!isset($_SESSION["login"])) {
    header("Location: Fadil_login.php");
    exit;
}else {
 

  $id=$_SESSION["id"];
  $result=mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
  $row =mysqli_fetch_assoc($result);
  $nama=$row["nama"];

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
                    <li><a class="dropdown-item text-primary my-3" href="#"><i class="fas fa-shopping-cart"></i>&nbsp; Booking Cart</a></li>
                    <li><a class="dropdown-item text-primary" href="Fadil_logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                </ul>
            </li>
        </div>
      </div>
    </nav>
  <!-- End Navbar -->
  

  <!-- Content -->
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Tempat</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Tanggal Perjalanan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                    $id_user= $row["id"];
                                    $result=mysqli_query($conn, "SELECT * FROM bookings WHERE user_id=$id");
									$no=1; 
									while ($data = mysqli_fetch_array($result)) : ?>
									<tr>
													<td><h6><?php echo $no++; ?></h6></td>
													<td><h6><?php echo $data['nama_tempat']; ?></h6></td>
													<td><h6><?php echo $data['lokasi']; ?></h6></td>

													<td><h6><?php echo $data['tanggal']; ?></h6></td>
                                                    <td><h6><?php echo $data['harga']; ?></h6></td>
													<td>
														<a href="fadil_hapus.php?id=<?php echo $data['id'];?>" class="btn btn-danger btn-lg"><i class="fas fa-trash-alt"></a></i>
														
													</td>
												</tr>
												
											<?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Content  -->

 

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