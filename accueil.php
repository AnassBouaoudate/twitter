<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./accueil.css">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./accueil.js" defer> </script>
    <title>Accueil</title>
</head>
<body>
    <?php 
 
        session_start();

        $id = 1; //$_SESSION['id'];

    ?>

<div class="container">
    <div class="logo">
        <img src="./images/logo.png" alt="twitter">
    </div>
    <div class="list">
        <ul>
            <a href="accueil.php">
                <div id="home">
                    <li><img src="./images/home.png" alt="home">Home</li>
                </div>
            </a>
            <div id="recherche">
                <li><img src="./images/loupe.png" alt="recherche">Recherche</li>
            </div>
            <a href="messagerie.php">
                <div id="message">
                    <li><img src="./images/message.png" alt="message">Message</li>
                </div>
            </a>
            <a href="profil.php">
                <div id="profil">
                    <li><img src="./images/profil.png" alt="profil">Profil</li>
                </div>
            </a>
        </ul>
    </div>
</div>

<div class="container2">

    <div class="search-bar">
    <input type="text" placeholder="Recherche">
    <button type="submit">Recherche<i class="fas fa-search"></i></button>
    </div>
</div>

<div class="tweet">

    <div class="post-section">
        <textarea placeholder="Quoi de neuf ?" id="postContent" maxlength="140"></textarea>
        <input type="text" list="following" placeholder="Cibler une personne">
        <button type="button" id="postButton">Tweeter</button>
        
    </div>

    <div id="all" class="tweetotal">
        <!--
        <div class="tweet-content">
            <div>
                <div class="img-pseudo">
                    <div>
                        <img class="img-border" src="./images/profile.png" alt="Avatar de l'utilisateur">
                    </div>
                    <div>
                        <h3>lamine27</h3>
                    </div>
                </div>
                <h4>@lamine27</h4>

                <p>Celui qui me trouve le score exact je lui envoie 50€ PayPal.<br><br>A vos claviers. </p>
            </div>
            <img class="img-post" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9MkPKhibIoSnPrqAklQ1iIKRkV2wxtVkHMg&usqp=CAU" alt="Image du tweet">
            <div class="logo-post">
                    <img id="repost" src="./images/commentaire.png" alt="commentaire">
                    <img id="retweet" src="./images/retweet.png" alt="retweet">
                    <img id="like" src="./images/like.png" alt="like">
                </div>
            </div>
    
        </div>
        -->
    </div>

</div>


</body>
</html>

<?php
$host = 'localhost';
$dbname = 'twitter';
$username = 'Anass';
$password = 'Anass111';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql ->cont
    $sql = $conn->prepare("SELECT user.at_user_name FROM follow INNER JOIN user ON follow.id_follow = user.id;");
    $sql->execute();
    $following = $sql->fetchAll(PDO::FETCH_COLUMN);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

//affch lst der fllw
if (!empty($following)) {
    echo "<datalist id='following'>";
    foreach ($following as $username) {
        echo "<option value='$username'>";
    }
    echo "</datalist>";
}
?>

