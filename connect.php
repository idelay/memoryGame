<?php

$name = $_POST['nome'];
$datnasc = $_POST['date'];
$email = $_POST['email'];
$cpf = $_POST['cpfform'];
$phone = $_POST['telefone'];
$login = $_POST['username'];
$password = $_POST['password'];


$servername = 'localhost';
$username = 'root';
$dbname = 'jogo_da_memoria';
$connect = new mysqli("localhost","root",'',"jogo_da_memoria");


if ($connect-> connect_error) {
       die('connection failed :' .$connect-> $connect_error);
}

else {
       $sql = ("INSERT INTO usuario(nome,data_nasc,cpf,telefone,email,login,senha)
       VALUES ('$name','$datnasc','$cpf','$phone','$email','$login','$password')");
}

$sql = mysqli_query($connect, $sql);


if ($sql == true) {
       echo "Usuário salvo.";
} else {
       echo "Usuário não foi salvo.";
}

?> 
