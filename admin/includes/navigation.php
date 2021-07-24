
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <div class="logo_name">MH My Home</div>
      </div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav_list">
      <li>
        <a href="reservations.php">
          <i class='bx bx-home-heart'></i>
          <span class="links_name">Reservations</span>
        </a>
        <span class="tooltip">Reservations</span>
      </li>
      <li>
        <a href="rooms.php">
          <i class='bx bx-home'></i>
          <span class="links_name">Maison</span>
        </a>
        <span class="tooltip">Maison</span>
      </li>
      <li>
        <a href="">
        <i class='bx bx-news' ></i>
          <span class="links_name">Rubriques</span>
        </a>
        <span class="tooltip">Rubriques</span>
      </li>
      <li>
        <a href="">
          <i class='bx bx-shopping-bag'></i>
          <span class="links_name">Articles</span>
        </a>
        <span class="tooltip">Articles</span>
      </li>
      <li>
        <a href="">
          <i class='bx bx-basket'></i>
          <span class="links_name">Articles vendus</span>
        </a>
        <span class="tooltip">Articles vendus</span>
      </li>
      <li>
        <a href="">
          <i class='bx bx-comment'></i>
          <span class="links_name">Commentaires</span>
        </a>
        <span class="tooltip">Commentaires</span>
      </li>
      <li>
        <a href="users.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Utilisateurs</span>
        </a>
        <span class="tooltip">Utilisateurs</span>
      </li>
      <li>
        <a href="">
        <i class='bx bx-map' ></i>
          <span class="links_name">Visite site</span>
        </a>
        <span class="tooltip">visite site</span>
      </li>
    </ul>
    <?php if (permission()) : ?>
      <div class="profile_content">
        <div class="profile">
          <div class="profile_details">
            <img src="https://www.w3schools.com/images/lamp.jpg" alt="" srcset="">
            <div class="name_job">
              <div class="name">Muriel Coutellier</div>
              <div class="job">Admin & Editeur</div>
            </div>
            <a href="logout.php">
              <i class='bx bx-log-out' id="log_out"></i>
            </a>
          </div>
        </div>
      </div>
    <?php endif ?>
  </div>

  <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector("bx-search");

    btn.onclick = function() {
      sidebar.classList.toggle('active')
    }

    searchBtn.onclick = function() {
      sidebar.classList.toggle('active')
    }
  </script>
</body>

</html>