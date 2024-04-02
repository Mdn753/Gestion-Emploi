<?php
    session_start();

    // Check if user is logged in as admin
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'etudiant') {
        // User is logged in as admin
        // Retrieve user information
        $user = $_SESSION['user'];
        $filiere = $user['filiere'];
        $emploi = $this->m->getEmploiFiliere($filiere);

        // Your admin page content here
    } else {
        // Redirect to login page or show access denied message
        header("Location: login.php");
        exit();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Bienvenue, <?php echo $user['Nom'] . ' ' . $user['Prenom']; ?></h1>
    <h2>Emploi du temps</h2>
    <table>
        <tr>
            <th>Jour</th>
            <th>08:00 - 10:00</th>
            <th>10:00 - 12:00</th>
            <th>14:00 - 16:00</th>
            <th>16:00 - 18:00</th>
        </tr>
        <?php foreach ($emploi as $emp): ?>
            <tr>
                <td><?php echo $emp['jour_semaine']; ?></td>
                <td><?php echo $emp['matiere'] . ' - ' . $emp['Id_salle']; ?></td>
                <td><?php echo $emp['matiere'] . ' - ' . $emp['Id_salle']; ?></td>
                <td><?php echo $emp['matiere'] . ' - ' . $emp['Id_salle']; ?></td>
                <td><?php echo $emp['matiere'] . ' - ' . $emp['Id_salle']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>