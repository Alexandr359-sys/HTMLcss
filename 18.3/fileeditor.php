<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$dir = "files";
if (!isset($_GET["file"])) {
   die("Soubor nebyl vybrán.");
}
$file = basename($_GET["file"]);
$path = $dir . "/" . $file;
// uložení změn (UPDATE)
if (isset($_POST["save"])) {
   $handle = fopen($path, "w");
   fwrite($handle, $_POST["content"]);
   fclose($handle);
}
// načtení obsahu (READ)
$content = "";
if (file_exists($path)) {
   $handle = fopen($path, "r");
   $content = fread($handle, filesize($path));
   fclose($handle);
}
?>
</body>
</html>