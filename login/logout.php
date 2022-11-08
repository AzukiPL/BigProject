<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="../style/login.css">
    <?php 
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
        session_start();
    ?>
</head>
<body>
    <?php
        session_destroy();
    ?>
    logged out<br>
    <a href="../index.php">home</a>
    <?php $sesLoad->onLoad(); ?>
</body>
</html>