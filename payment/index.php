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
    <title>Shangri-La Lodge | Ambatomilo | Payment</title>
    <script src="https://www.paypal.com/sdk/js?client-id=Aa5xokGLrn08TxvMUpTcGRsYuEgWe7ekEt4o7DnFRUcC9U_9E3gXSaa81NoKBNhGyyewefe6IzUCT1Ca&currency=EUR&components=buttons"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/Style.css">
    <link rel="stylesheet" href="./CSS/responsive.css">
    <link rel="stylesheet" href="./CSS/burger.css">
    <link rel="stylesheet" href="./CSS/Style1.css">
    <script src="./jquery/jquery-3.7.1.min.js"></script>
</head>
<body>
        <!-------------------------------------- HEADER -------------------------------------------------------------->
        <div class="bg-image">
            <header class="d-none d-sm-block container-fluid d-lg-flex justify-content-center nave-bg h-50">
                <nav class="d-flex col-12 col-lg-11 h-50">
                     <div class="col-2 h-75 mt-3 mt-sm-0 col-xxl-3 d-flex align-items-center">
                         <div>
                            <a href="/index.html">
                                <img class="btnscale logo"  src="./assets/LOGO/logo.webp" alt="">
                            </a>
                         </div>
                     </div>
                     <div class="col-10 col-xxl-9  h-75 d-flex align-items-center ">
                         <ul class="col-12 h-25 list-unstyled d-flex justify-content-end m-0">
                             <li class="col-2 text-center btnscale"><a class="text-decoration-none nave fw-bold t-unstylled nv" style="text-shadow: 0px 0px 5px black;" href="/index.html">Accueil</a></li>
                             <li class="col-2 text-center btnscale"><a class="text-decoration-none nave fw-bold t-unstylled nv" style="text-shadow: 0px 0px 5px black;" href="/Logement.html">Logement</a></li>
                             <li class="col-2 text-center btnscale"><a class="text-decoration-none nave fw-bold t-unstylled nv" style="text-shadow: 0px 0px 5px black;" href="/Restaurant.html">Restauration</a></li>      
                             <li class="col-3 text-center btnscale"><a class="text-decoration-none nave fw-bold t-unstylled nv" style="text-shadow: 0px 0px 5px black;" href="/Services-activite.html">Nos Activités</a></li>                 
                         </ul>
                     </div>                  
                 </nav>
             </header>
             <header id="mobile header" class="nave-bg d-block d-sm-none h-50">
                 <nav class="col-12 d-flex justify-content-center">
                     <div class="col-11 d-flex">
                         <div class="col-10 align-self-center">
                             <button id="btnburger" class="btnburger col-3 mt-1 border-0 bg-transparent burger">
                                   <div class="bg-white boxeShadow radius py-1 my-1 line"></div>
                                   <div id="center" class="centerbg bg-white boxeShadow radius py-1 my-1"></div>
                                  <div class="bg-white boxeShadow radius py-1 my-1 line"></div>
                             </button>                          
                          </div>
                          <div class="col-2 h-75">
                             <div>
                                <a href="/index.html">
                                    <img class="btnscale" height="auto" width="100%"  src="./assets/LOGO/logo.webp" alt="">
                                </a>
                             </div>
                         </div>
                     </div>
                 </nav>
                 <div id="burger" class="burger1" style="position:relative; z-index:5;">
                     <div class="col-12 d-flex justify-content-center">
                         <ul class="h-25 list-unstyled col-10" style="z-index: 2;">
                             <li class="btnscale" style="z-index: 2;"><a class="text-decoration-none nave fw-bold t-unstylled nv1 ts3" href="/index.html">Accueil</a></li>
                             <li class="btnscale" style="z-index: 2;"><a class="text-decoration-none nave fw-bold t-unstylled nv1 ts3" href="/Logement.html">Logement</a></li>
                             <li class="btnscale" style="z-index: 2;"><a class="text-decoration-none nave fw-bold t-unstylled nv1 ts3" href="/Restaurant.html">Restauration</a></li>      
                             <li class="btnscale" ><a class="text-decoration-none nave fw-bold t-unstylled nv1 ts3" href="/Services-activite.html">Nos Activités</a></li>                 
                          </ul>
                     </div>
                 </div>
             </header>
             <div  class="h-50 d-flex align-items-end">
                 <div style="height: 15%;" class="col-12 header-bg"></div>
             </div>
        </div>
        <!-------------------------------------- HEADER -------------------------------------------------------------->
