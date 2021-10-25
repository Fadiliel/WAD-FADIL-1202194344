<?php
//data array
$bok = array( array("id" => 1,"url"=>"img/1.jpeg", "name"=>"Nusantara Hall" , "price"=>2000, "capacity" => 5000,"parkir" => "Free Parking", "ac" => "Full AC","service" => "Cleaning Service", "covid19" => "Covid-19 Health Protocol"),
               array("id" => 2,"url"=>"img/2.jpeg", "name"=>"Garuda Hall" , "price"=>1000, "capacity" => 1000, "parkir" => "Free Parking", "ac" => "Full AC","service" => "No Cleaning Service", "covid19" => "Covid-19 Health Protocol"),
               array("id" => 3,"url"=>"img/3.jpeg", "name"=>"Gedung Serba Guna" , "price"=>500, "capacity" => 500, "parkir" => "No Free Parking", "ac" => "No Full AC","service" => "No Cleaning Service", "covid19" => "Covid-19 Health Protocol") 
             ); 

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
<style>
    
</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
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
    <section id="Heading">
        <div class="heading">
            <h4 style="text-align: center; height: 40px; vertical-align: middle;
line-height: 40px;">

                WELCOME TO ESD VENUE RESERVATION
            </h4>
        </div>

    </section>
    <section>
        <div class="container-md" style="margin-left: auto; margin-right:auto; max-width : 80%">
            <p style="text-align: center; background-color:rgb(43, 68, 143); color:white; height:40px; vertical-align: middle;
line-height: 40px;">
                Find your
                best deal for your
                event, here!</p>
            <div class="row row-cols-1 row-cols-md-3 g-3" style="max-width: 90%;margin-left: auto; margin-right:auto;">
            <?php  
                foreach($book as $row) {         
                echo"<div class='col'>";
                    echo "<div class='card'>";
                        echo"<img src=".$row['url']." class='card-img-top' alt='...' style='height:300px;'>";
                        echo"<div class='card-body'>";
                            echo"<h5 class='card-title'>".$row['name']."</h5>";
                            echo"<p class='card-text'>";
                            echo "$ ".$row['price']."<br>";
                            echo $row['capacity']." Capacity</p>";
                        echo"</div>";
                        echo"<ul class='list-group list-group-flush' style='text-align: center;'>";
                        if($row['parkir'] == "Free Parking"){
                            echo"<li class='list-group-item' style='color: rgb(28,138,95);'><b> Free Parking</b></li>";   
                        }else{
                            echo"<li class='list-group-item' style='color: red;'><b> No Free Parking</b></li>";   
                        }

                        if($row['ac'] == "Full AC"){
                            echo"<li class='list-group-item' style='color: rgb(28,138,95);'><b>Full AC</b></li>";
                        }else{
                            echo"<li class='list-group-item' style='color: red;'><b>No Full AC</b></li>";
                        }
                        if($row['service'] == "Cleaning Service"){
                            echo"<li class='list-group-item' style='color: rgb(28,138,95);'><b>Cleaning Service</b></li>";
                        }else{
                            echo"<li class='list-group-item' style='color: red;'><b>No Cleaning Service</b></li>";
                        }

                        if($row['covid19'] == "Covid-19 Health Protocol"){
                            echo"<li class='list-group-item' style='color: rgb(28,138,95);'><b>Covid-19 Health Protocol</b>";
                        }else{
                            echo"<li class='list-group-item' style='color: red;'><b>No Covid-19 Health Protocol</b>";
                        }
                        echo"</li>";
                        echo"</ul>";
                        echo"<div class='card-body' style='text-align: center; background-color: rgb(247,247,247);'>";
                        echo"<a class='btn btn-primary' href='booknow.php?id=$row[id]'>Book Now</a>";
                        echo"</div>:";
                    echo"</div>";
                echo"</div>";
                }
                ?>
              
            </div>
        </div>
    </section>

</body>

<footer
    style="text-align:center; position:absolute; bottom:0; width:100%; height: 30px; background-color:rgb(247,247,247);">
    <h6>Fadil_1202194344</h6>
</footer>

</html>