<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="{{ asset('css/profiledit.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Collaborateur</title>
</head>
<body>
    @php
    $user = session('user');
@endphp
<header>
    <div class="logo">M2L</div>
    <div class="top-bar">
        <a href="{{ route('connected') }}" class="add-btn">Accueil</a>
        <a href="{{ route('list') }}" class="add-btn">Liste des collaborateurs</a>
        <a href="{{ route('logout') }}" class="add-btn">Se déconnecter</a>
    </div>
</header>
    <div class="container">
        <header>Modifier Collaborateur</header>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('collaborateur.update', $collaborateur->id) }}" enctype="multipart/form-data">>
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $collaborateur->nom) }}" required>
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ old('prenom', $collaborateur->prenom) }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="mail" value="{{ old('mail', $collaborateur->mail) }}" required>
            </div>
            <div class="form-group">
                <label>Poste</label>
                <input type="text" name="poste" value="{{ old('poste', $collaborateur->poste) }}" required>
            </div>

            <div class="form-group">
                <label>Pays</label>
                <input type="text" name="pays" value="{{ old('pays', $collaborateur->pays) }}">
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="telephone" value="{{ old('telephone', $collaborateur->telephone) }}">
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input type="text" name="ville" value="{{ old('ville', $collaborateur->ville) }}">
            </div>
            <div class="form-group">
                <label for="civilite">Civilité</label>
                <select name="civilite" id="civilite">
                    <option value="monsieur" {{ old('civilite', $collaborateur->civilite) == 'monsieur' ? 'selected' : '' }}>Monsieur</option>
                    <option value="madame" {{ old('civilite', $collaborateur->civilite) == 'madame' ? 'selected' : '' }}>Madame</option>
                    <option value="autre" {{ old('civilite', $collaborateur->civilite) == 'autre' ? 'selected' : '' }}>Autres</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $collaborateur->date_naissance) }}">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*">
            </div>

            <button type="submit" class="btn">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
