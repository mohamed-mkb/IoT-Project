<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Page</title>
    <link rel="stylesheet" href="Login_Style.css">
</head>
<body>
    <form method="post" id="logInSection">
        <h1>Page de connexion</h1> <br>
        <input type="text" name="nom"><br><br>

        <input type="text" name="mdp" ><br><br><br>

        <input type="submit" name="LogBtn" value="Me Connecter" id="connectBtn"><br>
    </form>

    <?php
// Lien php bdd
    include('../PHP/lien.php');

// fonction pour verifier si l'utilisateur existe

    if(isset($_POST['LogBtn'])){

        if(!empty($_POST['nom']) && (isset($_POST['mdp']))){

            $n = $_POST['nom'];
            $m = $_POST['mdp'];

            $sql = "SELECT nom, mdp, adminis
                FROM utilisateurs
                WHERE nom = '$n' 
                AND mdp = '$m' " ;

            $result = mysqli_query($conn, $sql);

            $user = mysqli_fetch_row($result);

            if ( mysqli_num_rows($result) > 0 ) 
            {
                if ( $user[2] == 0 )
                {
                    header('Location: ../User_Page/User_Page.html');
                }else {
                    header('Location: ../Admin_Page/Admin_Page.php');
                };
            }else {
                die("Utilisateur ou mot de passe incorrect");
            };
        };
    };
    ?>

</body>
</html>