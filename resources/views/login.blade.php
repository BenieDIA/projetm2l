<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Connexion M2L</title>
</head>
<body>
    <header>M2L</header>
    <div class="container">
        <h1>BIENVENUE sur l'espace de connexion M2L</h1>
        <p>Veuillez entrer votre identifiant et votre mot de passe</p>
        
        @if ($errors->has('login'))
            <p style="color:red;">{{ $errors->first('login') }}</p>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <input type="text" name="username" class="input-box" placeholder="Email" required>
            <br>
            <input type="password" name="password" class="input-box" placeholder="Password" required>
            <br>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
