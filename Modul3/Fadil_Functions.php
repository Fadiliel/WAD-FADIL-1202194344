    <?php

    $conn= mysqli_connect("localhost","root","","modul3");

    function query($query){
        global $connection;
        $result =mysqli_query($conn,$query);
        $rows=[];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        return $rows;
    }

    function tambah ($data){
        global $conn;
        $judul = htmlspecialchars($data["judul"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $tahun_terbit = htmlspecialchars($data["thn_terbit"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $tag = implode(', ', $data["tag"]);
        $bahasa = htmlspecialchars($data["bahasa"]);


        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }

        $query = "INSERT INTO buku_tables
                    VALUES
                  ('','$judul', '$penulis', '$thn_terbit', '$deskripsi', '$gambar','$tag','$bahasa')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload() {

        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES ['gambar']['error'];
        $tmpName = $_FILES ['gambar']['tmp_name'];


        if ( $error === 4 ) {
            echo "<script>
                    alert('Pilih gambar dahulu !');
                </script>";
            return false;
        }


        $ekstensiGambarValid = ['jpeg', 'jpg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('File tidak di didukung!');
                </script>";
                return false;
        }


        if ($ukuranFile > 1000000) {
                    echo "<script>
                    alert('Ukuran gambar terlalu besar !');
                </script>";
                return false;
        }


        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'images/'. $namaFileBaru);

        return $namaFileBaru;

    }


    function hapus($id){
        global $conn;
        $sql = mysqli_query($conn, "SELECT * FROM buku_table where id_buku = '$id'");
        $row = mysqli_fetch_array($sql);
        unlink("images/$row[gambar]");
        mysqli_query($conn, "DELETE FROM buku_table WHERE id_buku = $id");

        return mysqli_affected_rows($conn);
    }


    function ubah($data){
        global $conn;
        $id = $data["id"];
        $judul = htmlspecialchars($data["judul"]);
        $penulis = htmlspecialchars($data["penulis"]);
        $thn_terbit = htmlspecialchars($data["thn_terbit"]);
        $deskripsi = htmlspecialchars($data["deskripsi"]);
        $tag = implode(', ', $data["tag"]);
        $bahasa = htmlspecialchars($data["bahasa"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        //cek apakah user upload gambar baru
        if ($_FILES['gambar']['error'] === 4) {
           $gambar = $gambarLama;
        }else{
            unlink("images/$gambarLama");
            $gambar = upload();
        }


        $query = "UPDATE buku_table SET 
                    judul_buku = '$judul', 
                    penulis_buku = '$penulis', 
                    tahun_terbit = '$thn_terbit', 
                    deskripsi = '$deskripsi',
                    gambar = '$gambar',
                    tag = '$tag',
                    bahasa = '$bahasa'WHERE id_buku = $id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }



    ?>
