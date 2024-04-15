<?php
// Lien php bdd
    include('lien.php');

// Insérer les valeur de l'arduino vers la bdd

    $temp = $_GET['temperature'];
    $hum = $_GET['humidite'];

    $sql = "INSERT INTO valeur (temperature, humidite)
            VALUES ($temp, $hum)";

    mysqli_query($conn, $sql);

?>