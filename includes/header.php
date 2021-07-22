<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MH My Home</title>
  <!-- Custom styles for this template -->
  <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
  <link rel="stylesheet" href="../style/style.css">
  
  <!-- Custom styles for this template -->
 
</head>


<body>

  <header>
    <nav>
      <div class="header_left">
        <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo muriel Home">
      </div>
      <div class="header_right">
        <button><a href="">Reserver</a></button>
        <div class="burger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </nav>
  </header>

  <div class="container_menu">
    <div class="menu_nav">

    </div>
    <div class="menu_nav_right">

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