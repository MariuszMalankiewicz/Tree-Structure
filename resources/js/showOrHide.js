const ul = document.getElementById("tree");
const lis = [...ul.getElementsByClassName("hide")];
const btnArrows = [...ul.getElementsByClassName("fa-solid fa-caret-right")];


for (let i = 0; i < btnArrows.length; i++) {
    btnArrows[i].addEventListener("click", function () {
        btnArrows[i].classList.toggle("arrow");
        lis[i].classList.toggle("show");
    })
}