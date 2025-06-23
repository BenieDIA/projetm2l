<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des collaborateurs - M2L</title>
    <link rel="stylesheet" href="{{ asset('css/collabedit.css') }}">
</head>
<body>
    @php
    $user = session('user');
@endphp
    <header>
        <div class="logo">M2L</div>
   <div class="top-bar">
    <a href="{{ route('connected') }}" class="add-btn">Accueil</a>
    @if($user && $user->isadmin)
        <a href="{{ route('collaborateur.create') }}" class="add-btn">Ajouter +</a>
    @endif
    <div>
        <a href="{{ route('logout') }}" class="add-btn">Se déconnecter</a>
    </div>
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
    </header>

    <main>
        <div class="search-bar">
            <form method="GET" action="{{ route('list') }}">
                <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
            </form>
        </div>

        <h2 class="title">Liste des collaborateurs</h2>

       <div class="collaborators">
    @foreach ($collaborateurs as $collaborateur)
<div class="card">
    <img src="{{ asset('storage/' . $collaborateur->photo) }}" alt="Photo de {{ $collaborateur->nom }}">
    <div class="info">
        <h3>{{ $collaborateur->prenom }} {{ $collaborateur->nom }}</h3>
        @if($user && $user->isadmin)
            <div style="display: flex; gap: 8px; align-items: center; margin-bottom: 8px;">
                <form action="{{ route('collaborateur.edit', $collaborateur->id) }}" method="GET" style="display:inline;">
                    <button type="submit" title="Modifier" style="background: none; border: none; cursor: pointer; font-size: 1.2em;">📝</button>
                </form>
                <form action="{{ route('collaborateur.destroy', $collaborateur->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce collaborateur ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Supprimer" style="background: none; border: none; cursor: pointer; font-size: 1.2em;">🗑️</button>
                </form>
            </div>
        @endif
        <p>{{ $collaborateur->mail }}</p>
        <p>{{ $collaborateur->telephone }}</p>
        <p>{{ $collaborateur->poste }}</p>
    </div>
</div>
    @endforeach
</div>
    </main>
</body>
</html>
