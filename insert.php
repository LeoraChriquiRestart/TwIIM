<?php

require 'template/twitterdatabase.php';

$nom = $database->prepare("SELECT nom FROM utilisateurs");
$nom->execute();
$affiche = $nom->fetch(PDO::FETCH_ASSOC);
$pseudo = $affiche['nom'];


$insert = $database->prepare("INSERT INTO tweets (nom, contenu, tag) VALUES(:nom, :contenu, :tag)");
$insert->execute(
    [
        "nom" => $pseudo,
        "contenu" => $_POST['contenu'],
        "tag" => $_POST['tag']
    ]
);


header("Location: twitterindex.php");