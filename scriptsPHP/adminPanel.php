<!DOCTYPE html>
<html lang="en">
<body>
    <div id="adminPanel"">
        <?php
            if($_SESSION['logged_in'] > 7) {
                echo '<div class="panel-button">';
                
                echo '</div>';
            }
        ?>
    </div>
</body>
</html>