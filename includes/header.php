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