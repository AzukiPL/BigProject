<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $movieName = $_POST['movie-name'];
        $movieTime = $_POST['movie-time'];
        echo "''$movieName'' at $movieTime";    
    ?>
</body>
</html>