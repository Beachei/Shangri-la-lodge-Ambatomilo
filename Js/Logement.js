$(document).ready(function(){
    var elementsWithBackgroundImages = document.querySelectorAll('[style*="background-image"]');
    
    elementsWithBackgroundImages.forEach(function(element) {
        var backgroundImage = element.style.backgroundImage;
        var imageUrl = backgroundImage.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');

        var img = new Image();
        img.src = imageUrl;
    });
    /* Logement */
    const tcc2 = Array.from(document.querySelectorAll(".tcc2"));
    const tcc1 = Array.from(document.querySelectorAll(".tcc1"));
    const tcc = Array.from(document.querySelectorAll(".tcc"));
    const bgreen2 = Array.from(document.querySelectorAll(".bgreen2"));
    const bgreen1 = Array.from(document.querySelectorAll(".bgreen1"));
    const bgreen = Array.from(document.querySelectorAll(".bgreen"));
    const red2 = Array.from(document.querySelectorAll(".bred2"));
    const red1 = Array.from(document.querySelectorAll(".bred1"));
    const red = Array.from(document.querySelectorAll(".bred"));
    const chcount2 = Array.from(document.querySelectorAll(".ch-count2"));
    const chcount1 = Array.from(document.querySelectorAll(".ch-count1"));
    const chcount = Array.from(document.querySelectorAll(".ch-count"));


            /* Récuperation des nombres de chambre restant */
            var villa = chcount.map(function(bcount){
                return bcount.innerHTML
            });
            let NDCD;
            $.ajax({
                url:'db/bdrow.php',
                type:'GET',
                success : function(data){
                    if(data !=0){
                        NDCD = 8 - data;
                    }else{
                        NDCD = 8
                    }
                    console.log("data de bdrow" + data)
                    $('.ch-count2').text(NDCD);
                    if(NDCD == 0){
                        bgreen2.map(function(bg2){
                            bg2.classList.add("d-none");
                            bg2.classList.remove("d-block");
                        });
                        red2.map(function(rd2){
                            rd2.classList.add("d-block");
                            rd2.classList.remove("d-none");
                        })
                        tcc2.map(function(t2){
                            t2.classList.add("text-danger");
                            t2.classList.remove("text-success");
                        })
                    }else{
                        bgreen2.map(function(bg2){
                            bg2.classList.remove("d-none");
                            bg2.classList.add("d-block");
                        });
                        red2.map(function(rd2){
                            rd2.classList.remove("d-block");
                            rd2.classList.add("d-none");
                        })
                        tcc2.map(function(t2){
                            t2.classList.remove("text-danger");
                            t2.classList.add("text-success");
                        })
                    }
                }
            })
            let NDCF;
            $.ajax({
                url:'db/fmrow.php',
                type:'GET',
                success : function(data){
                    if(data !=0){
                        NDCF = 4 - data;
                    }else{
                        NDCF =4;
                    }
                    console.log("data de fmrow" + data)
                    $('.ch-count1').text(NDCF);
                    if(NDCF ==0){   
                        bgreen1.map(function(bg1){
                            bg1.classList.add("d-none");
                            bg1.classList.remove("d-block");
                        })            
                        red1.map(function(rd1){
                            rd1.classList.add("d-block");
                            rd1.classList.remove("d-none");
                        })
                        tcc1.map(function(t1){
                            t1.classList.add("text-danger");
                            t1.classList.remove("text-success");
                        })
                    }else{
                        bgreen1.map(function(bg1){
                            bg1.classList.remove("d-none");
                            bg1.classList.add("d-block");
                        })
                        red1.map(function(rd1){
                            rd1.classList.remove("d-block");
                            rd1.classList.add("d-none");
                        })
                        tcc1.map(function(t1){
                            t1.classList.remove("text-danger");
                            t1.classList.add("text-success");
                        })
        
                    }
                }
            })
            /* Récuperation des nombres de chambre restant */
            /* Saison */
    const NowDate = new Date();
    let NowYear = NowDate.getFullYear();

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
            $("span").text(28)
            $(".saison").text("BASSE SAISON");
        } else {
            saison = 1;
            $("span").text(39)
            $(".saison").text("HAUTE SAISON");
        } 
     /* Saison */

            if(villa[0,1] ==0){
                bgreen.map(function(bg){
                    bg.classList.add("d-none");
                    bg.classList.remove("d-block");
                })
                red.map(function(rd){
                    rd.classList.add("d-block");
                    rd.classList.remove("d-none");
                })
                tcc.map(function(t){
                    t.classList.add("text-danger");
                    t.classList.remove("text-success");
                })

            }else{
                bgreen.map(function(bg){
                    bg.classList.remove("d-none");
                    bg.classList.add("d-block");
                })
                red.map(function(rd){
                    rd.classList.remove("d-block");
                    rd.classList.add("d-none");
                })
                tcc.map(function(t){
                    t.classList.remove("text-danger");
                    t.classList.add("text-success");
                })

            }
})