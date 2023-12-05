<?php

// Incluir a conexão com o banco de dados
include_once("config/connection.php");

// Receber os dados do JavaScript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessa o IF quando o campo pesquisar usuário possuir valor
if (!empty($dados['texto_pesquisar'])) {

    // Criar a variável com o caracter "%" indicando que pode ter letras antes e depois do valor pesquisado
    $cpf = "%" . $dados['texto_pesquisar'] . "%";

    // Criar QUERY pesquisar usuários
    $query_testes = "SELECT  id, nome, responsavel, telefone, cpf, cpf_responsavel, endereco, email, cadastro, curso, dias, horario, observacao 
            FROM testes
            WHERE cpf LIKE :cpf";
    // Preparar a QUERY
    $result_testes = $conn->prepare($query_testes);

    // Substitui o link pelo valor que vem do formulário
    $result_testes->bindParam(':cpf', $cpf);

    // Executar a QUERY
    $result_testes->execute();

    // Recebe os dados dos usuários
    $listar_testes = "";

    // Acessa o IF quando retornar usuário no banco de dados
    if (($result_testes) and ($result_testes->rowCount() != 0)) {

        // Ler os registros retornado do banco de dados 
        while($row_teste = $result_testes->fetch(PDO::FETCH_ASSOC)){

            // Extrair o array para imprimir através da chave no array
            extract($row_teste);

            // Imprimir o valor de cada coluna retornada do banco de dados
            $listar_testes .= "id: $id<br>";
            $listar_testes .= "Nome: $nome<br>";
            $listar_testes .= "responsavel: $responsavel<br>";
            $listar_testes .= "telefone: $telefone<br>";
            $listar_testes .= "cpf: $cpf<br>";
            $listar_testes .= "cpf_responsavel: $cpf_responsavel<br>";
            $listar_testes .= "endereco: $endereco<br>";
            $listar_testes .= "email: $email<br>";
            $listar_testes .= "cadastro: $cadastro<br>";
            $listar_testes .= "curso: $curso<br>";
            $listar_testes .= "dias: $dias<br>";
            $listar_testes .= "horario: $horario<br>";
            $listar_testes .= "observacao: $observacao<br>";
            $listar_testes .= "<hr>";

        }

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
