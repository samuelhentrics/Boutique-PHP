<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">CDPasCher</a>
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
        <a class="btn btn-outline-primary" href="panier.php">
          Panier
          <i class="fa-solid fa-cart-shopping"></i>
        </a>
      </li>
      
      <?php

      // On récupère nos variables de session

      // Si l'on est connecté
      if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['role'])) {

        // Cas où l'on est administrateur
        if($_SESSION['role']){
          print('
          <li class="nav-item">
            <a class="btn btn-outline-success" href="admin_liste.php">Liste des articles</a>
          </li>');
        }

        // On propose à l'utilisateur de se déconnecter
        print('<li class="nav-item">');
        print('
        <a href="rsc/fonctions/logout.php" class="btn btn-outline-danger" >
          Se déconnecter <i class="fa-solid fa-right-from-bracket"></i>
        </a>');
        print('</li>');
      }

      // Si l'on est pas connecté on propose à l'utilisateur de se connecter
      else {
        print('<li class="nav-item">');
        print("<a href=\"login.php\" class=\"btn btn-outline-success mr-1\" >Se connecter</a>");
        print('</li>');
      }
      ?>
    </ul>
  </div>
</nav>