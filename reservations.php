<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style/forms.css">
    <?php 
        include_once("scriptsPHP/header.php"); 
        include_once("scriptsPHP/reservationsScripts.php");
        $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
        $header = new header(""); 
        $header->load(); 
        $sesLoad = new SessionLoad("");
        $scripts = new ReservationsScripts($connect);
        if(!isset($_SESSION['logged_in']))
        {
            if($_SESSION['logged_in'] != 1)
            header('location: login/index.php');
            if($_SESSION['permission'] < 5)
            header('location: login/profile.php');
        }
        $scripts->confirmation();
        $scripts->deleteOutdatedRecords();
    ?>
</head>
<body>
    <div class="loginForm">
        <form action="">
        <?php $scripts->readReservations(); ?>
        </form>
    </div>
    
    <?php 
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>