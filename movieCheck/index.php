<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="../repertoire/repertoire.css">
    <link rel="stylesheet" href="style.css">
    <script src="../repertoire/SelectDay.js"></script>
    <?php 
        include_once("thisMovieRepertoire.php");
        $scripts = new repertoire();
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
        $connect = mysqli_connect("localhost", "ProjectCinema", "zaq1@WSX", "projectcinema");
        include_once("comments.php");
        
    ?>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $reviews = new Comments($connect,$id);
        $reviews->submitComment();
        $reviews->submitRateMovie();
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
            echo '<td rowspan=5><img src="../graphics/movies/'.$row['image'].'" width=100%></td>';
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
            echo '<tr>';
            echo '<td>Movie Rates: </td><td>'.($row['rates'] / 10).' / 10 </td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
        }
    ?>
        <div id="repertoire-top">
        <div id="repertoire-header">
            <h1>Repertoire</h1>
        </div>


        <form id="localisation" action="" method="GET">
            <div class="element">Select Localisation:</div>
            <div class="element1">
                <?php $scripts->setSelectLocalisation(); ?>
            </div>
            <div class="element1">
                <input type="text" name="id" value="<?php echo $id; ?>" style="display:none;">
                <input type="submit" value="Select">
            </div>
        </form>
        <?php $scripts->setDayButtons(); ?>
    </div>
    <div id="repertoire-bottom">
        <div class="repertoireList" style="display: block;"><?php $scripts->setRepertoireList(0, $id); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(1, $id); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(2, $id); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(3, $id); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(4, $id); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(5, $id); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(6, $id); ?></div>
    </div>

    <?php $reviews->rateMovie(); ?>

    <div id="comments-banner">Comments</div>
    <div id="comments">  
        <?php $reviews->readComments(); ?>    
    </div>
    <?php $reviews->addCommentInput(); ?>

    <?php 
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>