<?php
$user = 'root';
$password = 'root';
$db = 'formulaire-contact';
$host = 'localhost';
$port = 3306;

$link = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,  
   $port
);

$surname = $_POST['surname'];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


if (!$link) {
   die('La connexion a échoué : ' . mysqli_connect_error());
} else {
    echo('Connecxion réussie');
}

if(isset($_POST['submit'])){
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $message = $_POST['message'];

    

    $sql = "INSERT INTO `utilisateurs`(`surname`, `name`, `email`, `message`)
    VALUES(?, ?, ?, ?, ?)";
    $stmt = $link->prepare($sql);

    $stmt->bind_param('sssss', $surname, $name, $email, $message);
    $stmt->execute();
}


?>
