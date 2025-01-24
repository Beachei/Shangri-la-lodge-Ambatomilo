<?php
$connexion = new mysqli($server,$name,$pwd,$dbname) ;
if($connexion->connect_error){
    die("". $connexion->connect_error);
};
$connexion->set_charset("utf8mb4");
$sql = "SELECT * FROM reservation ORDER BY id DESC";
$stmt = $connexion->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$connexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        .btn2{
            background-color: transparent;
        }
        .btn2:hover{
            transition: all 1s;
            box-shadow: 1px 1px 5px black;
            color: white;
            text-shadow: 1px 1px 3px black;
            scale: 1.2;
            border-radius: 5px;
        }
        .blue{
            background-color: #005b96;
        }
        .blue1{
            background-color: #92d2f9;
        }
        .gris{
            background-color: whitesmoke;
        }
        .gris1{
            background-color: #e5e5e5;
        }
        .height{
            height: 100vh;
        }
        .radius{
            border-radius: 1.3em;
        }
        .radius-top{
            border-top-right-radius:1em ;
            border-top-left-radius:1em ;
        }
        .radius{
            border-radius: 1.3em;
        }
        .radius-bottom{
            border-bottom-right-radius:1em ;
            border-bottom-left-radius:1em ;
        }
        .shadow{
            box-shadow: 0px 15px 10px black;
        }
        .text-font{
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .text-shadow{
            text-shadow: 0px 1px 5px black;
        }
        table, th, td{
            border: 2px solid #e5e5e5;
        }
        .red{
            background-color: red;
        }
    </style>
</head>
<body>
                <div class="border radius shadow">
                     <div class="gris1 radius-top">
                      <p class="mb-0 fw-bold ps-3">Nos activités</p>
                     </div>
                     <table style="width: 100%;">
                         <tr>
                            <th class="col-1 text-center">ID</th>
                            <th class="col-2 text-center">DATE D'ENREGISTREMENT</th>
                            <th class="col-2 text-center">NOM</th>
                            <th class="col-2 text-center">PRENOM</th>
                            <th class="col-2 text-center">MAIL</th>
                            <th class="col-2 text-center text-uppercase">durée de séjour</th>
                            <th class="col-1 text-center">PRIX</th>
                          </tr>
                          <input type='hidden' name='check' value=''>
                     <?php
                        if($result->num_rows > 0) {
                            echo "<script>";
                            echo 'let checkB = 0;';
                            echo "</script>";
                          while($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            $bungalow = $row["bungalow"];
                            $ddD = $row["date_de_départ"];
                            $activité = json_decode($row['activité'],true);
                            $toText = implode(',',$activité);
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
                             echo"<tr class='tr' meta-data='$id'>";
                              echo"<td class='text-center toVert'>"."<button class='border-0 btn2  text-white'>".$row['id']."<input type='hidden' class='checkBungalow' name='check' value='$bungalow'>"."</button>"."</td>";
                              echo"<td class='text-center'>".$jour." ".$moiTotext." ".$anné."</td>";
                              echo"<td>". $row['nom']."</td>";
                              echo"<td>". $row['prenom']."</td>";
                              echo"<td>"."<textarea class='col-12'>".$row['mail']."</textarea>"."</td>";
                              echo"<td class='text-center'>".$row["nombre_de_séjour"]." nuits"."</td>";
                              echo"<td class='text-center'>". $row['prix_totale']. " €"."</td>";
                              echo "<input class='ddD' type='hidden' value='$ddD'>";
                             echo"</tr>";
                               }  
                           };
                     ?>
                     </table>
                     <div class="gris1 py-2 radius-bottom"></div>
                </div>
</body>
</html>
<script>
    const textarea = document.querySelectorAll('textarea');
    textarea.forEach(function (text){
        text.disabled = true;
    })
    $(document).ready(function(){
        $('.ddD').each(function(index,element){
            const Départ = $(element).val();
            const NowDates = '2024-09-20';
            if(Départ == NowDates){
                const tr = $(element).closest("tr");
                const id = tr.attr("meta-data");
                console.log(id)
                $.ajax({
                  url:'db/alter.php',
                  type:'POST',
                  data:{id: id},
                  success:function(response){
                    console.log(response)
                  }
                })
            }
        })
        $('.checkBungalow').each(function(index, element){
            if($(element).val() == ""){
                let input1 = $(element).closest('td')
                input1.css('background','#f23f3a')
            }else{
                let input = $(element).closest('td')
                input.css('background','#00b487')
            }
        })
        $('.client').hide()
        $('.btn2').click(function(event){
            const meta = $(this).closest('tr')
            const id =  meta.attr('meta-data')
            $.ajax({
                url: 'client.php',
                type: 'POST',
                data:{id : id},
                success: function(response){
                    $('.client').html(response)
                    const nom = $('.nom').val();
                    const prenom = $('.prenom').val();
                    $.ajax({
                    url: 'db/client1.php',
                    type: 'POST',
                    data: {
                    nom : nom,
                    prenom : prenom
                    },
                    success:function(response){
                        console.log(nom)
                        console.log(prenom)
                    }
                  })
                }
            }) 
            $.ajax({
            url:'db/fmrow.php',
            type:'GET',
            success:function(data){
                console.log(data + " Familiale bungalow")
                if(data == 4){
                    const BGF = document.querySelector('.BGF')
                    BGF.disabled = true;
                    
                }
            }
            })
            $.ajax({
            url:'db/bdrow.php',
            type:'GET',
            success:function(data){
                console.log(data + " Double bungalow")
                if(data == 8){
                    const BGD = document.querySelector('.BGD')
                    BGD.disabled = true;
                }
            }
            })
            $('.tableau').hide('slow')
            $('.client').show('slow')
        })
    })
</script>