<div class="payment-status">
    <div class="overlay bg-4 col-12 d-flex justify-content-center align-items-center">
            <div class="px-4 approved col-12 col-sm-8 col-lg-4 ">
                <div class="mx-3 bg-2 radius shadow py-1">
                    <div class="container-fluid py-3">
                        <div class="d-flex justify-content-center animation-a">
                        </div>
                        <div class="approve-message">
                            <h4 class="fw-bold text-center merci mt-3">Votre Paiement a été Confirmé ! 🎉</h4>
                            <p class="align-self-center text-center fw-bold p">Félicitations ! Votre paiement a été traité avec succès. Nous sommes impatients de vous accueillir dans notre établissement. Un e-mail de confirmation avec les détails de votre réservation vous sera envoyé sous peu. Pour toute question ou demande spéciale, notre équipe est à votre disposition. À très bientôt !</p>
                            <div class="col-12 d-flex justify-content-center">
                                <button class="radius border-0 shadow retour p-2"><a class="text-decoration-none p-2 retour-color" href="../index.html">Retourner à la page d'acceuil </a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 rejected col-12 col-sm-8 col-lg-4 ">
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
   <div id="Nos_Politique_d'hebergement" class="container-sm-fluid margin  justify-content-center py-3 px-sm-5 pb-sm-5 pt-sm-0 politique">
      <div class="container border py-3 p-sm-5 pt-0 radius bluring shadow">
        <div class="container-sm pt-1">
          <h1 class="fw-bold italica text-center mb-0 col-12">SHANGRI-LA LODGE AMBATOMILO</h1>
          <h2 class="fw-bold italica1 text-center mb-0 col-12 text-uppercase">~ NOS POLITIQUE D'Hébergement ~</h2>
        </div>
        <br><br>
        <div>
            <div>
                <h4 class="ch4">1. Réservation et Confirmation</h4>
                <ul class="sty">
                    <li><h5 class="fw-bold ch5">BED and Breakfast ou B&B</h5>
                        <p class="ms-3">
                        <span class="fw-bold">Description :</span>
                        <span class="text-M">
                         Ce forfait inclut l’hébergement et un petit-déjeuner chaque matin. Parfait pour les voyageurs qui souhaitent découvrir les environs tout en profitant d’un repas léger pour commencer la journée. Les autres repas et services additionnels ne sont pas inclus et seront facturés séparément.
                        </span>
                        </p>
                    </li>
                    <li><h5 class="fw-bold ch5">Demi-pension ou DP</h5> 
                        <p class="ms-3">
                        <span class="fw-bold">Description :</span> 
                        <span class="text-M">
                        Ce traitement comprend l’hébergement, le petit-déjeuner et le déjeuner. Idéal pour ceux qui préfèrent passer plus de temps à l’hôtel tout en profitant d’un déjeuner préparé chaque jour. Les autres repas et services additionnels ne sont pas inclus et seront facturés séparément.
                        </span>
                        </p>
                    </li>
                    <li><h5 class="fw-bold ch5">Pension Complète ou PC</h5> 
                        <p class="ms-3">
                        <span class="fw-bold">Description :</span> 
                        <span class="text-M">
                        Ce forfait tout compris comprend l’hébergement, le petit-déjeuner, le déjeuner et le dîner. Ce traitement est conçu pour les clients qui souhaitent une prise en charge complète de leurs repas pendant toute la durée de leur séjour. Les repas sont servis dans notre établissement, offrant ainsi une expérience sans souci.
                        </span>
                        </p>
                    </li>
                </ul>
                <p class="text-M">Lors de la réservation, un acompte de 30 % du montant total est exigé afin de garantir la réservation. Ce paiement peut être effectué via PayPal ou par carte bancaire. Une fois le paiement reçu, un email de confirmation vous sera envoyé, validant ainsi votre séjour chez nous.</p>
            </div>
            <br>
            <div>
                <h4 class="ch4">2. Restauration</h4>
                <div>
                    <ul class="cli">
                        <li>
                            <h5 class="fw-bold ch5">Petit-dèjeuner :</h5>
                            <p>Servi sucré ou salé selon vos préférences.</p>
                        </li>
                        <li>
                            <h5 class="fw-bold ch5">Déjeuner et Dîner :</h5>
                            <ul class="cli1">
                                <li>Composés d’une entrée, d’un plat principal et d’un dessert.</li>
                                <li>Les menus varient chaque jour avec des plats malgaches, français et italiens.</li>
                                <li>Service à table ou buffet selon les disponibilités.</li>
                            </ul>
                        </li>
                        <li><h5 class="fw-bold ch5">Consommations Supplémentaires :</h5>
                        <p>Les boissons, la cafétéria ou tout autre paiement supplémentaire doivent être réglés la veille du départ.</p>
                    </li>
                    </ul>
                </div>
            </div>
            <br>
            <div>
                <h4 class="ch4">3. Conditions d'annulation et de Modification</h4>
                <p class="text-M"> Il est possible de modifier la
