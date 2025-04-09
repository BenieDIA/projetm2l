<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion M2L</title>
</head>
<body>
    <header>M2L</header>
    <div class="container">
        <h1>BIENVENUE sur l'espace de connexion M2L</h1>
        <p>Veuillez entrer votre adresse email et votre mot de passe</p>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <input type="email" name="username" class="input-box" placeholder="Email" required>
            <br>
            <input type="password" name="password" class="input-box" placeholder="Password" required>
            <br>
            <p class="forgot">Mot de passe oublié?</p>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
