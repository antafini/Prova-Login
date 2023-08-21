<?php
session_start(); // Avvia la sessione

// Array associativo con coppie nome utente => password
$validCredentials = array(
    "Sopatani" => "6aprile94",
    "utente2" => "password2",
    "utente3" => "password3"
);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (array_key_exists($username, $validCredentials) && $validCredentials[$username] === $password) {

        $_SESSION["username"] = $username;
        header("Location: Login_Success.html");
        exit();
    } else {

        $error_message = "Credenziali non valide. Riprova.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login Page</title>

</head>
<body>
    <div class="container">
        <form action="" method="post">
            <img src="logo.png" alt="Logo" class="logo">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <?php if (isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
        <a href="register.html" class="register-link">Registrati</a>
    </div>
</body>
</html>
