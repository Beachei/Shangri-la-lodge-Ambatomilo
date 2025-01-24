<?php 
$server = "31.11.39.170";
$name = "Sql1115253";
$pwd = "423358667o";
$dbname = "Sql1115253_2";

$amount = floatval(isset($_POST['price'])?$_POST['price']:"");
$brut = floatval(isset($_POST['brut'])?$_POST['brut']:"");
$frai = floatval(isset($_POST['frai'])?$_POST['frai']:"");
$amount1 = floatval(isset($_POST['priceActivities'])?$_POST['priceActivities']:"");
$priceT = floatval(isset($_POST["priceTraitement"])?$_POST["priceTraitement"]:"");
$priceA = floatval(isset($_POST["priceAdulte"])?$_POST["priceAdulte"]:"");
$priceE = floatval(isset($_POST["priceEnfant"])?$_POST["priceEnfant"]:"");
$priceAE = floatval(isset($_POST["totalAE"])?$_POST["totalAE"]:"");
$nom = isset($_POST['nom'])?$_POST['nom']:"";
$prenom = isset($_POST['prenom'])?$_POST['prenom']:"";
$mail = isset($_POST["mail"])?$_POST["mail"]:"";
$adresse = isset($_POST["adresse"])?$_POST["adresse"]:"";
$adresse1 = isset($_POST["adresse1"])?$_POST["adresse1"]:"";
$zip = isset($_POST["zip"])?$_POST["zip"]:"";
$ville = isset($_POST["ville"])?$_POST["ville"]:"";
$pay = isset($_POST["pay"])?$_POST["pay"]:"";
$selection = isset($_POST['selection'])?$_POST['selection']:"";
$complet = $nom . ' ' . $prenom;
$arrive = isset($_POST['dateArrive'])? $_POST['dateArrive'] : "";
$depart = isset($_POST['dateDepart'])? $_POST['dateDepart'] : "";
$durée = isset($_POST['dure'])? $_POST['dure'] : "";
$adulte = intval(isset($_POST['nbrA'])? $_POST['nbrA'] : "");
$enfant = intval(isset($_POST['nbrE'])? $_POST['nbrE'] : "");
$personnes = intval($adulte) + intval($enfant);
$nbrAA = intval(isset($_POST['nbrPIAA'])?$_POST['nbrPIAA']:"");
$activité = isset($_POST['activité']) ?$_POST['activité'] : '';
$litSup = isset($_POST['litSup']) ?$_POST['litSup'] : '';
$prixSup = floatval(isset($_POST['prixSup']) ?$_POST['prixSup'] : '');
$description = "";
$prixTotale = $amount;
$prixTotale1 = isset($_POST['prixTotale'])? $_POST['prixTotale']:"450";
$nom = strtoupper($nom);
$prenom = ucwords($prenom);
$mail = strtolower($mail);
switch($selection){
    case 1 :
        $description = "BED & BREAKFAST";
        break;
    case 2 : 
        $description = "DEMI PENSION";
        break;
    case 3 :
        $description = "PENSION COMPLET";
        break;
}
$allActivite = $activité;
$allActivite = json_encode($allActivite,JSON_UNESCAPED_UNICODE);


$conn = new mysqli($server,$name,$pwd,$dbname);
if($conn->connect_error){
    die(''.$conn->connect_error);
}
 
$sql = "INSERT INTO reservation(`nom`,`prenom`,`mail`,`adresse`,`adresse1`,`zip`,`ville`,`pay`,`traitement`,`sup_single`,`nombre_de_personnes`,`nombre_de_personne_inscrit_au_activité`,`nombre_d'adulte`,`nombre_d'enfant`,`nombre_de_séjour`,`date_d'arrivé`,`date_de_départ`,`activité`,`prixAE`,`prix_adulte`,`prix_enfant`,`prix_du_traitement`,`prix_des_activités`,`prix_single`,`total_sf`,`frai_paypal`,`prix_totale`,`prix_totale1`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssisssiiiiiisssdddddddddd',$nom,$prenom,$mail,$adresse,$adresse1,$zip,$ville,$pay,$description,$litSup,$personnes,$nbrAA,$adulte,$enfant,$durée,$arrive,$depart,$allActivite,$priceAE,$priceA,$priceE,$priceT,$amount1,$prixSup,$brut,$frai,$prixTotale,$prixTotale1);
$result = $stmt->execute();

$stmt->close();
$conn->close();
?>