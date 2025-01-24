<?php

$connexion = new mysqli($server,$name,$pwd,$dbname) ;
if($connexion->connect_error){
    die("". $connexion->connect_error);
};
$connexion->set_charset("utf8mb4");
$sql = "SELECT * FROM reservation"; 
$stmt = $connexion->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();
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

    <div>
    <div class="border radius shadow">
    <div class="gris1 radius-top">
    <p class="mb-0 fw-bold ps-3">Nos activités</p>
    </div>
    <table class="border-bottom-0" style="width: 100%;">
    <tr>
        <th class="col-1 text-center border-bottom-0">ID</th>
        <th class="col-2 text-center border-bottom-0">DATE D'ENREGISTREMENT</th>
        <th class="col-2 text-center border-bottom-0">NOM</th>
        <th class="col-2 text-center border-bottom-0">PRENOM</th>
        <th class="col-2 text-center border-bottom-0">MAIL</th>
        <th class="col-2 text-center text-uppercase border-bottom-0">durée de séjour</th>
        <th class="col-1 text-center border-bottom-0">PRIX</th>
     </tr>
     <tbody class="tableR"></tbody>
    </table>
    <div class="gris1 py-2 radius-bottom"></div>
    </div>
    </div>
</body>
</html>
<script type="module" src="JS/loading_data.js"></script>
<script type="module">
    import { TableLoading } from './JS/loading_data.js';


    $(document).ready(function(){

            TableLoading('Dashboard')

        
            let tableauGlobal = [];
            const eventS = new EventSource('tableau_test.php');
            eventS.onmessage = function(event) {
            let data = JSON.parse(event.data);
            tableauGlobal.push(data);

            let tableauIndexes =  tableauGlobal.filter((item, index, self) => {
            return index === self.findIndex(user => user.id === item.id);
            })
            let SetTable = new Set(tableauIndexes);

             $(tableauIndexes).each(function(index,element){
                const date =new Date(element["date_d'enregistrement"])
                const jour = date.getDay();
                const month =date.getMonth();
                const annés =date.getFullYear();

                const monthT = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"]
                let tableau2 = [`
                <tr class='tr' meta-data='${element.id}'>
                      <td class='text-center toVert'><button class='border-0 btn2  text-white'>${element.id}<input type='hidden' class='checkBungalow' name='check' value='${element.bungalow}'></button></td>
                      <td class='text-center'>${jour} ${monthT[month]} ${annés}</td>
                      <td>${element.nom}</td>
                      <td>${element.prenom}</td>
                      <td><textarea class='col-12' disabled>${element.mail}</textarea></td>
                      <td class='text-center'>${element.nombre_de_séjour}nuits</td>
                      <td class='text-center'>${element.prix_totale}</td>
                      <input class='ddD' type='hidden' value='$ddD'>
                </tr>`];
                const existingRow = $(`tr[meta-data='${element.id}']`)
                let setRow = new Set(tableau2)


                $('.tableR').append(tableau2);
                $('.tableR tr').each(function(index,items){
                    const table =[];
                    $(this).find('td').each(function(){
                        table.push($(this).text())
                    })
                    let indexer =table.filter(function(item,index,self){
                        return index === self.findIndex(user => user.id === item.id);
                    })
                })
                $('.checkBungalow').each(function(index, element){
                    if($(element).val() == "" || $(element).val() == "null"){
                        let input1 = $(element).closest('td')
                        input1.css('background','#f23f3a')
                    }else{
                        let input = $(element).closest('td')
                        input.css('background','#00b487')
                    }
                })
             })
            }

        const table = $('.tableR')
        $('.client').hide()
        $(document).on('click','.btn2' ,function(event){
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
                        $('.transaction').append(response)
                    },
                    error :function(){
                        console.log('Tsy lasa an')
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
            table.empty()
            $('.tableau').hide('slow')
            $('.client').show('slow')
        })
    })
</script>