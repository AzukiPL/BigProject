<?php
    class ReservationsScripts {
        function __construct($connect)
        {
            $this->connect = $connect;
        }

        public function readReservations() {
            $query = "SELECT * FROM `reservations`, `repertoire`,`movies` WHERE `reservations`.`repertoire_id` = `repertoire`.`id` AND `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`localisation_id` = ".$_SESSION['cinemaLocalisation'];
            $result = mysqli_query($this->connect,$query);
            echo '<table>';
            echo '<tr class="tableRowColumns">';
            echo '<td>Verification Name</td>';
            echo '<td>Full-Fares</td>';
            echo '<td>Reduced-Fares</td>';
            echo '<td>Payment Method</td>';
            echo '<td>Cost</td>';
            echo '<td>Movie Name</td>';
            echo '<td>Room</td>';
            echo '<td>Type</td>';
            echo '<td>Date</td>';
            echo '<td>Time</td>';
            echo '</tr>';
            while($row = mysqli_fetch_array($result)) {
                $userName = $row['user_name'];
                $fullFares = $row['full-fare-amount'];
                $reducedFares = $row['reduced-fare-amount'];
                $payMethod = $row['pay_method'];
                $cost = $row['cost'];
                $movieName = $row['name'];
                $type = $row['2d/3d'];
                $date = $row['date'];
                $time = $row['time'];
                echo '<tr>';
                echo "<td>$userName</td>";
                echo "<td>$fullFares</td>";
                echo "<td>$reducedFares</td>";
                echo "<td>$payMethod</td>";
                echo "<td>$cost</td>";
                echo "<td>$movieName</td>";
                echo "<td>$type</td>";
                echo "<td>$date</td>";
                echo "<td>$time</td>";
                echo '</tr>';
            }
            echo '</table>';
        }
    }
?>