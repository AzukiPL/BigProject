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
    ?>
</head>
<body>
    <?php 
        $header->loadSliderSwitch(); 
        echo '<div class="emptyZone"></div>';
        $header->loadScroller("Anime");
        $header->loadScroller("Action");
        $header->loadScroller("Romance");
        $header->loadScroller("Horror");
        $header->loadScroller("Historical");
        $header->loadScroller("Comedy");
        $header->loadScroller("Fantasy");
        $header->loadFooter();
        $sesLoad->onLoad();
        
    ?>
    <!-- <script>addMenu();</script> -->
    <script> currentSlide(parseInt(Math.random()*5+1)); starttimeout();</script>
</body>
</html>