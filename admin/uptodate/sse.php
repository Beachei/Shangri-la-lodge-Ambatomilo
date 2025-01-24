<?php 
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
header("Connection: Keep-alive");

require_once '../config/config.php';  // Inclure votre fichier de connexion à la base de données

$last_id = 0;

while(true){
    // Connexion à la base de données
    $connexion = new mysqli($server,$name,$pwd,$dbname);
    if ($connexion->connect_error) {
        echo "data: {\"error\": \"Erreur de connexion à la base de données.\"}\n\n";
        exit();
    }
    // Récupérer les derniers événements créés
    $sql = "SELECT * FROM reservation";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $data[] = $row['nom'];
            echo "data: ".json_encode($row)."\n\n";
        }
    }

    // Vérifier les événements supprimés (colonne is_deleted)


    // Forcer l'envoi des données au client
    ob_flush();
    flush();

    // Attendre 5 secondes avant de vérifier à nouveau
    sleep(1);
}
?>
