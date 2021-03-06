<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/admin.css">
    <title>Admin Panel</title>
</head>
<body>
<header>
        <div>
            <a href="accueil.php?azenht4us=<?=$_GET['user_id']?>">
                <i class="fa fa-arrow-left"></i>
                <span>Page d'accueil</span>
            </a>
        </div>
        <div>
            <span>Admin Panel</span>
        </div>
</header>
<main>
    <a href="enregistrement.php" class="addUser">Ajouter un développeur</a>
    <?php  require_once "../../controller/traitements/getData.php"; ?>

</main>
<script src="../src/scripts/adminPanel.js"></script>
</body>
</html>