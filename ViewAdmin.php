<?php
    session_start();

    // Check if user is logged in as admin
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        // User is logged in as admin
        // Retrieve user information
        $user = $_SESSION['user'];

        // Your admin page content here
    } else {
        // Redirect to login page or show access denied message
        header("Location: login.php");
        exit();
    }
    require 'model.class.php';
    $model = new Model();
    $enseignantData=$model->AllEnseignant();
    $etudiantData=$model->AllEtudiant();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $user['Nom'] . ' ' . $user['Prenom']; ?></h1>
    <h2>Enseignants</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>matiere</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enseignantData as $enseignant): ?>
                <tr>
                    <td><?php echo $enseignant['Id_Enseignant']; ?></td>
                    <td><?php echo $enseignant['Nom']; ?></td>
                    <td><?php echo $enseignant['Prenom']; ?></td>
                    <td><?php echo $enseignant['matiere']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Étudiants</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filiere</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiantData as $etudiant): ?>
                <tr>
                    <td><?php echo $etudiant['Id_Etudiant']; ?></td>
                    <td><?php echo $etudiant['Nom']; ?></td>
                    <td><?php echo $etudiant['Prenom']; ?></td>
                    <td><?php echo $etudiant['filiere']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>Ajouter un etudiant</p>
    <a href="FormAddEtudiant.php"><img src="add.png"></a>
    <p>Ajouter un enseignant</p>
    <a href="FormAddEnseignant.php"><img src="add.png"></a>
</body>
</html>