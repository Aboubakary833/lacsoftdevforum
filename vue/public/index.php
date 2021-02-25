<?php

require_once "../../model/DataBase.class.php";
$db = new DataBase('forum', 'root', '');
$req = $db->queryData('SELECT * FROM users');
if($req->rowCount() == 0) header('Location: enregistrement.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta theme-color="#1F2034">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/connexion.css">
    <title>Connexion</title>
</head>
<body>
    
    <div id="container">
        <div id="shape_field">
            <img src="../src/fonts/wave.png" class="wave" alt="Wave">
            <img src="../src/fonts/login.png" class="login" alt="Login_image">
        </div>
    
        <div id="form_bloc">
            <h1>Connectez-vous à LacSoft Dev Forum</h1>
            <div class="error">
            <span></span>
            <button><span>x</span></button>
            </div>
            <form name="form">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
                <input type="password" name="password" placeholder="Mot de passe" required><br>
                <button type="submit">Connexion</button>
            </form>
            
        </div>
    </div>

    <script src="../src/scripts/connexion.js" type="text/javascript"></script>
</body>
</html>