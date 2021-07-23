<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MH My Home</title>
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../style/style.css">

  <!-- Custom styles for this template -->

</head>


<body>

  <header>
    <nav>
      <div class="header_left">
        <a href="index.php">
        <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo muriel Home">
        </a>
      </div>
      <div class="header_right">
        <button class="bouton_desktop"><a href="">Reserver</a></button>
        <div class="burger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </nav>

    <div class="bouton_responsive">
      <button class="bouton_phone"><a href="">Reserver</a></button>
    </div>

  </header>

  <div class="container_menu">
    <div class="menu_nav">
      <div class="menu_nav_link">
        <ul>
          <li>
            <a href="">Home</a>
          </li>
          <li>
            <a href="">Rubriques</a>
          </li>
          <li>
            <a href="">Produits</a>
          </li>
          <li>
            <a href="">Contact</a>
          </li>
          <li>
            <a href="">A propos</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="menu_nav_right">
    <ul>
          <li>
            <a href="">01</a>
          </li>
          <li>
            <a href="">02</a>
          </li>
          <li>
            <a href="">03</a>
          </li>
          <li>
            <a href="">04</a>
          </li>
          <li>
            <a href="">05</a>
          </li>
        </ul>
    </div>
  </div>





  <script>
    let navBar = document.querySelector('.menu_nav');
    let navBarRight = document.querySelector('.menu_nav_right');
    let menuBurger = document.querySelector('.burger-menu');
    let headerButton = document.querySelector('.header_right button')
    menuBurger.addEventListener("click", (event) => {
      if (event.currentTarget.classList.contains("open")) {
        event.currentTarget.classList.remove("open");
        navBar.classList.remove("active");
        navBarRight.classList.remove("active_snd");
        // headerButton.style.display = ""
        document.body.style.overflow = ""
      } else {
        event.currentTarget.classList.add("open");
        navBar.classList.add("active");
        navBarRight.classList.add("active_snd");
        //headerButton.style.display = "none"
        document.body.style.overflow = "hidden"
      }
    });
  </script>