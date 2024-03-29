<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Cinema</title>
    <link rel="stylesheet" href="tickets.css">
</head>
<body>
    <?php
        $repertoireId = $_POST['id'];
        $movieName = $_POST['movie-name'];
        $movieTime = $_POST['movie-time'];  
        $localisation = $_POST['localisation'];
        $town = "";
        $street = "";
        $local = "";
        $query = 'SELECT * FROM `localisations` WHERE `localisations`.`id` ='.$localisation;
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($result)) {
            $town = $row['town'];
            $street = $row['street'];
            $local = $row['local'];
        }
        $query = 'SELECT * FROM `repertoire`, `rooms`, `movies` WHERE `repertoire`.`movie_id` = `movies`.`id` AND `repertoire`.`room_id` = `rooms`.`id` AND `repertoire`.`id` = '.$repertoireId.' AND `movies`.`name` = "'.$movieName.'";';
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_array($result)) {
            $availableSpace = $row['available_space'] - $row['sold_fares'];
            echo "Available $availableSpace seats";
        }
    ?>
    <div id="panel">
        <div id="left-side">
            <div id="name"><?php echo $movieName; ?></div><br><hr class="line">
            <div id="place"><?php echo "$town $street $local";  ?></div><br><hr class="line">
            <form action="reservation.php" method="POST" id="reservation-form">
                <?php
                    echo '<select name="id" class="hide"><option value= "'.$repertoireId.'" ></option></select>';
                    echo '<select name="movieName" class="hide"><option value= "'.$movieName.'" ></option></select>';
                    echo '<select name="movieTime" class="hide"><option value= "'.$movieTime.'" ></option></select>';
                    echo '<select name="localisation" class="hide"><option value= "'.$localisation.'" ></option></select>';
                ?>
                <table>
                    <tr>
                        <td>Name:  </td>
                        <td><input type="text" minlength="5" name="userName" placeholder="Input Name" required></td>
                    </tr>
                    <tr>
                        <td>Full-fare (20 PLN):  </td>
                        <td><input type="number" min="1"  max="<?php echo $availableSpace/2 ?>" maxlength="3" name="normalTicket" placeholder="Input Amount" required></td>
                    </tr>
                    <tr>
                        <td>Reduced-fare (15 PLN): </td>
                        <td><input type="number" min="0"  max="<?php echo $availableSpace/2 ?>" maxlength="3" name="reducedTicket" placeholder="Input Amount"></td>
                    </tr>
                    <td>Payment Method</td>
                    <td>
                        <select name="payMethod">
                            <option value="online">Pay online</option>
                        </select>
                    </td>
                    <tr>
                        <td colspan="2"><input type="submit" value="reserve"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="../index.php"><input type="button" value="return"></a></td>
                    </tr>
                    <tr>
                        <td colspan="2">Note: account allow you to cancel reservation and gives 20% discount.</td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="../../login/register.php">You can register here</td>
                    </tr>
                </table>
            </form>
        </div>

        <div id="right-side">
            <?php
                $query = 'SELECT * FROM `movies` WHERE `movies`.`name` = "'.$movieName.'"';
                $result = mysqli_query($connect,$query);
                while($row = mysqli_fetch_array($result)) {
                echo '<img src="../../graphics/movies/'.$row['image'].'">';
                }
            ?>
        </div>
    </div>


</body>
</html>