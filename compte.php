<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <title>Mon compte</title>
</head>
<body>
    <div class="container">
        <form id="compte" action="" method="post">
            <h2>Mon compte</h2>

            <h3>Modification de données</h3>

            <div class="modification">
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <br>

            <div class="modification">
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>
            <br>

            <div class="modification">
            <input type="date" id="dateNaissance" name="dateNaissance" required>
            </div>
            <br>

            <div class="modification">
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
            </div>
            <br>

            <div class="modification">
            <input type="email" id="email" name="email" placeholder="Adresse mail" required>
            </div>
            <br>

            <div class="modification">
            <input type="password" id="motDePasse" name="motDePasse" placeholder="Mot de passe" required>
            </div>
            <br>

            <div class="bio">
            <textarea placeholder="Biographie" rows="5"></textarea>
            </div>
            <br>

            <div class="genre">
            <select id="genre" name="genre" aria-placeholder="Genre" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select>
            </div>
            <br>
            <div class="btn-center">
            <button type="submit">Changer</button><br>
            </div>
            <br>
        </form>
    </div>
</body>
</html>