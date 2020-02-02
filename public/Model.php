<?php
require "dbinc.php";

$query = "SELECT * FROM prospect";
$statement = $pdo->query($query);
$prospects = $statement->fetchAll();
