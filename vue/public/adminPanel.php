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
            <a href="posts.php">
                <i class="fa fa-arrow-left"></i>
                <span>Page d'accueil</span>
            </a>
        </div>
        <div>
            <span>Admin Panel</span>
        </div>
</header>
<main>

    <div class="panel">
        <div class="panelHead">
            <div id="users">Utilisateurs</div>
            <div id="posts">Publications</div>
            <div id="comments">Commentaires</div>
        </div>
        <div class="panelList">
        <div id="usersData">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cissé</td>
                        <td>Aboubakary</td>
                        <td>Abubakr</td>
                        <td>abouakarycisse410@gmail.com</td>
                        <td>Admin</td>
                        <td><button id="del">Supprimer</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="postsData">

        </div>
        <div id="commentsData">

        </div>
        </div>
    </div>

</main>
</body>
</html>