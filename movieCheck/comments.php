<?php
    class Comments {
        function __construct($connect,$movie_id) {
            $this->connect = $connect;
            $this->movie_id = $movie_id;
        }

        public function readComments() {
            $query = "SELECT * FROM `comments` WHERE `comments`.`movie_id` = '".$this->movie_id."' ORDER BY `comments`.`comment_datetime` DESC LIMIT 100;";
            $result = mysqli_query($this->connect,$query);
            while($row = mysqli_fetch_array($result)) {
                $queryUser = mysqli_query($this->connect,"SELECT * FROM `users` WHERE `users`.`id` = ".$row['user_id']);
                $user = mysqli_fetch_array($queryUser);
                echo '<div class="message">';
                echo '<div class="user">'.$user['login'].':</div>';
                echo '<div class="comment">'.$row['comment'].'</div>';
                echo '<div class="comment-date">'.$row['comment_datetime'].'</div>';
                echo '</div>';
            }
        }
        public function addCommentInput() {
            if(!empty($_SESSION['logged_in'])) {
                if($_SESSION['logged_in'] != 0) {
                    echo '<div id="commentinput">';
                    echo '<form action="" method="GET">';
                    echo '<input type="text" value="'.$this->movie_id.'" name="id" style="display:none;">';
                    echo '<input type="text" placeholder="Join Conversation" maxlength="125" autocomplete="off" name="comment">';
                    echo '<input type="submit" value="Send">';
                    echo '</form>';
                    echo '</div>';
                }
            }
            else {
                echo '<div id="commentinput">';
                echo '<a href="../login/index.php">Log in to leave a comment</a>';
                echo '</div>';
            }
        }
        public function submitComment() {
            if(!empty($_GET['comment'])) {
                $queryUser = "SELECT * FROM `users` WHERE `users`.`login` = '".$_SESSION['logged_in']."';";
                $resultUser = mysqli_query($this->connect, $queryUser);
                $user = mysqli_fetch_array($resultUser);

                $queryCheck = "SELECT * FROM `comments` WHERE `comments`.`comment` = '".$_GET['comment']."' AND `comments`.`user_id` = ".$user['id'];
                $resultCheck = mysqli_query($this->connect,$queryCheck);
                if(!mysqli_fetch_array($resultCheck)) {
                    $query = "INSERT INTO `comments` (`movie_id`, `user_id`, `comment`, `comment_datetime`) VALUES ('".$this->movie_id."', '".$user['id']."', '".$_GET['comment']."', '".date("Y-m-d H:i:s")."');";
                    $result = mysqli_query($this->connect, $query);
                }
            }
        }
        public function rateMovie() {
            if(!empty($_SESSION['logged_in'])) {
                $queryUser = "SELECT * FROM `users` WHERE `users`.`login` = '".$_SESSION['logged_in']."';";
                $resultUser = mysqli_query($this->connect, $queryUser);
                $user = mysqli_fetch_array($resultUser);
                $movie = $this->movie_id;
                $userID = $user['id'];
                $query = "SELECT * FROM `reviews` WHERE `user_id` =".$userID." AND `movie_id` = $movie";
                $result = mysqli_query($this->connect,$query);
                if($row = mysqli_fetch_array($result))
                $rating = $row['rating'];
            
                echo '<form action="" method="GET" id="review">';
                echo 'Rate this movie in scale 0-100';
                echo '<input type="text" value="'.$this->movie_id.'" name="id" style="display:none;">';
                echo '<input style="margin-left:10px;" type="number" min="0" max = "100" name="rate">';
                echo '<input style="margin-left:10px;" type="submit" value="submit"><br>';
                if(isset($rating)) {echo "you rated this movie as $rating / 100";}
                echo '</form>';
            }
        }
        public function submitRateMovie() {
            if(isset($_GET['rate'])) {
                $queryUser = "SELECT * FROM `users` WHERE `users`.`login` = '".$_SESSION['logged_in']."';";
                $resultUser = mysqli_query($this->connect, $queryUser);
                $user = mysqli_fetch_array($resultUser);
                $movie = $this->movie_id;
                $userID = $user['id'];
                $rating = $_GET['rate'];
                $queryCheck = "SELECT * FROM `reviews` WHERE `user_id` =".$userID." AND `movie_id` = $movie";
                $resultCheck = mysqli_query($this->connect,$queryCheck);
                if(!mysqli_fetch_array($resultCheck)) {
                    $query = "INSERT INTO `reviews` (`movie_id`, `user_id`, `rating`) VALUES ($movie, $userID, $rating)";
                    $result = mysqli_query($this->connect,$query);
                }
                else {
                    $query = "UPDATE `reviews` SET `rating` = $rating WHERE `user_id` = $userID AND `movie_id` = $movie";
                    $result = mysqli_query($this->connect,$query);
                }
                $queryrates = "SELECT AVG(`rating`) AS `your mom` FROM `reviews` WHERE `movie_id` = $movie";
                $resultrates = mysqli_query($this->connect,$queryrates);
                $rates = mysqli_fetch_array($resultrates);
                $rating = $rates['your mom'];

                $queryMovieUpdate = "UPDATE `movies` SET `rates`=$rating WHERE `movies`.`id` =  $movie";
                $resultMovieUpdate = mysqli_query($this->connect,$queryMovieUpdate);

            }
        }
    }
?>