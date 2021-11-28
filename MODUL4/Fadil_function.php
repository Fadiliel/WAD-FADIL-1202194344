<?php
$conn= mysqli_connect("localhost","root","","wad_modul4");

function query($query){
    global $conn;
    $result =mysqli_query($conn,$query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
}


function registrasi($data){
    global $conn;

    $nama=stripcslashes($data["nama"]);
    $email=mysqli_real_escape_string($conn,$data["email"]);
  
    $nohp=strtolower(stripcslashes($data["no_hp"]));
    $password=mysqli_real_escape_string($conn,$data["password"]);
    $password2=mysqli_real_escape_string($conn,$data["password2"]);

            //cek email tersedia
    $result= mysqli_query($conn,"SELECT email FROM users where email='$email'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Email sudah terdaftar!');
              </script>";
              return false;

    }



    //cek konfirmasi password
    if ($password !== $password2 ) {
       echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
            return false;

    }

    // enkripsi password
    $password= password_hash($password,PASSWORD_DEFAULT);
   
    //input ke database
    
    mysqli_query($conn,"INSERT INTO users (id,nama,email,password,no_hp) VALUES('','$nama','$email','$password','$nohp')");

    return mysqli_affected_rows($conn);
}

function ubahuser($data){
 
	global $conn;
    $id=$data["id"];
	$nama= $data['nama'];
    $nohp = $data['nohp'];
	$password = $data['password'];
    $password2 = $data['password2'];

      //cek konfirmasi password
    if ($password !== $password2 ) {
       echo "<script>
                alert('konfirmasi password tidak sesuai!');
                 document.location.href='Fadil_profile.php';
            </script>";

            exit;

    }

    // enkripsi password
    $password= password_hash($password,PASSWORD_DEFAULT);
   
	
		mysqli_query($conn, "UPDATE users SET nama='$nama',  password='$password', no_hp='$nohp' WHERE id = '$id'");
		return mysqli_affected_rows($conn);
   
}

function tambahperjalanan($data){
	global $conn;
	$id = $data['id'];
	$namatempat = $data['namatempat'];
	$lokasi = $data['lokasi'];
    $harga = $data['harga'];
    $date = $data['date'];
	
    
	$tambah = "INSERT INTO bookings VALUES ('', '$id', '$namatempat', '$lokasi', '$harga','$date')";
	mysqli_query($conn, $tambah);
	return mysqli_affected_rows($conn);
    exit;
}

function hapus($id){
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM bookings where id= '$id'");
    $row = mysqli_fetch_array($sql);
    mysqli_query($conn, "DELETE FROM bookings WHERE id= $id");
    
    return mysqli_affected_rows($conn);
}
?>