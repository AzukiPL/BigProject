<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/forms.css">
    <script src="scripts/addMovie.js"></script>
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

        function selectDirector() {
            $connect = mysqli_connect("localhost","ProjectCinema","zaq1@WSX","projectcinema");
            $query = 'SELECT * FROM `directors`';
            $result = mysqli_query($connect, $query);
            while($row=mysqli_fetch_array($result)) {
                echo '<option value="'.$row['id'].'">'.$row['name']." ".$row['surname'].'</option>';
            }
            mysqli_close($connect);
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
            <tr class="addDirector">
                <td>director name</td>        
                <td><input type="text" name="director-name"></td>   
            </tr>
            <tr class="addDirector">
                <td>director surname</td>        
                <td><input type="text" name="director-surname"></td>   
            </tr>
            <tr class="selectDirector">
                <td>Director: </td>
                <td>    
                    <select name="" id="">
                    <?php selectDirector(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="file" id="movie-image" name="movie-image" accept="image/png" required>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Add"></td>
            </tr>
        </table>
    </form>
    </div>
    <?php 
    if(!empty($_POST['movie-image'])) {
        $movieImg = $_POST['movie-image'];
        echo $movieImg;
    }
        $sesLoad->onLoad();
    ?>
</body>
</html>