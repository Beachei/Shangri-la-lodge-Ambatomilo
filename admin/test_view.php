<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery/jquery-3.7.1.min.js"></script>
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
        .th{
            background-color: #e5e5e5;   
        }
    </style>
</head>
<body>
    <div class="border radius shadow">
    <div class="gris1 radius-top">
    <p class="mb-0 fw-bold ps-3">Nos activités</p>
    </div>
    <table style="width: 100%;" id="response">
        <tr>
            <th class="col-1 text-center">ID</th>
            <th class="col-2 text-center">DATE D'ENREGISTREMENT</th>
            <th class="col-2 text-center">NOM</th>
            <th class="col-2 text-center">PRENOM</th>
            <th class="col-2 text-center">MAIL</th>
            <th class="col-2 text-center text-uppercase">durée de séjour</th>
            <th class="col-1 text-center">PRIX</th>
        </tr>
    </table>
    <div class="gris1 py-2 radius-bottom"></div>
    </div>

    <script>
  $(document).ready(function(){
    $.ajax({
        url:'tableau_test.php',
        type:'GET',
        dataType:'json',
        success:function(data){
            console.log(data)
            data.forEach(row =>{
                const date = new Date(row["date_d'enregistrement"])
                const jour = date.getDay();
                const month =date.getMonth();
                console.log(row.bungalow + "Voici le bungalow assigné")
                let monthText;
                switch(month){
                    case 0:
                        monthText = "Janvier"
                        break
                    case 1:
                        monthText = "Fevrier"
                        break
                    case 2:
                        monthText = "Mars"
                        break
                    case 3:
                        monthText = "Avril"
                        break
                    case 4:
                        monthText = "Mai"
                        break
                    case 5:
                        monthText = "Juin"
                        break
                    case 6:
                        monthText = "Juillet"
                        break
                    case 7:
                        monthText = "Août"
                        break
                    case 8:
                        monthText = "Septembre"
                        break
                    case 9:
                        monthText = "Octobre"
                        break
                    case 10:
                        monthText = "Novembre"
                        break
                    case 11:
                        monthText = "Decembre"
                        break
                }
                const annés =date.getFullYear();
                console.log("Voici l'id du client" + jour +" "+monthText+" "+annés)
                var tableau = `
                        <tr class='tr' meta-data='${row.id}'>
                              <td class='text-center toVert'><button class='border-0 btn2  text-white'>${row.id}<input type='hidden' class='checkBungalow' name='check' value='${row.bungalow}'></button></td>
                              <td class='text-center'>${jour} ${monthText} ${annés}</td>
                              <td>${row.nom}</td>
                              <td>${row.prenom}</td>
                              <td><textarea class='col-12'>${row.mail}</textarea></td>
                              <td class='text-center'>${row.nombre_de_séjour}nuits</td>
                              <td class='text-center'>${row.prix_totale}</td>
                              <input class='ddD' type='hidden' value='$ddD'>
                        </tr>`;
                $('#response').append(tableau)

                console.log($('checkBungalow').val() + 'Voici le check bungalow')
            })
        }
    })
    $('.checkBungalow').each(function(index, element){
        console.log('Voici les bungallow checker' + $(element).val() )
            if($(element).val() == "null"){
                let input1 = $(element).closest('td')
                input1.css('background','#f23f3a')
            }else{
                let input = $(element).closest('td')
                input.css('background','#00b487')
            }
        })
        $('.client').hide()
  })
</script>
</body>
</html>