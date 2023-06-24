document.addEventListener("DOMContentLoaded", function() {
  const swiper = new Swiper(".first-carousel", {
    // Options de configuration du Swiper
    navigation: {
      nextEl: ".suivant",
      prevEl: ".precedent",
    },
    pagination: {
      el: ".carousel-pagination",
      clickable: true,
      renderBullet: function(index) {
        return `<button class="carousel-pagination-button custom-button" data-index="${index}"></button>`;
      },
    },
    autoplay: {
      delay: 3000, // Durée en millisecondes entre chaque diapositive
      disableOnInteraction: false, // Permet de continuer le défilement automatique après une interaction de l'utilisateur
    },
  });
  

  const paginationButtons = document.querySelectorAll(".carousel-pagination-button");
  const prevButton = document.querySelector(".precedent");
  const nextButton = document.querySelector(".suivant");

  paginationButtons.forEach((button, index) => {
    button.addEventListener("click", function() {
      swiper.slideTo(index);
    });
  });

  swiper.on('slideChange', () => {
    const activeIndex = swiper.activeIndex;

    // Masquer ou afficher les flèches de navigation en fonction de l'index actif
    if (activeIndex === 0) {
      prevButton.style.display = "none";
    } else {
      prevButton.style.display = "block";
    }

    if (activeIndex === paginationButtons.length - 1) {
      nextButton.style.display = "none";
    } else {
      nextButton.style.display = "block";
    }

    // Mettre à jour les classes de focus sur les boutons de pagination
    paginationButtons.forEach((button, index) => {
      if (index === activeIndex) {
        button.classList.add("active");
      } else {
        button.classList.remove("active");
      }
    });
  });

  // Masquer le bouton "Précédent" si le premier élément est actif au chargement de la page
  if (swiper.activeIndex === 0) {
    prevButton.style.display = "none";
  }

  // Définir la classe "active" sur le premier bouton
  paginationButtons[0].classList.add("active");
});


var swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  navigation: {
  prevEl: '.button-prev',
  nextEl: '.button-next',
},
autoplay: {
delay: 2000,
},
loop: true,
});