<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <?php 
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
    ?>
</head>
<body>
    <a href="logout.php">log out</a>
    <?php $sesLoad->onLoad(); ?>
</body>
</html>