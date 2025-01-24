document.addEventListener("DOMContentLoaded", function(){
    const btnBurger = Array.from(document.querySelectorAll(".btnburger"))
    const baton = Array.from(document.querySelectorAll(".centerbg"));
    const burger = Array.from(document.querySelectorAll(".burger1"));
     baton.map(function(battonBurger){
       battonBurger.classList.add("dline")
       console.log("ok")
    })
     burger.map(function(brg2){
        brg2.classList.add("d-n")
    })
    btnBurger.map(function(btnNave){
        btnNave.addEventListener('click', function(){
            burger.map(function(burg){
                burg.classList.toggle("d-n");
                burg.classList.add("d-Anim");
                
                if(burg.classList.contains('d-n')){
                    console.log("d-n")
                    baton.map(function(bton){
                        bton.classList.add("animBurgerNone")
                        bton.classList.remove("animBurger")
                    })
                    btnBurger.map(function(btnbg){
                        btnbg.classList.add("scaleBurgerNone")
                        btnbg.classList.remove("scaleBurger")
                    })
                    burg.classList.add("d-Animreverse");
                    burg.classList.remove("d-Animreverse");
                }else{
                    console.log("d-block")
                    baton.map(function(bton){
                        bton.classList.add("animBurger")
                        bton.classList.remove("animBurgerNone")
                    })
                    btnBurger.map(function(btnbg){
                        btnbg.classList.add("scaleBurger")
                        btnbg.classList.remove("scaleBurgerNone")
                    })
                }
            })
        })
    })
    
})