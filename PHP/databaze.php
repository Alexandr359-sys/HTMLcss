<?php
$dsn = "mysql:host=localhost;dbname=uživvatelé";
$username ="alex";
$password ="vel1)5(NAgZDi0j4";

try {
    $db = new PDO(dsn: $dsn, username: $username, password: $password);
    echo "Jsme připojení k db";
}
catch (PDOExpection $e) {
    echo "nelze se připojit k db: ".$e->getMessage();
    exit();
}

$sql = "INSERT INTO people (name, email) VALUES ('John Doe', 'john@example.com')";
$db->query($sql)