<?php
require "dbinc.php";

$pdo = new PDO('mysql:host=localhost;dbname=g_pro', 'root', $password);

$query = "SELECT * FROM agents";
$statement = $pdo->query($query);
$agents = $statement->fetchAll();



$test = false;
if ($_POST){

    $methodToExecute = "getQueryWith".namesOfInputFilled($_POST)."Filled";
    $query = $methodToExecute($_POST);
    $statement = $pdo->query($query);
    var_dump($query);
    $agents = $statement->fetchAll();
    var_dump($agents);

}

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

function getQueryWithNniNomFilled($post)
{
    return "SELECT * FROM agents WHERE nni = '" .$post['nni'] . "' AND '" . $post['nom']."'";
}

function getQueryWithNomFilled($post)
{
    return "SELECT nni, nom, prenom FROM agents WHERE nom = '" .$post['nom']."'";
}

function getQueryWithPrenomFilled($post){
    return "SELECT nni, nom, prenom FROM agents WHERE prenom = '" .$post['prenom']."'";
}

function getQueryWithNomPrenomFilled($post)
{
    return "SELECT nni, nom, prenom FROM agents WHERE prenom = '" .$post['prenom']."' AND nom = '". $post['nom']."'";
}

function getQueryWithNniPrenomFilled($post)
{
    return "SELECT nni, nom, prenom FROM agents WHERE prenom = '" .$post['prenom']."' AND nni = ". $post['nni'];
}