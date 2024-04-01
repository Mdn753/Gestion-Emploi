<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un emploi de temps</title>
</head>
<body>
    <form method="post" action="ctrl.class.php?action=addEmploiFiliere">
    <label for="filiere" class="form-label">filiere</label>
        <select class="form-select" id="filiere" name="filiere">
        <option value="IDSIT">IDSIT</option>
        <option value="GL">GL</option>
        <option value="SSE">SSE</option>
        <option value="SSI">SSI</option>
        <option value="2SCL">2SCL</option>
        <option value="IDF">IDF</option>
        <option value="2IA">2IA</option>
        <option value="BI">BI</option>
        </select>
    <label for="jour_semaine" class="form-label">jour</label>
        <select class="form-select" id="jour_semaine" name="jour_semaine">
        <option value="Lundi">Lundi</option>
        <option value="Mardi">Mardi</option>
        <option value="Mercredi">Mercredi</option>
        <option value="Jeudi">Jeudi</option>
        <option value="Vendredi">Vendredi</option>
        </select>
    <label for="heure_debut" class="form-label">Heure de debut</label>
    <input type="time" class="form-control" id="heure_debut" name="heure_debut">
    <label for="heure_fin" class="form-label">Heure de fin</label>
    <input type="time" class="form-control" id="heure_fin" name="heure_fin">
    <label for="Id_salle" class="form-label">Id de la salle</label>
    <input type="text" class="form-control" id="Id_salle" name="Id_salle">
    <label for="Id_Enseignant" class="form-label">Id de l'enseignant</label>
    <input type="text" class="form-control" id="Id_Enseignant" name="Id_Enseignant">
    <label for="matiere" class="form-label">matiere</label>
    <input type="text" class="form-control" id="matiere" name="matiere">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>