<?php
$id_booking = rand();
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
$building_type = $_POST['building_type'];
$price = $_POST['price'];
$phone_number = $_POST['phone_number'];
$for_query = '';
$service_catering = 0;
$service_decor = 0;   
$service_sound = 0; 
if(!empty($_POST["service"])){

    foreach($_POST["service"] as $service){

     $for_query .= $service . ', ';

        if($service == "Catering"){
            $service_catering = 700;
        }elseif($service == "Decoration"){
            $service_decor = 450;   
        }elseif($service == "Sound System"){
            $service_sound = 250;   
        }
    }
    $total = $price + $service_catering + $service_decor + $service_sound;
}else{
    $for_query = "no service";
    $total = $price + $service_catering + $service_decor + $service_sound;
}
$checkin = date('d-m-Y H:i:s', strtotime("$date $time"));


$timestamp = strtotime($time) + 60*60*$duration;

$timecheckout = date('H:i', $timestamp);

$checkout = date('d-m-Y H:i:s', strtotime("$date $timecheckout"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <section id="Booking">
        <section id="nav">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#2b448f;">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav" style="margin-left: auto; margin-right:auto;">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="booking.php">Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section id="Table">
           <center><h1>Thank you <?php echo $name;?> for Reserving</h1></center>
           <br/>
           <center><h2>Please Check Your Reservation Details</h2></center>
           <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">Building Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Service</th>
                    <th scope="col">Total Service</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $id_booking?></th>
                    <td><?php echo $name?></td>
                    <td><?php echo $checkin?></td>
                    <td><?php echo $checkout?></td>
                    <td><?php echo $building_type?></td>
                    <td><?php echo $phone_number?></td>
                    <td><?php echo $for_query?></td>
                    <td><?php echo $total?></td>
                    </tr>
                </tbody>
            </table>
        </section>
</body>
<footer
    style="text-align:center; position:absolute; bottom:0; width:100%; height: 30px; background-color:rgb(247,247,247);">
    Fadil_1202194344
</footer>

</html>