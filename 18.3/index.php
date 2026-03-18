<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Text Editor</title>
</head>
<body>
<?php
$file = "text.txt";
$message = "";
if (isset($_POST['save'])) {
   $content = $_POST['content'];
   $f = fopen($file, "w");
   fwrite($f, $content);
   fclose($f);
   $message = "Soubor byl uložen.";
}
$content = "";
if (file_exists($file)) {
   $f = fopen($file, "r");
   $content = fread($f, filesize($file));
   fclose($f);
}
if (isset($_POST['delete'])) {
   if (file_exists($file)) {
       unlink($file); 
       $content = "";
       $message = "Soubor byl smazán.";
   }
}
?>
<p><?php echo $message; ?></p>
<form method="post">
<textarea name="content" rows="15" cols="280"><?php echo htmlspecialchars($content); ?></textarea><br><br>
<button type="submit" name="save">Uložit (Create/Update)</button>
<button type="submit" name="delete">Smazat (Delete)</button>
</form>