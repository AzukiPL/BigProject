<?php
    class repertoire {
        function __construct()
        {
            // $today = date("Y-m-d H:i:s"); 
            
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
        private function writeCurrentDay($plusDays) {
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
                case 7: return "Sunday"; break;
            }
        }

        public function setRepertoireList($plusDays) {
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
            $query = 'SELECT * FROM `repertoire`, `movies` WHERE `repertoire`.`date` = "'.$today.'" AND `movies`.id = `repertoire`.`movie_id` ORDER BY `repertoire`.`time`;';
            $result = mysqli_query($connect,$query);
           
            echo '<div class="repertoire-date">'.$this->writeCurrentDay($plusDays).' '.$today.'</div>';
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="repertoire" style="background-image:url(../graphics/movies/'.$row['image'].');">';
                echo '<div class="repertoire-info-background">';
                echo '<div class="repertoire-movie-title">'.$row['name'].'</div>';
                echo '<div class="repertoire-movie-tag">';
                $queryGenres = 'SELECT * FROM `movies`,`genres` WHERE `genres`.`movie_id` = '.$row['movie_id'].' AND `movies`.id = '.$row['movie_id'].' ORDER BY `genres`.`priority` DESC LIMIT 4;';
                $resultGenres = mysqli_query($connect,$queryGenres);
                while ($row2 = mysqli_fetch_array($resultGenres)) {
                    echo '<div class="repertoire-genre">'.$row2['genre'].'</div>';
                }
                echo '</div>';
                echo '<div class="repertoire-length">'.$row['length'].' minutes</div>'; 
                echo '<div class="repertoire-time">'.$row['2d/3d'].' | At: '.$row['time'].'</div>'; 
                echo '<form action="tickets/index.php" method="post"> <input type="text" style="display:none;" name="movie-name" value="'.$row['name'].'"><input type="text" style="display:none;" name="movie-time" value="'.$row['time'].'"><input type="submit" class="buy-tickets" value="Buy Tickets"></form>';
                echo '<div class="repertoire-trailer"><video width="100%" height="100%" controls> <source src="trailers/'.$row['trailer'].'" type="video/mp4"></video></div>';
                echo '</div>'; // info background
                echo '</div>'; // repertoire
            }
            mysqli_close($connect);
        }
    }

?>