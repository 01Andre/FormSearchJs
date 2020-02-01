<?php
require "dbinc.php";

$pdo = new PDO('mysql:host=localhost;dbname=g_pro', 'root', $password);

$query = "SELECT * FROM agents";
$statement = $pdo->query($query);
$agents = $statement->fetchAll();
$test = false;

function namesOfInputFilled($post)
{
    $namesOfInputFilled = "";
    foreach ($post as $rubric => $answer) {
        if ($answer) {
            $namesOfInputFilled .= ucfirst($rubric);
        }
    }
    return $namesOfInputFilled;
}

function getQueryWithNniFilled($post)
{
    return 'SELECT nni, nom, prenom FROM agents WHERE nni = ' .$post['nni'];
}

function getQueryWithNniNameFilled($post)
{
    return 'SELECT * FROM agents WHERE nni = ' .$post['nni'] . ' AND ' . $post['nom'];
}