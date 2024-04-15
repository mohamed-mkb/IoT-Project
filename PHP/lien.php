<!-- Lien entre la base de donnée et le php -->
<?php
    $servername = 'localhost';
    $bdname   = 'bdd1';
    $username = 'root';
    $pass = '';
        
    $conn = mysqli_connect($servername, $username, $pass, $bdname);

    // Check connection
    if (!$conn) {
        die("Échec de connection à la base de donnée");
    }

?>
