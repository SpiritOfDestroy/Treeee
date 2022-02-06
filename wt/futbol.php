<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki Futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

        <div class="Baner">
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </div>
    


        
            <?php

            $db = mysqli_connect('localhost','root','','egzaminf');


            
            $res = mysqli_query($db, 'SELECT zespol1, zespol2, wynik, data_rozgrywki FROM `rozgrywka` WHERE zespol1 = "EVG";');

            while($linia = mysqli_fetch_assoc($res)) 
            {
                echo '<div class="mecz">';
                echo '<h3>'.$linia['zespol1']. ' ' .$linia['zespol2'].'</h3>';
                echo '<h4>'.$linia['wynik'].'</h4>';
                echo '<p>'.'w dniu:'.$linia['data_rozgrywki'].'</p>';
                echo '</div>';
            }






            mysqli_close($db);
            ?>
        
    


        <div class="gl">
            <h2>Reprezentacja Polski</h2>
        </div>
    

        <div class="lewy">
                <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form action="futbol.php" method="post">
                <input type="number" name="num"/>
                <button>Sprawdź</button>
                </form>
                <?php
            $db = mysqli_connect('localhost','root','','egzaminf');

            if(isset($_POST["num"]) && empty($_POST["num"]) !=TRUE){


            
                $zap = mysqli_query($db, 'SELECT imie, nazwisko FROM `zawodnik` WHERE pozycja_id = '.$_POST["num"].';');

                while($row = mysqli_fetch_row($zap)) 
                {

                    echo '<li>'.$row[0].' '.$row[1].'</li>';

                }
    
                        
            }

                    mysqli_close($db);
                ?>
        </div>

        <div class="prawy">
                <img src="zad1.png" alt="piłkarz">
                <p>Autor:000000000000000</p>
        </div>
    
</body>
</html>