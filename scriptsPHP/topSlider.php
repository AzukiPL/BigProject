<?php
    class TopSlider {
        function __construct($path)
        {
            $this->homePath = $path;
        }

        public function setTopSlider() {
            // Container for the image gallery
            echo '<div class="container">';
            $this->setSlide();
            echo '</div>';
        }

        // ------------------------------------------------------------- Top Slider Main Method ---------------------------------------------------------------


        private function setSlide() {
            $connect =mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
            $query = "SELECT * FROM `movies` ORDER BY `movies`.`rates 0-10` DESC LIMIT 6;";
            $result = mysqli_query($connect,$query);
            $result2 = mysqli_query($connect,$query);
            $this->giveQueryResult($connect,$result);
            $this->setPictureSelect($result2);
            mysqli_close($connect);
        }
        // ------------------------------------------------------------- Top Slider Query Result ---------------------------------------------------------------

        private function giveQueryResult($connect, $result) {
            $i = 1;
            while ($row = mysqli_fetch_array($result))
            {
                echo '<div class="mySlides noselect">';
                echo '<table  style="background-image: url('.$this->homePath.'graphics/movies/'.$row['image'].');  height: 600px;  width: inherit; background-position: center; background-repeat: no-repeat; background-size: cover; border-collapse: collapse; background-size:1350px 650px;" class="sliderTable">';
                $this->setFirstRowColumns($i, $row['image'], $row['name']);
                $this->setSecondRowColumns( $row['rates 0-10'], $row['length']);
                $this->setThirdRowColumns($connect, $row['genres_movie_id']);
                $this->setMovieDescriptColumn($row['description']);
                echo '</table>';
                echo '</div>';
                $i++;
            }
        }

        // ------------------------------------------------------------- Top Slider Rows ---------------------------------------------------------------


        private function setFirstRowColumns($i, $image, $name) {
            echo '<tr>';
            $this->setPrievousButtonColumn($i);
            $this->setMovieImageColumn($image);
            $this->setMovieTitleColumn($name);
            $this->setNextButtonColumn();
            echo '</tr>';
        }
        private function setSecondRowColumns($rating, $length) {
            $this->setRatingAndLength($rating,$length);
        }
        private function setThirdRowColumns($connect, $genres_movie_id) {
            echo '<tr> <td colspan="2" class="tagContainer">';
            $this->selectMovieGenres($connect, $genres_movie_id);
            echo '</td></tr>'; 
        }

        // ------------------------------------------------------------- Top Slider Prievous & Next Button ---------------------------------------------------------------

        private function setPrievousButtonColumn($i) {
            echo '<td rowspan="6">';
            echo '<div class="numbertext ">'.$i.' / 6</div>';
            echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
            echo '</td>';
        }

        private function setNextButtonColumn() {
            echo '<td rowspan="6"><a class="next" onclick="plusSlides(1)">&#10095;</a></td>';
        }

        // ------------------------------------------------------------- Top Slider Movie Image ---------------------------------------------------------------

        private function setMovieImageColumn($image) {
            echo '<td rowspan="6" class="image">';
            // echo '<img src="'.$this->homePath.'graphics/movies/'.$image.'" width="100%">';
            echo '</td>';
        }

        // ------------------------------------------------------------- Top Slider Title ---------------------------------------------------------------

        private function setMovieTitleColumn($name) {
            echo '<td colspan="2" class="movieTitle select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">'.$name.'</p>';
            echo '</div>';
            echo '</td>';
        }


        // ------------------------------------------------------------- Top Slider Rating and Length ---------------------------------------------------------------

        private function setRatingAndLength($rating, $length) {
            echo '<tr>';
            $this->setMovieRatingColumn($rating);
            $this->setMovieLengthColumn($length);
            echo '</tr>';
        }


        private function setMovieRatingColumn($rating) {
            echo '<td class="rating select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">'.$rating.' / 10 ★</p>';
            echo '</div>';
            echo '</td>'; 
        }
        private function setMovieLengthColumn($length) {
            echo '<td class="length select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">Length: '.$length.'m</p>';
            echo '</div>';
            echo '</td>';
        }
        // ------------------------------------------------------------- Top Slider Movie Tags ---------------------------------------------------------------


        private function selectMovieGenres($connect, $genres_movie_id) {
            $query = "SELECT `movies`.`genres_movie_id`, `genres`.`movie_id`, `genres`.`genre` FROM `movies`, `genres` WHERE  `genres`.`movie_id` = $genres_movie_id AND `movies`.`genres_movie_id` = $genres_movie_id ORDER BY `genres`.`priority` DESC LIMIT 5;";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result))
            {
                echo '<div class="tag">'.$row['genre'].'</div>';
            }
        }

        // ------------------------------------------------------------- Top Slider Description ---------------------------------------------------------------

        private function setMovieDescriptColumn($description) {   
            echo '<tr>';
            echo '<td colspan="2" class="description select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">'.$description.'</p>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------------------------
        // ------------------------------------------------------------- Top Slider Select on Picture ---------------------------------------------------------------
        // ----------------------------------------------------------------------------------------------------------------------------------------------------------
        
        private function setPictureSelect($result2) {
            echo '<table><tr id="row"><td colspan=10>';
            $id = 1;
                while ($row2 = mysqli_fetch_array($result2))
                {
                    
                    echo '<div class="column">';
                    echo '<img class="demo cursor" src="'.$this->homePath.'graphics/movies/'.$row2['image'].'"  onclick="currentSlide('.$id.')">';
                    $id++;
                    echo '</div>';
                }
            echo '</td></tr></table>';
        }
    }
?>