<?php 

include_once "conection.php";
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(empty($dados['Nome'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nome!</div>"];
}
elseif(empty($dados['RA'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo RA!</div>"];
}

elseif(empty($dados['Email'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Email!</div>"];
}

elseif(empty($dados['Idade'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Idade!</div>"];
}

elseif(empty($dados['Telefone'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Telefone!</div>"];
}

elseif(empty($dados['endereco'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo endereco!</div>"];
}

elseif(empty($dados['Sexo'])){
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Sexo!</div>"];
}

else {
    $querry_usuario = "INSERT INTO estudantes (Nome, RA, Email, Idade, Telefone, endereco, Sexo) 
    VALUES (:Nome, :RA, :Email, Idade, :Telefone, :endereco, :Sexo)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':Nome', $dados['Nome']);
    $cad_usuario->bindParam(':RA', $dados['RA']);
    $cad_usuario->bindParam(':Email', $dados['Email']);
    $cad_usuario->bindParam(':Idade', $dados['Idade']);
    $cad_usuario->bindParam(':Telefone', $dados['Telefone']);
    $cad_usuario->bindParam(':endereco', $dados['endereco']);
    $cad_usuario->bindParam(':Sexo', $dados['Sexo']);

    $cad_usuario->execute();
    if ($cad_usuario->rowCount()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Informações cadastradas com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Informações não cadastradas com sucesso!</div>"];
    }
    echo json_encode($retorna);
}



