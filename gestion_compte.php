<!DOCTYPE html>
<html>
<head>
    <title>Page Employé</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
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
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="decon.php" style="color: yellow;">Déconnexion</a>
    </li>
</ul>
  </div>
</nav>
 
<h1>Gestion des Comptes Bancaires</h1>
    <table>
        <thead>
            <tr>
                <th>Numéro de Compte</th>
                <th>Solde</th>
                <th>Propriétaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("connexion.php");

            $sql = "SELECT cb.compte_id, cb.numero_compte, cb.solde, cl.prenom, cl.nom 
            FROM ComptesBancaires cb
            INNER JOIN Clients cl ON cb.client_id = cl.client_id";    
            $result = $connect->query($sql);

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row["numero_compte"] . "</td>";
                    echo "<td>" . $row["solde"] . "</td>";
                    echo "<td>" . $row["prenom"] . " " . $row["nom"] . "</td>";
                    echo "<td>";
                    echo "<button onclick=\"deposer(" . $row["compte_id"] . ")\">Déposer</button>";
                    echo "<button onclick=\"retirer(" . $row["compte_id"] . ")\">Retirer</button>";
                    echo "<button onclick=\"virement(" . $row["compte_id"] . ")\">Virement</button>";
                    echo "<button onclick=\"releve(" . $row["compte_id"] . ")\">Relevé</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Aucun compte bancaire trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function deposer(idCompte) {
            window.location.href = "deposer.php?id=" + idCompte;
        }

        function retirer(idCompte) {
            window.location.href = "retirer.php?id=" + idCompte;
        }

        function virement(idCompte) {
            window.location.href = "virement.php?id=" + idCompte;
        }

        function releve(idCompte) {
            window.location.href = "releve.php?id=" + idCompte;
        }
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
