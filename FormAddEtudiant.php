<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un etudiant</title>
</head>
<body>
    <form method="post" action="ctrl.class.php?action=addEtudiant">
    <label for="Id_Etudiant">Id_Etudiant:</label><br>
    <input type="text" id="Id_Etudiant" name="Id_Etudiant"><br>
    <label for="Nom">Nom:</label><br>
    <input type="text" id="Nom" name="Nom"><br>
    <label for="Prenom">Prenom:</label><br>
    <input type="text" id="Prenom" name="Prenom"><br>
    <label for="filiere">filiere:</label><br>
    <input type="text" id="filiere" name="filiere"><br>
    <label for="Email">Email:</label><br>
    <input type="email" id="Email" name="Email"><br>
    <label for="MDP">MDP:</label><br>
    <input type="text" id="MDP" name="MDP"><br>
    <input type="submit" value="Submit">
    </form>
</body>
</html>