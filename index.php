<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=pizza planet", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare("SELECT gebruikersnaam, wachtwoord FROM users");
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $row){
    echo '<h1>'. $row["gebruikersnaam"] .'</h1>';
    echo '<h1>'. $row["wachtwoord"] .'</h1>';
}
?>

<html>
<head>

</head>
<body>
<form action="register.php" method="POST">
    <input type="text" name="gebruikersnaam" placeholder="">
    <input type="password" name="wachtwoord" placeholder="">
    <input type="submit" value="registreer">
</form>
</body>
</html>
