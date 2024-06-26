import './app.js';
const toggler = document.querySelector(".hamburger");
const navLinksContainer = document.querySelector(".navlinks-container");

const toggleNav = e => {
  // Animation du bouton
  toggler.classList.toggle("open");

  const ariaToggle =
    toggler.getAttribute("aria-expanded") === "true" ? "false" : "true";
  toggler.setAttribute("aria-expanded", ariaToggle);

  // Slide de la navigation
  navLinksContainer.classList.toggle("open");
};

toggler.addEventListener("click", toggleNav);


new ResizeObserver(entries => {
  if (entries[0].contentRect.width <= 900) {
    navLinksContainer.style.transition = "transform 0.4s ease-out";
  } else {
    navLinksContainer.style.transition = "none";
  }
}).observe(document.body);

//animation sur le text dans presentation
var paragraph = document.getElementById('para');
var button1 = document.getElementById('text1');
var button2 = document.getElementById('text2');

button1.addEventListener('click', function () {
  //lorsqu'on clique sur le bouton 1 on change le text du paragraphe
  paragraph.innerHTML = "Le projet consiste en un gestionnaire de tâches sophistiqué et convivial, conçu pour répondre aux besoins variés des utilisateurs individuels ainsi que des équipes professionnelles. Ce gestionnaire de tâches vise à révolutionner la manière dont les utilisateurs planifient, suivent et gèrent leurs activités quotidiennes, offrant une solution complète pour améliorer la productivité et la collaboration au sein d'un environnement professionnel.";
});

// Écoutez les clics sur le deuxième bouton
button2.addEventListener('click', function () {
  //lorsqu'on clique sur le bouton 2 on change le text du paragraphe
  paragraph.innerHTML = "Notre solution de gestion de tâches est conçue pour répondre aux besoins divers et variés de plusieurs segments de la population, englobant aussi bien les professionnels chevronnés que les étudiants ambitieux, en passant par les équipes de travail dynamiques, ainsi que toute personne cherchant à optimiser l'organisation de ses tâches quotidiennes.";
});

/***************le moment lorsque je change de vidéo*************/
// Sélectionnez tous les éléments avec la classe "box"
const boxes = document.querySelectorAll('.box');

// On va parcourir tous les box
boxes.forEach(box => {
  box.addEventListener('click', (Boxes) => {
    // Vérifiez si la classe "play" est présente dans l'élément cliqué
    //supprimer tous les balises qui ont la classe .play-Video
    var playVideo = document.querySelectorAll('.play-Video');
    for (const play of playVideo) {
      play.classList.remove('play-Video');
    }
    if (!box.classList.contains('play')) {
      DeleteClassPlay(this);
      box.classList.add('play');
    }

    // récuperer l'index de la box cliqué
    const index = Array.prototype.indexOf.call(boxes, box);

    // mettre dans la balise ayant la classe .video à l'index de la variable index la class : .video-Box
    var videoBox = document.querySelectorAll('.video-explain');
    videoBox[index].classList.add('play-Video');
  });
});

function DeleteClassPlay(Boxes) {
  for (const box of boxes) {
    if (box.classList.contains('play')) {
      box.classList.remove('play');
    }
  }
}

// BTN scroll top
window.addEventListener('scroll', TopScroll);
function TopScroll() {
  let BtnScrollTop = document.getElementById('topButton');
    
  if (window.scrollY > 200){
    BtnScrollTop.style.visibility ="visible";
  }else{
    BtnScrollTop.style.visibility ="hidden";
  }
};

document
  .getElementById('topButton')
  .addEventListener("click", function(){
    window.scrollTo({
      top:0,
      behavior:"smooth"
    });
  });