<?php 
require 'config/config.php';
$conn = new mysqli($server,$name,$pwd,$dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
};
$sql = "SELECT * FROM bungalow_familiale";
$resulte = $conn->query($sql);
$nbr_familliale = $resulte->num_rows;
echo"<input type='hidden' class='familialeCount' value='$nbr_familliale'>";
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=Aa5xokGLrn08TxvMUpTcGRsYuEgWe7ekEt4o7DnFRUcC9U_9E3gXSaa81NoKBNhGyyewefe6IzUCT1Ca&components=buttons"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/Style.css">
    <script src="./jquery/jquery-3.7.1.min.js"></script>
</head>
<body>
<div class="payment-status">
    <div class="overlay bg-4 col-12 d-flex justify-content-center align-items-center">
            <div class="px-4 approved col-4 ">
                <div class="mx-3 bg-2 radius shadow py-1">
                    <div class="container-fluid py-3">
                        <div class="d-flex justify-content-center animation-a">
                        </div>
                        <div class="approve-message">
                            <h4 class="fw-bold text-center merci mt-3">Votre Paiement a été Confirmé ! 🎉</h4>
                            <p class="align-self-center text-center fw-bold p">Félicitations ! Votre paiement a été traité avec succès. Nous sommes impatients de vous accueillir dans notre établissement. Un e-mail de confirmation avec les détails de votre réservation vous sera envoyé sous peu. Pour toute question ou demande spéciale, notre équipe est à votre disposition. À très bientôt !</p>
                            <div class="col-12 d-flex justify-content-center">
                                <button class="radius border-0 shadow retour p-2"><a class="text-decoration-none p-2 text-black" href="http://shangri-la/index.html">Retourner à la page d'acceuil </a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 rejected col-4">
                <div class="mx-3 bg-3 radius py-1 shadow">
                    <div class="container-fluid py-3">
                        <div class="d-flex justify-content-center animation-r">
                        </div>
                        <div class="reject-message">
                            <h4 class="fw-bold text-center rejeter mt-3">Problème de Paiement 🚫</h2>
                            <p class="align-self-center text-center fw-bold p1">Malheureusement, nous n'avons pas pu traiter votre paiement. Veuillez vérifier vos informations de carte ou choisir un autre mode de paiement. Si vous continuez à rencontrer des difficultés, merci de contacter notre service client ou votre banque pour plus d'assistance. Nous espérons pouvoir finaliser votre réservation rapidement.</p>
                            <div class="col-12 d-flex justify-content-center">
                                <button class="radius border-0 shadow p-2 retour">Retourner au payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
   <div class="d-none container-fluid d-sm-flex justify-content-center mt-5">
    <form class="col-10 mt-5 shadow radius d-flex overflow-h" id="form">
      <div class="col-8">
        <div class="py-3 ps-5 ">
        <div class="d-flex">
             <div class="col-2"><img width="80vw" height="80vh" src="./assets/LOGO/logo.png" alt=""></div>
             <div class="col-7 d-flex align-items-center justify-content-center"><h1 class="fw-bold italica mb-0">SHANGRI-LA LODGE AMBATOMILO</h1></div>
        </div>
        <br>
             <div><h4>Mettez ici vos information</h4></div>
            <div class="col-11">
                <label class="fw-bold col-12" for="nom">Nom : <br><input class="bg-transparent col-12 border radius-1" type="text" name="nom" id="nom"></label><br>
                <div class="d-flex">
                   <label class="fw-bold col-6" for="prenom">Prénom : <br><input class="bg-transparent col-11  border radius-1" type="text" name="prenom" id="prenom"></label>
                   <label class="fw-bold col-6" for="mail">Mail : <br><input class="bg-transparent col-12 border radius-1" type="text" name="mail" id="mail"></label>
                </div>
                <div>
                 <label for="selection" class="fw-bold col-12">Traitement : <br>
                 <select name="selection" id="selection" class="selection py-1 bg-transparent border radius-1 col-12">
                   <option value="1">BED & BREAKFAST</option>
                   <option value="2">DEMI PENSION</option>
                   <option value="3">PENSION COMPLET</option>
                 </select>
                 </label> 
                </div>
              <div class="d-flex">
                <div class="d-flex align-items-center col-6">
                <label class="col-12 fw-bold" for="nbrA">Nombre d'adulte : 
                    <br>
                    <div class="d-flex">
                    <input class="border radius-1 col-9 nombre" type="number" min="0" max="4" name="nbrA" id="nbrA">
                    <div class="d-flex justify-content-center col-3">
                    <button  class="down1 me-2" type="button">🔽</button>
                    <button  class="up1" type="button">🔼</button>
                    </div>
                    </div>
                </label>
                </div>
                <div class="d-flex align-items-center col-6">
                <label class="col-12 fw-bold" for="nbrE">Nombre d'enfant (6 - 12 ans (50%)) : <br>
                    <div class="d-flex">
                    <input class="border radius-1 col-9 nombre" type="number" min="0" max="4" name="nbrE" id="nbrE">
                    <div class="d-flex justify-content-center col-3">
                     <button  class="down me-2" type="button">🔽</button>
                     <button  class="up" type="button">🔼</button>
                    </div>
                    </div>
                </label>
                </div>
              </div>
              <div class="d-flex">
                  <label class="col-6 fw-bold" for="date">Date d'arrivé : <br>
                    <input type="date" name="dateArrive" class="dateA col-11" id="date">
                  </label>
                 <label class="col-6 fw-bold" for="dateD">Date de départ : <br>
                    <input type="date" name="dateDepart" class="dateD col-12" id="dateD">
                </label>
             </div>
            </div>
        <br>
        <div class="text-center">
            <h5 class="fw-bold">Activité sur reservation :</h5>
        </div>
        <div class="d-flex">
            <div class="d-block">
                <label class="col-12" for="plongé">
                </label>
                <label class="col-12" for="plongé">
                    <input name="p1" class="p me-1 plongé" id="plongé" value="baptême de plongée" type="checkbox">baptême de plongée
                </label>
                <label class="col-12" for="plongé1">
                    <input name="p2" class="p me-1 plongé" id="plongé1" value="brevet de plongée" type="checkbox">brevet de plongée
                </label>
            </div>
            <div class="d-block ">
                <label class="col-12" for="plongé2">
                    <input name="p3" class="p me-1 plongé" id="plongé2" value="excursion des baleines (juillet-septembre)" type="checkbox">excursion des baleines (juillet-septembre)
                </label>
                <label class="col-12" for="plongé3">
                    <input name="p4" class="p me-1 plongé" id="plongé3" value="excursions en quad ou moto" type="checkbox">excursions en quad ou moto
                </label>
                <label class="col-12" for="plongé4">
                    <input name="p" class="p me-1 plongé" id="plongé4" value="excursion avec plongée sous marine" type="checkbox">excursion avec plongée sous marine
                </label>
            </div>
        </div>
        <br>
        <div class="mb-2 litSup">
            <h5 class="fw-bold">Tous les bungalow familiale sont prises : </h5>
            <label id="label" for="suplement"><input type="checkbox" id="suplement" value="oui" class="me-1">Ajout d'un lit suplémentaire (6€/jour)</label>
        </div>



        <input type="hidden" name="priceAdulte" id="priceAdulte" value="">
        <input type="hidden" name="priceEnfant" id="priceEnfant" value="">
        <input type="hidden" name="totalAE" id="totalAdulteEnfant" value="">
        <input type="hidden" name="price" id="price" value="100.00">
        <input type="hidden" name="priceTraitement" id="priceTraitement" value="">
        <input type="hidden" name="priceActivities" id="priceA" value="">
        <input type="hidden" name="dure" id="dure" value="100.00">
        </div>
      </div>
      <div class="col-4 bg-5 bg-shadow text-white border-radius-top-right border-radius-bottom-right">
        <div class="p-3 bg-6">
        <div style="display: flex;" class="align-items-center ">
            <h5 class="fw-bold">Traitement :</h5>
            <h5 class="amount"></h5>
            <h5>€</h5>
        </div>
        <hr>
        <div style="display: flex;" class="align-items-center ">
            <h5 class="fw-bold mb-0">Adulte :</h5>
            <h5 class="adulteAmount mb-0">0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <br>
        <div style="display: flex;" class="align-items-center ">
            <h5 class="fw-bold mb-0">Enfant :</h5>
            <h5 class="enfantAmount mb-0">0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <br>
        <div style="display: flex;">
            <h5 class="fw-bold">Total :</h5>
            <h5 class="amountAE" >0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <hr>
        <div style="display: flex;">
            <h5 class="fw-bold">Nuit :</h5>
            <h5 id="passNight" >0</h5>
        </div>
        <div style="display: flex;">
            <h5 class="fw-bold">Lit suplémentaire :</h5>
            <h5 id="lit" >0</h5>
        </div>
        <div class="mt-2" style="display: flex;">
            <h5 class="fw-bold">Total prix lit suplémentaire :</h5>
            <h5 class="prixLits" >0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <div class="mt-2" style="display: flex;">
            <h5 class="fw-bold">Total :</h5>
            <h5 class="amountNuit" >0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <hr>
        <div style="display: flex;" class="align-items-center "> 
            <h5 class="fw-bold">Activité :</h5>
            <h5 class="amount1">0</h5>
            <h5>€</h5>
        </div>
        <div class="d-flex align-items-center mb-1">
            <p class="mb-0 fw-bold">Nombre de personnes : </p>
            <input class="ms-1 nbrAA" type="text" name="nbrAA" id="nbrAA" style="width: 4%;height: 3%;" value="">
            <div class="d-flex ms-2">
                <button  class="down2" type="button">🔽</button>
                <button  class="ms-1 up2" type="button">🔼</button>
            </div>
        </div>
        <div class="mt-2" style="display: flex;">
            <h5 class="fw-bold">Total :</h5>
            <h5 class="amountActivité" >0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <hr>
        <div style="display: flex;">
            <h2 class="fw-bold">Total :</h2>
            <h2 class="amount2" >0</h2>
            <h2>€</h2>
        </div>
            <br>
           <div id="cardPay"></div>
        </div>   
      </div>
    </form>
    </div> 
   <div class="d-sm-none d-flex justify-content-center mt-5">
    <form class="mt-5 shadow-1 radius-m d-flex overflow-h" id="form">
      <div>
        <div class="py-3 ps-1 ">
        <div class="d-flex">
             <div class="col-2 d-flex justify-content-center"><img width="55vw" height="55vh" src="./assets/LOGO/logo.png" alt=""></div>
             <div class="col-10 d-flex align-items-center justify-content-center"><h3 class="fw-bold italica mb-0">SHANGRI-LA LODGE AMBATOMILO</h3></div>
        </div>
        <br>
             <div><h4 class="text-center">Mettez ici vos information</h4></div>
            <div class="container-fluid">
                <label class="col-12" for="nom">Nom : <br><input class="bg-transparent col-12 border radius-1" type="text" name="nom" id="nom"></label><br>
                <div class="d-flex">
                   <label class="col-6" for="prenom">Prénom : <br><input class="bg-transparent col-11  border radius-1" type="text" name="prenom" id="prenom"></label>
                   <label class="col-6" for="mail">Mail : <br><input class="bg-transparent col-12 border radius-1" type="text" name="mail" id="mail"></label>
                </div>
                <div>
                 <label for="selection" class="col-12">Traitement : <br>
                 <select name="selection" id="selection" class="selection py-1 bg-transparent border radius-1 col-12">
                   <option value="1">BED & BREAKFAST</option>
                   <option value="2">DEMI PENSION</option>
                   <option value="3">PENSION COMPLET</option>
                 </select>
                 </label> 
                </div>
              <div>
                <div class="d-flex align-items-center">
                <label class="col-12" for="nbrA">Nombre d'adulte : 
                    <br>
                    <div class="d-flex">
                    <input class="border radius-1 col-9" type="number"name="nbrA" id="nbrA">
                    <div class="d-flex justify-content-center col-3">
                    <button  class="down1 me-2" type="button">🔽</button>
                    <button  class="up1" type="button">🔼</button>
                    </div>
                    </div>
                </label>
                </div>
                <div class="d-flex align-items-center">
                <label class="col-12" for="nbrE">Nombre d'enfant (6 - 12 ans (50%)) : <br>
                    <div class="d-flex">
                    <input class="border radius-1 col-9" type="number" name="nbrE" id="nbrE">
                    <div class="d-flex justify-content-center col-3">
                     <button  class="down me-2" type="button">🔽</button>
                     <button  class="up" type="button">🔼</button>
                    </div>
                    </div>
                </label>
                </div>
              </div>
              <div class="d-flex">
                  <label class="col-6" for="date">Date d'arrivé : <br>
                    <input type="date" name="dateArrive" class="dateA col-11" id="date">
                  </label>
                 <label class="col-6" for="dateD">Date de départ : <br>
                    <input type="date" name="dateDepart" class="dateD col-12" id="dateD">
                </label>
             </div>
             <br>
             <div class="text-center">
            <h5>Activité sur reservation :</h5>
        </div>
        <div class="d-flex">
            <div class="d-block col-6">
                <label class="col-12" for="plongé">
                </label>
                <label class="col-12" for="plongé">
                    <input name="p1" class="p me-1 plongé" id="plongé" value="baptême de plongée" type="checkbox">baptême de plongée
                </label>
                <label class="col-12" for="plongé1">
                    <input name="p2" class="p me-1 plongé" id="plongé1" value="brevet de plongée" type="checkbox">brevet de plongée
                </label>
            </div>
            <div class="d-block col-6">
                <label class="col-12" for="plongé2">
                    <input name="p3" class="p me-1 plongé" id="plongé2" value="excursion des baleines (juillet-septembre)" type="checkbox">excursion des baleines (juillet-septembre)
                </label>
                <label class="col-12" for="plongé3">
                    <input name="p4" class="p me-1 plongé" id="plongé3" value="excursions en quad ou moto" type="checkbox">excursions en quad ou moto
                </label>
                <label class="col-12" for="plongé4">
                    <input name="p" class="p me-1 plongé" id="plongé4" value="excursion avec plongée sous marine" type="checkbox">excursion avec plongée sous marine
                </label>
            </div>
        </div>
        <div class="mb-1">
            <label class="mb-0 col-12">Nombre de personnes à insrcrire au activité :
                <div class="col-12 d-flex">
                  <input class="nbrAA col-9 radius-1 border" type="text" name="nbrAA" id="nbrAA" value="">
                  <div class="d-flex ms-2 col-3">
                     <button  class="down2" type="button">🔽</button>
                     <button  class="ms-1 up2" type="button">🔼</button>
                   </div>
                </div>
            </label>
        </div>
        <br>
        <div class="mb-2 litSup">
            <label>Tous les bungalow familiale sont prises : </label>
            <label id="label" for="suplement"><input type="checkbox" id="suplement" value="oui" class="me-1">Ajout d'un lit suplémentaire (6€/jour)</label>
        </div>


        <input type="hidden" name="price" id="price" value="100.00">
        <input type="hidden" name="priceTraitement" id="priceTraitement" value="">
        <input type="hidden" name="dure" id="dure" value="100.00">
        <div id="cardPaym"></div>
        </div>
      </div>
            </div>
        <br>
   <div class="col-12 d-flex justify-content-end overlay-1 text-white">
        <div class="d-flex justify-content-end align-items-center">
        <div class="image p-3 d-flex justify-content-center align-items-center bulle border-radius-top-left border-radius-bottom-left col-1">
            <img class="l" width="15vw" height="15vh" src="./assets/left.png" alt="">
            <img class="r" width="15vw" height="15vh" src="./assets/rigth.png" alt="">
        </div>
        </div>
        <div class="col-6 floating-bar shadow bg-5m border-radius-top-left border-radius-bottom-left">
        <div class="ba rcontainer-fluid ps-3 bg-6 mobile-suivi border-radius-top-left border-radius-bottom-left">
        <div style="display: flex;" class="align-items-center mt-3">
            <p class="fw-bold">Traitement :</>
            <p class="amount"></p>
            <p>€</p>
        </div>
        <hr>
        <div style="display: flex;" class="align-items-center ">
            <p class="fw-bold mb-0">Adulte :</p>
            <p class="adulteAmount mb-0">0</p>
            <p class="mb-0">€</p>
        </div>
        <br>
        <div style="display: flex;" class="align-items-center ">
            <p class="fw-bold mb-0">Enfant :</p>
            <p class="enfantAmount mb-0">0</p>
            <p class="mb-0">€</p>
        </div>
        <br>
        <div style="display: flex;">
            <p class="fw-bold">Total :</p>
            <p class="amountAE" >0</p>
            <p class="mb-0">€</p>
        </div>
        <hr>
        <div style="display: flex;">
            <p class="fw-bold">Nuit :</p>
            <p id="passNight" >0</p>
        </div>
        <div style="display: flex;">
            <p class="fw-bold">Lit suplémentaire :</p>
            <p id="lit" >0</p>
        </div>
        <div class="mt-2" style="display: flex;">
            <p class="fw-bold">Total prix lit suplémentaire :</p>
            <p class="prixLits" >0</p>
            <p class="mb-0">€</p>
        </div>
        <div class="mt-2" style="display: flex;">
            <p class="fw-bold">Total :</p>
            <p class="amountNuit" >0</p>
            <p class="mb-0">€</p>
        </div>
        <hr>
        <div style="display: flex;" class="align-items-center "> 
            <p class="fw-bold">Activité :</p>
            <p class="amount1">0</p>
            <p>€</p>
        </div>
        <div class="mt-2" style="display: flex;">
            <p class="fw-bold">Total :</p>
            <p class="amountActivité" >0</p>
            <p class="mb-0">€</p>
        </div>
        <hr>
        <div style="display: flex;">
            <h5 class="fw-bold">Total :</h5>
            <h5 class="amount2" >0</h5>
            <h5>€</h5>
        </div>
            <br>

        </div>  
        </div>
    </div>
    </form>
    </div> 
    <script src="price-copy.js"></script>
    <script>
        $(document).ready(function(){
            $('.floating-bar').hide();
            $('.r').hide()
            $('.bulle').click(function(){
              $('.floating-bar').toggle('slow');
              $('.r').toggle('slow')
              $('.l').toggle('slow')
             })
            let familiale = $('.familialeCount').val();
            $('.payment-status').hide()

            if(familiale!=3){
                $('.litSup').hide();
            }else{
                $('.litSup').show();
                $('#suplement').change(function(){
                    let nuit = $('#passNight').text()
                    let intNuit = parseFloat(nuit);
                    let prix =6 * nuit;
                    if(this.checked){
                        $('#lit').text('1');
                        $('.prixLits').text(prix);
                        console.log(nuit * 6 + 'prix supl');
                    }else{
                        $('#lit').text('0');
                        $('.prixLits').text('0');
                    }
                })
            }
        })
    </script>
</body>
</html>