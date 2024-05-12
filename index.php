<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $login = $_POST['username'];
        $passwd = $_POST['password'];

        try {
            $sql_client = "SELECT * FROM Clients WHERE email = ? AND mot_de_pass = ?";
            $query_client = $connect->prepare($sql_client);
            $query_client->execute([$login, $passwd]);

            $sql_employee = "SELECT * FROM Employes WHERE email = ? AND mot_de_passe = ?";
            $query_employee = $connect->prepare($sql_employee);
            $query_employee->execute([$login, $passwd]);

            if ($query_client->rowCount() === 1 || $query_employee->rowCount() === 1) {
                $user = ($query_client->rowCount() === 1) ? $query_client->fetch(PDO::FETCH_ASSOC) : $query_employee->fetch(PDO::FETCH_ASSOC);

                if ($user['role'] == 'employe') {
                    header("Location: ./employe.php");
                    exit();
                } else {
                    header("Location: ./clients.php");
                    exit();
                }
            } else {
                echo "Erreur de connexion";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .login-box {
        width: 300px;
        height: 400px;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .login-box h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-box label {
        display: block;
        margin-bottom: 5px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .login-box input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .login-box input[type="submit"]:hover {
        background-color: #45a049;
    }
    body {
 background-image: url("bk1.jpeg");
 background-color: #cccccc;
}
</style>
<body>
    <div class="login-box">
        <h1>Se connecter</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Employe login:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
