<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="articles.php">Articles</a>
      </li>
      <li class="nav-item">
      <?php

      // On récupère nos variables de session
      if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
        print("<a href=\"rsc/fonctions/logout.php\" class=\"btn btn-outline-alert my-2 my-sm-0\" >Se déconnecter</a>");
      } else {
        print("<a href=\"login.php\" class=\"btn btn-outline-success my-2 my-sm-0\" >Se connecter</a>");
      }
      ?>
        
      </li>
    </ul>
  </div>
</nav>