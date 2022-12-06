<?php

session_start();
$name = $_POST['nome'];
$email = $_POST['email'];
$phone = $_POST['phnumber'];
$password = $_POST['psw'];


$servername = 'localhost';
$username = 'root';
$dbname = 'jogo_da_memoria';
$connect = new mysqli("localhost","root",'',"jogo_da_memoria");


if ($connect-> connect_error) {
       die('connection failed :' .$connect-> $connect_error);
}

else {
       $sql = ("UPDATE usuario
       SET nome = $name, telefone = $phone, email = $email, senha = $password
       WHERE login = $_SESSION['sess_user']");
}

$sql = mysqli_query($connect, $sql);


if ($sql == true) {
       header("Location: index.html"); 
} else {
       echo "Usuário não foi salvo.";
}

?> 
