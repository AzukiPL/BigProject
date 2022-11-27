<?php 
    class AddMovieScripts {
        function __construct($homePath)
        {
            $this->homePath = $homePath;
        }

        function selectDirector() {
            $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
            $query = 'SELECT * FROM `directors`';
            $result = mysqli_query($connect, $query);
            while($row=mysqli_fetch_array($result)) {
                echo '<option value="'.$row['id'].'">'.$row['name']." ".$row['surname'].'</option>';
            }
            mysqli_close($connect);
        }
        function readMovieGenres($connect) {
            $query = "SELECT DISTINCT `genres`.`genre` FROM `genres`";
            $result = mysqli_query($connect,$query);
            while($row = mysqli_fetch_array($result)) {
                echo '<div class="genre">';
                echo '<input type="checkbox" name="genre['.$row['genre'].']" value="'.$row['genre'].'">'.$row['genre'];
                echo '</div>';
            }
        }

        function upload($connect) {
            if(!empty ($_POST['movie-name'])) {
                if(!empty($_POST['addDirector'])) {
                    if(!empty($_POST['director-name']) && !empty($_POST['director-surname'])) {
                        $name = $_POST['director-name'];
                        $surname = $_POST['director-surname'];
                        $query = "INSERT INTO `directors` (`name`,`surname`) VALUES ('$name', '$surname');";
                        $result = mysqli_query($connect,$query);

                        $read = "SELECT * FROM `directors` WHERE `name` = '$name' AND `surname` = '$surname'";
                        $output = mysqli_query($connect,$read);
                        $row = mysqli_fetch_array($output);
                        $movieDirector = $row['id'];
                    }
                    else {
                        echo 'define director.';
                        return;
                    }
                }
                else {
                    $movieDirector = $_POST['Director'];
                }
                $movieGenres = $_POST['genre'];
                $movieName          = $_POST['movie-name'];
                $movieLength        = $_POST['length'];
                $movieImage         = $_POST['Image'];
                $movieTrailer       = $_POST['Trailer'];
                $movieDescription   = $_POST['description'];

                $check = "SELECT * FROM `movies` WHERE `movies`.`name` = '$movieName' AND `movies`.`image` = '$movieImage'";
                $checkResult = mysqli_query($connect,$check);
                if(!mysqli_fetch_array($checkResult)) {
                    $insert = 'INSERT INTO `movies` (`name`, `length`, `director_id`, `image`, `trailer`, `description`) VALUES ("'.$movieName.'","'.$movieLength.'","'.$movieDirector.'","'.$movieImage.'","'.$movieTrailer.'","'.$movieDescription.'")';
                    $insertResult = mysqli_query($connect,$insert);
                    echo "Successfully added: '$movieName','$movieLength','$movieDirector','$movieImage','$movieTrailer','$movieDescription'";
                    
                    $searchMovie = "SELECT * FROM `movies` WHERE `movies`.`name` = '$movieName' AND `movies`.`image` = '$movieImage'";
                    $resultSearch = mysqli_query($connect,$searchMovie);
                    if(!mysqli_fetch_array($resultSearch)) {echo 'error';}
                    else {
                        mysqli_data_seek($resultSearch,0);
                        while($row=mysqli_fetch_array($resultSearch)) {

                            foreach($movieGenres as &$value) {
                                $inserGenre = "INSERT INTO `genres` (`movie_id`,`genre`) VALUES ('".$row['id']."', '".$movieGenres[$value]."');";
                                $insertGenreQuery = mysqli_query($connect,$inserGenre);
                            }


                        }
                    }
                }
                else {
                    echo 'unique movie name and image name required';
                }
                
            }
        }
    }
?>