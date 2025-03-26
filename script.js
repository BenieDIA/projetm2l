document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();

    // Récupérer les valeurs des champs
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    const messageElement = document.getElementById("message");

    // Simuler des données pour la vérification
    const validUsername = "admin";
    const validPassword = "12345";

    // Vérifier si le nom d'utilisateur et le mot de passe sont corrects
    if (username === validUsername && password === validPassword) {
        messageElement.textContent = "Bienvenue, " + username + "!";
        messageElement.className = "message success";
    } else if (username !== validUsername) {
        messageElement.textContent = "Nom d'utilisateur incorrect.";
        messageElement.className = "message error";
    } else if (password !== validPassword) {
        messageElement.textContent = "Mot de passe incorrect.";
        messageElement.className = "message error";
    }
});
