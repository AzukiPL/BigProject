<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/forms.css">
    <?php 
        include_once("scriptsPHP/header.php"); 
        $header = new header(""); 
        $header->load(); 
        $sesLoad = new SessionLoad("");
        if(!isset($_SESSION['logged_in']))
        {
            if($_SESSION['logged_in'] != 1)
            header('location: login/index.php');
            if($_SESSION['permission'] < 5)
            header('location: login/profile.php');
        }
    ?>
</head>
<body>
<div class="loginForm">
    <form  action="" method="POST">
        <table>
            <tr>
                <td>Movie Name: </td>
                <td><input type="text" name="movie-name" autocomplete="off" required></td>
            </tr>
            <tr>
                <td>Movie Length</td>
                <td><input type="text" name="length" autocomplete="off" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" value="addDirector" name="addDirector" onclick="isChecked();">Add Director<br>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Add"></td>
            </tr>
        </table>
    </form>
    </div>
    <?php 
        $sesLoad->onLoad();
    ?>
</body>
</html>