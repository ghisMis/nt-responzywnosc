<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz wartości z formularza
    $temat = htmlspecialchars($_POST['temat']);
    $typ = htmlspecialchars($_POST['typ']);
    $opis = htmlspecialchars($_POST['opis']);

    // Adres email, na który zostanie wysłana wiadomość
    $to_email = '';

    // Składanie wiadomości
    $wiadomosc = "Witaj drogi administratorze,\n\nOto nowe zgłoszenie:\n\n";
    $wiadomosc .= "Temat: $temat\n";
    $wiadomosc .= "Typ zgłoszenia: $typ\n\n";
    $wiadomosc .= "Treść zgłoszenia:\n$opis\n\n";
    $wiadomosc .= "Powodzenia!";

    // Nagłówki wiadomości
    $naglowki = 'From: Zgloszenie@NightTree.pl' . "\r\n" .
                'Reply-To: anonimowy@serwer.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

    // Wysyłanie wiadomości
    if(mail($to_email, $temat, $wiadomosc, $naglowki)) {
        echo '<div style="background-color:green;">Zgłoszenie zostało wysłane </div>';
    } else {
        echo '<div style="background-color:red;">Nie udało się wysłać zgłoszenia</div>';
    }
}
?>
<!doctype html>
<html lang="pl">
<head>


    <title>nighttree - Zgłaszanie</title>
    <link rel="stylesheet" href="STYLE.css" type="text/css">
   <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    
</head>
<body>

<div id="container">

        <div id="top-bar">

            <a href="https://www.nighttree.c4ndy.pl/projekt.html"><button class="buttony">Projekt</button></a>
            <a href="https://www.nighttree.c4ndy.pl/index.html"><button class="buttony">strona główna</button></a>
            <a href="https://www.nighttree.c4ndy.pl/informacje.html"><button class="buttony">Informacje</button></a>
            <a href="https://www.nighttree.c4ndy.pl/regulamin.html"><button class="buttony">Regulamin</button></a>
            <a href="https://www.nighttree.c4ndy.pl/Programowanie.html"><button class="buttony">środowisko programistyczne</button></a>
            


          
            
        </div>

            
    
      <form method="post" action="">
        <input type="text" name="temat" placeholder="Temat zgłoszenia">
        <br><br>
        <select id="typ" name='typ'>
            <option value="BŁĄD">BŁĄD</option>
            <option value="POMYSŁ/PROPOZYCJA">POMYSŁ/PROPOZYCJA</option>
            <option value="INNE">INNE</option>
        </select>
        <br><br>
        <textarea name="opis" placeholder="Treść zgłoszenia" rows="25" cols="50"></textarea>
        <br><br>
        <input type="submit" value="Wyślij">
      </form>
        
    </div>



            <footer> kontakt: historia3432@gmail.com </footer>
    
</body>
</html>
