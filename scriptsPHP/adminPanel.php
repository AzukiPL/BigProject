<?php
    class adminPanel {
        function __construct($homePath) {
            $this->homePath = $homePath;
        }
            function loadButtons() {
            echo '<div id="adminPanel" class="noselect">';
            if($_SESSION['logged_in'] >= 7) {
                echo '<a href="'.$this->homePath.'addAdmin.php">';
                echo '<div class="panel-button">';
                echo '<p>Add Admin</p>';
                echo '</div>';
                echo '</a>';
            }
            if($_SESSION['logged_in'] >= 5) {
                echo '<a href="'.$this->homePath.'addMovie.php">';
                echo '<div class="panel-button">';
                echo '<p>Add Movie</p>';
                echo '</div>';
                echo '</a>';
            }
            if($_SESSION['logged_in'] >= 5) {
                echo '<a href="'.$this->homePath.'addRepertoire.php">';
                echo '<div class="panel-button">';
                echo '<p>Add Repertoire</p>';
                echo '</div>';
                echo '</a>';
            }
            echo '</div>';
        }   
    }
?>