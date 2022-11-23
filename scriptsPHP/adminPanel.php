<?php
    class adminPanel {
        function __construct($homePath) {
            $this->homePath = $homePath;
        }
            function loadButtons() {
            echo '<div id="adminPanel" class="noselect">';
            if($_SESSION['permission'] >= 8) { // adding admins
                echo '<a href="'.$this->homePath.'addAdmin.php">';
                echo '<div class="panel-button">';
                echo '<p>Admins</p>';
                echo '</div>';
                echo '</a>';
            }
            if($_SESSION['permission'] >= 6) { // adding, and removing movies
                echo '<a href="'.$this->homePath.'addMovie.php">';
                echo '<div class="panel-button">';
                echo '<p>Movie</p>';
                echo '</div>';
                echo '</a>';
            }
            if($_SESSION['permission'] >= 5) { // adding, and removing repertoires
                echo '<a href="'.$this->homePath.'addRepertoire.php">';
                echo '<div class="panel-button">';
                echo '<p>Repertoires</p>';
                echo '</div>';
                echo '</a>';
            }
            if($_SESSION['permission'] >= 5) { // adding, and confirming reservations
                echo '<a href="'.$this->homePath.'reservations.php">';
                echo '<div class="panel-button">';
                echo '<p>Reservations</p>';
                echo '</div>';
                echo '</a>';
            }
            echo '</div>';
        }   
    }
?>