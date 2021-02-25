<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..src/fonts/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../src/styles/general.css">
    <link rel="stylesheet" href="../src/styles/postForm.css">
    <title>Publier</title>
</head>
<body>
<header>
        <div id="homepageLink">
            <a href="accueil.php?azenht4us=<?=$_GET['user_id'];?>">
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
        <form action="../../controller/traitements/insertPost.php" method="POST" enctype="multipart/form-data">
            <textarea type="text" name="text" placeholder="Entrez le texte de votre post...." required></textarea><br>
            <input type="text" name="category" list="categories" placeholder="Catégorie du post" required>
            <datalist id="categories">
                <option value="HTML"></option>
                <option value="CSS"></option>
                <option value="JavaScript"></option>
                <option value="NodeJS"></option>
                <option value="PHP"></option>
                <option value="MySQL"></option>
            </datalist>
            <input type="hidden" name="userID" value="<?=$_GET['user_id'];?>">
            <div>
                <label for="file">Image pour votre post</label>
                <input type="file" id="file" name="image">
                <p class="error" style="display: none;"></p>
            </div>
            <button type="submit">Publier <i class="fa fa-pen"></i></button>
        </form>
    </main>
    <script src="../src/scripts/postForm.js" type="text/javascript"></script>
</body>
</html>