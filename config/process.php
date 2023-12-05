<?php

session_start();

include_once("connection.php");
include_once("url.php");

// Função para validar CPF
function validarCPF($cpf) {
  // Limpar caracteres não numéricos
  $cpf = preg_replace("/[^0-9]/", "", $cpf);

  // Verificar se o CPF tem 11 dígitos
  if (strlen($cpf) != 11) {
      return false;
  }

  // Verificar se todos os dígitos são iguais
  if (preg_match('/^(\d)\1*$/', $cpf)) {
      return false;
  }

  // Calcular os dígitos verificadores
  for ($i = 0, $j = 10, $soma1 = 0; $i < 9; $i++, $j--) {
      $soma1 += $cpf[$i] * $j;
  }

  $digito1 = ($soma1 % 11 < 2) ? 0 : 11 - ($soma1 % 11);

  for ($i = 0, $j = 11, $soma2 = 0; $i < 10; $i++, $j--) {
      $soma2 += $cpf[$i] * $j;
  }

  $digito2 = ($soma2 % 11 < 2) ? 0 : 11 - ($soma2 % 11);

  // Verificar os dígitos verificadores
  return ($digito1 == $cpf[9] && $digito2 == $cpf[10]);
}

// Função para formatar CPF
function maskCPF($cpf){
  return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}


$data = $_POST;

// MODIFICAÇÕES NO BANCO
if(!empty($data)) {

  // Criar contato
  if($data["type"] === "create") {

    $nome = $data["nome"];
    $responsavel = $data["responsavel"];
    $telefone = $data["telefone"];
    $cpf = $data["cpf"];
    $cpf_responsavel = $data["cpf_responsavel"];
    $endereco = $data["endereco"];
    $email = $data["email"];
    $cadastro = $data["cadastro"];
    $cursos = $data["cursos"];
    $dias = $data["dias"];
    $horario = $data["horario"];
    $observacao = $data["observacao"];

         // Serializar array de cursos
         $cursos_serialized = json_encode($cursos);

    $query = "INSERT INTO testes (nome, responsavel, telefone, cpf, cpf_responsavel, endereco, email, cadastro, curso, dias, horario, observacao ) VALUES (:nome, :responsavel, :telefone, :cpf, :cpf_responsavel, :endereco, :email, :cadastro, :cursos_serialized, :dias, :horario, :observacao)";

    $stmt = $conn->prepare($query);
  
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":responsavel", $responsavel);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":cpf_responsavel", $cpf_responsavel);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":cadastro", $cadastro);
    $stmt->bindParam(":cursos_serialized", $cursos_serialized);
    $stmt->bindParam(":dias", $dias);
    $stmt->bindParam(":horario", $horario);
    $stmt->bindParam(":observacao", $observacao);
      
    // Validar CPF do aluno
    $cpfAluno = $data["cpf"];
    if (!validarCPF($cpfAluno)) {
        $_SESSION["msg"] = "CPF do aluno inválido. Por favor, insira um CPF válido.";
        header("Location:" . $BASE_URL . "../index.php");
        exit();
    }

    // Validar CPF do responsável
    $cpfResponsavel = $data["cpf_responsavel"];
    if (!validarCPF($cpfResponsavel)) {
        $_SESSION["msg"] = "CPF do responsável inválido. Por favor, insira um CPF válido.";
        header("Location:" . $BASE_URL . "../index.php");
        exit();
    }

    // Formatando CPF antes de salvar no banco
    $cpfFormatado = maskCPF($cpf);
    $cpfResponsavelFormatado = maskCPF($cpf_responsavel);

   try {

     $stmt->execute();
     $_SESSION["msg"] = "Aluno cadastrado com sucesso!";
 
   } catch(PDOException $e) {
     // erro na conexão
     $error = $e->getMessage();
     echo "Erro: $error";
   }
  
    //atualizando contato
  } else if($data["type"] === "edit") {

    
    $nome = $data["nome"];
    $responsavel = $data["responsavel"];
    $telefone = $data["telefone"];
    $cpf = $data["cpf"];
    $cpf_responsavel = $data["cpf_responsavel"];
    $endereco = $data["endereco"];
    $email = $data["email"];
    $cadastro = $data["cadastro"];
    $curso = $data["curso"];
    $dias = $data["dias"];
    $horario = $data["horario"];
    $observacao = $data["observacao"];
    $id = $data["id"];

    $query = "UPDATE testes 
              SET nome = :nome, responsavel = :responsavel, telefone = :telefone, cpf = :cpf, cpf_responsavel = :cpf_responsavel, endereco = :endereco, email = :email, cadastro = :cadastro, curso = :curso, dias = :dias, horario = :horario, observacao = :observacao 
              WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":responsavel", $responsavel);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":cpf", $cpf);
    $stmt->bindParam(":cpf_responsavel", $cpf_responsavel);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":cadastro", $cadastro);
    $stmt->bindParam(":curso", $curso);
    $stmt->bindParam(":dias", $dias);
    $stmt->bindParam(":horario", $horario);
    $stmt->bindParam(":observacao", $observacao);
    $stmt->bindParam(":id", $id);

    try {

      $stmt->execute();
      $_SESSION["msg"] = "Aluno atualizado com sucesso!";
  
    } catch(PDOException $e) {
      // erro na conexão
      $error = $e->getMessage();
      echo "Erro: $error";
    }

  }/* else if($data["type"] === "delete") {

    $id = $data["id"];

    $query = "DELETE FROM infos WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);
    
    try {

      $stmt->execute();
      $_SESSION["msg"] = "Contato removido com sucesso!";
  
    } catch(PDOException $e) {
      // erro na conexão
      $error = $e->getMessage();
      echo "Erro: $error";
    }

  }
*/


  // Redirect HOME
  header("Location:" . $BASE_URL . "../index.php");

// SELEÇÃO DE DADOS
} else {
  
  $id;

  if(!empty($_GET)) {
    $id = $_GET["id"];
  }

  // Retorna o dado de um contato
  if(!empty($id)) {

    $query = "SELECT * FROM testes WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $info = $stmt->fetch();

  } else {

    // Retorna todos os contatos
    $infos = [];

    $query = "SELECT * FROM testes";

    $stmt = $conn->prepare($query);

    $stmt->execute();
    
    $infos = $stmt->fetchAll();

  }

}

// FECHAR CONEXÃO
$conn = null;

$conn = null;