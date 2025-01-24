
document.addEventListener("DOMContentLoaded", function(){
    /* Restaurant */
    const resto = document.querySelectorAll(".Restobar");
    const cuisine = document.querySelectorAll(".Cuisine");
    const restobtn = document.querySelectorAll(".restoBtn");
    const cuisinebtn = document.querySelectorAll(".cuisineBtn");
    const btntocuisine = document.querySelectorAll(".bottomBtn");

    console.log(resto)
    console.log(cuisine)
    console.log(restobtn)
    console.log(cuisinebtn)
    console.log(btntocuisine)

   restobtn.forEach(function(restobtn1){
        restobtn1.addEventListener("click", ()=>{
            resto.forEach(function(resto1){
             resto1.classList.add('d-block');
             resto1.classList.remove('d-none');
             resto1.classList.add('show');
            })
            cuisine.forEach(function(cuisine1){
             cuisine1.classList.add('d-none');
             cuisine1.classList.remove('d-block');
            })
         })
    })
    btntocuisine.forEach(function(btntocuisine1){
        btntocuisine1.addEventListener("click", ()=>{
            cuisine.forEach(function(cuisine1){
                cuisine1.classList.remove('d-none');
                cuisine1.classList.add('d-block');
                cuisine1.classList.add('show');
               })
               resto.forEach(function(resto1){
                resto1.classList.remove('d-block');
                resto1.classList.add('d-none');
               })
         })
    })
    cuisinebtn.forEach(function(cuisinebtn1){
        cuisinebtn1.addEventListener("click", ()=> {
            cuisine.forEach(function(cuisine1){
                cuisine1.classList.remove('d-none');
                cuisine1.classList.add('d-block');
                cuisine1.classList.add('show');
               })
               resto.forEach(function(resto1){
                resto1.classList.remove('d-block');
                resto1.classList.add('d-none');
               })
        })
      })


    })
   

