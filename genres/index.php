<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function UnCheckAll(chk)
        {
        for (i = 0; i < chk.length; i++)
            chk[i].checked = false ;
        }
    </script>
    <?php 
        include_once("scripts.php");
        include_once("../scriptsPHP/header.php"); 
        $header = new header("../"); 
        $header->load(); 
        $sesLoad = new SessionLoad("../");
        $connect = mysqli_connect("localhost","ProjectCinema", "zaq1@WSX", "projectcinema");
        $query = "SELECT DISTINCT `genres`.`genre` FROM `genres` WHERE `genres`.`genre` BETWEEN 'A' AND 'Z' ORDER BY `genres`.`genre` ASC;" ;
        $result = mysqli_query($connect,$query);

        $scriptsGenres = new ScriptsGenres($connect);
    ?>
</head>
<body>
    
    <?php
        $scriptsGenres->setGenreSelect();
        mysqli_close($connect);
        $header->loadFooter();
        $sesLoad->onLoad();
    ?>
</body>
</html>