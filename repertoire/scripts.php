<?php
    class repertoire {
        function __construct()
        {
        
        }

        public function setCorrentDay($plusDays=0) {
            if($plusDays == 0) {
                echo "Today";
            }
            elseif ($plusDays == 1) {
                echo "Tomorrow";
            }
            else {
                while(date("w")+$plusDays > 7) {
                    $plusDays -= 7;
                }
                switch(date("w")+$plusDays) {
                    case 1: echo "Monday"; break;
                    case 2: echo "Tuesday"; break;
                    case 3: echo "Wednesday"; break;
                    case 4: echo "Thursday"; break;
                    case 5: echo "Friday"; break;
                    case 6: echo "Saturday"; break;
                    case 7: echo "Sunday"; break;
                }
            }
        }
        public function writeCurrentDay($plusDays) {
            while(date("w")+$plusDays > 7) {
                $plusDays -= 7;
            }
            switch(date("w")+$plusDays) {
                case 1: return "Monday"; break;
                case 2: return "Tuesday"; break;
                case 3: return "Wednesday"; break;
                case 4: return "Thursday"; break;
                case 5: return "Friday"; break;
                case 6: return "Saturday"; break;
                case 0: return "Sunday"; break;
            }
        }
        public function setSelectLocalisation() {
            $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
            $query = "SELECT * FROM `localisations`";
            $result = mysqli_query($connect,$query);
            echo '<select name="localisation">';
            echo '<option value="" selected="selected" disabled hidden> Select Cinema Localisation </option>';
            while($row=mysqli_fetch_array($result)) {
                $localisation = $row['town'].' '.$row['street'].' '.$row['local']; 
                if(!empty($_GET['localisation'] && $_GET['localisation'] == $row['id'])) { echo '<option value='.$row['id'].' selected="selected">'.$localisation.'</option>';}
                else echo '<option value='.$row['id'].'>'.$localisation.'</option>';

            }
            echo '</select>';
            mysqli_close($connect); 
        }

        public function setRepertoireList($plusDays) {
            if(!empty($_GET['localisation'])) {
                $localisation = $_GET['localisation'];
                $plusYear = 0;
                $plusMonths =0;
                while(date("d") + $plusDays > date("t")){
                    $plusDays -= date("t");
                    $plusMonths += 1;
                    if(date("m")+$plusMonths > 12)
                    {
                        $plusYear +=1;
                        $plusMonths -= 12;
                    }
                }
                $today = date("Y")+$plusYear."-".date("m")+$plusMonths."-".date("d")+$plusDays;
                $connect = mysqli_connect("localhost", "ProjectCinema", "zaq1@WSX", "projectcinema");
                $query = 'SELECT DISTINCT `repertoire`.`movie_id` AS "unique_id" FROM `repertoire`, `movies`, `rooms` WHERE `repertoire`.`date` = "'.$today.'" AND `movies`.`id` = `repertoire`.`movie_id` AND `repertoire`.`localisation_id` = '.$localisation.' AND `repertoire`.`sold_fares` < `rooms`.`available_space` AND `repertoire`.`room_id` = `rooms`.`id` ORDER BY `repertoire`.`time`;';
                $result = mysqli_query($connect,$query);
                echo '<div class="repertoire-date">'.$this->writeCurrentDay($plusDays).' '.$today.'</div>';
                if(!mysqli_fetch_array($result)) { echo '<div class="repertoire-date"> no repertoire planned for this day. </div>';}
                else {
                    mysqli_data_seek($result,0);
                    while($row = mysqli_fetch_array($result)) {
                        $this->setRepertoireRow($connect, $today, $localisation, $row['unique_id']);
                    }
                }
                mysqli_close($connect); 
            }
        }
        private function setRepertoireRow($connect, $today, $localisation, $id) {
            $query = 'SELECT *, `movies`.`name` AS "movie_name" FROM `repertoire`, `movies`, `rooms` WHERE `repertoire`.`date` = "'.$today.'" AND `movies`.`id` = `repertoire`.`movie_id` AND `repertoire`.`localisation_id` = '.$localisation.' AND `repertoire`.`sold_fares` < `rooms`.`available_space` AND `repertoire`.`room_id` = `rooms`.`id` AND `movies`.`id` = '.$id.' ORDER BY `repertoire`.`time` ASC ;';
            $result = mysqli_query($connect,$query);
            mysqli_data_seek($result,$id);
            $row = mysqli_fetch_array($result); 
            if($row) {
                echo '<div class="repertoire" style="background-image:url(../graphics/movies/'.$row['image'].');">';
                echo '<div class="repertoire-info-background">';
                $this->setMovieName($row['movie_name']);
                $this->setGenres($connect,$row['movie_id']);
                $this->setMovieLength($row['length']);
                $this->setMovieTime($connect, $row['movie_id'], $row['date'], $row['localisation_id']);
                
                echo '<div class="repertoire-trailer"><video width="100%" height="100%" controls> <source src="trailers/'.$row['trailer'].'" type="video/mp4"></video></div>';
                echo '</div>';
                echo '</div>'; // info background
            }
            else echo '<div class="repertoire-date"> no repertoire planned for this day. </div>';
        } 
        private function setMovieName($name) {
            echo '<div class="repertoire-movie-title">'.$name.'</div>';
        }
        private function setGenres($connect,$movie_id) {
            $queryGenres = 'SELECT * FROM `movies`,`genres` WHERE `genres`.`movie_id` = '.$movie_id.' AND `movies`.id = '.$movie_id.' ORDER BY `genres`.`priority` DESC LIMIT 4;';
            $resultGenres = mysqli_query($connect,$queryGenres);
            echo '<div class="repertoire-movie-tag">';
            while ($row2 = mysqli_fetch_array($resultGenres)) {
                echo '<div class="repertoire-genre">'.$row2['genre'].'</div>';
            }
            echo '</div>';
        }
        private function setMovieLength($length) {
            echo '<div class="repertoire-length">'.$length.' minutes</div>'; 
        }
        private function setMovieTime($connect, $movie_id, $repertoireDate, $cinemaLocalisation) {
            $query = "SELECT *, `movies`.`name` AS 'movie_name', `repertoire`.`id` FROM `repertoire`, `movies`, `rooms` WHERE `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`movie_id` = $movie_id AND `repertoire`.`date` = '$repertoireDate' AND `repertoire`.`localisation_id` = $cinemaLocalisation AND `repertoire`.`sold_fares` < `rooms`.`available_space` AND `repertoire`.`room_id` = `rooms`.`id`  ORDER BY `repertoire`.`time` DESC LIMIT 5;";
            $result = mysqli_query($connect,$query);
            echo '<div class="time"">';
            while($row = mysqli_fetch_array($result)) {
                echo '<form action="tickets/index.php" method="post">' ;
                echo '<select style="display:none; visibility:hidden;" name="movie-name"><option value="'.$row['movie_name'].'"></option></select>';
                echo '<select style="display:none; visibility:hidden;" name="movie-time"><option value="'.$row['time'].'"></option></select>';
                echo '<select style="display:none; visibility:hidden;" name="id"><option value="'.$row['id'].'"></option></select>';
                echo '<select type="text" style="display:none; visibility:hidden;" name="localisation"><option value="'.$cinemaLocalisation.'"></option></select>';
                echo '<input type="submit" class="repertoire-time noselect" value="'.$row['2d/3d'].' | At: '.$row['time'].'"></option></select>'; 
                echo '</form>';
            }
            $query = "SELECT *, `movies`.`name` AS 'movie_name' FROM `repertoire`, `movies`, `rooms` WHERE `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`movie_id` = $movie_id AND `repertoire`.`date` = '$repertoireDate' AND `repertoire`.`localisation_id` = $cinemaLocalisation AND `repertoire`.`sold_fares` >= `rooms`.`available_space` AND `repertoire`.`room_id` = `rooms`.`id`  ORDER BY `repertoire`.`time` DESC LIMIT 5;";
            $result = mysqli_query($connect,$query);
            
            while($row = mysqli_fetch_array($result)) {
                echo '<input type="submit" class="repertoire-time noselect" value="'.$row['time'].' SOLD"></option></select>'; 
            }
            echo '</div>';
        } 

    }

?>