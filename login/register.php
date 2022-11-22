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
    ?>
</head>
<body> 
    <div class="loginForm">
    <form  action="" method="POST">
        <table>
            <tr>
                <td>login:</td>
                <td><input type="text" name="login" autocomplete="off" required></td>
            </tr>
            <tr>
                <td>password:</td>
                <td><input type="password" name="password" autocomplete="off" required></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" name="e-mail" required></td>
            </tr>
            <tr>
                <td>birth date</td>
                <td><input type="date" name="bdate" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Create"></td>
            </tr>
        </table>
    </form>
    </div>
<?php
        if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['e-mail'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $email = $_POST['e-mail'];
            $bday = $_POST['bdate'];

            $connect = mysqli_connect('localhost','ProjectCinema','zaq1@WSX','projectcinema');
            $query = "SELECT * FROM `users` WHERE `users`.`login` = '$login' OR `users`.`e-mail` = '$email'";
            $result = mysqli_query($connect,$query);
            if(!mysqli_fetch_array($result)) {
                $query = "INSERT INTO `users` (`login`,`password`,`e-mail`,`b_day`) VALUES ('".$login."','".$password."','".$email."','".$bday."');";
                $result = mysqli_query($connect, $query);
                
                $query2 = "SELECT * FROM `users` WHERE `users`.`login` = '".$login."' AND `users`.`password` = '".$password."';";
                $result2 = mysqli_query($connect,$query2);
                $row = mysqli_fetch_row($result2);
                header('location: index.php');
                exit();
            }
            else {
                echo '<div style="color:red;">account with this name or email already exists</div>';
            }



            mysqli_close($connect);
        }
        $sesLoad->onLoad();
    ?>
</body>
</html>