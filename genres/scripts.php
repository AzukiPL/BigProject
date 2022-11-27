<?php
    class ScriptsGenres {
        public function __construct($connect) {
            $this->connect = $connect;
            $this->query = [];
            $this->movies = [];
            $this->checked = [];
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
                
                $this->query = $_GET['genre'];
                echo '<div id="selectedGenres"><p>Results for: ';
                echo implode(", ",$this->query);
                echo '</p></div>';
                echo '<div id="movies">';
                $query = "SELECT * FROM `genres` WHERE `genres`.`movie_id` != 0";
                $result = mysqli_query($this->connect,$query);
                while($row = mysqli_fetch_array($result)) {
                    array_push($this->movies,$row['movie_id']);
                }
                $this->reduceToDistinctMovie()   ;
                $this->loadMovies();
                echo '</div>';
            }
            else echo 'Select Genres';
            echo '</div>';
            
        }
        public function reduceToDistinctMovie()     {
            // $validation = "sum(case when `genres`.`genre` = '".implode("' then 1 else 0 end) > 0 and sum(case when `genres`.`genre` = '",$this->query)."'  then 1 else 0 end) = ".sizeof($this->query);
            // $sumCases = " having $validation";
            $query = "SELECT `movies`.* FROM `movies`, `genres` WHERE `genres`.`movie_id` IN (".implode(", ",$this->movies).") AND `genres`.`movie_id` = `movies`.`id` GROUP BY `movies`.`id`";
            $result = mysqli_query($this->connect,$query);
            while($row = mysqli_fetch_array($result)) {
                // echo $row['id']."<br><br>";
                $this->checkTags($row['id']);
            }
        }
        public function checkTags($id) {
            
            foreach($this->query as &$value) {
            $validation = "`genres`.`movie_id` = $id AND `movies`.`id` = $id ORDER BY `genres`.`genre`";
            $query = "SELECT * FROM `movies`,`genres` WHERE $validation";
            $reuslt = mysqli_query($this->connect,$query);
            $check = true;
            $name = "0";
                while($row = mysqli_fetch_array($reuslt)) {
                    if($this->query[$value] == $row['genre']) {
                        $check = false;
                        $name = $row['movie_id'];
                    }
                }
                if($check == true) {break;}
                
            }
            array_push($this->checked, $name);
            unset($value);
        }
        public function loadMovies() {
            $query = "SELECT * FROM `movies` WHERE `movies`.`id` IN ('".implode("',' ",$this->checked)."')";
            $result = mysqli_query($this->connect,$query);
            while($row = mysqli_fetch_array($result)) {
                echo $row['name']."<br>";
            }
        }
    }
?>