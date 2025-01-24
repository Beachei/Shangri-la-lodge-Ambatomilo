<?php 
 require '../config/config.php';


$conn = new mysqli($server, $name, $pwd, $dbname);
if ($conn->connect_error) {
    die("".$conn->connect_error);
} 

$nom = isset($_POST['nom'])?$_POST['nom']:'';
$prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
$sql = "SELECT * FROM sejour_terminer WHERE nom =? AND prenom = ? ORDER BY `date_d'enregistrement` DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",$nom,$prenom);
$stmt->execute();
$result = $stmt->get_result(); 

$stmt->close();
$conn->close();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $date = $row["date_d'enregistrement"];
        $anné = substr($date,0,4);
        $moi = substr($date,5,2);
        $jour = substr($date,8,2);
        $moiTotext ="";
        switch ($moi) {
            case 1:
                $moiTotext = "Janvier";
                break;
            case 2:
                $moiTotext = "Fevrier";
                break;
            case 3:
                $moiTotext = "Mars";
                break;
            case 4:
                $moiTotext = "Avril";
                break;
            case 5:
                $moiTotext = "Mais";
                break;
            case 6:
                $moiTotext = "Juin";
                break;
            case 7:
                $moiTotext = "Juillet";
                break;
            case 8:
                $moiTotext = "Août";
                break;
            case 9:
                $moiTotext = "Septembre";
                break;
            case 10:
                $moiTotext = "Octobre";
                break;
            case 11:
                $moiTotext = "Novembre";
                break;
            case 12:
                $moiTotext = "Decembre";
                break;
        }
        echo "<tr class='overflow-scroll'>";
            echo "<td class='ps-2'>".$jour." ".$moiTotext." ".$anné."</td>" ;
            echo "<td class='ps-2'>".$row['nom']."</td>" ;
            echo "<td class='ps-2'>".$row['prenom']."</td>" ;
            echo "<td class='text-center'>".$row["prix_totale"].' '.'€'."</td>";
        echo "</tr>";
    };
};
?>