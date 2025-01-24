<?php
if(isset($_POST["id"])? $_POST["id"]:""){
require './config/config.php';

$con = new mysqli($server,$name,$pwd,$dbname);
if ($con->connect_error) {
    die(''. $con->connect_error);
};
$id = isset($_POST['id']) ? $_POST['id']:0;
$sql = 'SELECT * FROM sejour_terminer WHERE id=?';
$result = $con->prepare($sql);
$result->bind_param('s',$id);
$result->execute();
$catchResult = $result->get_result();

$result->close();
$con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .btn{
            border: 1px solid black;
        }
        .btn:hover{
            transition: all 1s;
            background-color: #03396c;
            color: white;
            scale: 1.2;
        }
        .btnBungalow:hover{
            transition: all 1s ease-in-out;
            scale: 1.1;
            background-color: #03396c;
            color: white;
            border: white;
        }
        .green{
            background-color: 	#00b487;
        }
        .radius{
            border-radius: 1.3em;
        }
        table{
            border-radius: 2em;
        }
        table, th, td{
            border: 2px solid #e5e5e5;
        }
        .tb th{
            background-color: #e5e5e5;
        }
        .th{
            background-color: #e5e5e5;   
        }
    </style>
</head>
<body>
    <br>
    <div>
        <button type="button" class="retour">retour</button>
    </div>
    <br>
        <div class="d-flex client">
            <div class="col-6 h-100">
            <div class="d-flex">
                <div class="col-9">
                    <?php
                         if( $catchResult->num_rows > 0) {
                         $row = $catchResult->fetch_assoc();
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
                        if ( $row['id'] == $id) {
                            echo "<h5 class='fw-bold'>";
                            echo "Transaction du :"." ".$jour." ".$moiTotext." ".$anné;
                            echo "</h5>";
                        };
                          
                     ?>
                </div>
                <div class="col-3 d-flex justify-content-center">
                <?php
                if ( $row['status'] == 2) {
                    echo "<div class='border col-10 text-center radius green fw-bold text-white' style='background: rgb(242, 63, 58);'>";
                    echo "<h5 class='fw-bold text-white mb-0 align-self-center'>";
                    echo "Terminer";
                    echo "</h5>";
                    echo "</div>";
                }else{
                    echo "<div class='border col-10 text-center radius green fw-bold text-white' style='background: rgb(242, 63, 58);'>";
                    echo "<h5 class='fw-bold text-white mb-0 align-self-center'>";
                    echo "Annulé";
                    echo "</h5>";
                    echo "</div>";
                };
                          }
                     ?>
                </div>
            </div>
            <br>
            <table class="col-12">
                <tr>
                    <th class="ps-2 th" colspan="4">CLIENT</th>
                </tr>
                <tr>
                    <th class="col-1 text-center">ID</th>
                    <th class="col-3 text-center">NOM</th>
                    <th class="col-3 text-center">PRENOM</th>
                    <th class="col-5 text-center">MAIL</th>
                </tr>
                <input type="hidden" value="">
                <?php
                    if( $catchResult->num_rows > 0) {
                         $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $nom = $row['nom'];
                         $id = $row['id'];
                         $prenom = $row['prenom'];
                         $bungalow = $row['bungalow'];
                         $rom = $row['rom_number'];
                        if ( $row['id'] == $id) {
                            echo "<tr>";
                                echo "<td class='id text-center'>".$row['id']."</td>" ;
                                echo "<td class='text-center'>".$row['nom']."</td>";
                                echo "<td class='text-center'>".$row['prenom']."</td>";
                                echo "<td class='text-center'>".$row['mail']."</td>";
                            echo "</tr>";
                        };
                        echo"<input class='bungalowVerify' type='hidden' value='$bungalow'>";
                        echo"<input class='idv' type='hidden' value='$id'>";
                        echo"<input class='rom_idv' type='hidden' value='$rom'>";
                        echo"<input class='nom' type='hidden' value='$nom'>";
                        echo"<input class='prenom' type='hidden' value='$prenom'>";

                    }
                ?>
            </table>
            <br>
            <table class="col-12">
                <tr>
                    <th class="ps-2 th" colspan="5">ADRESSE</th>
                </tr>
                <tr>
                    <th class="col-1 text-center">LINE 1</th>
                    <th class="col-3 text-center">LINE 2</th>
                    <th class="col-3 text-center">CODE POSTAL/ZIP</th>
                    <th class="col-5 text-center">VILLE</th>
                    <th class="col-5 text-center">PAY</th>
                </tr>
                <input type="hidden" value="">
                <?php
                    if( $catchResult->num_rows > 0) {
                         $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $adresse = $row['adresse'];
                         $adresse1 = $row['adresse1'];
                         $zip = $row['zip'];
                         $ville = $row['ville'];
                         $pay = $row['pay'];
                        if ( $row['id'] == $id) {
                            echo "<tr>";
                                echo "<td class='text-center'>".$adresse."</td>" ;
                                echo "<td class='text-center'>".$adresse1."</td>";
                                echo "<td class='text-center'>".$zip."</td>";
                                echo "<td class='text-center'>".$ville."</td>";
                                echo "<td class='text-center'>".$pay."</td>";
                            echo "</tr>";
                        };
                    }
                ?>
            </table>
            <br>
            <?php
                    if( $catchResult->num_rows > 0) {
                        $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $nbrAdulte = $row["nombre_d'adulte"];
                         $nbrEnfant = $row["nombre_d'enfant"];
                         $nbrAE = $row["nombre_de_personnes"];
                        if ( $row['id'] == $id) {
                ?>
            <div class="col-12">
                <table class="col-12">
                    <tr>
                        <th class="ps-2 th" colspan="3">Nombre de personne : <?php echo $nbrAE;?></th>
                    </tr>
                    <tr>
                        <th class="ps-2">Adulte : <?php echo $nbrAdulte;?></th>
                        <th class="ps-2">Enfant : <?php echo $nbrEnfant;?></th>    
                        <th class="text-center">Total Prix</th>
                    </tr>
                    <?php 
                    echo "<tr>";
                     echo "<td class='ps-2'>".$row['prix_adulte']." €"."</td>";
                     echo "<td class='ps-2'>".$row['prix_enfant']." €"."</td>";
                     echo "<td class='text-center'>".$row['prixAE']." €"."</td>";
                    echo "</tr>";
                    ?>
                </table>
            </div>
            <?php
                      }
                };
            ?>
            <br>
            <?php
                    if( $catchResult->num_rows > 0) {
                        $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $ddA = $row["date_d'arrivé"];
                         $ddD = $row["date_de_départ"];
                         $nbrAD = $row["nombre_de_séjour"];
                        if ( $row['id'] == $id) {
                        $jourA = substr( $ddA,8,2);
                        $moisA = substr( $ddA,5,2);
                        $annéA = substr( $ddA,0,4);
                        $moisAText ="";
                             switch($moisA) {
                                case 1:
                                    $moisAText = 'Janvier';
                                    break;
                                case 2:
                                    $moisAText = 'Fevrier';
                                    break;
                                case 3:
                                    $moisAText = 'Mars';
                                    break;
                                case 4:
                                    $moisAText = 'Avril';
                                    break;
                                case 5:
                                    $moisAText = 'Mai';
                                    break;
                                case 6:
                                    $moisAText = 'Juin';
                                    break;
                                case 7:
                                    $moisAText = 'Juillet';
                                    break;
                                case 8:
                                    $moisAText = 'Août';
                                    break;
                                case 9:
                                    $moisAText = 'Septembre';
                                    break;
                                case 10:
                                    $moisAText = 'Octobre';
                                    break;
                                case 11:
                                    $moisAText = 'Novembre';
                                    break;
                                case 12:
                                    $moisAText = 'Décembre';
                                    break;
                            }
                        $jourD = substr( $ddD,8,2);
                        $moisD = substr( $ddD,5,2);
                        $annéD = substr( $ddD,0,4);
                        $moisDText ="";
                         switch( $moisD) {
                            case 1:
                                $moisDText = 'Janvier';
                                break;
                            case 2:
                                $moisDText = 'Fevrier';
                                break;
                            case 3:
                                $moisDText = 'Mars';
                                break;
                            case 4:
                                $moisDText = 'Avril';
                                break;
                            case 5:
                                $moisDText = 'Mai';
                                break;
                            case 6:
                                $moisDText = 'Juin';
                                break;
                            case 7:
                                $moisDText = 'Juillet';
                                break;
                            case 8:
                                $moisDText = 'Août';
                                break;
                            case 9:
                                $moisDText = 'Septembre';
                                break;
                            case 10:
                                $moisDText = 'Octobre';
                                break;
                            case 11:
                                $moisDText = 'Novembre';
                                break;
                            case 12:
                                $moisDText = 'Décembre';
                                break;
                        } 
                        
                ?>
            <div class="col-12">
                <table class="col-12">
                    <tr>
                        <th class="ps-2 th" colspan="3">Nombre de séjour : </th>
                    </tr>
                    <tr>
                        <th class="ps-2">Date d'arrivé : </th>
                        <th class="ps-2">Date de départ : </th>    
                        <th class="text-center">Total de séjour</th>
                    </tr>
                    <?php 
                    echo "<tr>";
                     echo "<td class='ps-2'>".$jourA." ".$moisAText." ".$annéA."</td>";
                     echo "<td class='ps-2'>".$jourD." ".$moisDText." ".$annéD."</td>";
                     echo "<td class='text-center'>".$nbrAD." nuits"."</td>";
                    echo "</tr>";
                    ?>
                </table>
            </div>
            <?php
                      }
                };
            ?>
            <br>
            <?php
                if( $catchResult->num_rows > 0) {
                        $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $singleYes = $row["sup_single"];
                         $singlePrice = "";
                         $nbrAD = $row["nombre_de_séjour"];
                         $prixSup = $row["prix_single"];
                         if($singleYes == 1){
                            $singleYes = "oui";
                            $singlePrice = 6;
                         }else{
                            $singleYes = "Non";
                        }
            ?>
            <div class="col-12">
                <table class="col-12">
                    <tr>
                        <th class="ps-2 th" colspan="3">Lit suplémentaire : <?php echo $singleYes ?></th>
                    </tr>
                    <tr>
                        <th class="ps-2">Prix</th>
                        <th class="ps-2">Séjour</th>    
                        <th class="text-center">lits suplémentaire</th>
                    </tr>
                    <?php 
                    if($singleYes == "oui"){
                    echo "<tr>";
                     echo "<td class='ps-2'>".$singlePrice." €"."</td>";
                     echo "<td class='ps-2'>".$nbrAD." nuits"."</td>";
                     echo "<td class='text-center'>".$prixSup." €"."</td>";
                    echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <?php
                };
            ?>
            <br>
            <?php
                    if( $catchResult->num_rows > 0) {
                        $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $nbrAD = $row["nombre_de_séjour"];
                         $activite = json_decode($row['activité'],true);
                         $toText = implode('<br> -',$activite);
                        if ( $row['id'] == $id) {
                ?>
            <div class="col-12">
                <table class="col-12">
                    <tr>
                        <th class="ps-2 th" colspan="6">Prix total :</th>
                    </tr>
                    <tr>
                        <th class="ps-2">Prix traitement :</th>
                        <th class="ps-2">Durée de séjour :</th>       
                        <th class="ps-2">Prix lit suplémentaire :</th>    
                        <th class="ps-2">Prix net :</th>    
                        <th class="ps-2">Frais paypal :</th> 
                        <th class="text-center">Prix brute</th>
                    </tr>
                    <?php 
                    echo "<tr>";
                     echo "<td class='ps-2'>".$row['prixAE']." €"."</td>";
                     echo "<td class='ps-2'>".$nbrAD." nuits"."</td>";
                     echo "<td class='ps-2'>".$row['prix_single']." €"."</td>";
                     echo "<td class='ps-2'>".$row['total_sf']." €"."</td>";
                     echo "<td class='ps-2'>".$row['frai_paypal']." €"."</td>";
                     echo "<td class='text-center'>".$row['prix_totale']." €"."</td>";
                    echo "</tr>";
                    ?>
                </table>
            </div>
            <?php
                      }
                };
            ?>
            <br>
            <div class="assigne col-12"></div>
            </div>
            <div class="col-6 d-flex justify-content-center h-100">
            <div class="col-10">  
                <?php
                    if( $catchResult->num_rows > 0) {
                        $catchResult->data_seek(0);
                         $row = $catchResult->fetch_assoc();
                         $activite = json_decode($row['activité'],true);
                         $toText = implode('<br> -',$activite);
                        if ( $row['id'] == $id) {
                            echo "<table class='col-8 tb'>";
                            echo "<tr>";
                                echo "<th class='ps-2'>"."TRAITEMENT : ".$row['prix_du_traitement']." "."€"."</th>" ;
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td class='ps-2'>".$row['traitement']."</td>" ;
                            echo "</tr>";
                            echo "</table>";
                            echo "</br>";
                            echo "<table class='col-8 tb'>";
                            echo "<tr>";
                                echo "<th class='ps-2'>"."ACTIVITE : ".$row['prix_des_activités']." €"." Pour : ".$row['nombre_de_personne_inscrit_au_activité']." personnes"."</th>" ;
                            echo "</tr>";
                            echo "<tr>";
                            if($toText != "pas d'activité"){
                                echo "<td class='ps-2'>"."-".$toText."</td>" ;
                            };
                            echo "</tr>";
                            echo "</table>";
                        }
                    };
                ?>
                <br>
                <div>
                    <table class="transaction col-8">
                        <tr>
                            <th class='ps-2 th' colspan="4">Les transactions de ce clients :</th>
                        </tr>
                        <tr>
                            <th class='ps-2'>Date du transaction</th>
                            <th class='ps-2'>Nom</th>
                            <th class='ps-2'>Prenom</th>
                            <th class='ps-2'>Payer</th>
                        </tr>
                    </table>
                </div>
            </di>
            </div>
        </div>
</body>
</html>
<script type="module" src="./JS/loading_data.js"></script>
<script type="module">
    import { TableLoading } from './JS/loading_data.js';
    $(document).ready(function(){
        function retour(){
        $('.retour').click(function(){
            $('.client_b').hide('slow');
            $('.tableau_b').show('slow',function(){
                TableLoading('Backup')
            });
        })
        }
        retour()
        let id = $('.idv').val();
        const verification = $('.bungalowVerify').val();
        const rom = $('.rom_idv').val();
        $('.status').hide()

        $('.status').show()
        $('.assigne').html(`<h5 class="py-3 col-12 mb-0 text-center text-white green fw-bold">Ce client à été assigné au : ${verification}</h5>`)
        
        let nom = $('.nom').val();
        let prenom = $('.prenom').val();
        $.ajax({
            url:'db/client1.php',
            type:'POST',
            data:{
                nom: nom,
                prenom:prenom
            },
            success:function(response){
                $('.transaction').append(response)
            }
        })
    })
</script>