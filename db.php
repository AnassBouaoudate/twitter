<?php
$host = 'localhost';  
$dbname = 'twitter';  
$user = 'Anass';  
$pass = 'Anass111';  

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*
    $res = $pdo->query("SELECT * FROM user;");
    while($s = $res->fetch()){
        echo $s['username'].PHP_EOL;
    }*/
}
catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
