<?php
//data array
$id_data = $_GET['id'];
$book = array( array("id" => 1,"url"=>"img/1.jpeg", "name"=>"Nusantara Hall" , "price"=>2000, "capacity" => 5000,"parkir" => "Free Parking", "ac" => "Full AC","service" => "Cleaning Service", "covid19" => "Covid-19 Health Protocol"),
               array("id" => 2,"url"=>"img/2.jpeg", "name"=>"Garuda Hall" , "price"=>1000, "capacity" => 1000, "parkir" => "Free Parking", "ac" => "Full AC","service" => "No Cleaning Service", "covid19" => "Covid-19 Health Protocol"),
               array("id" => 3,"url"=>"img/3.jpeg", "name"=>"Gedung Serba Guna" , "price"=>500, "capacity" => 500, "parkir" => "No Free Parking", "ac" => "No Full AC","service" => "No Cleaning Service", "covid19" => "Covid-19 Health Protocol") 
             ); 
$a = $id_data - 1;
$data_price = $book[$a]['price'];
$data_url = $book[$a]['url'];
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
                            <li class="nav-item">
                                <a class="nav-link" href="mybooking.php">My Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section id="form">
            <div class="container-md" style="margin-left: auto; margin-right:auto; max-width : 80%; margin-top : 20px;">
                <p
                    style="text-align: center; background-color:rgb(43, 68, 143); color:white; height:40px; vertical-align: middle; line-height: 40px;">
                    Reserve your venue now!</p>
            </div>
            <div class="container" style="border: 1px solid rgb(228,228,228); max-width : 78%; border-radius : 5px">
                <div class="row">
                    <div class="col">
                        <img src=<?php echo $data_url;?>
                            style="height: 300px; margin-left: auto; margin-right:auto; display:block; margin-top: 200px;"
                            alt="">
                    </div>
                    <div class="col">
                    <form action="prosesbooking.php" method="post">
                        <div class="mb-3" style="margin-left: auto;">
                            <label for="name" class="form-label">Name</label>
                            <input class="form-control" name="name" type="text" value="Fadil_1202194344"
                                aria-label="readonly input example" readonly>
                        </div>

                        <div class="mb-3" style="margin-left: auto;">
                            <label for="date" class="form-label">Event Date</label>
                            <input type="date" id="date" name="date" class="form-control" placeholder="mm / dd / yyyy">
                        </div>

                        <div class="mb-3" style="margin-left: auto;">
                            <label for="start" class="form-label">Start Time</label>
                            <input type="time" name ="time" id="time" class="form-control" placeholder="-- : -- --">
                        </div>

                        <div class="mb-3" style="margin-left: auto;">
                            <label for="duration" class="form-label">Duration (Hours)</label>
                            <input type="number" name="duration" id="duration" class="form-control" min="1" max="12">
                        </div>

                        <div class="mb-3" style="margin-left: auto;">
                            <label for="type" class="form-label">Building Type</label>
                            <select id="packages" name="building_type" class="form-select" aria-label="Default select example">
                                <option <?php if ($id_data == 1) { echo 'selected'; }?> value="Nusantara Hall">Nusantara Hall</option>
                                <option <?php if ($id_data == 2) { echo 'selected'; }?> value="Garuda Hall">Garuda Hall</option>
                                <option <?php if ($id_data == 3) { echo 'selected'; }?> value="Gedung Serba Guna">Gedung Serba Guna</option>
                            </select>
                        </div>

                        <div class="mb-3" style="margin-left: auto;">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" id="price" name="price" class="form-control" min="1" max="12" value=<?php echo $data_price;?> readonly="true">
                        </div>

                        <div class="mb-3" style="margin-left: auto;">
                            <label for="duration" class="form-label">Phone Number</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3" style="margin-left: auto;">
                            <label for="service"> Add Service(s):</label>
                            <div class="form-check">

                                <input class="form-check-input" name="service[]" type="checkbox" value="Catering" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Catering / $700
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="service[]" type="checkbox" value="Decoration" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Decoration / $450
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="service[]" type="checkbox" value="Sound System" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Sound System / $250
                                </label>
                            </div>
                            <div class="d-grid gap-2" style="margin-top : 30px;">
                                <input class="btn btn-primary" type="submit" value="book" name="book">                        
                            </div>
                        </div>
                        </form>
                    </div>
        </section>
</body>
<footer
    style="text-align:center; position:absolute; bottom:0; width:100%; height: 30px; background-color:rgb(247,247,247);">
    Fadil_1202194344
</footer>

</html>