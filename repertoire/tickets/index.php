<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectCinema</title>
    <link rel="stylesheet" href="tickets.css">
    <?php 
        include_once("../../scriptsPHP/header.php"); 
        $header = new header("../../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../../");
        $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
    ?>
</head>
<body>
    <?php
        $movieName = $_POST['movie-name'];
        $movieTime = $_POST['movie-time'];  
        $localisation = $_POST['localisation'];
        $town = "";
        $street = "";
        $local = "";
        $query = 'SELECT * FROM `localisations` WHERE `localisations`.`id` ='.$localisation;
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($result)) {
            $town = $row['town'];
            $street = $row['street'];
            $local = $row['local'];
        }
    ?>
    <div id="panel">
        <div id="left-side">
            <div id="name"><?php echo $movieName; ?></div><br><hr class="line">
            <div id="place"><?php echo "$town $street $local";  ?></div>
        </div>

        <div id="right-side"></div>
    </div>


    <?php 
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>