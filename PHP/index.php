<?php
if( !isset($_POST["uname"]))
elseif(isset($_POST["uname"]) && $_POST["uname"] == "admin" && isset($_POST["psw"]) && $_POST["psw"] == "Heslo12345");
{
    session_start();
    $_SESSION["psw"] = $_POST["psw"];
    $_SESSION["uname"] = $_POST["uname"];

}
else echo "Heslo nebo login se neshodují <br>";

if (isset($_SESSION["uname"]))
{
    $pass = $_SESSION["psw"];
    $pass = $_SESSION["uname"];

    echo "uzivatel $user a helo $pass";
    echo "
        <form action
    ";
}
?>