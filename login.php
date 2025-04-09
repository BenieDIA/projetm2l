<?php
session_start();

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

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'] ?? ''; // Utilisation de l'email au lieu du username
    $password = $_POST['password'] ?? '';

    // Requête pour vérifier les identifiants
    $stmt = $pdo->prepare("SELECT * FROM collaborateurs WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['id_collaborateur'] = $user['id_collaborateur'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['est_admin'] = $user['est_admin'];
        header("Location: connected.php");
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect.";
    }
}
?>