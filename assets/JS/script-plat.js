const linkPlat = document.querySelector(".link-plats");
const transfertDonnee = localStorage.categorie;
const input = document.querySelector(".search-input");
const listItem = document.querySelectorAll(".food-card");
const containerPlat = document.querySelector(".container-plat");




// Appelle data 
window.addEventListener("load", appelData);
async function appelData() {
  const response = await fetch("./data.json");
  // console.log(response);
  const data = await response.json();
  // console.log(data);

  let cardFood;

  data.forEach(food => {
    cardFood = document.createElement("div");
    cardFood.classList.add("col-9");
    cardFood.classList.add("col-md-6");
    cardFood.classList.add("col-lg-3");
    cardFood.classList.add("food-card");
    cardFood.setAttribute("data-key", food.categorie + " " + food.name);
    // console.log(cardFood);
    
    cardFood.innerHTML = `
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-2">
                      <img src= ${food.image} class="img-fluid rounded-start" alt="burger charolais">
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <div class="d-flex align-items-baseline justify-content-between align-self-end">
                          <p class="card-text"><small class="text-body-secondary">${food.prix} €</small></p>
                          <div class="btn small border-warning text-dark border-warning text-dark">add <i class="bi bi-plus"></i></div>
                        </div>
                        <h5 class="card-title">${food.name}</h5>
                        <p class="card-text">${food.description}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
    `
    containerPlat.appendChild(cardFood);
  
  })

  createFuse(data, cardFood);
    
};



//Fonction qui nettoie la chaine de caractère
function nettoyerMot(mot) {
    return mot.replace(/[^a-zA-Z ]/g, '').toLowerCase().trim();
}

//Fonction qui filtre les éléments
function FilterElementDisplay(element, attributRecherche, stringRecherche){
  element.getAttribute(attributRecherche).toLowerCase().includes(stringRecherche) ? element.style.display="" : element.style.display="none";
}


// Filtre les éléments en fonction de la valeur entrée dans l input
input.addEventListener("input", filterElementValueFromInput);

function filterElementValueFromInput(){

  appelData()
    
  const mot = this.value;
  let motUtilisateur = nettoyerMot(mot).toLowerCase();

  listItem.forEach(card => {

    FilterElementDisplay(card, "data-key", motUtilisateur)

  });
        
}

// Instanciation de fuse.js et de la bar de sugession.
function createFuse(data, cardFood){
  const fuse = new Fuse(data , {keys : ['name', 'categorie']});
  // console.log(fuse);
  // console.log(data);
  

  const results = fuse.search(input.value)

  const namePlatResults = results.map(result => result.item)
  // console.log(namePlatResults);

  if (input.value) {
    containerPlat.innerHTML="";
  }

  namePlatResults.forEach(namePlat => {
    console.log(namePlat);

    cardFood = document.createElement("div");
    cardFood.classList.add("col-9");
    cardFood.classList.add("col-md-6");
    cardFood.classList.add("col-lg-3");
    cardFood.classList.add("food-card");
    cardFood.setAttribute("data-key", namePlat.categorie.toLocaleLowerCase() + " " + namePlat.name.toLocaleLowerCase());
    // console.log(cardFood);
    
    cardFood.innerHTML = `
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-2">
                      <img src= ${namePlat.image} class="img-fluid rounded-start" alt="burger charolais">
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <div class="d-flex align-items-baseline justify-content-between align-self-end">
                          <p class="card-text"><small class="text-body-secondary">${namePlat.prix} €</small></p>
                          <div class="btn small border-warning text-dark border-warning text-dark">add <i class="bi bi-plus"></i></div>
                        </div>
                        <h5 class="card-title">${namePlat.name}</h5>
                        <p class="card-text">${namePlat.description}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
    `
    containerPlat.appendChild(cardFood);

});


}







// Filtre les éléments en fonction de la valeur du local storage instancier lors du clique effectué sur la page catégorie.

  window.addEventListener("load", filterElementValueFromCategorie);
  console.log(localStorage);

  

  function filterElementValueFromCategorie(){

    // Afficher en fonction de la presence ou non de la key categorie dans ler local storage.
    if (localStorage.getItem("categorie")) {
      listItem.forEach(card => {
    console.log(card);

        

        FilterElementDisplay(card, "data-key", localStorage.getItem("categorie"));
      })
  
    }else {
      listItem.forEach(card => {
        card.style.display="";
      })
    }
    
  
  }



// Clear le local storage au clique du lien plat afin d afficher tous les plats. Sans créer de bug lié au local storage.
linkPlat.addEventListener("click", clearLocalStorage);

function clearLocalStorage() {
  localStorage.removeItem("categorie");

  listItem.forEach(card => {
    card.style.display="";
  });
}



// https://alexandre.alapetite.fr/doc-alex/alx_special.html

