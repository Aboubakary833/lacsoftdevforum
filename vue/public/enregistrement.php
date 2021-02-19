<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta theme-color="#1F2034">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/inscription.css">
    <title>Inscription</title>
</head>
<body>
    
    <div id="container">
        <div id="shape_field">
            <img src="../src/fonts/wave.png" class="wave" alt="Wave">
            <img src="../src/fonts/signup.png" class="login" alt="Login_image">
        </div>
    
        <div id="form_bloc">
            <h1>Inscription</h1>
            <div class="error">
            <span></span>
            <button><span>x</span></button>
            </div>
            <form>
                <input type="text" name="firstname" placeholder="Prénom" required><br>
                <input type="text" name="lastname" placeholder="Nom" required><br>
                <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="email" name="emailConfirm" placeholder="Confirmation Email" required><br>
                <input type="password" name="password" placeholder="Mot de passe" required><br>
                <input type="password" name="passwordConfirm" placeholder="Confirmation mot de passe" required><br>
                <input type="text" name="role" placeholder="Rôle" required><br>
                <button type="submit">Inscrire</button>
            </form>
            <a class="link" href="index.php">Page de connexion</a>
        </div>
    </div>
    <script src="../src/scripts/inscription.js" type="text/JavaScript"></script>
</body>
</html>