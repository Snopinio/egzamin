<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poznaj Europę</title>
    <link rel="stylesheet" href="styl9.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <main>
        <div id="kolumny">
            <div id="lewa">
                <h2>Promocje</h2>
                <table>
                    <tr>
                        <td>Warszawa</td>
                        <td>od 600zł</td>
                    </tr>
                    <tr>
                        <td>Wenecja</td>
                        <td>od 1200zł</td>
                    </tr>
                    <tr>
                        <td>Paryż</td>
                        <td>od 1200zł</td>
                    </tr>
                </table>
            </div>
            <div id="srodek">
                <h2>W tym roku jedziemy do...</h2>
                <?php
                    $db = new mysqli('localhost', 'root','','podroze');
                        $q = "SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis ASC;";
                        $result = $db->query($q);
                        $htmlBuffer = "";
                        while($row = $result->fetch_assoc()) {
                            $fileName = $row['nazwaPliku'];
                            $alt = $row['podpis'];
                            $htmlBuffer .= '<img src="'.$fileName.'" alt="'.$alt.'" title="'.$alt.'">';
                        }
                        echo $htmlBuffer;
                    $db->close();
                ?>
            </div>
            <div id="prawa">
                <h2>Kontakt</h2>
                <a href=" biuro@wycieczki.pl">napisz do nas</a>
                <p>telefon: 444555666</p>
            </div>
            <div id="dol">
                <h3>W poprzednich latach byliśmy...</h3>
                <ol>
                <?php
                    $db = new mysqli('localhost', 'root','','podroze');
                    $q = "SELECT cel, dataWyjazdu FROM `wycieczki` WHERE dostepna = 0;";
                    $result = $db->query($q);
                    while($row = $result->fetch_assoc()){
                        $destination = $row['cel'];
                        $date = $row['dataWyjazdu'];

                        echo "<li>Dnia ".$date." pojechaliśmy do ".$destination."</li>";
                    }
                    $db->close();
                ?>
                </ol>
            </div>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: Janek</p>
    </footer>
</body>
</html>