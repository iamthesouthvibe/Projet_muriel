<!--
<style>
     .navbar {
      margin-bottom: 0;
      border-radius: 0;
      border: none;
    }
</style>
<body>
     <div id="headerWrapper">
    class="navbar navbar-inverse w3-purple"

  </div> 
<nav class="w3-sidenav w3-collapse w3-purple w3-card-2 w3-animate-left" style="width:200px;">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-closenav w3-large w3-hide-large">Close ×</a>
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand active w3-text-white">H&T - Admin</a>
        </div>

        <ul class="nav navbar-nav collapse navbar-collapse" id="Navigation">
          	<a href="#" onclick="w3_close()" class="w3-closenav w3-hide-large">Close x</a>
            <li><a class="w3-text-white" href="reservations.php" >Reservations</a></li>
            <li><a class="w3-text-white" href="rooms.php" >Rooms</a></li>
            <li><a class="w3-text-white" href="tours.php" >Blog</a></li>
            <li><a class="w3-text-white" href="comments.php" >Comments</a></li>
             <li><a class="w3-text-white" href="videos.php">Videos</a></li> -->
<?php // if(permission()): 
?>
<!-- <li> <a class="w3-text-white" href="users.php" class=" w3-hover-red"><span class="glyphicon glyphicon-user"></span> Users</a> </li>
            <?php // endif; 
            ?>
            <li><a class="w3-text-white" href="../index.php"  class="w3-text-white w3-hover-red"><span class="glyphicon glyphicon-map-marker"></span> Visit Site</a></li>
            <li><a class="w3-text-white" href="logout.php">Logout</a></li>
            <li>  <a class="w3-text-white" href="#" data-toggle="dropdown" class="w3-text-white w3-hover-red"><?php // echo $user_info['first'].' '.$user_info['last']; 
                                                                                                              ?></a></li>
        </ul>

        <ul class="nav navbar-nav">


            <li class="dropdown">

                  <ul class="dropdown-menu w3-purple" role="menu">

                    <li><a class="w3-text-white" href="#">Change password</a></li>
                  </ul>
            </li>

        </ul>
    </div>
</nav>
            -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.0.8/css/boxicons.min.css' rel='stylesheet'>
  <title>Nav bar</title>
</head>


<style>
  body {
    position: relative;
    min-height: 100vh;
    width: 100%;
  }

  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 78px;
    background: #9A4747;
    padding: 15px 10px;
    transition: all 0.5s ease;
  }

  .sidebar.active {
    width: 240px;
  }

  .sidebar .logo_content .logo {
    color: #FCF7EC;
    display: flex;
    height: 50px;
    width: 100%;
    align-items: center;
    opacity: 0;
    pointer-events: none;
  }

  .sidebar.active .logo_content .logo {
    opacity: 1;
    pointer-events: none;
  }

  .logo_content .logo i {
    font-size: 28px;
    margin-right: 5px;
  }

  .logo_content .logo .logo_name {
    font-size: 20px;
  }

  .sidebar #btn {
    position: absolute;
    color: #FCF7EC;
    left: 50%;
    top: 15px;
    font-size: 45px;
    height: 50px;
    width: 50px;
    text-align: center;
    line-height: 50px;
    transform: translateX(-50%);
  }

  .sidebar.active #btn {
    left: 90%;
  }

  .sidebar ul {
    margin-top: 20px;
  }

  .nav_list {
    padding: 0;
  }

  .sidebar ul li {
    position: relative;
    height: 50px;
    width: 100%;
    padding: 0;
    list-style: none;
    line-height: 50px;
    margin-bottom: 25px;
    border: solid 2px #FCF7EC;
    border-radius: 6px;
  }

  .sidebar ul li .tooltip {
    position: absolute;
    left: 122px;
    top: 0;
    transform: translate(-50%, -50%);
    border-radius: 6px;
    height: 35px;
    width: 122px;
    background: gray;
    line-height: 35px;
    text-align: center;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    transition: 0s;
    opacity: 0;
    pointer-events: none;
    display: block;
  }

  .sidebar.active ul li .tooltip {
    display: none;
  }

  .sidebar ul li:hover .tooltip {
    transition: all 0.5s ease;
    opacity: 1;
    top: 50%;
  }


  .sidebar ul li input {
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    border-radius: 6px;
    outline: none;
    border: none;
    background: #FCF7EC;
    padding-left: 50px;
    font-size: 18px;
    color: #9A4747;
  }

  .sidebar ul li .bx-search {
    position: absolute;
    z-index: 99;
    color: #000;
    font-size: 22px;
    transition: all 0.5s ease;
  }

  .sidebar ul li .bx-search:hover {
    background: #9A4747;
    color: #FCF7EC;
  }

  .sidebar ul li a {
    color: #FCF7EC;
    display: flex;
    align-items: center;
    text-decoration: none;
    border-radius: 6px;
    white-space: nowrap;
  }

  .sidebar ul li a:hover {
    color: #9A4747;
    background: #FCF7EC;
  }

  .sidebar ul li i {
    height: 50px;
    min-width: 50px;
    border-radius: 6px;
    line-height: 50px;
    text-align: center;
    font-size: 25px;
  }

  .sidebar .links_name {
    pointer-events: none;
    opacity: 0;
  }

  .sidebar.active .links_name {
    pointer-events: auto;
    opacity: 1;
  }

  .sidebar .profile_content {
    position: absolute;
    color: #FCF7EC;
    bottom: 0;
    left: 0;
    width: 100%;
  }

  .sidebar .profile_content .profile {
    position: relative;
    padding: 15px 10px;
    height: 60px;
  }

  .profile_content .profile .profile_details {
    display: flex;
    line-height: 20px;
    align-items: center;
    opacity: 0;
    pointer-events: none;
    white-space: nowrap;
  }

  .sidebar.active .profile .profile_details {
    opacity: 1;
    pointer-events: auto;
  }

  .profile .profile_details img {
    height: 45px;
    width: 45px;
    object-fit: cover;
    border-radius: 6px;
  }

  .profile .profile_details .name_job {
    margin-left: 10px;
  }

  .profile .profile_details .name {
    font-size: 15px;
    font-weight: 400;
  }

  .profile .profile_details .job {
    font-size: 12px;
  }


  .profile #log_out {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 50px;
    line-height: 50px;
    font-size: 20px;
    border-radius: 6px;
    text-align: center;
  }

  .sidebar.active .profile #log_out {
    left: 88%;
  }
