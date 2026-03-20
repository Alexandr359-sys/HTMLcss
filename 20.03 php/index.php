<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Přihlášení</title>
</head>
<body>
<h2>Přihlášení</h2>
<form method="post" action="login.php">
<label>Email:</label><br>
<input type="text" name="email" required><br><br>
<label>Heslo:</label><br>
<input type="password" name="password" required><br><br>
<input type="submit" value="Přihlásit">
</form>
<?php

    session_start();

    if (isset($_GET['error'])) {
    echo "<p style='color:red;'>Špatné přihlašovací údaje</p>";
}
?>
</body>
</html>