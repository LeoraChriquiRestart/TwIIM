<?php

require "template/twitterdatabase.php";

$requete = $database->prepare("SELECT * FROM tweets ORDER BY date DESC");
$requete->execute();
$allCourses = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>TwIIM</title>
</head>
<body>
    <?php require "template/twitternav.php"; ?>
    <main>
        <form class="form" method="POST" action="insert.php">

            <input type="text" name="contenu" placeholder="Quoi de neuf ?">
            <input type="text" name="tag" placeholder="#">    

            <button type="submit">Envoyer</button>
        </form>


        <hr>

        <?php  foreach($allCourses as $course) { ?>

            
            <img src="https://picsum.photos/200/300" alt="avatar">
            
            <p>@<?= $course['nom'] ?></p>
            
            <p><?= $course['contenu'] ?></p>
            <p>Tag(s) associé(s) : <?= $course['tag']?></p>
            <p><?= $course['date']?></p>
                
                
            <form action="delete.php" method="POST">
                <input type="hidden" name="supp" value="<?= $course['id'] ?>">
                <button type="submit">Supprimer</button>
            </form>

        <?php } ?>
    </main>
    
</body>
</html>