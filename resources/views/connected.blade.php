<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/connected.css') }}">
    <title>Espace M2L</title>
</head>
<body>
<header>
    <div class="logo">M2L</div>
    <div class="top-bar">
        <a href="{{ route('connected') }}" class="add-btn">Accueil</a>
        <a href="{{ route('list') }}" class="add-btn">Liste des collaborateurs</a>
        <a href="{{ route('logout') }}" class="add-btn">Se déconnecter</a>
 <div class="profile-icon">
    <a href="{{ route('collaborateur.edit', $user->id) }}" title="Mon profil">
        @if($user && $user->photo)
            <img
                src="{{ asset('storage/' . $user->photo) }}"
                alt="Ma photo de profil"
                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #0a3d62;"
            >
        @else
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0a3d62" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="background: #fff; border-radius: 50%; border: 2px solid #0a3d62;">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
            </svg>
        @endif
    </a>
</div>
    </div>
</header>

    <div class="container">
        <div class="welcome-box">
            <h2>Bienvenue sur votre espace M2L</h2>
            <p>Voulez-vous saluer un de vos collaborateurs ?</p>

            <div class="info-card">
                <!-- Affichage de l'image de profil avec une image par défaut si aucun fichier n'est présent -->
                <img src="{{ $collaborateur->photo ? asset('storage/' . $collaborateur->photo) : '' }}" alt="Profile Picture">
                <div class="info-text">
                    <!-- Affichage des informations du collaborateur -->
                    <p><strong>{{ $collaborateur->prenom }} {{ $collaborateur->nom }}</strong></p>
                    <p>{{ $collaborateur->mail }}</p>
                    <p>{{ $collaborateur->telephone }}</p>
                    <p>{{ $collaborateur->poste }}</p>
                </div>
            </div>
        </div>

        <!-- Bouton pour saluer un autre collaborateur -->
      <button class="btn">
    <a href="{{ route('connected', ['last' => $collaborateur->id]) }}">Saluer quelqu'un d’autre</a>
</button>
    </div>
</body>
</html>