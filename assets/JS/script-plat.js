
const input = document.querySelector(".search-input");
const listItem = document.querySelectorAll(".food-card");



//nettoie la chaine
function nettoyerMot(mot) {
    return mot.replace(/[^a-zA-Z][ ]/g, '').toLowerCase();
  }
  

// filtre
input.addEventListener("input", filterItems);

function filterItems(){
    const mot = this.value;
    let motUtilisateur = nettoyerMot(mot).toLowerCase();

    listItem.forEach(card => {
      
      let attribut = card.getAttribute("data-key").toLocaleLowerCase();
              
      let found = attribut.includes(motUtilisateur) ? card.style.display="" : card.style.display="none";

    });

    
}

// encore la gestion des erreur de saisie de l utilisateur => trouver une bibliotheque facile à implémenter ?


