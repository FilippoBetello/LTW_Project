/* Queste funzioni servono per effettuare lo slideshow delle immagini nelle pagine con la mappa */


var slideIndex1 = 0;
showSlides1();

function showSlides1() {
  var i;
  var slides = document.getElementsByClassName("trans1");
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex1++;
  if (slideIndex1 > slides.length) {slideIndex1 = 1}    
 
  slides[slideIndex1-1].style.display = "inline";  
  setTimeout(showSlides1, 4000); // Cambia immagine ogni 4secondi
}

var slideIndex2 = 0;
showSlides2();

function showSlides2() {
  var i;
  var slides = document.getElementsByClassName("trans2");
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex2++;
  if (slideIndex2 > slides.length) {slideIndex2 = 1}    
 
  slides[slideIndex2-1].style.display = "inline";  
  setTimeout(showSlides2, 4000); // Cambia immagine ogni 4secondi
}


var slideIndex3 = 0;
showSlides3();

function showSlides3() {
  var i;
  var slides = document.getElementsByClassName("trans3");
 
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex3++;
  if (slideIndex3 > slides.length) {slideIndex3 = 1}    
 
  slides[slideIndex3-1].style.display = "inline";  
  setTimeout(showSlides3, 4000); // Cambia immagine ogni 4secondi
}


var slideIndex4 = 0;
showSlides4();

function showSlides4() {
  var i;
  var slides = document.getElementsByClassName("trans4");
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex4++;
  if (slideIndex4 > slides.length) {slideIndex4 = 1}    
 
  slides[slideIndex4-1].style.display = "inline";  
  setTimeout(showSlides4, 4000); // Cambia immagine ogni 4secondi
}

var slideIndex5 = 0;
showSlides5();

function showSlides5() {
  var i;
  var slides = document.getElementsByClassName("trans5");
 
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex5++;
  if (slideIndex5 > slides.length) {slideIndex5 = 1}    
 
  slides[slideIndex5-1].style.display = "inline";  
  setTimeout(showSlides5, 4000); // Cambia immagine ogni 4secondi
}

var slideIndex6 = 0;
showSlides6();

function showSlides6() {
  var i;
  var slides = document.getElementsByClassName("trans6");

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex6++;
  if (slideIndex6 > slides.length) {slideIndex6 = 1}    
 
  slides[slideIndex6-1].style.display = "inline";  
  setTimeout(showSlides6, 4000); // Cambia immagine ogni 4secondi
}


var slideIndex7 = 0;
showSlides7();

function showSlides7() {
  var i;
  var slides = document.getElementsByClassName("trans7");
  
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex7++;
  if (slideIndex7 > slides.length) {slideIndex7 = 1}    
 
  slides[slideIndex7-1].style.display = "inline";  
  setTimeout(showSlides7, 4000); // Cambia immagine ogni 4secondi
}



/*Queste funzioni JQuery servono per aprire i bottoni nelle pagine delle mappe:
quando si clicca su uno di essi, se esso è chiuso allora viene aperto e la finestra viene fatta scorrere fino ad un punto prestabilito per poter
osservare al meglio lo slideshow e leggere la descrizione, e contestualmente vengono chiusi tutti gli altri bottoni se aperti.
se quando clicchiamo su uno, esso era già aperto semplicemente si chiude senza spostare la finestra*/


function bt1(){
  $(".par1").slideToggle("slow", function(){
    if($(".par1").is(":visible")){
      window.scrollTo(0, 550);
      }
    });
  $(".par2").slideUp("slow");
  $(".par3").slideUp("slow");
  $(".par4").slideUp("slow");
  $(".par5").slideUp("slow");
  $(".par6").slideUp("slow");
  $(".par7").slideUp("slow");
}
function bt2(){
  $(".par2").slideToggle("slow", function(){
    if($(".par2").is(":visible")){
      window.scrollTo(0, 640);
      }
    });
  $(".par1").slideUp("slow");
  $(".par3").slideUp("slow");
  $(".par4").slideUp("slow");
  $(".par5").slideUp("slow");
  $(".par6").slideUp("slow");
  $(".par7").slideUp("slow");
}

function bt3(){
  $(".par3").slideToggle("slow", function(){
    if($(".par3").is(":visible")){
      window.scrollTo(0, 730);
      }
    });
  $(".par1").slideUp("slow");
  $(".par2").slideUp("slow");
  $(".par4").slideUp("slow");
  $(".par5").slideUp("slow");
  $(".par6").slideUp("slow");
  $(".par7").slideUp("slow");
}

function bt4(){
  $(".par4").slideToggle("slow", function(){
    if($(".par4").is(":visible")){
      window.scrollTo(0, 815);
      }
    });
  $(".par1").slideUp("slow");
  $(".par2").slideUp("slow");
  $(".par3").slideUp("slow");
  $(".par5").slideUp("slow");
  $(".par6").slideUp("slow");
  $(".par7").slideUp("slow");
}

function bt5(){
  $(".par5").slideToggle("slow", function(){
    if($(".par5").is(":visible")){
      window.scrollTo(0, 910);
      }
    });
  $(".par1").slideUp("slow");
  $(".par2").slideUp("slow");
  $(".par3").slideUp("slow");
  $(".par4").slideUp("slow");
  $(".par6").slideUp("slow");
  $(".par7").slideUp("slow");
}

function bt6(){
  $(".par6").slideToggle("slow", function(){
    if($(".par6").is(":visible")){
      window.scrollTo(0, 1000);
      }
    });
  $(".par1").slideUp("slow");
  $(".par2").slideUp("slow");
  $(".par3").slideUp("slow");
  $(".par4").slideUp("slow");
  $(".par5").slideUp("slow");
  $(".par7").slideUp("slow");
}

function bt7(){
  $(".par7").slideToggle("slow", function(){
    if($(".par7").is(":visible")){
      window.scrollTo(0, 1070);
      }
    });
  $(".par1").slideUp("slow");
  $(".par2").slideUp("slow");
  $(".par3").slideUp("slow");
  $(".par4").slideUp("slow");
  $(".par5").slideUp("slow");
  $(".par6").slideUp("slow");
}






/*Navbar*/

/* funzione per ridimensionare la dimensione della navbar una volta che la finestra viene fatta scorrere
sotto ad essa è presente una funzione per aprire il burger presente quando viene ridimensionata la finestra (sito responsive) */




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
  document.getElementById("logo2").style.width="100px";
  document.getElementById("logo2").style.height="100px"; 
  document.getElementById("logo2").style.marginTop="14px";
  document.getElementById("aoooo").style.top="1%";

} else {
  document.getElementById("navbar").style.minHeight = "12vh";
  document.getElementById("bandiera").style.height = "20px";
  document.getElementById("bandiera").style.width = "30px";
  document.getElementById("FuoriRoma").style.fontSize = "18px";
  document.getElementById("LuoghiInsoliti").style.fontSize = "18px";
  document.getElementById("LeViste").style.fontSize = "18px";
  document.getElementById("recensioni").style.fontSize = "18px";
  document.getElementById("logo2").style.width="130px";
  document.getElementById("logo2").style.height="130px";
  document.getElementById("logo2").style.marginTop="0px";
  document.getElementById("aoooo").style.top="3%";
}
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