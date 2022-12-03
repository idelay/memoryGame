<?php 

include_once "conection.php";
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
}
elseif(empty($dados['phnumber'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Telefone!</div>"];
}
elseif(empty($dados['email'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Email!</div>"];
}
elseif(empty($dados['psw'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
}
elseif(empty($dados['psw-repeat'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo endereco!</div>"];
}
else {
    $querry_usuario = "INSERT INTO usuario (nome, phnumber, email, psw, psw-repeat) 
    VALUES (:Nome, :RA, :Email, Idade, :Telefone, :endereco, :Sexo)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':Nome', $dados['nome']);
    $cad_usuario->bindParam(':Telefone', $dados['phnumber']);
    $cad_usuario->bindParam(':Email', $dados['email']);
    $cad_usuario->bindParam(':Senha', $dados['psw']);
    $cad_usuario->bindParam(':Repitir Senha', $dados['psw-repeat']);

    $cad_usuario->execute();
    if ($cad_usuario->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Informações cadastradas com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Informações não cadastradas com sucesso!</div>"];
    }
    echo json_encode($retorna);
}
