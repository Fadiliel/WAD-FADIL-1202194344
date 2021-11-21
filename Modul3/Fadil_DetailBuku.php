<?php

require "Fadil_Functions.php";
$id = $_GET["id"];


$buku = query("SELECT * FROM buku_table WHERE id_buku = $id")[0];

if (!isset($_GET["id"])) {
    header("Location: Fadil_Home.php");
}


if (isset($_POST["submit"])) {

   if (ubah($_POST) > 0 ) {
       echo "<script> 
                alert('data berhasil diubah!');
                document.location.href = 'Fadil_Home.php';
            </script>";
   }else {
       echo "<script> 
                alert('data gagal diubah!');
                document.location.href = 'Fadil_DetailBuku.php';
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




    <div class="container pt-5">
        <div class="row">
            <div class="col-10 offset-1 ">
                <div class=" card px-4 shadow-lg p-3 mb-5 bg-body rounded" style="width: 100%;">
                    <h1 class="text-center pt-5">Detail Buku</h1>
                    <Center><img src="images/<?= $buku["gambar"]; ?>" class="card-img-top pt-4 pb-3" style="width: 55%;"></Center>
                    <center><hr size="5px" class="bg-primary "></center>
                    <div class="card-body">
                        

                        <p> <b>Judul Buku : </b> </p>
                        <p> <?= $buku["judul_buku"]; ?> </p>

                        <p> <b>Penulis : </b> </p>
                        <p> <?= $buku["penulis_buku"]; ?> </p>

                        <p> <b>Tahun Terbit: </b> </p>
                        <p> <?= $buku["tahun_terbit"]; ?> </p>

                        <p> <b>Deskripsi : </b> </p>
                        <p> <?= $buku["deskripsi"]; ?> </p>

                        <p> <b>Bahasa : </b> </p>
                        <p> <?= $buku["bahasa"]; ?> </p>

                        <p> <b>Tag : </b> </p>
                        <p> <?= $buku["tag"]; ?> </p>
                    </div>

                    <div class="row pb-5">
                        <div class="col-6 ">
                           <center> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 95%">Sunting</button></center>
                        </div>
                        <div class="col-6 ">
                            <center><a href="Fadil_Hapus.php?id=<?= $buku["id_buku"];?>"> <button style="width: 95%;" class="btn btn-danger" type="submit">Hapus</button></a></center>
                        </div> 
                    </div>
                </div>      
            </div>
        </div>
    </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $buku["id_buku"]; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $buku["gambar"]; ?>">
                            
                            <label class="pb-2" for="judul"><b>Judul Buku</b></label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh: Pemrograman Web Bersama EAD"
                            value="<?= $buku["judul_buku"]; ?>">
                            <br>

                            
                            <label class="pb-2" for="penulis"><b>Penulis</b></label>
                            <input type="text" class="form-control" id="penulis" name="penulis" value="Fadil_1202194344" readonly>
                            <br>

                            
                            <label class="pb-2" for="thn_terbit"><b>Tahun Terbit</b></label>
                            <input type="text" class="form-control" id="thn_terbit" name="thn_terbit"placeholder="Contoh: 1990" 
                            value="<?= $buku["tahun_terbit"]; ?>">
                            <br>

                            
                            <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $buku["deskripsi"]; ?></textarea>
                            <br>

                            
                            <label  class="form-label pl-1"><b>Bahasa</b></label>
                            &emsp;
                            <input type="radio" id="html" name="bahasa" value="Indonesia" 
                            <?php if($buku["bahasa"]=='Indonesia') echo 'checked'?> >
                            <label for="Indonesia">Indonesia</label>

                            <input type="radio" id="lainnya" name="bahasa" value="Lainnya"
                            <?php if($buku["bahasa"]=='Lainnya') echo 'checked'?>>
                            <label for="lainnya">Lainnya</label>
                            <br><br>

                            
                            <?php $tag = $buku['tag'];
                                $a= explode(", ",$tag);?>

                            <label  class="form-label pl-1"><b>Tag</b></label>
                            &emsp;
                            <label><input type="checkbox" name="tag[]" value="Pemrograman"
                            <?php in_array ('Pemrograman', $a) ? print "checked" : ""; ?>
                            > Pemrograman</label>&emsp;

                            <label><input type="checkbox" name="tag[]" value="Website"
                            <?php in_array ('Website', $a) ? print "checked" : ""; ?>
                            > Website</label>&emsp;

                            <label><input type="checkbox" name="tag[]" value="Java"
                            <?php in_array ('Java', $a) ? print "checked" : ""; ?>
                            > Java</label>&emsp;

                            <label><input type="checkbox" name="tag[]" value="OOP"
                            <?php in_array ('OOP', $a) ? print "checked" : ""; ?>
                            > OOP</label>&emsp;

                            <label><input type="checkbox" name="tag[]" value="MVC"
                            <?php in_array ('MVC', $a) ? print "checked" : ""; ?>
                            > MVC</label>&emsp;

                            <label><input type="checkbox" name="tag[]" value="Kalkulus"
                            <?php in_array ('Kalkulus', $a) ? print "checked" : ""; ?>
                            > Kalkulus</label>&emsp;

                            <label><input type="checkbox" name="tag[]" value="Lainnya"
                            <?php in_array ('Lainnya', $a) ? print "checked" : ""; ?>
                            > Lainnya</label>&emsp;
                            <br>

                            
                            <div class="pt-3">
                                <label for="gambar" class="form-label"><b>Gambar </b></label><br>
                                <img src="images/<?= $buku['gambar'];?>" style="width: 60px;height: 70px;padding-bottom: 10px">
                                <input class="form-control" type="file" id="gambar" name="gambar" >
                            </div>
                            <br>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
                </div>
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

