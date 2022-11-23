<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style.css">
    <?php 
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
        $connect = mysqli_connect("localhost", "ProjectCinema", "zaq1@WSX", "projectcinema");
    ?>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $query = "SELECT * FROM `movies` WHERE `movies`.`id` = $id ;";
        $result= mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($result)) {
            $queryDirector = mysqli_query($connect,"SELECT * FROM `directors` WHERE `directors`.`id` = ".$row['director_id']);
            $director = mysqli_fetch_array($queryDirector);
            $queryGenres = mysqli_query($connect,"SELECT * FROM `genres` WHERE `genres`.`movie_id` = ".$row['id']." ORDER BY `genres`.`priority` DESC ");
            echo '<div id="movieName">'.$row['name'].'</div>';
            echo '<div id="movieBanner"><video height="100%" controls> <source src="../repertoire/trailers/'.$row['trailer'].'" type="video/mp4"></video></div>';
            echo '<div id="movieInformations">';
            echo '<table>';
            echo '<tr>';
            echo '<td colspan=2>'.$row['description'].'</td>';
            echo '<td rowspan=4><img src="../graphics/movies/'.$row['image'].'" width=100%></td>';
            echo '<tr>';
            echo '<td>Director: </td><td>'.$director['name'].' '.$director['surname'].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Genres:</td><td>';
            while($genres = mysqli_fetch_array($queryGenres)) {
            echo $genres['genre'].", ";
            }
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Movie Length: </td><td>'.$row['length'].' minutes </td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
        }
    ?>

    <?php 
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>