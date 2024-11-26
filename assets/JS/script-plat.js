const input = document.querySelector(".search-input");
const listItem = document.querySelectorAll(".food-card");
const containerPlat = document.querySelector(".container-plat");


// fonction creation des cards
function createContentCard(donnee, cardFood, container){
  donnee.forEach(food => {
    cardFood = document.createElement("div");
    cardFood.classList.add("col-9");
    cardFood.classList.add("col-md-6");
    cardFood.classList.add("col-lg-3");
    cardFood.classList.add("food-card");
    cardFood.setAttribute("data-key", food.categorie + " " + food.name);
    
    cardFood.innerHTML = `
                <div class="card mb-3" style="max-width: 540px; min-width: 198px;">
                  <div class="row g-0">
                    <div class="col-md-2">
                      <img src= ${food.image} class="img-fluid rounded-start" alt=${food.name}>
                    </div>
                    <div class="col-md-10">
                      <div class="card-body">
                        <div class="d-flex align-items-baseline justify-content-between align-self-end">
                          <p class="card-text"><small class="text-body-secondary">${food.prix} €</small></p>
                          <div class="btn small border-warning text-dark border-warning text-dark" id="${food.id}">add <i class="bi bi-plus"></i></div>
                        </div>
                        <h5 class="card-title">${food.name}</h5>
                        <p class="card-text">${food.description}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
    `
    container.appendChild(cardFood);
  })

}


// Appelle data 

window.addEventListener("load", appelData);
input.addEventListener("input", appelData);

async function appelData() {
  const response = await fetch("./data.json");
  const data = await response.json();
  

  let cardFood;

  // creation des cards
  createContentCard(data, cardFood, containerPlat);
  createFuse(data, cardFood);
    
};



// Instanciation de fuse.js

function createFuse(data, cardFood){
  // instensation de l objet fuse.js
  const fuse = new Fuse(data , {keys : ['name', 'categorie']});
  

  // Filtre basé sur la valeur du local storage provenant de la page catégorie
  if (localStorage.getItem("categorie")) {
    
    // Renvoie un array Filtre basé sur la valeur du local storage
    const localResult = fuse.search(localStorage.getItem("categorie"));

    // l array contenent nos objets item
    const matchLocal = localResult.map(result => result.item)
    // console.log(matchLocal);

    // nettoie les cards précedentes pour n afficher que celle qui match
    containerPlat.innerHTML="";
  
    // création des cards
    createContentCard(matchLocal, cardFood, containerPlat);

    //nettoie le localStorage
    localStorage.removeItem("categorie");
    return;
  }


  // Renvoie un array Filtre basé sur la valeur entrée dans l' input
  const results = fuse.search(input.value)
  
  // l array contenent nos objets item
  const namePlatResults = results.map(result => result.item)

  // Nettoie les cards precedent pour n afficher que celle qui match
  if (input.value) {
    containerPlat.innerHTML="";    
  }

  // permet de remettre toutes les cards quans l input est vide.
  if (input.value < 1) {
    containerPlat.innerHTML="";
  // creation des cards
  createContentCard(data, cardFood, containerPlat);    
  }


  // création des cards
  createContentCard(namePlatResults, cardFood, containerPlat);


}



