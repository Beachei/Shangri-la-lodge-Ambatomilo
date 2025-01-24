document.addEventListener('DOMContentLoaded', function(){
    const excursionBrouse = document.querySelector(".eb");
    const excursionQM = document.querySelector(".eqm");
    const position1 = excursionBrouse.getBoundingClientRect()
    const position2 = excursionQM.getBoundingClientRect()
    window.addEventListener('scroll', function(){
        const position = this.window.scrollY;
        console.log(position1.y + "Excursion brouse position");
        console.log(position2 + "Excursion Squad moto position");
    })
})