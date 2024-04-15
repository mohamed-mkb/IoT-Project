<?php
// Lien php bdd
    include('lien.php');

// recupérer les 10 dernières valeurs

    $sql = "SELECT id, temperature, humidite, date_heure 
            FROM valeur
            ORDER BY id DESC
            LIMIT 10";

    $donnees = mysqli_query($conn, $sql);
    $rows = $donnees->fetch_all(MYSQLI_ASSOC);

    $data = array();

    foreach ($rows as $row) {
        array_push($data, $row);
    }

    header('Content-Type: application/json');
    echo json_encode($data);
?>