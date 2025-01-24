<?php
header("Cache-Control: no-cache");
header("Connection: keep-alive");
session_start();
if (!isset($_SESSION["idAdmin"]) && !isset($_SESSION["idPass"])) {
    header("Location:login.php");
}
require 'config/config.php';
$connexion = new mysqli($server,$name,$pwd,$dbname) ;
if($connexion->connect_error){
    die("". $connexion->connect_error);
};

$connexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <base href="https://www.ambatomilo.com/admin/">
    <link rel="stylesheet" href="/CSS/bootstrap.css">
    <script src="/jquery/jquery-3.7.1.min.js"></script>
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
        .blue{
            background-color: #005b96;
        }
        .blue1{
            transition: 1s;
            background-color: #92d2f9;
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
        .radius-top1{
            border-top-right-radius:0.6em ;
            border-top-left-radius:0.6em ;
        }
        .radius-bottom{
            border-bottom-right-radius:1em ;
            border-bottom-left-radius:1em ;
        }
        .shadow{
            box-shadow: 0px 20px 10px black;
        }
        .scale:hover{
            transition: all 1s;
            scale: 1.1;
            margin-left: 1.1em;
        }
        .scale1{
            scale: 1.1;
            margin-left: 1.1em;
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
        .th{
            background-color: #e5e5e5;   
        }
        .curs{
            cursor:grab;
        }
    </style>
</head>
<body>
    <div class="py-2 col-12 gris shadow">
        <div class="d-flex">
            <div class="col-3">
                <div class="d-flex">
                    <div><img width="80vw" height="90vh" src="./asset/logo.png" alt=""></div>
                    <h4 class="fw-bold text-white align-self-center mb-0 text-shadow">Ambatomilo Admin</h4>
                </div>
            </div>
            <div class="col-7 d-flex align-items-center">
              <?php  include_once './db/rom.php';   ?>
            </div>
            <div class="col-2 d-flex justify-content-end align-items-center align-items-center">
            <form class="d-flex justify-content-end align-items-center" action="logout.php" method="post">
               <button class="btn fw-bold radius" type="submit">Déconnecter</button>
               <div class="px-4"></div>
            </form>
            </div>
        </div>
    </div>
    <div class="d-flex blue" >
        <div class="col-2 height">
            <br>
            <div class="">
                <div class="da py-4 px-2" style="cursor:pointer;" ><h2 class="text-white scale h2">DASHBOARD</h2></div>
                <br>
                <div class="bu py-4 px-2" style="cursor:pointer;"><h2 class="text-white scale h3">BUNGALOW</h2></div>
                <br>
                <div class="se py-4 px-2" style="cursor:pointer;"><h2 class="text-white scale h4 h4-1 text-uppercase">séjour en attente</h2></div>
                <br>
                <div class="st py-4 px-2" style="cursor:pointer;"><h2 class="text-white scale h4 h4-2 text-uppercase">séjour terminer</h2></div>
            </div>
        </div>
        <div class="col-10" style="background-color:white;">
            <div class="dashboard container-fluid">
                <br>
                <div>
                  <h2 class="fw-bold text-font">DASHBOARD</h2>
                </div>
                <div>
                    <p class="gris1 fw-bold">Ravie de vous revoir.</p>
                </div>
                 <div class="tableau"><?php include 'tableau.php' ?></div>
                <div class="client"></div>
            </div>
            <div class="bungalow container-fluid">
                <br>
                <div>
                  <h2 class="fw-bold text-font">BUNGALOW</h2>
                </div>
                <div>
                    <p class="gris1 fw-bold">Ravie de vous revoir.</p>
                </div>
                <div class="d-flex">
                    <?php include 'db/bungalowDB.php' ?>
                    <?php include 'db/bungalowFM.php' ?>
                </div>
            </div>
            <div class="end container-fluid">
                <br>
                <div>
                  <h2 class="fw-bold text-font">TRANSACTION TERMINER</h2>
                </div>
                <div>
                    <p class="gris1 fw-bold">Ravie de vous revoir.</p>
                </div>
                <div class="tableau_b">
                    <?php include 'tableau_backup.php' ?>
                </div>
                <div class="client_b"></div>
            </div>
            <div class="attente container-fluid">
                <br>
                <div>
                  <h2 class="fw-bold text-font">Séjour en attente</h2>
                </div>
                <div>
                    <p class="gris1 fw-bold">Ravie de vous revoir.</p>
                </div>
                <div class="tableau_a">
                    <?php include 'tableau_attente.php' ?>
                </div>
                <div class="client_a"></div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="module" src="./JS/loading_data"></script>
<script type="module">
    import { TableLoading } from './JS/loading_data.js'

    $('document').ready(function(){
        const table = $('.tableR');
        const tableW = $('.tableW');
        const tableB = $('.tableB');
        let tableCheck = [];
        function loader(load){
            setTimeout(() => {
                load
            }, 1000);
        }
        function empty(array){
            array.empty()
            tableCheck = []
        }
        $('.dashboard').show();
        $('.attente').hide();
        $('.bungalow').hide();
        $('.end').hide();
        $('.da').addClass('blue1');
        $('.bu').removeClass('blue1');
        $('.st').removeClass('blue1');
        $('.se').removeClass('blue1');
        $('.h2').addClass('scale1');
        $('.h3').removeClass('scale1');
        $('.h4').removeClass('scale1');
        $('.h4-1').removeClass('scale1');
        $('.da').click(function(){
            empty(tableW)
            empty(tableB)
            $('.tableR tr').each(function(index,item){
                tableCheck.push(item)
            })
            if(tableCheck.length === 0){
                 loader(TableLoading('Dashboard'))
            }else{
                empty(table)
                loader(TableLoading('Dashboard'))
            }

            $('.dashboard').show('slow');
            $('.end').hide('slow');
            $('.bungalow').hide('slow');
            $('.attente').hide('slow');
            $('.da').addClass('blue1');
            $('.bu').removeClass('blue1');
            $('.st').removeClass('blue1');
            $('.se').removeClass('blue1');
            $('.h2').addClass('scale1');
            $('.h3').removeClass('scale1');
            $('.h4-2').removeClass('scale1');
            $('.h4-1').removeClass('scale1');
            $('.client_b').hide();
            $('.client_a').hide();
            $('.client').hide();
            $('.tableau').show('slow');
        })
        $('.bu').click(function(){
            empty(table)
            empty(tableW)
            empty(tableB)
            $('.dashboard').hide('slow');
            $('.end').hide('slow');
            $('.attente').hide('slow');
            $('.bungalow').show('slow');
            $('.da').removeClass('blue1');
            $('.st').removeClass('blue1');
            $('.se').removeClass('blue1');
            $('.bu').addClass('blue1');
            $('.h2').removeClass('scale1');
            $('.h3').addClass('scale1');
            $('.h4-2').removeClass('scale1');
            $('.h4-1').removeClass('scale1');
            $('.client_b').hide();
            $('.client_a').hide();
            $('.client').hide();
        })
        $('.st').click(function(){
            console.log('this is the ST',table)
            empty(table)
            empty(tableW)
            
            $('.tableB tr').each(function(index,item){
                tableCheck.push(item)
            })
            if(tableCheck.length === 0){
                loader(TableLoading('Backup'))
            }else{
                empty(tableB)
                loader(TableLoading('Backup'))
            }
            $('.dashboard').hide('slow');
            $('.bungalow').hide('slow');
            $('.attente').hide('slow');
            $('.end').show('slow');
            $('.da').removeClass('blue1');
            $('.bu').removeClass('blue1');
            $('.se').removeClass('blue1');
            $('.st').addClass('blue1');
            $('.h2').removeClass('scale1');
            $('.h3').removeClass('scale1');
            $('.h4-1').removeClass('scale1');
            $('.h4-2').addClass('scale1');
            $('.client_b').hide();
            $('.client_a').hide();
            $('.client').hide();
            $('.tableau_b').show();


        })
        $('.se').click(function(){
            empty(table)
            empty(tableB)
            $('.tableW tr').each(function(index,item){
                tableCheck.push(item)
            })
            if(tableCheck.length === 0){
                loader(TableLoading('WaitList'))
            }else{
                empty(tableW)
                loader(TableLoading('WaitList'))
            }
            $('.dashboard').hide('slow');
            $('.bungalow').hide('slow');
            $('.end').hide('slow');
            $('.attente').show('slow');
            $('.da').removeClass('blue1');
            $('.bu').removeClass('blue1');
            $('.st').removeClass('blue1');
            $('.se').addClass('blue1');
            $('.h2').removeClass('scale1');
            $('.h3').removeClass('scale1');
            $('.h4-2').removeClass('scale1');
            $('.h4-1').addClass('scale1');
            $('.client_b').hide();
            $('.client_a').hide();
            $('.client').hide();
            $('.tableau_b').hide();

        })
        let nbrDb = $('.nombreDB').text();
        let nbrFM = $('.nombreFM').text();
        if(nbrDb == 8){
            $('.dbcolor').css('color','red')
        }else{
            $('.dbcolor').css('color','green')
        }
        if(nbrFM == 4){
            $('.fmcolor').css('color','red')
        }else{
            $('.fmcolor').css('color','green')
        }
    })
</script>
