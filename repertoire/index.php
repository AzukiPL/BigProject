<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="repertoire.css">
    <script lang="JavaScripts" src="SelectDay.js"></script>
    <?php 
        include_once("scripts.php");
        $scripts = new repertoire();
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
    ?>
</head>
<body>
    <div id="repertoire-top">
        <div id="repertoire-header">
            <h1>Repertoire</h1>
        </div>
        <div id=repertoire-days class="noselect">
            <div class="repertoire-day repertoire-active" onclick="currentSlide(1)"><?php $scripts->setCorrentDay(0); ?></div>
            <div class="repertoire-day" onclick="currentSlide(2)"><?php $scripts->setCorrentDay(1); ?></div>
            <div class="repertoire-day" onclick="currentSlide(3)"><?php $scripts->setCorrentDay(2); ?></div>
            <div class="repertoire-day" onclick="currentSlide(4)"><?php $scripts->setCorrentDay(3); ?></div>
            <div class="repertoire-day" onclick="currentSlide(5)"><?php $scripts->setCorrentDay(4); ?></div>
            <div class="repertoire-day" onclick="currentSlide(6)"><?php $scripts->setCorrentDay(5); ?></div>
            <div class="repertoire-day" onclick="currentSlide(7)"><?php $scripts->setCorrentDay(6); ?></div>
        </div>
        <form id="localisation" action="" method="GET">
            <div class="element">Select Localisation:</div>
            <div class="element1">
                <?php $scripts->setSelectLocalisation(); ?>
            </div>
            <div class="element1">
                <input type="submit" value="Select">
            </div>
        </form>
    </div>
    <div id="repertoire-bottom">
        <div class="repertoireList" style="display: block;"><?php $scripts->setRepertoireList(0); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(1); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(2); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(3); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(4); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(5); ?></div>
        <div class="repertoireList"><?php $scripts->setRepertoireList(6); ?></div>
    </div>

    <?php 
        $sesLoad->onLoad();
    ?>
</body>
</html>