<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_collaborateur'])) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
$host = "localhost";
$dbname = "m2l";
$username_db = "root";
$password_db = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username_db, $password_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Sélectionner un collaborateur aléatoire différent du connecté
$stmt = $pdo->prepare("SELECT * FROM collaborateurs WHERE id_collaborateur != :id ORDER BY RAND() LIMIT 1");
$stmt->bindParam(":id", $_SESSION['id_collaborateur']);
$stmt->execute();
$randomUser = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connected.css">
    <title>Espace M2L</title>
</head>
<body>
    <header>
        <div>M2L</div>
        <div class="profile-icon"><a href="profiledit.html">👤</a></div>
    </header>
    <div class="welcome-message">Bienvenue sur votre espace intranet M2L</div>
    <div class="container">
        <div class="welcome-box">
            <h2>Bienvenue sur votre espace M2L</h2>
            <p>Voulez-vous saluer un de vos collaborateurs ?</p>
            <div class="info-card">
                <img src="<?php echo htmlspecialchars($randomUser['photo'] ?? 'default.jpg'); ?>" alt="Profile Picture">
                <div class="info-text">
                    <p><strong><?php echo htmlspecialchars($randomUser['prenom'] . ' ' . $randomUser['nom']); ?></strong></p>
                    <p><?php echo htmlspecialchars($randomUser['email']); ?></p>
                    <p><?php echo htmlspecialchars($randomUser['telephone'] ?? 'Numéro inconnu'); ?></p>
                    <p><?php echo htmlspecialchars($randomUser['est_admin'] ? 'Administrateur' : 'Collaborateur'); ?></p>
                </div>
            </div>
        </div>
        <button class="btn"><a href="collabliste.html">Saluer quelqu'un d’autre</a></button>
    </div>
</body>
</html>