paypal.Buttons({
    style: {
    layout: 'vertical',
    color:  'blue',
    shape:  'rect',
    label:  'paypal'
    },
    createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
/*           currency_code: 'EUR', */
          value: PaypalPrice
        },
        payer: {
            name: {
                given_name: firstName,
                surname: lastName
            }
        },
      }]
    });
    },
    onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
   //   alert('Transaction completed by ' + details.payer.name.given_name);
      $(document).ready(function(){
        $('.payment-status').show('slow')
        $('#cardPaym').hide('slow');
        $('.approved').show('slow');
        $('.rejected').hide();
        $('.approve-message').hide()
        $('.approve-message').css('opacity','0')
        $('.animation-a').html('<lottie-player class="approve-anim" src="./assets/Animate status/approved.json" background="transparent" speed="1" style="width: 300px; height: 300px;"  autoplay></lottie-player>')
        setTimeout(function(){
            $('.approve-message').show('slow')
            $('.approve-message').animate({
                opacity : '1'
            },'slow')
        },1500)
        setTimeout(function(){
            $('.approve-anim').hide('slow')
        },1200)
        $(".retour").click(function(){
            $('.rejected').hide('slow')
            $('.approved').hide('slow')
            $('.payment-status').hide()
        })
        $.ajax({
            url:'app.php',
            type:'POST',
            data: {
                price : PaypalPrice,
                prixTotale : totalPay, 
                brut : pay,
                frai : frai,
                priceActivities: Aactivité,
                priceTraitement: priceTraitement.value,
                priceAdulte: prixAdulte,
                priceEnfant: prixEnfant,
                totalAE: nombreAEV,
                nom: firstName,
                prenom: lastName,
                mail: Mail,
                adresse : Street,
                adresse1 : Street1,
                zip : ZipCode,
                ville : Town,
                pay : Payc,
                selection: selectionV,
                dateArrive: dateArrive,
                dateDepart: dateDepart,
                dure: nightToPhp.value,
                nbrA: NA,
                nbrE: NE,
                nbrPIAA: iForA,
                activité:  activitéArray,
                prixSup : prixLV,
                litSup : $('#lit').text()
            },
            success: function(response){
                console.log(response)
                console.log(totalPay + "C'est le prix total")
            }
          })
      })
    });
    },
    onError: function(err) {
        $('.payment-status').show('slow')
        $('.approved').hide()
        $('.rejected').show('slow');
        $('.reject-message').hide()
        $('.animation-r').html('<lottie-player class="reject-anim" src="./assets/Animate status/rejected.json" background="transparent" speed="1" style="width: 300px; height: 300px;"  autoplay></lottie-player>')
        $('.reject-message').css('opacity','0')
        $('#cardPaym').hide('slow');
        setTimeout(function(){
            $('.reject-message').show('slow')
            $('.reject-message').animate({
                opacity : '1'
            },'slow')
        },1500)
        setTimeout(function(){
                $('.reject-anim').hide('slow')
        },1200)
        $(".retour").click(function(){
            $('.rejected').hide('slow');
            $('.approved').hide('slow');
            $('.payment-status').hide();
            $('#cardPaym').show('slow');
        })
    }
    }).render();
 paypal.Buttons({
    style: {
    layout: 'vertical',
    color:  'blue',
    shape:  'rect',
    label:  'paypal'
    },
    createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
/*           currency_code: 'EUR',
 */          value: PaypalPrice
        },
        payer: {
            name: {
                given_name: firstName,
                surname: lastName
            }
        },
      }]
    });
    },
    onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
   //   alert('Transaction completed by ' + details.payer.name.given_name);
      $(document).ready(function(){
        $('.payment-status').show('slow')
        $('#cardPay').hide('slow');
        $('.approved').show('slow');
        $('.rejected').hide();
        $('.approve-message').hide()
        $('.approve-message').css('opacity','0')
        $('.animation-a').html('<lottie-player class="approve-anim" src="./assets/Animate status/approved.json" background="transparent" speed="1" style="width: 300px; height: 300px;"  autoplay></lottie-player>')
        setTimeout(function(){
            $('.approve-message').show('slow')
            $('.approve-message').animate({
                opacity : '1'
            },'slow')
        },1500)
        setTimeout(function(){
            $('.approve-anim').hide('slow')
        },1200)
        $(".retour").click(function(){
            $('.rejected').hide('slow')
            $('.approved').hide('slow')
            $('.payment-status').hide()
        })
        $.ajax({
            url:'app.php',
            type:'POST',
            data: {
                price : PaypalPrice,
                prixTotale : totalPay,
                brut : pay,
                frai : frai,
                priceActivities: Aactivité,
                priceTraitement: priceTraitement.value,
                priceAdulte: prixAdulte,
                priceEnfant: prixEnfant,
                totalAE: nombreAEV,
                nom: firstName,
                prenom: lastName,
                mail: Mail,
                adresse : Street,
                adresse1 : Street1,
                zip : ZipCode,
                ville : Town,
                pay : Payc,
                selection: selectionV,
                dateArrive: dateArrive,
                dateDepart: dateDepart,
                dure: nightToPhp.value,
                nbrA: NA,
                nbrE: NE,
                nbrPIAA: iForA,
                activité:  activitéArray,
                prixSup : prixLV,
                litSup : $('#lit').text()
            },
            success: function(response){
                console.log(response)
                console.log(totalPay + "C'est le prix total")
            }
          })
      })
    });
    },
    onError: function(err) {
        $('.payment-status').show('slow')
        $('.approved').hide()
        $('.rejected').show('slow');
        $('.reject-message').hide()
        $('.animation-r').html('<lottie-player class="reject-anim" src="./assets/Animate status/rejected.json" background="transparent" speed="1" style="width: 300px; height: 300px;"  autoplay></lottie-player>')
        $('.reject-message').css('opacity','0')
        $('#cardPay').hide('slow');
        setTimeout(function(){
            $('.reject-message').show('slow')
            $('.reject-message').animate({
                opacity : '1'
            },'slow')
        },1500)
        setTimeout(function(){
                $('.reject-anim').hide('slow')
        },1200)
        $(".retour").click(function(){
            $('.rejected').hide('slow');
            $('.approved').hide('slow');
            $('.payment-status').hide();
            $('#cardPay').show('slow');
        })
    }
    }).render();