réservation en fonction de la disponibilité des chambres, mais dans le cas où la réservation est annulée par le client,l’avance n’est en aucun cas remboursable.</p>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button class="continue text-uppercase py-2  radius continuer">Continuer vers la reservation</button>
            </div>
        </div>
      </div>
   </div> 
   <div class="d-none container-fluid  payment justify-content-center margin">
    <form class="col-sm-12 col-lg-10 mt-3 shadow radius d-flex overflow-h" id="form">
      <div class="col-8">
        <div class="py-3 ps-5 bluring">
        <div class="d-flex">
             <div class="col-2"><img class="logo"  src="./assets/LOGO/logo.png" alt=""></div>
             <div class="col-10 d-flex align-items-center justify-content-center">
                <div>
                 <h1 class="fw-bold italica text-center mb-0 col-12">SHANGRI-LA LODGE AMBATOMILO</h1>
                 <h2 class="fw-bold italica1 text-center mb-0 col-12">~ <span class="saison"></span> ~</h2>
                 </div>
            </div>
        </div>
        <br>
             <div><h4>Mettez ici vos information</h4></div>
            <div class="col-11">
                <label class="fw-bold col-12" for="nom">Nom : <br><input class="bg-transparent nom col-12 border radius-1" type="text" name="nom" id="nom"></label><br>
                <div class="d-flex">
                   <label class="fw-bold col-6" for="prenom">Prénom : <br><input class="bg-transparent prenom col-11  border radius-1" type="text" name="prenom" id="prenom"></label>
                   <label class="fw-bold col-6" for="mail">Mail : <br><input class="bg-transparent mail col-12 border radius-1" type="text" name="mail" id="mail"></label>
                </div>
                <div>
                    <div><h4>Adresse</h4></div>
                    <div class="d-flex">
                        <label for="adresse" class="fw-bold col-6">Adresse Line 1 :<br><input autocomplete="street-address" class="border radius-1 col-11" type="text" id="adresse"></label>
                        <label for="adresse1" class="fw-bold col-6">Adresse Line 2 :<br><input autocomplete="address-level1" class="border radius-1 col-12" type="text" id="adresse1"></label>
                    </div>
                    <div class="d-flex">
                        <label for="zip" class="fw-bold col-12">Code postale ou Zip code :<br><input autocomplete="postal-code" class="border radius-1 col-12" type="text" id="zip"></label>
                    </div>
                    <div class="d-flex">
                    <label for="pay" class="col-6 fw-bold">Pay :<br><input autocomplete="country" class="border radius-1 col-11" type="text" id="pay"></label>
                    <label for="ville" class="col-6 fw-bold">Ville :<br><input autocomplete="address-level2" class="border radius-1 col-12" type="text" id="ville"></label>
                    </div>
                </div>
                <div>
                <div><h4>Reservation</h4></div>
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
                    <input class="border radius-1 col-11 nombre nbrA" type="number" min="0" max="4" name="nbrA" id="nbrA">
                    </div>
                </label>
                </div>
                <div class="d-flex align-items-center col-6">
                <label class="col-12 fw-bold" for="nbrE">Nombre d'enfant (6 - 12 ans (50%)) : <br>
                    <div class="d-flex">
                    <input class="border radius-1 col-12 nombre nbrE" type="number" min="0" max="4" name="nbrE" id="nbrE">
                    </div>
                </label>
                </div>
              </div>
              <div class="d-flex">
                  <label class="col-6 fw-bold" for="date">Date d'arrivé : <br>
                    <input type="date" name="dateArrive" class="dateA col-11" id="date">
                  </label>
                 <label class="col-6 fw-bold" for="dateD">Date de départ : <br>
                    <input type="date" name="dateDepart" class="dateD col-12" id="date">
                </label>
             </div>
            </div>
        <br>
        <!-- ACTIVITE ABANDONNER -->
