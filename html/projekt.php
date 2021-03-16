<?php




function check_db($topfnummer){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greencare";

// Create connection
    $conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pflanze WHERE topf=".$topfnummer.";";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

                if($row["topf"]==$topfnummer) {

                    if ($row["pflanze"] == "kaktus") {

                        return "../assets/Kaktus.png";

                    }
                    elseif ($row["pflanze"] == "orchidee") {

                        return "../assets/orchideen.png";

                    }
                    elseif ($row["pflanze"] == "efeu") {

                        return "../assets/Epfeu.png";


                    }
                    else{
                        return "../assets/Blumentopf.png";

                    }

                }
                elseif ($row["topf"]!=$topfnummer){

                    return check_img($topfnummer);

                }


        }

        }


    else{
       return check_img($topfnummer);
    }


    $conn->close();

}



function insert_db($topfnummer, $pflanze){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greencare";


    $connection = mysqli_connect($servername, $username, $password, $dbname) or die ("Fehler im System");
    $sql = "UPDATE pflanze SET topf=".$topfnummer." WHERE pflanze ='".$pflanze."'; ";
    $connection->query($sql);
    mysqli_close($connection);

}


function check_img($topfnummer){


    if (!empty($_POST)) {

        if(isset($_POST["topf".$topfnummer])){

            if($_POST["topf".$topfnummer] == "kaktus"){

                return "../assets/Kaktus.png";


            }
            elseif($_POST["topf".$topfnummer]=="orchidee"){

                return "../assets/orchideen.png";

            }

            elseif ($_POST["topf".$topfnummer]=="efeu"){
                return "../assets/Epfeu.png";

            }

            else {

                return "../assets/Blumentopf.png";
            }
        }
        else{

            return "../assets/Blumentopf.png";

        }


    }

    else{
        return "../assets/Blumentopf.png";
    }

}


function reset_db($topfnummer){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greencare";


    $connection = mysqli_connect($servername, $username, $password, $dbname) or die ("Fehler im System");
    $sql = "UPDATE pflanze SET topf=0 WHERE topf = ".$topfnummer."; ";
    $connection->query($sql);
    mysqli_close($connection);

}

function check_text($topfnummer){


    if (!empty($_POST)) {

        if(isset($_POST["topf".$topfnummer])){



            if($_POST["topf".$topfnummer] == "kaktus"){
                insert_db($topfnummer,"kaktus");
                return "Kaktus";


            }
            elseif($_POST["topf".$topfnummer]=="orchidee"){
                insert_db($topfnummer,"orchidee");
                return"Orchidee";

            }

            elseif ($_POST["topf".$topfnummer]=="efeu"){
                insert_db($topfnummer,"efeu");
                return "efeu";
            }




        }
        else{

            return "Nicht Ausgewählt";

        }


    }

    else{
        return "Nicht Ausgewählt";
    }

}




function check_db_text($topfnummer){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greencare";

// Create connection
    $conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pflanze WHERE topf=".$topfnummer.";";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            if($row["topf"]==$topfnummer) {

                if (!empty($_POST["topf".$topfnummer])&&isset($_POST)&&$_POST["topf".$topfnummer]=="standart"){
                    reset_db($topfnummer);

                }

                if ($row["pflanze"] == "kaktus") {

                    return "Kaktus";

                }
                elseif ($row["pflanze"] == "orchidee") {

                    return "Orchidee";

                }
                elseif ($row["pflanze"] == "efeu") {

                    return "Efeu";


                }
                else{
                    return check_text($topfnummer);

                }

            }
            elseif ($row["topf"]!=$topfnummer){

                return check_text($topfnummer);

            }


        }

    }


    else{
        return check_text($topfnummer);
    }


    $conn->close();

}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Yanone Kaffeesatz">

   <link rel="stylesheet" href="../style.css" >      
    <style>
      body {
        font-family: 'Yanone Kaffeesatz', serif;
        font-size: 30px;
      }
    
    </style> 
<link rel="icon" href="../assets/GreenCare Logo.jpg">
    <title>GreenCare</title>
  </head>
  <body>
      
<div class="projekt">
    <div class="container-fluid   text-white" style="background-color: rgb(191, 191, 191,50%);">
        <nav class="navbar navbar-expand-lg navbar-light  text-center ">
            <a class="navbar-brand" href="../index.html">
                <img src="../assets/GreenCare Logo.jpg" width="100" height="100">  
                </a>
                <p class="pr-3 topic1" >GreenCare</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link text-white" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="projekt.php">Projekt</a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
<hr>


<div class="container mt-5 text-center pt-5 pb-4"  style="background-color:  rgb(191, 191, 191,50%); ">
    <h1>Beginnen Sie mit Ihrer Automation</h1>
</div>

<div class="mar"></div>
<hr>
</div>

<div class="container text-center">
    <div class="container  text-center mt-5 mb-5 " style="font-size: 80px; ">
      <h1>Wählen sie Ihre Pflanzen</h1>    
  </div>
</div>
    


  <div class="container text-center mb-4">
      <form method="post">

        <div class="card-deck">
          <div class="card" style="width:400px">
            <img class="card-img-top" src=<?php echo check_db(1);?> alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Pflanze</h4>
              <p class="card-text"><?php echo check_db_text(1);?></p>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="kaktus" name="topf1"  id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Kaktus
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="orchidee" name="topf1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Orchidee
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="efeu" name="topf1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Efeu
                        </label>
                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="standart" name="topf1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Standart
                        </label>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card" style="width:400px">
            <img class="card-img-top" src=<?php echo check_db(2); ?> alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Pflanze</h4>
              <p class="card-text"><?php echo check_db_text(2);?></p>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="kaktus" name="topf2" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Kaktus
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="orchidee" name="topf2" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Orchidee
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="efeu" name="topf2" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Efeu
                        </label>
                    </div>

                  <div class="dropdown-divider"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="standart" name="topf2" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Standart
                        </label>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card" style="width:400px">
            <img class="card-img-top" src=<?php  echo check_db(3);  ?> alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Pflanze</h4>
              <p class="card-text"><?php echo check_db_text(3); ?></p>
              <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="kaktus" name="topf3" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Kaktus
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="orchidee" name="topf3" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Orchidee
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="efeu" name="topf3" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Efeu
                        </label>
                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="standart" name="topf3" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Standart
                        </label>
                    </div>
                </div>
              </div>
            </div>
          </div>

        </div>

          <div class="container"><input class="btn btn-info mt-5" type="submit" value="Refresh" style="font-size: 25px"> </div>

    </form>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>