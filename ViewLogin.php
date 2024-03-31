<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form method="post" action="ctrl.class.php?action=login">
  <label for="username" class="form-label">Email address</label>
  <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  <label for="mdp" class="form-label">Password</label>
  <input type="password" class="form-control" id="mdp" name="mdp">
  <label for="role" class="form-label">Role</label>
    <select class="form-select" id="role" name="role">
    <option value="admin">Admin</option>
    <option value="enseignant">Enseignant</option>
    <option value="etudiant">Etudiant</option>
    </select>

  <!-- <label for="role" class="form-label">role</label>
  <input type="text" class="form-control" id="role" name="role"> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>