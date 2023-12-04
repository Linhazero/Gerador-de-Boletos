<?php
  include_once("templates/header.php");
?>

  <div class="container" id="view-contact-container"> 
   
    <h1 id="main-title"><?= $info["nome"] ?></h1>
    <?php include_once("templates/backbtn.html"); ?>

    <p class="bold">Nome do reponsavel:</p>
    <p><?= $info["responsavel"] ?></p>

    <p class="bold">Telefone de contato:</p>
    <p><?= $info["telefone"] ?></p>

    <p class="bold">CPF do aluno:</p>
    <p><?= $info["cpf"] ?></p>

    <p class="bold">CPF do responsavel:</p>
    <p><?= $info["cpf_responsavel"] ?></p>

    <p class="bold">Endereço:</p>
    <p><?= $info["endereco"] ?></p>

    <p class="bold">Email:</p>
    <p><?= $info["email"] ?></p>

    <p class="bold">Data Cadastro:</p>
    <p><?= $info["cadastro"] ?></p>

    <p class="bold">Cursos:</p>
    <p><?= $info["curso"] ?></p>

    <p class="bold">Dias de aula:</p>
    <p><?= $info["dias"] ?></p>

    <p class="bold">Horario:</p>
    <p><?= $info["horario"] ?></p>

    <p class="bold">Observações:</p>
    <p><?= $info["observacao"] ?></p>
  </div>
<?php
  include_once("templates/footer.php");
?>