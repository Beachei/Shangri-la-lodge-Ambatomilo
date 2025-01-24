<?php
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
            box-shadow: 0px 15px 10px black;
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
    <div class="d-flex">
        <div class="col-2 blue height">
            <br>
            <div class="">
                <div class="da py-4 px-2"><h2 class="text-white scale h2">DASHBOARD</h2></div>
                <br>
                <div class="bu py-4 px-2"><h2 class="text-white scale h3">BUNGALOW</h2></div>
                <br>
                <div class="st py-4 px-2"><h2 class="text-white scale h4 text-uppercase">séjour terminer</h2></div>
            </div>
        </div>
        <div class="col-10">
            <div class="dashboard container-fluid">
                <br>
                <div>
                  <h2 class="fw-bold text-font">DASHBOARD</h2>
                </div>
                <div>
                    <p class="gris1 fw-bold">Ravie de vous revoir.</p>
                </div>
                 <div class="tableau"><?php include 'tableau_copy.php' ?></div>
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
        </div>
    </div>
</body>
</html>
<script>
    $('document').ready(function(){
        $('.dashboard').show('slow');
        $('.bungalow').hide();
        $('.end').hide();
        $('.da').addClass('blue1');
        $('.bu').removeClass('blue1');
        $('.st').removeClass('blue1');
        $('.h2').addClass('scale1');
        $('.h3').removeClass('scale1');
        $('.h4').removeClass('scale1');
        $('.da').click(function(){
            $('.dashboard').show('slow');
            $('.end').hide('slow');
            $('.bungalow').hide('slow');
            $('.da').addClass('blue1');
            $('.bu').removeClass('blue1');
            $('.st').removeClass('blue1');
            $('.h2').addClass('scale1');
            $('.h3').removeClass('scale1');
            $('.h4').removeClass('scale1');
            $('.client').hide();
            $('.client_b').hide();
            $('.tableau').show();
        })
        $('.bu').click(function(){
            $('.dashboard').hide('slow');
            $('.end').hide('slow');
            $('.bungalow').show('slow');
            $('.da').removeClass('blue1');
            $('.st').removeClass('blue1');
            $('.bu').addClass('blue1');
            $('.h2').removeClass('scale1');
            $('.h3').addClass('scale1');
            $('.h4').removeClass('scale1');
        })
        $('.st').click(function(){
            $('.dashboard').hide('slow');
            $('.bungalow').hide('slow');
            $('.end').show('slow');
            $('.da').removeClass('blue1');
            $('.bu').removeClass('blue1');
            $('.st').addClass('blue1');
            $('.h2').removeClass('scale1');
            $('.h3').removeClass('scale1');
            $('.h4').addClass('scale1');
            $('.client_b').hide();
            $('.client').hide();
            $('.tableau_b').show();


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
