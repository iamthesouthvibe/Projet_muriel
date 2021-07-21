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
  <link href="css/full-width-pics.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../style/style.css">
</head>

<style>
  body {
    margin: 15px 15px;
    padding: 0;
    background-color: #FCF7EC;;
  }


  nav {
    display: flex;
    justify-content: space-between;
  }


  .header_left img {
    width: 90px;
  height: 39px;
  }

  .header_right {
    display: flex;
  }


  .header_right button {
    width: 140px;
    height: 36px;
    background: #9A4747;
    border-radius: 40px;
  }

  .burger-menu {
    width: 37px;
    height: 17px;
    position: relative;
    cursor: pointer;
    transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transition: 0.5s cubic-bezier(0.43, 0.58, 0.47, 0.62);
    -moz-transition: 0.5s cubic-bezier(0.43, 0.58, 0.47, 0.62);
    -o-transition: 0.5s cubic-bezier(0.43, 0.58, 0.47, 0.62);
    -webkit-transition: 0.5s cubic-bezier(0.43, 0.58, 0.47, 0.62);
  }

  .burger-menu span {
    background: black;
    display: block;
    position: absolute;
    height: 3px;
    width: 50px;
    opacity: 1;
    left: 0;
    transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transition: 0.25s cubic-bezier(0.43, 0.58, 0.47, 0.62);
    -moz-transition: 0.25s cubic-bezier(0.43, 0.58, 0.47, 0.62);
    -o-transition: 0.25s cubic-bezier(0.43, 0.58, 0.47, 0.62);
    -webkit-transition: 0.25s cubic-bezier(0.43, 0.58, 0.47, 0.62);
  }

  .burger-menu span:nth-child(1) {
    top: 0px;
  }

  .burger-menu span:nth-child(2) {
    top: 14px;
    width: 50%;
    float: right;
  }

  .burger-menu span:nth-child(3) {
    top: 28px;
  }

  .burger-menu.open span:nth-child(1) {
    top: 14px;
    transform: rotate(135deg);
    -moz-transform: rotate(135deg);
    -o-transform: rotate(135deg);
    -webkit-transform: rotate(135deg);
  }

  .burger-menu.open span:nth-child(2) {
    opacity: 0;
    left: 30px;
  }

  .burger-menu.open span:nth-child(3) {
    top: 14px;
    transform: rotate(-135deg);
    -moz-transform: rotate(-135deg);
    -o-transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg);
  }
</style>

<body>
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


  <script>
    document.querySelector('.burger-menu').addEventListener("click", (event) => {
      if (event.currentTarget.classList.contains("open")) {
        event.currentTarget.classList.remove("open");
      } else {
        event.currentTarget.classList.add("open");
      }
    });
  </script>