</style>

<body>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAB60lEQVRYR+2V4TEEQRCF30WACJCBDBABIkAEiAARIAJE4ESACBABIkAE1HfVfdU7Nbuzd0vV/ZiuUjduel6/fv1mbqQFi9GC8VElVJpIVagqVFKgtF899N8KrUlatSJPpWJ99oeO7FHSphUaijWBGQryJWlJ0qukjT4KlHLaCAFOoTTiWBjXmyWg1JmtPyS9h4Nbkn4yWDRBQ41oI5QD8IMUPpe0K+mupWMI7Rmxzw5VbiSdRGI5QnT0UJD2UBIKnXbk3Uu67IF1K+nAcXKE2Ly2BNgDShxLurA1xYgd+1yxLpcluSKMl1E6aVT1sUZ1GRvnJ5EjBIEj2982UP6NylHMrzyeYU3gvWdb0zkEnXTEIiXaYsojR6jtKkeFrgJp1KJjIlWXM/5OuYrkRYUaNzRHyJnHRNTBwHRM4CEfaxxFVBdTu+lTFTnrzwRYmDs7sii556Sf+IpwP1F4bN9FdRlR6XI0DJ3zUNdVpktMSTf87RuJ9fDu+ENJLjltt/DbLoubfNp0OjISHAQlXiyTQr528/r4UMWD0RLkg+WG7sJqTCAlFCWPJmwbX9f3PI45Q3dipYSi5H6V5yET36No6CJWSihKHkdUBMokzIU19Nd+HqIzjezPC8wKWBUqKVYVqgqVFCjtVw+VFPoFtupmJbBJr4UAAAAASUVORK5CYII=" />
        <div class="logo_name">MH My Home</div>
      </div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav_list">
      <li>
        <a href="">
          <i class='bx bx-home-heart'></i>
          <span class="links_name">Reservations</span>
        </a>
        <span class="tooltip">Reservations</span>
      </li>
      <li>
        <a href="">
          <i class='bx bx-home'></i>
          <span class="links_name">Maison</span>
        </a>
        <span class="tooltip">Maison</span>
      </li>
      <li>
        <a href="">
          <i class='bx bxl-blogger'></i>
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
        <a href="">
          <i class='bx bx-user'></i>
          <span class="links_name">Utilisateurs</span>
        </a>
        <span class="tooltip">Utilisateurs</span>
      </li>
    </ul>
    <?php  if(permission()): ?>
    <div class="profile_content">
      <div class="profile">
        <div class="profile_details">
          <img src="https://www.w3schools.com/images/lamp.jpg" alt="" srcset="">
          <div class="name_job">
            <div class="name">Muriel Coutellier</div>
            <div class="job">Admin & Editeur</div>
          </div>
          <a href="">
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