<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/forms.css">
    <?php 
        include_once("scriptsPHP/header.php"); 
        include_once("scriptsPHP/addRepertoireScripts.php");
        $header = new header(""); 
        $header->load(); 
        $sesLoad = new SessionLoad("");
        $repertoire = new addRepertoireScripts("");
        if(!isset($_SESSION['logged_in']))
        {
            if($_SESSION['logged_in'] != 1)
            header('location: login/index.php');
            if($_SESSION['permission'] < 5)
            header('location: login/profile.php');
        }
        $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
        $repertoire->deleteRecords($connect);
        $repertoire->addRecords($connect);
    ?>
</head>
<body>
<div class="loginForm">
    <form  action="" method="POST">
        <table>
            <tr>
                <td>Movie: </td>
                <td>
                    <!-- movie_id -->
                    <?php $repertoire->readMovieList(); ?>
                </td>
            </tr>
            <tr>
                <td>Type: </td>
                <td>
                    
                    <select name="type"><option value="2d">2d</option><option value="3d">3d</option></select> 
                </td>
            </tr>
            <tr>
                <td>Date: </td>
                <td>
                    <input type="date" name="date" >
                </td>
                
            </tr>
            <tr>
                <td>Time: </td>
                <td>
                    <input type="time" name="time" >
                </td>
            </tr>
            <tr>
                <td>Room: </td>
                <td>
                    <input type="number" name="room" >
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Add"></td>
            </tr>
        </table>
        <?php
        // read Database records
            $queryRead = 'SELECT *, `repertoire`.`id` AS "repertoire_id" FROM `repertoire`,`movies` WHERE `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`localisation_id` = '.$_SESSION['cinemaLocalisation'].' ORDER BY `repertoire`.`date`,`repertoire`.`time` ASC;';
            $result = mysqli_query($connect, $queryRead);
            echo '<table>';
            while($row=mysqli_fetch_array($result)) {
                echo '<tr><td style="padding-right:10px;">'.$row['name'].'</td><td>'.$row['2d/3d'].'</td><td>'.$row['date'].'</td><td>'.$row['time'].'</td><td>'.$row['room'].'</td><td><a href="addRepertoire.php?repertoireId='.$row['repertoire_id'].'">Delete</td></tr>';
            }
            echo '</table>';
        ?>
    </form>
    </div>
    
    <?php 
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>