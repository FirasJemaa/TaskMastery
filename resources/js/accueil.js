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
var paragraph1 = document.getElementById('para1');
var paragraph2 = document.getElementById('para2');
var button1 = document.getElementById('text1');
var button2 = document.getElementById('text2');

// Écoutez les clics sur le premier bouton
button1.addEventListener('click', function () {
  paragraph1.style.visibility = 'visible';  // Affiche le premier paragraphe en le rendant opaque
  paragraph2.style.visibility = 'hidden';  // Masque le deuxième paragraphe en le rendant transparent
});

// Écoutez les clics sur le deuxième bouton
button2.addEventListener('click', function () {
  paragraph1.style.visibility = 'hidden';  // Masque le premier paragraphe en le rendant transparent
  paragraph2.style.visibility = 'visible';  // Affiche le deuxième paragraphe en le rendant opaque
});

/***************le moment lorsque je change de vidéo*************/
// Sélectionnez tous les éléments avec la classe "box"
const boxes = document.querySelectorAll('.box');

// On va parcourir tous les box
boxes.forEach(box => {
  box.addEventListener('click', (Boxes) => {
    // Vérifiez si la classe "play" est présente dans l'élément cliqué
    if (!box.classList.contains('play')) {
      DeleteClassPlay(this);
      box.classList.add('play');
    }
  });
});

function DeleteClassPlay(Boxes) {
  for (const box of boxes) {
    if (box.classList.contains('play')) {
      box.classList.remove('play');
    }
  }
}