<!--         <div>
            <h5 class="fw-bold">Activité sur reservation :</h5>
        </div>
        <div class="d-flex col-11">
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
        </div> -->
        <br>
        <div class="mb-2 litSup">
            <h5 class="fw-bold">Tous les bungalow familiale sont prises : </h5>
            <label id="label" class="label" for="suplement">
                <input type="checkbox" id="suplement" value="oui" class="me-1 suplement">Ajout d'un lit suplémentaire (6€/jour)
            </label>
        </div>
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
            <h5 id="passNight" class="passNight" >0</h5>
        </div>
        <div style="display: flex;">
            <h5 class="fw-bold">Lit suplémentaire :</h5>
            <h5 id="lit" class="lit" >0</h5>
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
        <div class="mt-2" style="display: flex;">
            <h5 class="fw-bold">Acompte 30% :</h5> 
            <h5 class="amountNuitTrente">0</h5> 
            <h5 class="mb-0">€</h5>
        </div>
        <hr>
        <!-- ACTIVITE ABANDONNER -->
<!--         <div style="display: flex;" class="align-items-center "> 
            <h5 class="fw-bold">Activité :</h5>
            <h5 class="amount1">0</h5>
            <h5>€</h5>
        </div>
        <div class="d-flex align-items-center mb-1">
            <p class="mb-0 fw-bold col-5">Nombre de personnes : </p>
            <input class="ms-1 nbrAA nbrAADesktop col-7 text-white fw-bold radius-1 border-0" type="number" name="nbrAA" min="0" id="nbrAA" value="">
        </div>
        <div class="mt-2" style="display: flex;">
            <h5 class="fw-bold">Total :</h5>
            <h5 class="amountActivité" >0</h5>
            <h5 class="mb-0">€</h5>
        </div>
        <hr> -->
        <div style="display: flex;">
            <h4 class="fw-bold">Frais paypal :</h4>
            <h4 class="amountPaypal" >0</h4>
            <h4>€</h4>
        </div>
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
   <div class="d-sm-none d-none payment_m justify-content-center margin">
    <form class=" shadow-1 radius-m d-flex overflow-h" id="form">
      <div>
        <div class="py-3 ps-1 bluring">
        <div class="d-flex">
             <div class="col-2 d-flex justify-content-center"><img class="logoM" width="55vw" height="55vh" src="./assets/LOGO/logo.png" alt=""></div>
             <div class="col-10 d-flex align-items-center">
                <div>
                   <h3 class="fw-bold italica mb-0">SHANGRI-LA LODGE AMBATOMILO</h3>
                   <h2 class="fw-bold italica1 text-center mb-0 col-12">~ <span class="saison">HAUTE SAISON</span> ~</h2>
                </div>
            </div>
        </div>
        <br>
             <div><h5 class="text-center">Mettez ici vos information</h5></div>
            <div class="container-fluid">
                <label class="col-12" for="nom">Nom : <br><input class="bg-transparent nom col-12 border radius-1" type="text" name="nom" id="nom"></label><br>
                <div class="d-flex">
                   <label class="col-6" for="prenom">Prénom : <br><input class="bg-transparent prenom col-11  border radius-1" type="text" name="prenom" id="prenom"></label>
                   <label class="col-6" for="mail">Mail : <br><input class="bg-transparent mail col-12 border radius-1" type="text" name="mail" id="mail"></label>
                </div>
                <div>
                    <div><h5>Adresse</h5></div>
                    <div class="d-flex">
                        <label for="adresse" class="col-6">Adresse Line 1 :<br><input autocomplete="street-address" class="border radius-1 col-11" type="text" id="adresse"></label>
                        <label for="adresse1" class="col-6">Adresse Line 2 :<br><input autocomplete="address-level1" class="border radius-1 col-12" type="text" id="adresse1"></label>
                    </div>
                    <div>
                        <label for="zip" class="col-12">Code postale ou Zip code :<br><input autocomplete="postal-code" class="border radius-1 col-12" type="text" id="zip"></label>
                    </div>
                    <div class="d-flex">
                    <label for="pay" class="col-6">Pay :<br><input autocomplete="country" class="border radius-1 col-11" type="text" id="pay"></label>
                    <label for="ville" class="col-6">Ville :<br><input autocomplete="address-level2" class="border radius-1 col-12" type="text" id="ville"></label>
                    </div>
                </div>
                <div>
                <div><h5>Reservation</h5></div>
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
                    <input class="border radius-1 col-12 nombre nbrA" type="number"name="nbrA" id="nbrA">
                    </div>
                </label>
                </div>
                <div class="d-flex align-items-center">
                <label class="col-12" for="nbrE">Nombre d'enfant (6 - 12 ans (50%)) : <br>
                    <div class="d-flex">
                    <input class="border radius-1 col-12 nombre nbrE" type="number" name="nbrE" id="nbrE">
                    </div>
                </label>
                </div>
              </div>
              <div class="d-flex">
                  <label class="col-6" for="date">Date d'arrivé : <br>
                    <input type="date" name="dateArrive" class="dateA col-11" id="date">
                  </label>
                 <label class="col-6" for="dateD">Date de départ : <br>
                 <input type="date" name="dateDepart" class="dateD col-12" id="date">
                 </label>
             </div>
             <br>
             <div>
            <h5>Activité sur reservation :</h5>
        </div>
        <!-- ACTIVITE SOUS RESERVATION EN ABONDANT -->
