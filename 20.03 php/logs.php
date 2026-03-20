<?php
session_start();
// kontrola přihlášení
if (!isset($_SESSION['logged_in'])) {
   header("Location: index.php");
   exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Logy</title>
</head>
<body>
<h2>Logy</h2>
<?php
$log_file = "logs.txt";
if (file_exists($log_file)) {
   $logs = file_get_contents($log_file);
   echo "<pre>" . htmlspecialchars($logs) . "</pre>";
} else {
   echo "Žádné logy nebyly nalezeny.";
}
?>
<br>
<a href="logout.php">Odhlásit se</a>
</body>
</html>