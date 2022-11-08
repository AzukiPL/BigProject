<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style/home.css">
    <?php 
        include_once("scriptsPHP/header.php"); 
        $header = new header(""); 
        $header->load(); 
        $sesLoad = new SessionLoad("");
        session_start();
    ?>
</head>
<body>
    <?php 
        $header->loadSliderSwitch(); 
        echo '<div class="emptyZone"></div>';
        $header->loadScroller("anime");
        $header->loadScroller("action");
        $header->loadScroller("romance");
        $header->loadScroller("horror");
        $header->loadScroller("historical");
        $header->loadScroller("sci-fi");
        $header->loadScroller("fantasy");
        $sesLoad->onLoad();
    ?>
    <!-- <script>addMenu();</script> -->
    <script> currentSlide(parseInt(Math.random()*5+1));</script>
</body>
</html>