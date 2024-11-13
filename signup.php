<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "username", "password", "database_name");

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $firstname = $_POST["firstname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash du mot de passe

    // Insertion de l'utilisateur dans la base de données
    $sql = "INSERT INTO users (name, firstname, username, email, password) VALUES ('$name', '$firstname', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie !";
        header("Location: index.html"); // Redirige vers la page de connexion
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
