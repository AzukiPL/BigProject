<?php
    class Slider {
        function __construct($path, $tag)
        {
            $this->homePath = $path;
            $this->tag = $tag;
        }
        // ------------------------------------------------------------- Slider Main Method ---------------------------------------------------------------

        public function setTagSlide()
        {   
            $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX", "projectcinema");
            $query = mysqli_query($connect, 'SELECT * FROM `movies`, `genres` WHERE `genres`.`genre` = "'.$this->tag.'" AND `movies`.`id`=`genres`.`movie_id` ORDER BY `genres`.`priority` DESC LIMIT 15;');
            $this->openScrollableMenu();
            $this->loadMoviesFromDB($query);
            $this->closeScrollableMenu();
            mysqli_close($connect);
        }

        // ------------------------------------------------------------- Creates Scrollable Menu ---------------------------------------------------------------

        private function openScrollableMenu() {
            echo '<div class="tagScrollMenu">';
            echo '<div class="tagName">'.$this->tag.'</div>';
            echo '<div class="tagMovieContainer">';
            echo '<table><tr>';
        }

        private function loadMoviesFromDB($query) {
                        while($row = mysqli_fetch_array($query))
            {
                echo '<td><a href="'.$this->homePath.'repertoire/index.php" name="'.$row['name'].'"><img src="'.$this->homePath.'graphics/movies/'.$row['image'].'"></a></td>';
            }
        }

        private function closeScrollableMenu() {
            echo '</tr></table>'; // close tagMovieContainer
            echo '</div>'; // close tagName
            echo '</div>'; // close tagScrollMenu
        }
    }
?>