<!--         <div class="d-flex">
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
                  <input class="nbrAA col-12 radius-1 border" type="text" name="nbrAA" id="nbrAA" value="">
                </div>
            </label>
        </div> -->
        <br>
        <div class="mb-2 litSup">
            <label>Tous les bungalow familiale sont prises : </label>
            <label id="label" class="label" for="suplement">
                <input type="checkbox" id="suplement" value="oui" class="me-1 suplement">Ajout d'un lit suplémentaire (6€/jour)
            </label>
        </div>
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
          <div class="col-7 pb-2 floating-bar shadow bg-5m border-radius-top-left border-radius-bottom-left">
           <div class="bar pt-2 container-fluid ps-3 bg-6 mobile-suivi border-radius-top-left border-radius-bottom-left">
             <div style="display: flex;" class="align-items-center ">
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
             <div style="display: flex;" class="align-items-center ">
            <p class="fw-bold mb-0">Enfant :</p>
            <p class="enfantAmount mb-0">0</p>
            <p class="mb-0">€</p>
             </div>
             <div style="display: flex;">
            <p class="fw-bold">Total :</p>
            <p class="amountAE" >0</p>
            <p class="mb-0">€</p>
            </div>
            <hr>
            <div style="display: flex;">
            <p class="fw-bold">Nuit :</p>
            <p id="passNight" class="passNight" >0</p>
            </div>
            <div style="display: flex;">
            <p class="fw-bold">Lit suplémentaire :</p>
            <p id="lit" class="lit" >0</p>
            </div>
            <div style="display: flex;">
            <p class="fw-bold">Total prix lit suplémentaire :</p>
            <p class="prixLits" >0</p>
            <p class="mb-0">€</p>
            </div>
            <div style="display: flex;">
            <p class="fw-bold mb-0">Total :</p>
            <p class="amountNuit mb-0" >0</p>
            <p class="mb-0">€</p>
            </div>
            <div class="mt-2" style="display: flex;">
            <p class="fw-bold mb-0">Acompte 30% :</p> 
            <p class="amountNuitTrente mb-0">0</p> 
            <p class="mb-0">€</p>
            </div>
            <hr>
            <!-- ACTIVITE PRIX -->
