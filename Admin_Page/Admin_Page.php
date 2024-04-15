<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <title>Admin-Page</title>
    <link rel="stylesheet" href="./Admin_Style.css">
</head>

<nav id="barreDeNav">
    <img src="../Images/Image-Profil.webp">
    <p>My Admin Session</p>
    <a href="../Home-Page/Home-Page.html"><button>Se Déconnecter</button></a>
    <a href="../Contact_Page/Contact_Page.html"><button>Contact</button></a>
</nav>

<body>
    <h1>
        Interface Administrateur
    </h1>

    <p>
        Vous pouvez à présent visualiser la température et l'humidité en temps réel :
    </p>

    <div class="dataTable">
        <table id="visualisationTable">
            <tr>
                <th>Température</th>
                <th>Humidité</th>
            </tr>
            <tr>
                <td>24°C</td>
                <td>54%</td>
            </tr>
        </table>        
    </div>

    <p>
        Vous pouvez à présent visualiser l'historique des données de température et d'humidité ci-dessous :
    </p>

    <div class="graph">
        <canvas id="tab_temp">
        </canvas>        
    </div>

    <br><br><br><br><br><br><br><br><br><br>

    <div class="graph">
        <canvas id="tab_hum">
        </canvas>        
    </div>

    <div>
        <form method="post" id="addUser">
            <h3>Ajouter un utilisateur :</h3>

            Identifiant : <br>
            <input type="text" name="nom"> <br>
            Mot de passe : <br>
            <input type="text" name="mdp"> <br>

            Admin :  <input type="checkbox" name="adminis" value="adminis"> <br>

            <input type="submit" name="button1" value="Valider">
        </form>

        <form method="post" id="delUser">
            <h3>Supprimer un utilisateur :</h3>

            Identifiant : <br>
            <input type="text" name="nom2"> <br>

            <input type="submit" name="button2" value="Valider" id="validBtn">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module" src="../js_graph/tab_temp.js"></script>
    <script type="module" src="../js_graph/tab_hum.js"></script>

    <?php
        // Lien php bdd
        include('../PHP/lien.php');

        // Ajouter un utilisateur

        if(isset($_POST['button1'])){

            if( (!empty ($_POST['nom'])) && (!empty ($_POST['mdp'])) ){

                // Vérification que l'utilisateur n'est pas déjà dans la base de donnée

                $n = $_POST['nom'];
                $m = $_POST['mdp'];

                $sql = "SELECT nom
                    FROM utilisateurs
                    WHERE nom = '$n'";

                $result = mysqli_query($conn, $sql);

                $user = mysqli_fetch_row($result);

                if ( mysqli_num_rows($result) > 0 ) 
                {
                    die("Utilisateur déjà existant");
                }else {

                // Ajouter l'utilisateur
                                    
                    if(isset($_POST['adminis'])) {
                        $a = 1;
                    } else {
                        $a = 0;
                    };

                    $sql2 = "INSERT INTO utilisateurs (nom, mdp, adminis) 
                            VALUES ('$n', '$m', '$a')";

                    mysqli_query($conn, $sql2);

                };
            };
        };

        // Supprimer un utilisateur

        if(isset($_POST['button2'])){

            if(!empty($_POST['nom2'])){

                $n2 = $_POST['nom2'];

                $sql3 = "DELETE FROM utilisateurs WHERE nom = '$n2' ";

                mysqli_query($conn, $sql3);

            };
        };

        
    ?>
</body>

<footer>
    Mohamed / Karim / James
</footer>

</html>