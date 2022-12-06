<?php 

include_once "conection.php";
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "";


if ($contentType === "application/json") {

    $conteudo = trim(file_get_contents("php://input"));



    $conteudo_dados = json_decode($conteudo, true);


    if (!is_array($conteudo_dados)) {

        http_response_code(400);
        echo json_encode(['msg' => "<p style='color: #f00'>Erro: Requisição inválida!</p>"]);
    } else{

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(empty($dados['nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
}
elseif(empty($dados['date'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Data de Nascimento!</div>"];
}
elseif(empty($dados['cpf'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo CPF!</div>"];
}
elseif(empty($dados['phnumber'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Telefone!</div>"];
}
elseif(empty($dados['email'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Email!</div>"];
}
elseif(empty($dados['login'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Usuario!</div>"];
}
elseif(empty($dados['password'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>"];
}
elseif(empty($dados['pswrepeat'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo repitir senha!</div>"];
}
else {
    $querry_usuario = "INSERT INTO usuario (nome, datnasc, cpf, phone, email, login, password, pswrepeat) 
    VALUES ('$name','$datnasc','$cpf','$phone','$email','$login','$password')";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':Nome', $dados['nome']);
    $cad_usuario->bindParam(':Data_de_Nascimento', $dados['datnasc']);
    $cad_usuario->bindParam(':Cpf', $dados['cpf']);
    $cad_usuario->bindParam(':Telefone', $dados['phnumber']);
    $cad_usuario->bindParam(':Email', $dados['email']);
    $cad_usuario->bindParam(':Usuário', $dados['user']);
    $cad_usuario->bindParam(':Senha', $dados['password']);
    $cad_usuario->bindParam(':Repitir Senha', $dados['pswrepeat']);

    $cad_usuario->execute();
    if ($cad_usuario->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Informações cadastradas com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Informações não cadastradas com sucesso!</div>"];
    }
    echo json_encode($retorna);
}
}
} else {

    http_response_code(400);
    echo json_encode(['msg' => "<p style='color: #f00'>Erro: Requisição inválida!</p>"]);
}

