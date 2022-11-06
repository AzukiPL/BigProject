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
    ?>
</head>
<body>
    <?php 
        $header->loadSliderSwitch(); 
        echo '<div class="emptyZone"></div>';
        $header->loadScroller("anime");
        $header->loadScroller("romance");
        $header->loadScroller("action");
        $header->loadScroller("fantasy");
        $header->loadScroller("horror");
    ?>
    <script>addMenu();</script>
    <script> currentSlide(parseInt(Math.random()*5+1));</script>
</body>
</html>