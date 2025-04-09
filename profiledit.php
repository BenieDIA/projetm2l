<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="css/profiledit.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>

</head>
<body>
    <div class="container">
        <header>Modifier profil</header>
        <form>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom">
            </div>
            <div class="form-group">
                <label>Prenom</label>
                <input type="text" name="Prenom">
            </div>
            <div class="form-group">
                <label>Mail</label>
                <input type="mail" name="Mail">
            </div>
            <div class="form-group">
                <label>Poste</label>
                <input type="text" name="Prenom">
            </div>
           
           
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="mot_de_passe">
            </div>
            <div class="form-group">
                <label>Confirmation</label>
                <input type="password" name="confirmation">
            </div>
            <div class="form-group">
                <label>Pays</label>
                <input type="text" name="pays">
            </div>
            <div class="form-group">
                <label>téléphone</label>
                <input type="text" name="téléphone">
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input type="text" name="ville">
            </div>
            <div class="form-group">
                <label for="civilite">Civilité</label>
                <select name="civilite" id="civilite">
                    <option value="monsieur">Monsieur</option>
                    <option value="madame">Madame</option>
                    <option value="autre">Autres</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*">
            </div>
            <button type="submit" class="btn">Valider</button>
        </form>
    </div>
    
</body>
</html>
