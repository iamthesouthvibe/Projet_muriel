<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MH My Home</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/w3.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="css/full-width-pics.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../style/style.css">

</head>


<body>
  <div class="header">
    <header>
      <nav>
        <div class="header_left">
          <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo muriel Home">
        </div>
        <div class="header_right">
          <button>Réserver</button>
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
        headerButton.style.display = ""
      } else {
        event.currentTarget.classList.add("open");
        navBar.classList.add("active");
        navBarRight.classList.add("active_snd");
        headerButton.style.display = "none"
      }
    });
  </script>