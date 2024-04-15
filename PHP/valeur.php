<?php
// Lien php bdd
include('lien.php');

// fonction pour recupérer les valeurs

    $sql = "SELECT id, temperature, humidite, date_heure 
            FROM valeur
            ORDER BY id DESC
            LIMIT 10";

    $donnee = mysqli_query($conn, $sql);

    $result = mysqli_query($conn, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as $row) {
    echo $row["id"] . " " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
?>