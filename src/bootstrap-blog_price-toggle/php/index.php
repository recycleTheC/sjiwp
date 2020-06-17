<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$connection = mysqli_connect($server, $username, $password, $db) or die("Greška prilikom spajanja na bazu podataka!"); 

$query = "SELECT * FROM hotels";
$result = mysqli_query($connection,$query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $hotels[] = array("id" => $row["id"], "name" => $row["name"], "price" => (int)$row["price"], "description" => $row["description"], "picture" => $row["picture"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hawaii</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <div class="container">
            <a href="/" class="navbar-brand">Hawaii</a>
    
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#hotels">Prices</a>
                </li>
            </ul>
        </div>
        
    </nav>

    <div class="container">
        <div class="jumbotron mt-4 text-white" style="background-image: url('../pan.jpg'); background-size: cover;">
            <h1>Welcome to Hawaii!</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa doloremque perspiciatis aspernatur, necessitatibus error asperiores, similique quaerat consequuntur beatae quod delectus praesentium quia, est maiores? Atque ratione ea nam fuga.</p>
            <button class="btn btn-primary">Call to Action!</button>
        </div>

        <div class="card-deck text-center mb-4">
            <div class="card">
                <img src="../1.jpg" alt="Hawaii" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Sunny Hawaii</h5>
                    <div class="card-text">
                        <blockquote class="card-text">
                            <p>Hawaii is not a state of mind, but a state of grace.</p>
                            <footer class="blockquote-footer card-text">Paul Theroux</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Find out more!</button>
                </div>
            </div>

            <div class="card">
                <img src="../2.jpg" alt="Hawaii" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Surfing Life</h5>

                    <div class="card-text">
                        <blockquote class="card-text">
                            <p>You can't stop the waves, but you can learn to surf.</p>
                        </blockquote>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">Find out more!</button>
                </div>
            </div>

            <div class="card">
                <img src="../3.jpg" alt="Hawaii" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Relaxing Holiday</h5>

                    <div class="card-text">
                        <blockquote class="card-text">
                            <p>Misty waterfalls, sun-kissed beaches, thrilling opportunities for adventure — our six Hawaiian Islands invite you to slow down and take a break.</p>
                        </blockquote>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">Find out more!</button>
                </div>
            </div>

            <div class="card">
                <img src="../4.jpg" alt="Hawaii" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Beautiful Nature</h5>

                    <div class="card-text">
                        <blockquote class="card-text">
                            <p>Hawaii is home to several national parks and 50 state parks that pay tribute to the islands' unique beauty and native culture.</p>
                        </blockquote>
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary">Find out more!</button>
                </div>
            </div>

        </div>

        <h4 class="text-center" id="hotels">Hotels</h4>

        <div class="card-deck text-center mt-4 mb-4">

            <?php
                for($i = 0; $i < 4; $i++){
                    echo '<div class="card">';
                        echo '<img src="../'.$hotels[$i]["picture"].'" alt="Hawaii" class="card-img-top">';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$hotels[$i]["name"].'</h5>';
                            echo '<div class="card-text">';
                                echo '<p>'.$hotels[$i]["description"].'</p>';
                            echo '</div>';
                        echo '</div>';

                        echo '<div class="card-footer">';
                            echo '<button class="btn btn-success">Book Now!</button>';
                            echo '<button class="btn btn-primary mt-3" data-toggle="collapse" href="#price'.$i.'" role="button" aria-expanded="false" aria-controls="price'.$i.'">Check Price!</button>';
                            echo '<div class="collapse mt-2" id="price'.$i.'">';
                                echo '<p>$'.$hotels[$i]["price"].' per night</p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>

        </div>

    </div>

</body>
</html>