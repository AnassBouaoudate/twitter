<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <form id="inscriptionForm" action="" method="post">
            <h2>Inscription</h2>
            
            <input type="text" id="nom" name="nom" placeholder="Nom" required><br>
            <br>

            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required><br>
            <br>

            <input type="date" id="dateNaissance" name="dateNaissance" required><br>
            <br>

            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required><br>
            <br>

            <input type="email" id="email" name="email" placeholder="Adresse mail" required><br>
            <br>

            <input type="password" id="motDePasse" name="motDePasse" placeholder="Mot de passe" required><br>
            <br>

            <select id="genre" name="genre" aria-placeholder="Genre" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select><br>
            <br>

            <button type="submit">S'inscrire</button><br>
            <br>
        </form>
    </div>
</body>
</html>