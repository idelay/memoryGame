<?php

$name = $_POST['nome'];
$datnasc = $_POST['date'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$phone = $_POST['telefone'];
$login = $_POST['user'];
$password = $_POST['psw'];


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'jogo_da_memoria';
$connect = new mysqli("localhost","root",'',"jogo_da_memoria");


if ($connect-> connect_error) {
       die('connection failed :' .$connect-> $connect_error);
}

else {
       $sql = ("INSERT INTO students(nome,data_nasc,cpf,telefone,email,login,senha)
       VALUES ('$name','$datnasc','$cpf','$phone','$email','$login','$password')");
}

$sql = mysqli_query($connect, $sql);


if ($sql == true) {
       echo "Usuário salvo.";
} else {
       echo "Usuário não foi salvo.";
}

?> 
