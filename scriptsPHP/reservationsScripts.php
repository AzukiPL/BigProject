<?php
    class ReservationsScripts {
        function __construct($connect)
        {
            $this->connect = $connect;
        }

        public function readReservations() {
            $query = "SELECT *, `reservations`.`id` AS 'reservation_id' FROM `reservations`, `repertoire`,`movies` WHERE `reservations`.`repertoire_id` = `repertoire`.`id` AND `repertoire`.`movie_id` = `movies`.`id` AND `reservations`.`isCompleted` = 0 AND `repertoire`.`localisation_id` = ".$_SESSION['cinemaLocalisation'];         
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
            echo '<td>Action</td>';
            echo '</tr>';
            while($row = mysqli_fetch_array($result)) {
                $userName = $row['user_name'];
                $fullFares = $row['full-fare-amount'];
                $reducedFares = $row['reduced-fare-amount'];
                $payMethod = $row['pay_method'];
                $cost = $row['cost'];
                $movieName = $row['name'];
                //room name declare
                $query2 = "SELECT `rooms`.`name` FROM `rooms` WHERE `rooms`.`id` = '".$row['room_id']."';";
                $result2 = mysqli_query($this->connect, $query2);
                while($room = mysqli_fetch_array($result2))
                $room2 = $room['name'];
                //continuation of other declarations
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
                echo "<td>$room2</td>"; // Room name
                echo "<td>$type</td>";
                echo "<td>$date</td>";
                echo "<td>$time</td>";
                echo "<td><a href='reservations.php?id=".$row['reservation_id']."'>Confirm</a></td>";
                echo '</tr>';
            }
            echo '</table>';
        }

        public function confirmation() {
            if(!empty($_GET['id']))
            {
                $id = $_GET['id'];
                $query = "UPDATE `reservations` SET `isCompleted` = '1' WHERE `reservations`.id = $id";         
                $result = mysqli_query($this->connect,$query);
            }
        }
        public function deleteOutdatedRecords() {
            $query = "SELECT *, `reservations`.`id` AS 'reservation_id' FROM `reservations`, `repertoire`,`movies` WHERE `reservations`.`repertoire_id` = `repertoire`.`id` AND `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`localisation_id` = ".$_SESSION['cinemaLocalisation'];         
            $result = mysqli_query($this->connect,$query);
            while($row = mysqli_fetch_array($result)) {
                $year = date("Y")-1;
                $month = date("m")-1;
                $day = date("d")-1;
                $deletionTime = "'$year-$month-$day'";
                $queryDelete = "DELETE FROM `reservations` WHERE `reservations`.`reservation_date` < $deletionTime";
                $resultDelete = mysqli_query($this->connect,$queryDelete);
            }
        }
    }
?>