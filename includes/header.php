<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MH My Home</title>
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  <link rel="stylesheet" href="../style/style.css">

  <!-- Custom styles for this template -->

</head>


<body>

  <header>
    <nav>
      <div class="header_left">
        <a href="index.php">
        <img src="assets/png/LOGO_02_PNG_NOIR.png" alt="Logo muriel Home">
        </a>
      </div>
      <div class="header_right">
        <button class="bouton_desktop" id="bouton_desktop"><a href="reservation.php">Réserver</a></button>
        <div class="burger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </nav>

    <div class="bouton_responsive" id="bouton_responsive">
      <button class="bouton_phone"><a href="reservation.php">Réserver</a></button>
    </div>

  </header>

  <div class="container_menu">
    <div class="menu_nav">
      <div class="menu_nav_link">
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="/blog.php">Rubriques</a>
          </li>
          <li>
            <a href="products.php">Produits</a>
          </li>
          <li>
            <a href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="menu_nav_right">
    <ul>
          <li>
            <a href="index.php">01</a>
          </li>
          <li>
            <a href="">02</a>
          </li>
          <li>
            <a href="">03</a>
          </li>
          <li>
            <a href="contact.php">04</a>
          </li>
        </ul>
    </div>
  </div>





  <script>
    let navBar = document.querySelector('.menu_nav');
    let navBarRight = document.querySelector('.menu_nav_right');
    let menuBurger = document.querySelector('.burger-menu');
    let headerButton = document.querySelector('.bouton_responsive')
    menuBurger.addEventListener("click", (event) => {
      if (event.currentTarget.classList.contains("open")) {
        event.currentTarget.classList.remove("open");
        navBar.classList.remove("active");
        navBarRight.classList.remove("active_snd");
        headerButton.style.display = ""
        console.log(headerButton)
        document.body.style.overflow = ""
      } else {
        event.currentTarget.classList.add("open");
        navBar.classList.add("active");
        navBarRight.classList.add("active_snd");
        headerButton.style.display = "none"
        document.body.style.overflow = "hidden"
      }
    });
  </script>