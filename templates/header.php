<?php

include_once("config/url.php");
include_once("config/process.php");

 // limpa a mensagem
 if(isset($_SESSION['msg'])) {
    $printMsg = $_SESSION['msg'];
    $_SESSION['msg'] = '';
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coutinho Informatica</title>

    <!-- Links do js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BOOTSTRAP -->
    
    <!-- FONT AWESOME -->
  
    <!-- CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
     <!-- Adicione as bibliotecas jQuery e Select2 -->
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <!-- Adicione a máscara ao campo de Telefone e CPF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
   
    <script>
        $(document).ready(function () {
            $('#telefone').mask('(00)00000-0000');
            $('#cpf').mask('000.000.000-00', { reverse: true });
            $('#cpf_responsavel').mask('000.000.000-00', { reverse: true });

            // Ative o plugin Select2 na caixa de seleção de cursos
            $('#cursos').select2({
                width: 'resolve', // Ajusta automaticamente a largura
                placeholder: 'Selecione os cursos', // Mensagem de espaço reservado
            });
        });
    </script>

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="<?= $BASE_URL ?>index.php">
        <img src="<?= $BASE_URL ?>img/logo.svg" alt="Agenda">
      </a>
      
        <div class="navbar-nav">
          <a class="nav-link active" href="<?= $BASE_URL ?>create.php">Cadastro de alunos</a>
          <a class="nav-link active" id="home-link" href="<?= $BASE_URL ?>index.php">Lista de alunos</a>
         
      </div>
     
    </nav>

  </header>
  