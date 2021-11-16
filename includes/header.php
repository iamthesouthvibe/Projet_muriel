  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>


  <body>
    <header data-aos="fade" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">
      <nav>
        <div class="header_left">
          <a class="waitBeforeNavigate" href="index.php">
            <img src="assets/png/LOGO_03_PNG_NOIR.png" alt="Logo muriel Home">
          </a>
        </div>
        <div class="header_right">
          <button class="bouton_desktop" id="bouton_desktop"><a href="reservation.php" class="waitBeforeNavigate">Réserver</a></button>
          <div class="burger-menu">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </nav>

      <div class="bouton_responsive" id="bouton_responsive">
        <button class="bouton_phone"><a class="waitBeforeNavigate" href="reservation.php">Réserver</a></button>
      </div>

    </header>

    <div class="container_menu">
      <div class="menu_nav">
        <div class="menu_nav_link">
          <div class="flex-box-menu">
            <div>
              <ul>
                <li>
                  <a class="waitBeforeNavigate" href="index.php">Accueil</a>
                </li>
                <li>
                  <a class="waitBeforeNavigate" href="blog.php">Blog</a>
                </li>
                <!--
              <li>
                <a class="waitBeforeNavigate"  href="products.php">Produits</a>
              </li>
              -->
                <li>
                  <a class="waitBeforeNavigate" href="contact.php">Contact</a>
                </li>
                <div class="header-link-none">
                  <li>
                    <p class="waitBeforeNavigate header-titre-maison">Maisons</p>
                  </li>
                  <div class="sous-menu-header">
                    <li>
                      <a class="waitBeforeNavigate sous-menu-header sous-liens" href="maison.php?room=23">Martinique →</a>
                    </li>

                    <li>
                      <a class="waitBeforeNavigate sous-liens" href="maison.php?room=25">Narbonne →</a>
                    </li>
                    <li>
                      <a class="waitBeforeNavigate sous-liens" href="maison.php?room=24">Gruissan →</a>
                    </li>
                    <li>
                      <a class="waitBeforeNavigate sous-liens" href="maison.php?room=26">Pyrénnées →</a>
                    </li>

                  </div>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="menu_nav_right">
        <div>
          <ul>
            <li>
              <p class="waitBeforeNavigate">Maisons</p>
            </li>
            <div class="sous-menu-header">
              <li>
                <a class="waitBeforeNavigate sous-menu-header" href="maison.php?room=23">Martinique →</a>
              </li>
              <li>
                <a class="waitBeforeNavigate" href="maison.php?room=25">Narbonne →</a>
              </li>
              <li>
                <a class="waitBeforeNavigate" href="maison.php?room=24">Gruissan →</a>
              </li>
              <li>
                <a class="waitBeforeNavigate" href="maison.php?room=26">Pyrénnées →</a>
              </li>
            </div>
            <div class="invisibility-bloc">
              <li>
                <a class="waitBeforeNavigate" href="index.php"></a>
              </li>
              <li>
                <a class="waitBeforeNavigate" href="index.php"></a>
              </li>
            </div>
          </ul>
        </div>
      </div>
    </div>

  </body>

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

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


  <script>
    AOS.init();

    function waitBeforeNavigate(ev) {
      ev.preventDefault(); // prevent default anchor behavior
      const goTo = this.getAttribute("href"); // store anchor href

      setTimeout(function() {
        window.location = goTo;
      }, 1000); // time in ms

      document.body.style.opacity = "0"
    };

    document.querySelectorAll(".waitBeforeNavigate")
      .forEach(EL => EL.addEventListener("click", waitBeforeNavigate));
  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1VJYHWLT9X"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-1VJYHWLT9X');
  </script>