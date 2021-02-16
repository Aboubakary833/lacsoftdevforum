<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../vue/src/styles/general.css">
    <link rel="stylesheet" href="../vue/src/styles/postForm.css">
    <title>Publier</title>
</head>
<body>
<header>
        <div id="homepageLink">
            <a href="posts.php">
                <i class="fa fa-arrow-left"></i>
                <span>Page d'accueil</span>
            </a>
        </div>
        <div id="title_field">
            <a href="#" id="brand">
                <span>LacSoft</span>
                <span>Dev Forum</span>
            </a>
        </div>
    </header>
    <main>
        <h1>Votre publication</h1>
        <form action="insertPost.php" method="POST" enctype="multipart/form-data">
            <textarea type="text" name="posText" placeholder="Entrez le texte de votre post...." required></textarea><br>
            <div>
                <label for="file">Image pour votre post</label>
                <input type="file" id="file" name="image">
                <p class="error" style="display: none;"></p>
            </div>
            <button type="submit">Publier <i class="fa fa-pen"></i></button>
        </form>
    </main>
    <script src="../vue/src/scripts/postForm.js" type="text/javascript"></script>
</body>
</html>