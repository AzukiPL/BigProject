<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="profile.css">
    <?php 
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
        $connect = mysqli_connect("localhost", "ProjectCinema", "zaq1@WSX", "projectcinema" );

        if(!empty($_GET['reservationID'])) {
            $reservation = $_GET['reservationID'];
            $query = "SELECT * FROM `reservations`, `repertoire` WHERE `reservations`.`id` = '$reservation' AND `reservations`.`repertoire_id` = `repertoire`.`id`;";
            $result1 = mysqli_query($connect,$query);
            while($row = mysqli_fetch_array($result1)) {
                $fullFare = $row['full-fare-amount'];
                $reducedFare = $row['reduced-fare-amount'];
                $sold = $row['sold_fares'];
                $query = "UPDATE `repertoire` SET `sold_fares` = '".$sold-($fullFare+$reducedFare)."' WHERE '".$row['repertoire_id']."' = `repertoire`.`id`;";
                $result = mysqli_query($connect,$query);
            }

            $query = "DELETE FROM `reservations` WHERE `reservations`.`id` = '$reservation'";
            $result = mysqli_query($connect,$query);
        }

    ?>
</head>
<body>
    <div id="reservations">
        <?php
            $user = $_SESSION['logged_in'];
            $query = "SELECT *, `reservations`.`id` AS 'reservationID' FROM `reservations`, `repertoire`, `movies`, `localisations` WHERE `reservations`.`user_name` = '$user' AND `reservations`.`isAccount` = '1' AND `reservations`.`repertoire_id` = `repertoire`.`id` AND `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`localisation_id` = `localisations`.`id`;";
            $result = mysqli_query($connect,$query);
            echo '<table>';
            echo '<tr id="tableColumns">';
            echo '<td>Verification Name</td>';
            echo '<td>Type</td>';
            echo '<td>Date</td>';
            echo '<td>Time</td>';
            echo '<td>Town</td>';
            echo '<td>Street</td>';
            echo '<td>Local</td>';
            echo '<td>Full fares</td>';
            echo '<td>Reduced fares</td>';
            echo '<td>payment</td>';
            echo '<td>Cancel Reservation</td>';
            echo '</tr>';
            while ($row=mysqli_fetch_array($result)) {
                echo '<tr class="tableRecords">';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['2d/3d'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['time'].'</td>';
                echo '<td>'.$row['town'].'</td>';
                echo '<td>'.$row['street'].'</td>';
                echo '<td>'.$row['local'].'</td>';
                echo '<td>'.$row['full-fare-amount'].'</td>';
                echo '<td>'.$row['reduced-fare-amount'].'</td>';
                echo '<td>'.$row['pay_method'].'</td>';
                echo '<td><a href="profile.php?reservationID='.$row['reservationID'].'">Cancel Reservation</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        ?>
    </div>
    <?php 
        mysqli_close($connect);
        $sesLoad->onLoad(); 
    ?>

</body>
</html>