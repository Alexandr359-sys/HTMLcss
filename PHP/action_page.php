<?php
if( !isset($_POST["uname"])) echo "";
elseif(isset($_POST["uname"]) && $_POST["uname"] == "admin" && isset($_POST["psw"]) && $_POST["psw"] == "Heslo12345");
{
    session_start();
    $_SESSION["psw"] = $_POST["psw"];
    $_SESSION["uname"] = $_POST["uname"];

}
else echo "Heslo nebo login se neshodují";

if (isset($_SESSION["uname"]))
{
    $pass = $_POST["psw"];
    $user = $_POST["uname"];

    echo "Uživatel $user a heslo $pass";
}
?>