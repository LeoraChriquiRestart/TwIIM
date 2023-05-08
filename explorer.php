<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <title>Explorer</title>
</head>
<body>
    <?php require "template/twitternav.php"; ?>
    <main>
        <form>
            <input type="search" name="search" placeholder="Rechercher">
            <button type="submit">Search</button>
        </form>

        <?php

            require "template/twitterdatabase.php";

            if (isset($_GET['search']) && $_GET['search'] != '') {

                $requete = $database->prepare('SELECT * FROM tweets WHERE tag LIKE :search');

                $recherche = '%' . $_GET['search'] . '%';

                $requete->execute(["search" => $recherche]);
                
                $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

                echo "<hr>";
                foreach ($resultat as $tweet) { 
                    echo "<h1>{$tweet['nom']}</h1>";
                    echo "<p>{$tweet['contenu']}</p>";
                    echo "<p>{$tweet['date']}</p>";
                }
            } else {
                echo "<p>Cherchez depuis un tag :</p>";
            }?>

    </main>
</body>
</html>