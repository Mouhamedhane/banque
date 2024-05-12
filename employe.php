
<!DOCTYPE html>
<html>
<head>
    <title>Page Employé</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        body {
 background-image: url("bank.png");
}
td{
    background-color: white;
    color: blue;

}
h2{
    text-align: center;
    color:yellow;
}
h3{
    font-weight: bold;
    color : red ;
}
th{
    color : green ;
    
}
</style>
<body>

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
        <a class="nav-link" href="gestion_compte.php">Gestion des Comptes</a>
      </li>
      <!-- Ajoutez ici d'autres liens de navigation selon vos besoins -->
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="decon.php" style="color: yellow;">Déconnexion</a>
    </li>
</ul>

  </div>
</nav>

<div class="container mt-4">
    <h2>Page Employé</h2>
    <hr>
    <h3>Liste des Comptes Bancaires</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Numéro de Compte</th>
                <th>Solde</th>
                <th>Propriétaire</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Inclure le fichier de connexion à la base de données
            require_once("connexion.php");

            // Requête pour récupérer les comptes bancaires et leurs propriétaires
            $sql = "SELECT cb.numero_compte, cb.solde, cl.prenom, cl.nom 
                    FROM ComptesBancaires cb
                    INNER JOIN Clients cl ON cb.client_id = cl.client_id";
            $result = $connect->query($sql);

            if ($result->rowCount() > 0) {
                // Afficher les données dans le tableau
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["numero_compte"] . "</td>";
                    echo "<td>" . $row["solde"] . "</td>";
                    echo "<td>" . $row["prenom"] . " " . $row["nom"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Aucun compte bancaire trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Inclure Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Empêcher l'utilisateur de revenir en arrière après s'être déconnecté
    if (window.history && window.history.pushState) {
        window.history.pushState('forward', null, './#forward');
        window.addEventListener('popstate', function(event) {
            if (window.location.hash === '#forward') {
                window.history.pushState('forward', null, './#forward');
            }
        });
    }
</script>

</body>
</html>
