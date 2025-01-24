<?php 
$server = "31.11.39.71";
$name = "Sql1115253";
$pwd = "423358667o";
$dbname = "Sql1115253_2";

// Créer la connexion
$conn = new mysqli($server, $name, $pwd, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die('Erreur de connexion : ' . $conn->connect_error);
}

// Préparer la requête SQL
$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Erreur de préparation de la requête : ' . $conn->error);
}

// Définir la variable à lier
$id = 123456789;

// Lier le paramètre (ici, "i" indique que le paramètre est de type entier)
$stmt->bind_param("i", $id);

// Exécuter la requête
$stmt->execute();

// Obtenir les résultats
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo 'ID: ' . $row['id'] . '<br>';
        echo 'Password: ' . $row['password'] . '<br>';
    }
} else {
    echo "No results";
}

// Fermer la déclaration et la connexion
$stmt->close();
$conn->close();
?>