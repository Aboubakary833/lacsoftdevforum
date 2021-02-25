<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/profile.css">
    <title>Profil</title>
    <script>
    var id = <?=$_GET['user_id'];?>;
    </script>
</head>
<body>
<body>
    <header>
        <div>
            <a href="accueil.php?azenht4us=<?=$_GET['user_id'];?>">
                <i class="fa fa-arrow-left"></i>
                <span>Page d'accueil</span>
            </a>
        </div>
        <div>
            <span>Profil</span>
        </div>
    </header>
    <main>
        <div id="profile_img">
            <img src="../src/images/default-avatar.png" alt="profil">
        </div>
        <div id="user-info">
            <h1>Sidick</h1>
            <h2>abubakrsidick@gmail.com</h2>
        </div>
        <div id="edit">
            <button id="editBtn"><span>Editer</span> <i class="fa fa-pen"></i></button>
        </div>
        <div class="editForm">
            <form action="../../controller/traitements/editProfile.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Votre nouveau nom d'utilisateur"><br>
                <label for="image">
                    <span>Nouveau photo</span>
                    <i class="fa fa-upload"></i>
                </label>
                <input type="hidden" name="userID" value="<?=$_GET['user_id'];?>">
                <input type="file" name="image" id="image"><br>
                <button type="submit">Mettre à jour</button>
            </form>
        </div>
    </main>

    <script src="../src/scripts/profile.js" type="text/javascript"></script>
</body>
</html>