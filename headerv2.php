<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categorie</title>
  <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- ICON BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- FONT UPDOCK-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
  <!-- FONT POPPINS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="./assets/css/categorie.css">

</head>

<body class="bg-dark">
  <!-- NAV HEADER -->
  <header>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-dark p-1 justify-content-center">
      <div class="container-fluid d-flex justify-content-center gap-4">
        <button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <i class="btn-burger bi bi-three-dots-vertical"></i>
        </button>
        <a href="/accueil.html" class="me-auto"><img src="assets/img/logo_transparent.png" class="logo"
            alt="logo le district"></a>

        <a href="/panier.html" class="d-md-flex order-md-5"><i class="bi bi-cart panier"></i></a>
        <a href="/user-account.html" class="d-md-flex order-md-5"><i class="bi bi-person-circle account"></i></a>

        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <label id="offcanvasNavbarLabel">Burger</label>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-flex justify-content-center">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-uppercase" aria-current="page" href="/accueil.html">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="/categorie.html">catégorie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="/plats.html">plats</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="/contact.html">contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- BANNIERE -->
    <div class="container-items position-relative d-flex justify-content-center align-items-center">
      <img src="assets/img/bg3.jpeg" class="card-img position-relative"
        alt="jeune femme dégustant son repas au restaurant le district">
      <div class="text-banniere position-absolute">
        <h5 class="card-title text-white text-center">Catégorie</h5>
      </div>
    </div>

    <div class="container-filter">
    </div>


    <!-- QUALITE RESTAURANT -->
    <div class="container-fluid container-district">
      <div class="row d-flex justify-content-center text-center text-white p-3">
        <div class="col-4">
          <img src="assets/svgs/fish.svg" alt="" class="label-food mb-3">
          <span class="title d-block">Premium Quality</span>
        </div>
        <div class="col-4">
          <img src="assets/svgs/vegetables.svg" alt="" class="label-food mb-3">
          <span class="title d-block">Seasonal Vegetables</span>
        </div>
        <div class="col-4">
          <img src="assets/svgs/fruit.svg" alt="" class="label-food mb-3">
          <span class="title d-block">Fresh Fruit</span>
        </div>

      </div>
    </div>

  </header>



  <main>
