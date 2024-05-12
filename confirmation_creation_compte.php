<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de création de compte</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Inclure Bootstrap pour les styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="logo.png" alt="Logo" style="height: 40px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="employe.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="creation_compte.php">Créer Compte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestion_compte.php">Gestion comptes</a>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="decon.php" style="color: yellow;">Déconnexion</a>
    </li>
</ul>
</nav>

<div class="container mt-4">
    <h2>Confirmation de création de compte</h2>
    <hr>
    <div class="alert alert-success" role="alert">
        Félicitations, le compte a été créé avec succès !
    </div>
    <p>Client ID: <?php echo isset($_GET['client_id']) ? $_GET['client_id'] : ''; ?></p>
    <p>Compte ID: <?php echo isset($_GET['compte_id']) ? $_GET['compte_id'] : ''; ?></p>
    <p>Numéro de Compte: <?php echo isset($_GET['numero_compte']) ? $_GET['numero_compte'] : ''; ?></p>
    <a href="creation_compte.php" class="btn btn-primary">Créer un autre compte</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