<!--             <div style="display: flex;" class="align-items-center "> 
            <p class="fw-bold">Activité :</p>
            <p class="amount1">0</p>
            <p>€</p>
            </div>
            <div style="display: flex;">
            <p class="fw-bold">Total :</p>
            <p class="amountActivité" >0</p>
            <p class="mb-0">€</p>
            </div>
            <hr> -->
            <div style="display: flex;">
            <p class="fw-bold">Frais paypal :</p>
            <p class="amountPaypal" >0</p>
            <p>€</p>
            </div>
            <div style="display: flex;">
            <h5 class="fw-bold">Total :</h5>
            <h5 class="amount2" >0</h5>
            <h5>€</h5>
            </div>
           </div>  
        </div>
    </div>
    <div class="All">
        <input type="hidden" name="price" id="price" value="100.00">
        <input type="hidden" name="priceTraitement" id="priceTraitement" value="">
        <input type="hidden" name="dure" id="dure" value="100.00">
    </div>

    </form>
    </div> 
        <!-------------------------------------- FOOTER -------------------------------------------------------------->
        <div class="pb-lg-5  footer-bg" style="background-color: black;">
        <div class="pb-2 pb-sm-5 d-flex justify-content-end">
            <div class="col-3 d-none pb-5 d-sm-flex justify-content-center">
                <a href="#Nos_Politique_d'hebergement"><div class="bg-white pb-3 pt-2 px-2  border-bottom-left border-bottom-right"><img class="haut" width="40vh" heigth="40vh" src="/Assets/haut.png" alt=""></div></a>
            </div>
            <div class="col-3 pb-3 d-flex justify-content-center d-sm-none">
                <a href="#Nos_Politique_d'hebergement"><div class="bg-white pb-3 pt-2 px-2  border-bottom-left border-bottom-right"><img class="haut" width="25vh" heigth="25vh" src="/Assets/haut.png" alt=""></div></a>
            </div>
        </div>
        <div class="container-sm d-flex justify-content-center ">
            <div class="col-12 col-xxl-10 ">
                <nav class="d-flex justify-content-center align-items-center ">
                    <ul class="col-12 col-xxl-11 list-unstyled d-flex justify-content-center">
                        <li class="col-2 text-center btnscale"><a class="text-decoration-none fw-bold nave t-unstylled nv" href="/index.html">Accueil</a></li>
                        <li class="col-2 text-center btnscale"><a class="text-decoration-none fw-bold nave t-unstylled nv" href="/Logement.html">Logement</a></li>
                        <li class="col-2 text-center btnscale"><a class="text-decoration-none fw-bold nave t-unstylled nv" href="/Restaurant.html">Restauration</a></li>
                        <li class="col-3 text-center btnscale"><a class="text-decoration-none fw-bold nave t-unstylled nv" href="/Services-activite.html">Nos Activités</a></li>
                    </ul>
               </nav>           
                    <div class="py-2 py-sm-4 mb-sm-3 "></div>        
                    <div class="d-flex justify-content-center ">
                        <nav class="d-flex justify-content-center align-items-center col-10">
                            <ul class="col-12 col-sm-8 list-unstyled d-flex justify-content-center">
                                <li class="col-2 d-flex justify-content-center "><a class="d-flex justify-content-center" href="https://it-it.facebook.com/ambatomilo/" target="_blank"><img class="btnscale iconFf" src="../Assets/Icons/facebook.svg" alt=""></a></li>
                                <li class="col-2 d-flex justify-content-center "><a class="d-flex justify-content-center" href="https://www.instagram.com/shangri_la_lodge_ambatomilo?igsh=eGk0Z3prbzFucTd2&utm_source=qr"><img class="btnscale iconFf" src="../Assets/Icons/instagram.svg" alt=""></a></li>                           
                                <li class="col-2 d-flex justify-content-center "><a class="d-flex justify-content-center" href="https://www.youtube.com/user/ambatomilo" target="_blank"><img class="btnscale iconFf" src="../Assets/Icons/youtube.svg" alt=""></a></li>
                                <li class="col-2 d-flex justify-content-center "><a class="d-flex justify-content-center" href="https://www.tripadvisor.com/Hotel_Review-g3651484-d2355316-Reviews-Shangri_la_Lodge-Ambatomilo_Toliara_Province.html?m=19905" target="_blank"><img class="btnscale iconF"  src="../Assets/Icons/tripadvisor_icon.svg" alt=""></a></li>
                            </ul>
                       </nav>   
                    </div>
                <div class="py-2 py-sm-4"></div>
                <div>
                    <p class="text-center text-white nv">2023 © SHANGRI-LA LODGE | AMBATOMILO | MADAGASCAR
                    </p>
                </div>
            </div>
        </div>
        <div class="py-2 "></div>
    </div>
    <!-------------------------------------- FOOTER -------------------------------------------------------------->
</body>
<script src="price-copy.js"></script>
<script src="/Js/Nav.js"></script>
<script>
        $(document).ready(function(){
        $('.continue').click(function(){
            $('.politique').hide('slow')
            $('.payment').addClass('d-sm-flex')
            $('.payment_m').addClass('d-flex')
            $('.payment_m').removeClass('d-none')
        })
            $('.floating-bar').hide();
            $('.r').hide()
            $('.bulle').click(function(){
              $('.floating-bar').toggle('slow');
              $('.r').toggle('slow')
              $('.l').toggle('slow')
             })
            let familiale = $('.familialeCount').val();
            $('.payment-status').hide()
 
            if(familiale!=4){
                $('.litSup').hide();
            }else{
                $('.litSup').show();
                $('.suplement').change(function(){
                    if(this.checked){
                        $('.lit').text('1');
                    }else{
                        $('.lit').text('0');
                    }
                })
            }
        })
</script>
</html>