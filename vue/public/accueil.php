<?php $user_id = $_GET['azenht4us']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/accueil.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <div id="title_field">
            <a href="#" id="brand">
                <span>LacSoft</span>
                <span>Dev Forum</span>
            </a>
        </div>
        <div id="menu_field">
            <?php
            if($user_id == 1) {
                ?>
                <div id="publish">
                    <a href="adminPanel.php">Admin Panel</a>
                </div>
                <?php
            }
            ?>
            <div id="publish">
                <a href="postform.php?user_id=<?=$user_id;?>">Publier&nbsp;&nbsp;<i class="fa fa-pen"></i></a>
            </div>
            <form>
                <input type="text" placeholder="Rechercher...">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            <div id="notif_profil">
                <a href="#">
                    <i class="fa fa-bell"></i>
                </a>
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                </a>
            </div>
        </div>
    </header>
    <?php require_once "../../controller/traitements/posts.php"; ?>