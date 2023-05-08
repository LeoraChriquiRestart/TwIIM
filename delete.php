<?php

require 'template/twitterdatabase.php';

$supp = $database->prepare("DELETE FROM tweets WHERE id = :id");
$supp->execute(
    [
        "id" => $_POST['supp']
    ]
    );

header("Location: twitterindex.php");

?>