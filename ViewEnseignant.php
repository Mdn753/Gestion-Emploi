<?php
    session_start();

    // Check if user is logged in as admin
    if(isset($_SESSION['role']) && $_SESSION['role'] === 'enseignant') {
        // User is logged in as admin
        // Retrieve user information
        $user = $_SESSION['user'];

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
</head>
<body>
    <h1>Bienvenue, <?php echo $user['Nom'] . ' ' . $user['Prenom']; ?></h1>
</body>
</html>