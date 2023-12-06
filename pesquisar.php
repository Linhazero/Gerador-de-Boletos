<?php

// Incluir a conexão com o banco de dados
include_once("config/connection.php");

// Receber os dados do JavaScript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessa o IF quando o campo pesquisar usuário possuir valor
if (!empty($dados['texto_pesquisar'])) {

    // Criar a variável com o caracter "%" indicando que pode ter letras antes e depois do valor pesquisado
    $nome = "%" . $dados['texto_pesquisar'] . "%";

    // Criar QUERY pesquisar usuários
    $query_testes = "SELECT  id, nome, responsavel, telefone, cpf, cpf_responsavel, endereco, email, cadastro, curso, dias, horario, observacao 
            FROM testes
            WHERE nome LIKE :nome";
    // Preparar a QUERY
    $result_testes = $conn->prepare($query_testes);

    // Substitui o link pelo valor que vem do formulário
    $result_testes->bindParam(':nome', $nome);

    // Executar a QUERY
    $result_testes->execute();

    // Recebe os dados dos usuários
    $listar_testes = "";

    // Acessa o IF quando retornar usuário no banco de dados
    if (($result_testes) and ($result_testes->rowCount() != 0)) {

        // Iniciar a tabela
        $listar_testes = "<table class='table' id='contacts-table'>";
        $listar_testes .= "<thead>";
        $listar_testes .= "<tr>";
        $listar_testes .= "<th scope='col'>#</th>";
        $listar_testes .= "<th scope='col'>Nome</th>";
        $listar_testes .= "<th scope='col'>Responsável</th>";
        $listar_testes .= "<th scope='col'>Telefone</th>";
        $listar_testes .= "<th scope='col'>CPF</th>";
        $listar_testes .= "<th scope='col'>CPF do Responsável</th>";
        $listar_testes .= "<th scope='col'>Endereço</th>";
        $listar_testes .= "<th scope='col'>E-mail</th>";
        $listar_testes .= "<th scope='col'>Cadastro</th>";
        $listar_testes .= "<th scope='col'>Curso</th>";
        $listar_testes .= "<th scope='col'>Dias</th>";
        $listar_testes .= "<th scope='col'>Horário</th>";
        $listar_testes .= "<th scope='col'>Observação</th>";
        $listar_testes .= "</tr>";
        $listar_testes .= "</thead>";
        $listar_testes .= "<tbody>";
    
        // Ler os registros retornados do banco de dados 
        while ($row_teste = $result_testes->fetch(PDO::FETCH_ASSOC)) {
            // Adicionar cada linha da tabela
            $listar_testes .= "<tr>";
            $listar_testes .= "<td>{$row_teste['id']}</td>";
            $listar_testes .= "<td>{$row_teste['nome']}</td>";
            $listar_testes .= "<td>{$row_teste['responsavel']}</td>";
            $listar_testes .= "<td>{$row_teste['telefone']}</td>";
            $listar_testes .= "<td>{$row_teste['cpf']}</td>";
            $listar_testes .= "<td>{$row_teste['cpf_responsavel']}</td>";
            $listar_testes .= "<td>{$row_teste['endereco']}</td>";
            $listar_testes .= "<td>{$row_teste['email']}</td>";
            $listar_testes .= "<td>{$row_teste['cadastro']}</td>";
            $listar_testes .= "<td>{$row_teste['curso']}</td>";
            $listar_testes .= "<td>{$row_teste['dias']}</td>";
            $listar_testes .= "<td>{$row_teste['horario']}</td>";
            $listar_testes .= "<td>{$row_teste['observacao']}</td>";
            $listar_testes .= "</tr>";
        }
    
        // Fechar a tabela
        $listar_testes .= "</tbody>";
        $listar_testes .= "</table>";  

        // Criar o array de informações que será retornado para o JavaScript
        $retorna = ['status' => true, 'dados' => $listar_testes];
    } else {
        // Criar o array de informações que será retornado para o JavaScript
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>"];
    }
} else {
    // Criar o array de informações que será retornado para o JavaScript
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>"];
}

// Converter o array em objeto e retornar para o JavaScript
echo json_encode($retorna);