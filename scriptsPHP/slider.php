<?php
    class Slider {
        function __construct($path, $tag)
        {
            $this->homePath = $path;
            $this->tag = $tag;
        }
        public function setTagSlide()
        {   
            $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX", "projectcinema");
            $query = mysqli_query($connect, 'SELECT * FROM `movies`, `genres` WHERE `genres`.`genre` = "'.$this->tag.'" AND `movies`.`genres_movie_id`=`genres`.`movie_id` AND `genres`.`main` = 1 LIMIT 15;');
            echo '<div class="tagScrollMenu">';
            echo '<div class="tagName">'.$this->tag.' genre</div>';
            echo '<div class="tagMovieContainer">';
            echo '<table><tr>';
            while($row = mysqli_fetch_array($query))
            {
                echo '<td><img src="'.$this->homePath.'graphics/movies/'.$row['image'].'"></td>';
            }
            echo '</tr></table>';
            echo '</div>';
            echo '</div>';
            mysqli_close($connect);
        }


    }
?>