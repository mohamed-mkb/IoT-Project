<?php
// Lien php bdd
    include('lien.php');

// Insérer les valeur de l'arduino vers la bdd

    $hum = $_GET['temperature'];
    $temp = $_GET['humidite'];

    $sql = "INSERT INTO valeur (temperature, humidite)
            VALUES ($temp, $hum)";

    mysqli_query($conn, $sql);

?>