<?php

$name = $_POST['nome'];
$email = $_POST['email'];
$phone = $_POST['telefone'];
$password = $_POST['password'];


$servername = 'localhost';
$username = 'root';
$dbname = 'jogo_da_memoria';
$connect = new mysqli("localhost","root",'',"jogo_da_memoria");


if ($connect-> connect_error) {
       die('connection failed :' .$connect-> $connect_error);
}

else {
       $sql = ("INSERT INTO usuario(nome,telefone,email,senha)
       VALUES ('$name','$phone','$email','$password')");
}

$sql = mysqli_query($connect, $sql);


if ($sql == true) {
       echo "Usuário salvo.";
} else {
       echo "Usuário não foi salvo.";
}

?> 
