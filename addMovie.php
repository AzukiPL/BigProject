<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="style/forms.css">
    <script src="scripts/addMovie.js"></script>
    <?php 
        include_once("scriptsPHP/addMovieScripts.php");
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
        $movies = new AddMovieScripts("");
        $connect = mysqli_connect("localhost","ProjectCinema", "zaq1@WSX", "projectcinema");

    ?>
</head>
<body>
<div class="loginForm"> 
    <form  action="" method="POST">
        <table>
            <tr>
                <td>Movie Name: </td>
                <td><input type="text" placeholder="name" name="movie-name" autocomplete="off" required></td>
                <td rowspan="2" >
                    Genres (Choose all that applies)
                </td>
            </tr>
            <tr>
                <td>Movie Length</td>
                <td><input type="text" placeholder="length"  name="length" autocomplete="off" required></td>

            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox"  value="addDirector" name="addDirector" onclick="isChecked();">Add Director<br>
                </td>
                
                <td rowspan="10" >
                    <?php $movies->readMovieGenres($connect); ?>
                </td>
            </tr>
            <tr class="addDirector">
                <td>Director Name</td>        
                <td><input  type="text" placeholder="name" name="director-name"></td>   
            </tr>
            <tr class="addDirector">
                <td>Director Surname</td>        
                <td><input  type="text" placeholder="surname"  name="director-surname"></td>   
            </tr>
            <tr class="selectDirector">
                <td>Director: </td>
                <td>    
                    <select name="Director" id="">
                    <?php $movies->selectDirector(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Select Image</label></td>
                <td>
                    <input type="file" value="" name="Image" >
                </td>
            </tr>
            <tr>
                <td><label>Select Trailer</label></td>
                <td>
                    <input type="file" value="" name="Trailer">
                </td>
            </tr>
            <tr>
                <td>Description</td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" name="description" placeholder="Description" required>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
    </form>
    </div>
    <?php 
    $movies->upload($connect);
        mysqli_close($connect);
        $sesLoad->onLoad();
    ?>
</body>
</html>