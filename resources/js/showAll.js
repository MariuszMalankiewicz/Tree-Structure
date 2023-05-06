const BtnShowAll = document.querySelector(".showAll");
const uls = document.getElementsByClassName("hide");

BtnShowAll.addEventListener("click", function(){

    for (let i = 0; i < uls.length; i++) {
        uls[i].classList.toggle("show");  
    }
})


