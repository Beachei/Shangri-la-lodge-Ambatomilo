<?php
require 'config/config.php';

$connexion = new mysqli($server,$name,$pwd,$dbname) ;
if($connexion->connect_error){
    die("". $connexion->connect_error);
};
$connexion->set_charset("utf8mb4");
$sql = "SELECT * FROM enattente";
$stmt = $connexion->prepare($sql);
$stmt->execute();
$result = $stmt->get_result() ;

$connexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
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
        .btn1{
            background-color: transparent;
        }
        .btn1:hover{
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
                        <tbody class="tableW"></tbody>
                     </table>
                     <div class="gris1 py-2 radius-bottom"></div>
                </div>
</body>
</html>
<script type="module" src="./JS/loading_data.js"></script>
<script type="module">
    import {TableLoading} from './JS/loading_data.js';
    $(document).ready(function(){

            TableLoading('WaitList')
        
        $('.checkBungalow').each(function(index, element){
            if($(element).val() == "0"){
                let input1 = $(element).closest('td')
                input1.css('background','#f23f3a')
            }else{
                let input = $(element).closest('td')
                input.css('background','#00b487')
            }
        })
        const table = $('.tableW')
        $('.client_b').hide()
        $(document).on('click','.btn1',function(event){
            const meta = $(this).closest('tr')
            const id =  meta.attr('meta-data')
            $.ajax({
                url: 'client_attente.php',
                type: 'POST',
                data:{id : id},
                success: function(response){
                    $('.client_a').html(response)
                    const nom = $('.nom').val();
                    const prenom = $('.prenom').val();
                }
            }) 
            table.empty()
            $('.tableau_a').hide('slow')
            $('.client_a').show('slow')
        })
        $('.btn1').click(function(){

        })
    })
</script>