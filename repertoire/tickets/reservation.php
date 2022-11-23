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
        $repertoireId = $_POST['id'];
        $movieName = $_POST['movieName'];
        $movieTime = $_POST['movieTime'];
        $localisation = $_POST['localisation'];
        $fullFare = $_POST['normalTicket'];
        $payMethod = $_POST['payMethod'];
        
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
        if(!empty($_POST['reducedTicket'])) $reducedFare = $_POST['reducedTicket'];
        else $reducedFare = 0;

        if(isset($_SESSION['logged_in'])) {
            $user = $_SESSION['logged_in'];
            $logValue = 1;
            $fullPrice = 16;
            $reducedPrice = 11;
        }
        else {
            $user = $_POST['userName'];
            $logValue = 0;
            $fullPrice = 20;
            $reducedPrice = 15;
        }

        $cost = ($fullFare*$fullPrice)+($reducedFare*$reducedPrice);
        $query = "SELECT *, `repertoire`.`id` AS 'repertoire_id' FROM `repertoire`, `movies` WHERE `repertoire`.`id` = '$repertoireId' AND `repertoire`.`movie_id` = `movies`.`id`";
        $resultinput = mysqli_query($connect, $query);
        if(!$row=mysqli_fetch_row($resultinput)) {echo "<div style='color:red;'>something went wrong. reservation was not made correctly<div>";}
        mysqli_data_seek($resultinput,0);
        while($row = mysqli_fetch_array($resultinput)) {
            if($movieName == $row['name'] && $repertoireId == $row['repertoire_id']) {
                $sold = $row['sold_fares'];
                $query = "INSERT INTO `reservations` (`user_name`, `repertoire_id`, `cost`, `full-fare-amount`, `reduced-fare-amount`, `isAccount`, `pay_method`, `reservation_date`) VALUES ('".$user."', '".$row['repertoire_id']."', '".$cost."', '".$fullFare."', '".$reducedFare."', '".$logValue."', '".$payMethod."', '".date("Y-m-d")."');";
                $result = mysqli_query($connect,$query);
                $query = "UPDATE `repertoire` SET `sold_fares` = '".$sold+$fullFare+$reducedFare."' WHERE `repertoire`.`id` = '$repertoireId';";
                $result = mysqli_query($connect,$query);
            }
        }
        ?>

        <div id="panel">
            <div id="left-side">
                <form action="" method="POST" id="reservation-form">
                    <table>
                        <tr><td colspan="2">Reservation for:</td></tr>
                        <tr>
                            <td>Movie name:</td><td><?php echo $movieName; ?></td>
                        </tr>
                        <tr>
                            <td>Cinema: </td><td><?php echo "$town $street $local";  ?></td>
                        </tr>
                        <tr>
                            <td>Verification name</td><td><?php echo $user;  ?></td>
                        </tr>
                        <tr>
                            <td>Full-fares (<?php echo $fullPrice ?> PLN):</td><td><?php echo $fullFare ?>x</td>
                        </tr>
                        <tr>
                            <td>Reduced-fares (<?php echo $reducedPrice ?> PLN):</td><td><?php echo $reducedFare ?>x</td>
                        </tr>
                        <tr>
                            <td>Total cost:</td><td><?php echo $cost; ?> PLN</td>
                        </tr>
                        <tr>
                            <td>Payment Method</td><td><?php echo $payMethod ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="../../index.php"><input class="confirmButton" type="button" value="Go back to home Page"></a></td>
                        </tr>
                    </table>
                </form>
            </div>

            <div id="right-side">
                <?php
                    $query = 'SELECT * FROM `movies` WHERE `movies`.`name` = "'.$movieName.'"';
                    $result = mysqli_query($connect,$query);
                    while($row = mysqli_fetch_array($result)) {
                    echo '<img src="../../graphics/movies/'.$row['image'].'">';
                    }
                ?>
            </div>
        </div>

        <?php
            mysqli_close($connect);
            $sesLoad->onLoad();
        ?>
</body>
</html>