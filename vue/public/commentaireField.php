<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/commentaire.css">
    <title>Commentaire</title>
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
            <span>Commentaire(s)</span>
        </div>
    </header>
    <?php require_once "../../controller/traitements/commentaire.php"; ?>
</body>
</html>