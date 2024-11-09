<?php

session_start();



session_start();
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']); // Odstranění zprávy po zobrazení
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-vstupenka</title>
  <link rel="stylesheet" href="styly.css">
</head>
<body>
  

<header>
  <h1>Vstupenka na Strašidelný hrad</h1>
</header>

<main>
  <div class="container">
    <form action="makepdf.php" method="POST">
        <label for="name">Zadejte své jméno:</label>
          <input type="text" name="name" placeholder="Jméno"> <br>
        <label for="adresa">Zadejte svou adresu:</label>
          <input type="text" name="adresa" placeholder="Adresa"> <br>
        <div class="radiobutton">
          <input type="radio" name="termin" value="9:00" checked>
            <label for="termin1">od 9:00 hod.</label>
          <input type="radio" name="termin" value="12:00">
            <label for="termin2">od 12:00 hod.</label>
          <input type="radio" name="termin" value="15:00"> 
            <label for="termin3">od 15:00 hod.</label> <br>
        </div>
      <label for="jeden">Počet osob (max. 4):</label>
      <select name="person">
        <option value="1">1 osoba</option>
        <option value="2">2 osoby</option>
        <option value="3">3 osoby</option>
        <option value="4">4 osoby</option> 
      </select><br>
      <button>Vytisknout vstupenku</button>
    </form>
  </div>
</main>



<footer></footer>



</body>
</html>