//navbar


window.onscroll = function() {scrollFunction()};
        
function scrollFunction() {
if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
  document.getElementById("navbar").style.minHeight = "9vh";
  document.getElementById("bandiera").style.height = "15px";
  document.getElementById("bandiera").style.width = "21px";

  document.getElementById("FuoriRoma").style.fontSize = "14px";
  document.getElementById("LuoghiInsoliti").style.fontSize = "14px";
  document.getElementById("LeViste").style.fontSize = "14px";
  document.getElementById("recensioni").style.fontSize = "14px";
  


  document.getElementById("logo_home").style.width="100px";
    document.getElementById("logo_home").style.height="100px";
    document.getElementById("logo_home").style.left="13.5%";
    document.getElementById("logo_home").style.top="5.5%";
    document.getElementById("logo_home").style.position="fixed";  
    document.getElementById("logo_home").style.zIndex="6";

  document.getElementById("aoooo").style.top="1%";



} else {
  document.getElementById("navbar").style.minHeight = "12vh";
  document.getElementById("bandiera").style.height = "20px";
  document.getElementById("bandiera").style.width = "30px";
  document.getElementById("FuoriRoma").style.fontSize = "18px";
  document.getElementById("LuoghiInsoliti").style.fontSize = "18px";
  document.getElementById("LeViste").style.fontSize = "18px";
  document.getElementById("recensioni").style.fontSize = "18px";
 


  document.getElementById("logo_home").style.width="270px";
  document.getElementById("logo_home").style.height="270px";
  document.getElementById("logo_home").style.top="28%";
  document.getElementById("logo_home").style.left="50%";
  document.getElementById("logo_home").style.zIndex="4"; 
  document.getElementById("logo_home").style.visibility="visible";
  document.getElementById("aoooo").style.top="3%";

}
}

//login

function signin(){
    var x = document.getElementById("login");
    var y = document.getElementById("signin");
    var z = document.getElementById("btn");
    x.style.left = "-415px";
    y.style.left = "15px";
    z.style.left = "110px";
    document.getElementById("btnlog").style.color = "black";
    document.getElementById("btnsig").style.color = "white";
}

function login(){
    var x = document.getElementById("login");
    var y = document.getElementById("signin");
    var z = document.getElementById("btn");
    x.style.left = "15px";
    y.style.left = "415px"
    z.style.left = "0px";
    document.getElementById("btnsig").style.color = "black";
    document.getElementById("btnlog").style.color = "white";
}



//recensioni slide-show
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
 
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 6000); // Cambia immagine ogni 3secondi
}



const navSlide=() => {
  const burger= document.querySelector('.burger');
  const nav =document.querySelector('.ul-nav');
  const navLinks = document.querySelectorAll('.ul-nav li');

  burger.addEventListener('click',()=> {
          nav.classList.toggle('nav-active');
  
          navLinks.forEach((link,index)=> {
                  if (link.style.animation) {
                          link.style.animation='';
                  }
                  else {
                         link.style.animation= 'navLinkFade 0.5s ease forwards ${index / 7+1.5}s';
                  }
          });
        burger.classList.toggle('toggle');
  });
}

navSlide();



