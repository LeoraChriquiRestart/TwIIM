<?php

require 'template/twitterdatabase.php';

$insert = $database->prepare("INSERT INTO utilisateurs (nom, pseudo, mail, mdp) VALUES(:nom, :pseudo, :mail, :mdp)");
$insert->execute(
    [
        "nom" => $_POST['nom'],
        "pseudo" => $_POST['pseudo'],
        "mail" => $_POST['mail'],
        "mdp" => $_POST['mdp']
    ]
);



header("Location: twitterindex.php");