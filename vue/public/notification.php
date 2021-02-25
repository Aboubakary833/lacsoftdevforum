<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/notification.css">
    <title>Notification</title>
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
            <span>Notification(s)</span>
        </div>
    </header>
    <main>
        <ul>
            <?php require_once"../../controller/traitements/notif_traitement.php"; ?>
        </ul>
    </main>
</body>
</html>