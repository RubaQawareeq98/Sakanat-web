const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".tog");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
    inp.addEventListener("focus", () => {
        inp.classList.add("active");
    });
    inp.addEventListener("blur", () => {
        if (inp.value != "") return;
        inp.classList.remove("active");
    });
});

toggle_btn.forEach((btn) => {
    btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
    });
});

function moveSlider() {
    let index = this.dataset.value;

    let currentImage = document.querySelector(`.img-${index}`);
    images.forEach((img) => img.classList.remove("show"));
    currentImage.classList.add("show");

    const textSlider = document.querySelector(".text-group");
    textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

    bullets.forEach((bull) => bull.classList.remove("active"));
    this.classList.add("active");
}

bullets.forEach((bullet) => {
    bullet.addEventListener("click", moveSlider);
});
const pass= document.getElementById('password2');
const toggle=document.getElementById('toggle2');
document.getElementById('toggle2').addEventListener('click',showHide);
function showHide() {
    if(pass.type=='password'){
        pass.setAttribute('type','text');
        toggle.classList.add('hide');
        toggle.innerHTML=''

    }
    else {
        pass.setAttribute('type','password');
        toggle.classList.remove('hide')
        toggle.innerHTML='<img src="img/showPass.png" alt="">';
    }

}
const loader=document.querySelector('.load');
const main2=document.querySelector('.main');
function inIt(){
    setTimeout(()=>{
        loader.style.display ='none';
        main.style.display ='flex';
        setTimeout(()=>(main.style.opacity=1),50);
    },2000);
}
inIt();