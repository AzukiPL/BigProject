<?php
    class addRepertoireScripts {
        function __construct($homePath) {
            $this->$homePath = $homePath;
        }

        function readMovieList() {
            $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
            $query = "SELECT * FROM `movies`;";
            $result = mysqli_query($connect,$query);
            echo '<select name="movie_id">';
            while($row=mysqli_fetch_array($result)) {
                echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
            }
            echo '</select>';
        }
        function readRoomsList($connect) {
            $query = "SELECT * FROM `rooms` WHERE `rooms`.`localisation_id` = ".$_SESSION['cinemaLocalisation'].";";
            $result = mysqli_query($connect,$query);
            echo '<select name="room">';
            while($row=mysqli_fetch_array($result)) {
                echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
            }
            echo '</select>';
        }
        function deleteRecords($connect) {
            if(!empty($_GET['repertoireId'])) {
                $id = $_GET['repertoireId'];
                mysqli_query($connect,"DELETE FROM `repertoire` WHERE `repertoire`.`id` = $id");
            }
            if(!empty($_GET['repertoireDate'])) {
                $date = $_GET['repertoireDate'];
                mysqli_query($connect, "DELETE FROM `repertoire` WHERE `repertoire`.`date` = '$date'");
            }
        }

        function addRecords($connect) {
            if(!empty($_POST['movie_id']) && !empty($_POST['type']) && !empty($_POST['date']) && !empty($_POST['time']) ) {
                $movie_id = $_POST['movie_id'];
                $type = $_POST['type'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $localisation = $_SESSION['cinemaLocalisation'];
                $room = $_POST['room'];
                $queryInsert = 'INSERT INTO `repertoire` ( `movie_id`, `2d/3d`, `date`, `time`, `localisation_id`, `room_id`) VALUES ("'.$movie_id.'","'.$type.'","'.$date.'","'.$time.'","'.$localisation.'", "'.$room.'" );';
                mysqli_query($connect,$queryInsert);
            }
        }
    }
?>