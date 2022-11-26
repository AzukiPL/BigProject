<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
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
        if(isset($_SESSION['logged_in'])) {
            if($_SESSION['logged_in'] != 0)
                include_once('indexUser.php');
        }
        else {
            include_once('indexGuest.php');
        }
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>