window.onload = function(){

    //gestion du panier number

var badgeElement = document.getElementById('panier-badge');
var valeurSpan = badgeElement.innerText;

nombreArticles = valeurSpan;
    // Ajouter une classe 'two-digits' si le nombre est à deux chiffres
    if (nombreArticles >= 10 && nombreArticles <= 99) {
        badgeElement.classList.add('two-digits'); // Utilisation de classList.add()
    } else {
        badgeElement.classList.remove('two-digits'); // Utilisation de classList.remove()
    }
    
    // Ajouter une classe 'three-digits' si le nombre est à trois chiffres
    if (nombreArticles >= 100 && nombreArticles <= 999) {
        badgeElement.classList.add('three-digits'); // Utilisation de classList.add()
    } else {
        badgeElement.classList.remove('three-digits'); // Utilisation de classList.remove()
    }

}

function copyCurrentUrl() {
    const currentUrl = window.location.href;
    navigator.clipboard.writeText(currentUrl)
      .then(() => {
        alert('Le lien a été copié dans le presse-papiers.');
      })
      .catch((error) => {
        console.error('Erreur lors de la copie du lien :', error);
      });
  }

function changeImage(element, newImage) {
    element.src = newImage;
  }