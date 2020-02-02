<?php
require "dbinc.php";
CONST PROSPECTS = [
    "nni"=>[5331663990,8560152121, 7247793473, 4384379323 , 4426254736, 6804320662 , 9676529079 , 976356445, 4808500825,
5869588871 , 7487957454 , 977100459 ,8033237357 , 1355646111 , 2242040081 , 5099718329 , 5413202350 , 5467479725 ,
        6230036193 , "9766679568X" , 2476634018 , 9923320510 , 1510718192 , 205621525 , 2584423626 , 4800520258 ,
        9347636851 , 9471162920 , 288381149, 107228815 , 3397021499 , 403610490, 108992829 , 1112044019 , 4110942586 ,
5888814121 , 2166344275 , 2912414288 , 5193146643 , 7634331066 , 8039574641 , 879242256 , 8804419126 , 1045358266 ,
        1454183128 , 1485503167 , 2051351040 , 5622600804 , 6336924327 , 7354725897 , 8499439705 ],
    "firstname"=>["Bodin"     ,"Rodrigue"  ,"Constance"     ,"Vincent"   ,"Daniel"    ,"Diallo"    ,"Fernande"  ,"Robule"
        ,"Georges"    ,"Regis"  ,"Pierre"    ,"Sancho"   ,"Michel"  ,"Noel"      ,"Fabrice"      ,"Nours"      ,"Raphael"
        ,"Martin"    ,"Benoit"    ,"Mickael"     ,"Foucault"   ,"Philippe"  ,"Pierrot"    ,"Jean"   ,"Bernard"   ,"Baptiste"
        ,"Rodrigo"  ,"Renard"    ,"Carl"  ,"Elisabeth"   ,"Corine"    ,"Colin"    ,"Monique"     ,"Barbe"     ,
        "Alfred"     ,"Salomon"    ,"Patrick"  ,"Paule"      ,"Ratatouille"   ,"Sylvain"    ,"Damien"   ,"Charles"    ,
        "Louis"  ,"Barthelemy" ,"Mireille"    ,"Chretien"  ,"Jacqueline"    ,"Alexandre"  ,"Mary"  ,"Donald"  ,"Daniel"
    ],
    "lastname"=>["Durand", "Duprat", "Dupont","Breton","Canard","Pichon", "Belmont", "Genest", "Trank", "Vrac", "Cloret",
        "Jarn", "Yong", "Plat", "Fers", "Dupuis", "Dubois", "Martin", "Clave", "Bert", "Jaret", "Gras", "Miston", "Marlagot",
        "frere", "Dez", "Duret", "Drap"],
];


$query1 = "create table IF NOT EXISTS prospect(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
nni VARCHAR(255) NOT NULL ,
 firstname VARCHAR(255) NOT NULL ,
 lastname VARCHAR(255) NOT NULL )";

$pdo->exec($query1);


for ($i = 0 ; $i < 500 ; $i++){
    $nni= PROSPECTS["nni"][array_rand(PROSPECTS['nni'])];
    $firstname= PROSPECTS["firstname"][array_rand(PROSPECTS['firstname'])];
    $lastname= PROSPECTS["lastname"][array_rand(PROSPECTS['lastname'])];
$query2 = "insert into testsearch.prospect (nni, firstname, lastname) VALUES ('".$nni."' , '".$firstname . "','". $lastname ."')";
$pdo->exec($query2);
}

header("Location: /index.php");
