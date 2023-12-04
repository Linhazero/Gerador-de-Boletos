<?php
include_once("templates/header.php");
?>

<div class="container">
<?php include_once("templates/backbtn.html"); ?>
<h1 id="main-title">Cadastra alunos</h1>
<form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="create">

      <div class="form-row">
       <div class="form-group col-md-6">
        <label for="nome">Nome do aluno:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
      </div>
       <div class="form-group col-md-6">
        <label for="responsavel">Nome do Responsavel:</label>
        <input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Digite o nome" required>
      </div>
       <div class="form-group col-md-6">
        <label for="telefone">Telefone de contato:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" oninput="formataCell(this)" maxlength="6" placeholder="Digite o telefone" required>
      </div>
       <div class="form-group col-md-6">
        <label for="cpf">CPF do aluno:</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf" required>
      </div>
       <div class="form-group col-md-6">
        <label for="cpf_responsavel">CPF do Responsavel:</label>
        <input type="text" class="form-control" id="cpf_responsavel" name="cpf_responsavel" placeholder="Digite o cpf" required>
      </div>
     <div class="form-group col-6">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" required>
      </div>
      <div class="form-group col-6">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" required>
      </div>

     <div class="form-group col-6">
                        <label for="cadastro">Data Cadastro: </label>
                        <input class="form-control" type="date" name="cadastro" id="cadastro">
                    </div>

      <div class="form-group col-6">
                        <label for="curso">Curso: </label>
                        <select class="form-control" name="cursos[]" id="cursos" multiple required>
                            <option value="Introdução ao P. de Dados">Introdução ao P. de Dados</option>
                            <option value="Windows 10">Windows 10</option>
                            <option value="Internet - Mod 1 e Mod 2">Internet - Mod 1 e Mod 2</option>
                            <option value="Multimidia">Multimidia</option>
                            <option value="Word 2019" >Word 2019</option>
                            <option value="Excel 2019" >Excel 2019</option>
                            <option value="Matematica financeira - Excel" >Matematica financeira - Excel</option>
                            <option value="PowerPoint 2019" >PowerPoint 2019</option>
                            <option value="Outlook 2013" >Outlook 2013</option>
                            <option value="Empregabilidade" >Empregabilidade</option>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="dias">Dias de aula: </label>
                        <select type= "text" class="form-control" name="dias" id="dias" required>
                            <option>Segunda e terça</option>
                            <option>Quarta e Quinta</option>
                            <option>Sexta e Sabado</option>
                            <option>Sabado</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-6">
                        <label for="horario">Horario: </label>
                        <select type= "text" class="form-control" name="horario" id="horario" required>
                            <option>8h as 9h</option>
                            <option>9h as 10h</option>
                            <option>10h as 11h</option>
                            <option>11h as 6h</option>
                            <option>14h as 15h</option>
                            <option>15h as 16h</option>
                            <option>16h as 17h</option>
                            <option>17h as 18h</option>
                            <option>18h as 19h</option>
                            <option>19h as 20h</option>
                            <option>20h as 21h</option>
                        </select>
                    </div>

      <div class="form-group col-6">
        <label for="observacao">Observações:</label>
        <textarea type="text" class="form-control" id="observacao" name="observacao" placeholder="Insira as observações" rows="3"></textarea>
      </div> 
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
  <script src="./templates/script.js"></script>
<?php
include_once("templates/footer.php");
?>
