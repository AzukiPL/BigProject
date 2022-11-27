<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="file" name="image" id="">
        <input type="submit" value="wyslij">
    </form> 
    <?php 
        $image = $_POST['image'];
        echo $image;
    ?>
</body>
</html>