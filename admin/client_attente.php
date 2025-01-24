<?php
if(isset($_POST["id"])? $_POST["id"]:""){

require 'config/config.php';
$con = new mysqli($server,$name,$pwd,$dbname);
if ($con->connect_error) {
    die(''. $con->connect_error);
};
$id = isset($_POST['id']) ? $_POST['id']:0;
$sql = 'SELECT * FROM enattente WHERE id=?';
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
    <base href="https://www.ambatomilo.com/admin/">
    <link rel="stylesheet" href="/CSS/bootstrap.css">
    <script src="./jquery/jquery-3.7.1.min.js"></script>
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
    <div class="d-flex">
        <button type="button" class="retour">Retour</button>
        <button type="button" class="ms-3 end">Séjour réserver</button>
    </div>

    <br>
        <div class="d-flex">
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
                                 $modTotext = "Decembre";
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
                        switch($row['status']){
                            case 1:
                                echo "<div class='border col-11 text-center radius green fw-bold text-white status'>";
                                echo "<h5 class='fw-bold text-white mb-0 align-self-center'>";
                                echo "L'accompte est payer";
                                echo "</h5>";
                                echo "</div>";
                                break;
                            case 0:
                                echo "<div class='border col-11 text-center radius green fw-bold text-white' style='background: rgb(242, 63, 58);'>";
                                echo "<h5 class='fw-bold text-white mb-0 align-self-center'>";
                                echo "Pas encore payer";
                                echo "</h5>";
                                echo "</div>";
                                break;
                        }
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
                        <?php 
                        if ( $row['status'] == 0) {
                            $Reste = $row['prix_totale1'];
                            echo "<th class='ps-2 th'colspan='2'>Prix total : ".$row['prix_totale1']." €</th>";
                            echo "<th class='ps-2 th reste' colspan='3'>Reste à payer : $Reste €</th>";
                            echo "<th class='ps-2 th boutonReste' colspan='1'><button class='Tpayer border-1' style='border-radius:5px;'>Payer</button></th>";
                        }else{
                            $Reste = $row['prix_totale1'] - $row['total_sf'];
                            echo "<th class='ps-2 th'colspan='2'>Prix total : ".$row['prix_totale1']." €</th>";
                            echo "<th class='ps-2 th reste' colspan='4'>Reste à payer : $Reste €</th>";
                        }
                        ?>
                        <th class='ps-2 th totalPayer'colspan='4'>Reste à payer : L'acompte du séjour est payé.</th>
                    </tr>
                    <tr>
                        <th class="ps-2">Prix traitement :</th>
                        <th class="ps-2">Durée de séjour :</th>
                        <th class="ps-2">Prix lit suplémentaire :</th>    
                        <th class="ps-2">Prix net 30% :</th>    
                        <th class="ps-2">Frais paypal :</th> 
                        <th class="text-center">Prix brute 30% :</th>
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
    import { TableLoading }  from './JS/loading_data.js'
    $(document).ready(function(){
        let id = $('.idv').val();
        const verification = $('.bungalowVerify').val();
        const rom = $('.rom_idv').val();
        $('.status').hide()
        $('.retour').click(function(){
            $('.client_a').hide('slow');
            $('.tableau_a').show('slow');
        })
        function retour(){
        $('.retour').click(function(){
            $('.client_a').hide('slow');
            $('.tableau_a').show('slow',function(){
                TableLoading('WaitList')
            });
        })
        }
        function end(){
            $('.end').hide('slow');
            $('.client_a').hide('slow');
            $('.tableau_a').show('slow',function(){
                TableLoading('WaitList')
            });
        }
        retour();
        $('.end').click(function(){
            end()
            console.log('Voici l ID =' + id)  
            $.ajax({
                url: 'db/delete_attente.php',
                type: 'POST',
                data: {id : id},
                success:function(response){
                    console.log(response)
                    console.log(id + " " + "L'id sur console")
                }
            })
        })

        $('.totalPayer').hide();
        $('.Tpayer').click(function(){
            $('.reste').hide('slow');
            $('.boutonReste').hide('slow');
            $('.totalPayer').show('slow');
            $.ajax({
                url: 'db/payer_attente.php',
                type: 'POST',
                data: {id : id, status : "1"},
                success:function(response){
                    console.log(response)
                    console.log(id + " " + "L'id sur console")
                    $('.totalPayer').show('slow');
                }
            })
        })
        if(verification == ''){
            $('.assigne').hide()
            $('.form').show();
            $('.BF').hide()
            $('.bungalow').change(function(){
                console.log('select value clicker')
                let selectBungalow = $('.bungalow').val();
                console.log(selectBungalow)
                if(selectBungalow == "BUNGALOW FAMILIALE"){
                    $('.BF').show()
                    $('.BD').hide()
                }else{
                    $('.BF').hide()
                    $('.BD').show()
                }
            })
            $('.btnBungalow').click(function(){
            let selectBungalow = $('.bungalow').val();
            let selectRoom = $('.room_id').val();
            $.ajax({
                url:'db/bungalow.php',
                type:'POST',
                data:{
                    id: id,
                    bungalow : selectBungalow,
                    rom_id : selectRoom
                },
                success:function(response){
                    $('.assigne').html(response);
                    $('.assigne').css('opacity', 0).show('1000').animate({opacity:1},'3000')
                    $('.form').animate({opacity: '0'},'1000',function(){
                        $(this).hide()
                    });
                    $('.status').show('slow')
                }
            }) 
        })
        }else{
        $('.form').hide()
        $('.status').show()
        $('.assigne').html(`<h5 class="py-3 col-12 mb-0 text-center text-white green fw-bold">Ce client est assigné au : ${verification} N° ${rom}</h5>`)
        } 
    })
</script>