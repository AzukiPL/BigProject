<?php
    class ScriptsGenres {
        public function __construct($connect) {
            $this->connect = $connect;
            $this->query = [];
        }
        public function setGenreSelect() {
            ?>
                <div id="genreSelect">
                    <?php $this->readGenres(); ?>
                </div>
                <?php $this->readMovies(); ?>
            <?php
        }

        private function readGenres() {
            $query = "SELECT DISTINCT `genres`.`genre` FROM `genres` WHERE `genres`.`genre` BETWEEN 'A' AND 'Z' ORDER BY `genres`.`genre` ASC;" ;
            $result = mysqli_query($this->connect,$query);
            echo '<form name="myForm" action="" method="GET">';
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
                echo '<label class="genreCheckbox">';
                if(!empty($_GET['genre'][$row['genre']])) {$genre = $_GET['genre'][$row['genre']];}
                else {$genre = 0;}
                if( $genre == $row['genre'] ) {echo '<input type="checkbox" class="genreCheck" checked name="genre['.$row['genre'].']" value="'.$row['genre'].'">';}
                else {echo '<input type="checkbox" class="genreCheck"name="genre['.$row['genre'].']" value="'.$row['genre'].'">';}
                echo '<div class="checkbox"></div>';
                echo $row['genre'];
                echo '</label>';
                $i++;
            }
            echo '<div id="check"><input type="button" name="Un_CheckAll" value="Uncheck All" onClick="UnCheckAll(document.myForm)"></div>';
            echo '<div id="check"><input type="submit" value="search"></div>';
            echo '</form>';
        }
        private function readMovies()
        {
            echo '<div id="selectedGenreMovies">';
            if(!empty($_GET['genre'])) { 
                
                $genres = $_GET['genre'];
                echo '<div id="selectedGenres"><p>Results for: ';
                echo implode(", ",$genres);
                echo '</p></div>';
                echo '<div id="movies">';
                $query = "SELECT DISTINCT `genres`.`genre` FROM `genres`, `movies` WHERE `movies`.`id` = `genres`.`movie_id`";
                $result = mysqli_query($this->connect,$query);
                while($row = mysqli_fetch_array($result)) {
                    if(!empty($genres[$row['genre']])) 
                        $this->loadMovies($row['genre']);
                }
                echo implode(" ",$this->query);
                echo '</div>';
                
            }
            else echo 'Select Genres';
            echo '</div>';
        }
        private function loadMovies($genre) {
            $query = "SELECT `genres`.`movie_id` FROM `genres` WHERE `genres`.`genre` = '$genre' AND `genres`.`movie_id` != 0";
            // $query = "SELECT * FROM `movies` INNER JOIN `genres` ON ";
            // $query = "SELECT `movies`.`name` FROM `movies` UNION ALL SELECT `genres`.`genre` FROM `movies`, `genres` WHERE `genres`.`movie_id` = `movies`.`id`";
            $result = mysqli_query($this->connect,$query) ;
            while ($row = mysqli_fetch_array($result)) {
                array_push($this->query,$row['movie_id']);
            }
        }
    }
?>