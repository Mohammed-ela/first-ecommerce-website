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
        //pour partager un element , on copie le lien du produit spécifique 
function copyCurrentUrl() {
        //on enregistre le lien du href dans une constante
    const currentUrl = window.location.href;
        // on ajoute le href dans le clipboard grace a navigator.clipboard
    navigator.clipboard.writeText(currentUrl)
      .then(() => {
        // si ça fonctionne 
        alert('Le lien a été copié dans le presse-papiers.');
      })
        // si ça fonctionne pas 
      .catch((error) => {
        console.error('Erreur lors de la copie du lien :', error);
      });
  }
