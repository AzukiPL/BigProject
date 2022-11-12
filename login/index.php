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
        if(isset($_SESSION['logged_in']))
        {
            if($_SESSION['logged_in'] != 0)
            header('location: profile.php');
        }
    ?>
</head>
<body> 
    <div class="loginForm">
    <form  action="" method="POST">
        <table>
            <tr>
                <td>login:</td>
                <td><input type="text" name="login" autocomplete="off"></td>
            </tr>
            <tr>
                <td>password:</td>
                <td><input type="password" name="password" autocomplete="off"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="login"></td>
            </tr>
            <tr>
                <td colspan="2"><a href="register.php"><br><br>or register now</a></td>
            </tr>
        </table>
    </form>
    </div>
<?php
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $connect = mysqli_connect('localhost','ProjectCinema','zaq1@WSX','projectcinema');
            $query = "SELECT `users`.`login`, `users`.`password`, `users`.`permission_level` FROM `users`;";
            $result = mysqli_query($connect, $query);
            while ($row=mysqli_fetch_array($result))
            {
                if($login==$row['login'] && $password==$row['password'])
                {
                    $_SESSION['logged_in']=$row['login'];
                    $_SESSION['permission']=$row['permission_level'];
                    header('location: profile.php');
                    exit();
                }
                else
                {
                    $_SESSION['logged_in']=0;
                    $_SESSION['permission']=0;
                    header('location: index.php');
                }
            }
            mysqli_close($connect);
        
        }
        $sesLoad->onLoad();
    ?>
</body>
</html>