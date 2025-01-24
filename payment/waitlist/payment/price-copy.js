document.addEventListener('DOMContentLoaded', function(){
    const nom = document.querySelectorAll('.nom');
    const prenom = document.querySelectorAll('.prenom');
    const mail = document.querySelectorAll('.mail');
    const adresse = document.querySelectorAll('#adresse');
    const adresse1 = document.querySelectorAll('#adresse1');
    const zip = document.querySelectorAll('#zip');
    const country = document.querySelectorAll('#pay');
    const ville = document.querySelectorAll('#ville');
    const selection = document.querySelectorAll('.selection');
    const price = document.getElementById('price');
    const priceTraitement = document.getElementById('priceTraitement');
    const nombreAdulte = document.querySelectorAll('#nbrA');
    const nombreEnfant = document.querySelectorAll('#nbrE');
    let amount = document.querySelectorAll('.amount');
    let amountActivies = document.querySelectorAll('.amount1');
    let adulteAmount = document.querySelectorAll('.adulteAmount');
    let enfantAmount = document.querySelectorAll('.enfantAmount');
    let nuitAmount = document.querySelectorAll('.amountNuit')
    let nuitAmountTrente = document.querySelectorAll('.amountNuitTrente')
    const form = document.querySelectorAll('form');
    let Total = document.querySelectorAll('.amount2');
    let TotalAE = document.querySelectorAll('.amountAE');
    let amountPrice = 0;
    let amountPriceA = 0;
    let halthPrice = 0;
    const check = document.querySelectorAll('.plongé');
    const date = document.querySelectorAll('#date')
    let date1 =  document.querySelectorAll('.dateA');
    let date2 =  document.querySelectorAll('.dateD');
    let nombreDeNuits = document.querySelectorAll('#passNight')
    let nightToPhp = document.querySelectorAll('#dure')
    const NowDate = new Date();
    let NowYear = NowDate.getFullYear();
    let NowMonth = NowDate.getMonth() + 1;
    let NowDay = NowDate.getDate();
    let NombrePersonnesActivité = document.querySelectorAll('#nbrAA');
    let amountActivité = document.querySelectorAll('.amountActivité');
    const lisSup = document.querySelectorAll('#suplement')
    let prixLits = document.querySelectorAll('.prixLits')
    let nombreAE = document.querySelectorAll('.nombre')

    let DateSBS = new Date(NowYear+"-"+"01"+"-"+"16") ;
    let DateEBS = new Date(NowYear+"-"+"05"+"-"+"31") ;
    let DateSBS1 = new Date(NowYear+"-"+"10"+"-"+"01") ;
    let DateEBS1 = new Date(NowYear+"-"+"12"+"-"+"15") ;
    let formatDN = NowDate.toISOString().split('T')[0];
    let formatSBS = DateSBS.toISOString().split('T')[0];
    let formatEBS = DateEBS.toISOString().split('T')[0];
    let formatSBS1 = DateSBS1.toISOString().split('T')[0];
    let formatEBS1 = DateEBS1.toISOString().split('T')[0];
    let saison ;
    let bb; 
    let dp;
    let pc;
        if ((formatDN >= formatSBS && formatDN <= formatEBS) || (formatDN >= formatSBS1 && formatDN <= formatEBS1)) {
            saison = 0;
            $(".saison").text("BASSE SAISON");
            bb = 28;
            dp = 44;
            pc = 55;
        } else {
            saison = 1;
            bb = 39;
            dp = 55;
            pc = 66;
            $(".saison").text("HAUTE SAISON");
        } 
    let firstName;
    let lastName;
    let Mail;
    let Street;
    let Street1;
    let ZipCode;
    let Town;
    let Payc;
    nom.forEach(function(name){
        name.addEventListener('input',function(){
            firstName = name.value;
        })
    })
    prenom.forEach(function(snames){
        snames.addEventListener('input',function(){
            lastName = snames.value
        })
    })
    mail.forEach(function(email){
        email.addEventListener('input',function(){
            Mail = email.value
        })
    })
    adresse.forEach(function(a){
        a.addEventListener('input',function(){
            Street = a.value;
        })
    })
    adresse1.forEach(function(a1){
        a1.addEventListener('input',function(){
            Street1 = a1.value;
        })
    })
    zip.forEach(function(z){
        z.addEventListener('input',function(){
            ZipCode = z.value;
        })
    })
    country.forEach(function(c){
        c.addEventListener('input',function(){
            Payc = c.value;
        })
    })
    ville.forEach(function(v){
        v.addEventListener('input',function(){
            Town = v.value;
        })
    })
    lisSup.forEach(function(ls){
        ls.disabled = true;
        $('.label').css('color','gray')
    })
    let selectionV;
    selection.forEach(function(select){
    amount.forEach(function(amount){
        select.addEventListener('change', function(){
            selectionV = select.value;
            if(select.value == 1){
                amountPrice = bb;
            }else if(select.value == 2){
                amountPrice = dp;
            }else if(select.value == 3){
                amountPrice = pc;
            }
            amount.innerHTML = amountPrice;
            nombreEnfant.forEach(function(nE){
                nE.value = 0
            })
            nombreAdulte.forEach(function(nA){
                nA.value = 0
            })
            enfantAmount.forEach(function(Eamount){
                Eamount.innerHTML = 0;
            })
            adulteAmount.forEach(function(Aamout){
                Aamout.innerHTML = 0;
            })
            TotalAE.forEach(function(TotalAE){
                TotalAE.innerHTML = 0
            })
            priceTraitement.value = amountPrice;
            halthPrice = (amountPrice * 50)/100;
            price.value = amountPrice;
        })

        if(select.value == 1){
            amountPrice = bb;
        }else if(select.value == 2){
            amountPrice = dp;
        }else if(select.value == 3){
            amountPrice = pc;
        }
            priceTraitement.value = amountPrice;
            amount.innerHTML = amountPrice;
        }) 
    })

    halthPrice = (amountPrice * 50)/100;
    let prixEnfant = 0
    let NE;
    nombreEnfant.forEach(function(nbrE){
        nbrE.addEventListener('input',function(){
            NE = nbrE.value;
            prixEnfant = nbrE.value * halthPrice;
            enfantAmount.forEach(function(Eamount){
                Eamount.innerHTML = prixEnfant;
            })
        })
    })
    let prixAdulte = 0;
    let NA;
    nombreAdulte.forEach(function(nbrA){
        nbrA.addEventListener('input',function(){
            NA = nbrA.value;
            prixAdulte = nbrA.value * amountPrice;
            adulteAmount.forEach(function(Aamout){
                Aamout.innerHTML = prixAdulte;
            })
        })
    })
    let nombreAEV ;
    nombreAE.forEach(function(NAE){
        NAE.addEventListener('input',function(){
            TotalAE.forEach(function(Total){
                Total.innerHTML = prixEnfant + prixAdulte
                nombreAEV = prixEnfant + prixAdulte
            })
        })
    })
    date2.forEach(function(dated){
        dated.disabled = true;
    })
    let dateArrive ="";
    date1.forEach(function(date1){    
        date1.setAttribute('min', NowDate.toISOString().split('T')[0]) 
        date1.addEventListener('input',function(){
                dateArrive = date1.value
                let dateCHange = new Date(dateArrive);
                dateCHange.setDate(dateCHange.getDate()+1)
                if(dateArrive != ""){
                    date2.forEach(function(dated){
                        dated.disabled = false;
                        dated.setAttribute('min', dateCHange.toISOString().substr(0,10)) 
                    })
                }
        })
    })
    let dateDepart ="";
    date2.forEach(function(dated){
        dated.addEventListener('input',function(){
            dateDepart = dated.value
        })
    })

    let activitéArray = [];
    let iForA = 0;
    let Aactivité = 0;
    let Aactivities;
    check.forEach(function(check){
        check.addEventListener('input', function(){
            iForA = 1;
            NombrePersonnesActivité.forEach(function(NPA){
                NPA.value = iForA
               })
            if(check.checked){
                console.log(check.value)
                switch(check.value){
                    case "excursion avec plongée sous marine":
                        console.log('15€');
                        amountPriceA += 15;
                        break
                    case "baptême de plongée":
                        console.log('20€');
                        amountPriceA += 20;
                        break
                    case "brevet de plongée":
                        console.log('18€');
                        amountPriceA += 18;   
                        break
                    case "excursion des baleines (juillet-septembre)":
                        console.log('16€');
                        amountPriceA += 16;     
                        break
                    case "excursions en quad ou moto":
                        console.log('11€');
                        amountPriceA += 11;                                   
                        break
                }
                activitéArray.push(check.value)
            }
            else{
                console.log('not checked')
                switch(check.value){
                    case "excursion avec plongée sous marine":
                        console.log('15€');
                        amountPriceA -= 15;
                        activitéArray = activitéArray.filter(index => index !== 'excursion avec plongée sous marine')
                        break
                    case "baptême de plongée":
                        console.log('20€');
                        amountPriceA -= 20;
                        activitéArray = activitéArray.filter(index => index !== 'baptême de plongée')
                        break
                    case "brevet de plongée":
                        console.log('18€');
                        amountPriceA -= 18;                 
                        activitéArray = activitéArray.filter(index => index !== 'brevet de plongée')   
                        break
                    case "excursion des baleines (juillet-septembre)":
                        console.log('16€');
                        amountPriceA -= 16;                      
                        activitéArray = activitéArray.filter(index => index !== 'excursion des baleines (juillet-septembre)')
                        break
                    case "excursions en quad ou moto":
                        console.log('11€');
                        amountPriceA -= 11;              
                        activitéArray = activitéArray.filter(index => index !== 'excursions en quad ou moto')      
                        break
                }
            }
            amountActivies.forEach(function(aa){
                    aa.innerHTML = amountPriceA
                    Aactivities = amountPriceA
            })
            amountActivité.forEach(function(aa){
                    aa.innerHTML = amountPriceA* iForA;
                    Aactivité = amountPriceA *iForA;
            })
            console.log(activitéArray + "activité array")
        })
    })
    
    NombrePersonnesActivité.forEach(function(NPA){
        NPA.addEventListener('input',function(){
            iForA = NPA.value;
            amountActivité.forEach(function(aa){
                aa.innerHTML = amountPriceA* iForA;
                Aactivité = amountPriceA *iForA;
            })
        })
       })



date.forEach(function(date){   
    date.addEventListener('input', function(){
        if(dateArrive != "" && dateDepart != ""){
            
            let arrivé = new Date(dateArrive)
            let départ = new Date(dateDepart)
            let night = départ.getTime()  - arrivé.getTime() ;
            const diffDays = Math.floor(night / (1000 * 60 * 60 * 24))
                console.log("nuit" + " " + diffDays)   
                console.log("départ" + " " + départ.getTime())   
                console.log("arrivé" + " " + arrivé.getTime())   
                nombreDeNuits.forEach(function(NDN){
                    NDN.innerHTML = diffDays;
                    nightToPhp.value = diffDays;
                })
                nightToPhp.forEach(function(NTP){
                    NTP.value = diffDays
                })
                let LogementNight = nombreAEV * diffDays;
                let c = LogementNight + Aactivité + parseFloat($('.prixLits').text()) ;
                price.value = LogementNight;
                console.log(nightToPhp.value)
                Total.forEach(function(T){
                 T.innerHTML = c;
                })
                $('#label').css('color','black')
                lisSup.forEach(function(ls){
                    ls.disabled = false;
                    $('.label').css('color','black')
                })
            }
    })
})
// FORM TAB
    console.log($(".TotalAmount2").val() + " " + "C'est le total paypal")

let pay;
let totalPay;
let prixLV;
let PaypalPrice = $(".TotalAmount2").val();
let frai;
const fixedPrix = 0.35;
form.forEach(function(Allform){
    Allform.addEventListener('change', function(){
        let pae;
        let nnuit;
        selection.forEach(function(select){
          selectionV = select.value;
        })
        console.log( firstName,lastName,mail,Street,Street1,ZipCode,Town,Payc)
        TotalAE.forEach(function(tae){
            console.log(tae.textContent)
            pae = tae.textContent
        })
        nombreDeNuits.forEach(function(NDN){
            nnuit = NDN.textContent
        })
        let prixN =parseFloat(pae) * parseFloat(nnuit);
        let litSupPrice;
        lisSup.forEach(function(Ls){
            prixLits.forEach(function(pl){
                let prix = parseFloat(pl.textContent);
                if(prix != 0){
                    pl.innerHTML = 6 * nnuit;
                }else{
                    pl.innerHTML = 0;
                }
            })
            Ls.addEventListener('change',function(){
                if(this.checked){
                    litSupPrice = 6 * nnuit;
                }else{
                    litSupPrice = 0;
                }
                prixLits.forEach(function(pl){
                    pl.innerHTML = litSupPrice;
                })
            })

        })
        prixLits.forEach(function(pl){
             prixLV = parseFloat(pl.textContent);
        })
        let Tnuit;
        nuitAmount.forEach(function(NA){
            Tnuit = prixN + prixLV;
            NA.innerHTML = Tnuit;
            totalPay = Tnuit
            Tnuit = (Tnuit*30)/100;
        })
        nuitAmountTrente.forEach(function(NAT){
            NAT.innerHTML = Tnuit
        })
        pay = Tnuit + Aactivité;
        if(pay != 0){
            PaypalPrice = (pay * 4.4/100) + fixedPrix;
            PaypalPrice =  Math.round(PaypalPrice * 100) / 100;
            frai = PaypalPrice;
            $('.amountPaypal').text(PaypalPrice)
            PaypalPrice = pay + PaypalPrice;
            PaypalPrice =  Math.round(PaypalPrice * 100) / 100;
        }else{
            PaypalPrice = 0;
        }

        Total.forEach(function(T){
            T.innerHTML = PaypalPrice;
        })
    })  
})

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
    }).render('#cardPaym');
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
    }).render('#cardPay');
    $(document).ready(function(){
        $('.Save').hide();
        $('.Edit').click(function(){
            $(this).hide('slow');
            $('.Save').show('slow');
            $('.selection').removeAttr('disabled');
            $('.nbrA').removeAttr('disabled');
            $('.nbrE').removeAttr('disabled');
            $('.dateA').removeAttr('disabled');
        })
        let tokenId;
        let durer;
        $('.Save').click(function(){
            $(this).hide('slow');
            $('.Edit').show('slow');
            tokenId = $('.token').val()
            selectionV = $('.selection').val()
            dateArrive = $('.dateA').val()
            dateDepart = $('.dateD').val()
            durer = $('.passNight').text()
            console.log($('.dateA').val() + " " + "C'est la date d'arrivé avec jquery")
            console.log($('.dateD').val() + " " + "C'est la date de départ avec jquery")
            console.log(nightToPhp.value + " " + "Night to php")
            console.log(durer + " " + "Night to php")
            $.ajax({
                url: "Update/up.php",
                type: "POST",
                data:{
                    tokenid:tokenId,
                    traitement:selectionV,
                    nbrA:NA,
                    nbrE:NE,
                    arrive:dateArrive,
                    depart:dateDepart,
                    dure: nightToPhp.value,
                    priceTraitement: priceTraitement.value,
                    priceAdulte: prixAdulte,
                    priceEnfant: prixEnfant,
                    totalAE: nombreAEV,
                    price : PaypalPrice,
                    prixTotale : totalPay, 
                    brut : pay,
                    frai : frai,
                    selection: selectionV
                },
                success:function(response){
                    console.log(response)
                },
                error:function(){
                    console.log('pas envoyer'+" "+dateArrive )
                }
            })
            $('.selection').attr('disabled',true);
            $('.nbrA').attr('disabled',true);
            $('.nbrE').attr('disabled',true);
            $('.dateA').attr('disabled',true);
            $('.dateD').attr('disabled',true);
    
        })
    })

/*     $(document).ready(function(){
        $('.payer').click(function(){
            console.log("c'est payer")
            $.ajax({
                url:'app.php',
                type:'POST',
                data: {
                    price : pay,
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
                    console.log(response)}
              })
        })
      }) */

 });