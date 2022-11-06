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

        private function setSlide()
        {
            $connect =mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
            $query = "SELECT * FROM `movies` ORDER BY `movies`.`rates 0-10` DESC LIMIT 6;";
            $result = mysqli_query($connect,$query);
            $result2 = mysqli_query($connect,$query);
            $i = 1;
            while ($row = mysqli_fetch_array($result))
            {
                echo '<div class="mySlides noselect">';
                echo '<table class="sliderTable">';
                echo '<tr>';
                $this->setPrievousButtonColumn($i);
                $this->setMovieImageColumn($row['image']);
                $this->setMovieTitleColumn($row['name']);
                $this->setNextButtonColumn();
                echo '</tr>';
                $this->setMovieRatingColumn($row['rates 0-10'], $row['length']);
                echo '<tr> <td colspan="2" class="tagContainer">';
                $this->selectMovieGenres($connect, $row['genres_movie_id']);
                echo '</td></tr>';  
                $this->setMovieDescriptColumn($row['description']);
                
                echo '</table>';
                echo '</div>';
                $i++;
            }
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
            mysqli_close($connect);
        }


        private function setPrievousButtonColumn($i)
        {
            echo '<td rowspan="6">';
            echo '<div class="numbertext ">'.$i.' / 6</div>';
            echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
            echo '</td>';
        }
        private function setMovieImageColumn($image)
        {
            echo '<td rowspan="6" class="image">';
            echo '<img src="'.$this->homePath.'graphics/movies/'.$image.'" width="100%">';
            echo '</td>';
        }
        private function setMovieTitleColumn($name)
        {
            echo '<td colspan="2" class="movieTitle select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">'.$name.'</p>';
            echo '</div>';
            echo '</td>';
        }
        private function setMovieRatingColumn($rating, $length)
        {
            echo '<tr>';
            echo '<td class="rating select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">'.$rating.' / 10 ★</p>';
            echo '</div>';
            echo '</td>';
            echo '<td class="length select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">Length: '.$length.'m</p>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
        private function selectMovieGenres($connect, $number) {
            $query = "SELECT `movies`.`genres_movie_id`, `genres`.`movie_id`, `genres`.`genre` FROM `movies`, `genres` WHERE  `genres`.`movie_id` = $number AND `movies`.`genres_movie_id` = $number LIMIT 5;";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result))
            {
                echo '<div class="tag">'.$row['genre'].'</div>';
            }
        }
        private function setMovieDescriptColumn($description)
        {
            
            echo '<tr>';
            echo '<td colspan="2" class="description select">';
            echo '<div class="caption-container">';
            echo '<p class="caption select">'.$description.'</p>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
        private function setNextButtonColumn()
        {
            echo '<td rowspan="6"><a class="next" onclick="plusSlides(1)">&#10095;</a></td>';
        }


    }
?>