
<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();

//proměnné

$name = $_POST["name"];
$address = $_POST["adresa"];
$time = $_POST["termin"];
$person = $_POST["person"];



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($name) || empty($address)) {
        $_SESSION['error'] = "Chybí jméno nebo adresa!";
        header("location: index.php");
        exit();
    }
}

//singulár nebo plurál vstupenek 

if ($person === "1") {

    $vstupenka = " této vstupenky";
} else {

    $vstupenka = " těchto vstupenek";
}

// jméno souboru

$jmeno_souboru = "hrad_vstupenky_". $name;

//cena vstupenek

switch ($person) {

    case "1":
        $vysledna_cena = 350;
        break;

    case "2":
        $vysledna_cena = 700;
        break;

    case "3":
        $vysledna_cena = 1050;
        break;

    case "4":
        $vysledna_cena = 1400;
        break;
};


$mpdf = new \Mpdf\Mpdf();

//vytvoření pdf

$data = "";

$data .= "<h1>e-Vstupenka Strašidelný hrad</h1>";

//přidání dat
$data .= "Jménem Správy hradu Kostival Vám děkujeme za zakoupení " . $vstupenka . ". Přejeme Vám příjemnou zábavu během času stráveného v našem hradním komplexu. <br>";
$data .= "Držitelem " . $vstupenka . " je <strong>" . $name . "</strong>. <br>";
$data .= "Adresa: " . $address . "<br>";
$data .= "Vybrali jste si termín prohlídky od <strong>" . $time . " hod. </strong><br>";
$data .= "Počet osob: <strong>" . $person . "</strong> a výsledná cena tudíž činí <strong>" . $vysledna_cena . "</strong> Kč. <br>";

//napsání pdfka
$mpdf->WriteHTML($data);

//output do prohlížeče
$mpdf->Output("$jmeno_souboru" . ".pdf", "D");

?>

