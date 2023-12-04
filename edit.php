<?php
  include_once("templates/header.php");
?>
  <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Atualizar Aluno</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
      <input type="hidden" name="type" value="edit">
      <input type="hidden" name="id" value="<?= $info['id'] ?>">
      <div class="form-group">
        <label for="name">Nome do contato:</label>
        <input type="text" class="form-control" id="name" name="nome" placeholder="Digite o nome" value="<?= $info['nome'] ?>" required>
      </div>
      <div class="form-group">
        <label for="telefone">Telefone do contato:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" value="<?= $info['telefone'] ?>" required>
      </div>
      <div class="form-group">
        <label for="cpf">CPF do aluno:</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf" value="<?= $info['cpf'] ?>" required>
      </div>
      <div class="form-group">
        <label for="cpf_responsavel">CPF do Responsavel:</label>
        <input type="text" class="form-control" id="cpf_responsavel" name="cpf_responsavel" placeholder="Digite o cpf" value="<?= $info['cpf_responsavel'] ?>" required>
      </div>
     <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" value="<?= $info['endereco'] ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" value="<?= $info['email'] ?>" required>
      </div>

     <div class="form-group">
                        <label for="cadastro">Data Cadastro: </label>
                        <input class="form-control" type="date" name="cadastro" id="cadastro" value="<?= $info['cadastro'] ?>">
                    </div>
      <div class="form-group">
                        <label for="curso">Curso: </label>
                        <select type= "text" class="form-control" name="curso" id="curso" value="<?= $info['curso'] ?>" required>
                            <option>Introdução ao P. de /Dados</option>
                            <option>Windows 10</option>
                            <option>Internet - Mod 1 e Mod 2</option>
                            <option>Multimidia</option>
                            <option>Word 2019</option>
                            <option>Excel 2019</option>
                            <option>Matematica financeira - Excel</option>
                            <option>PowerPoint 2019</option>
                            <option>Outlook 2013</option>
                            <option>Empregabilidade</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dias">Dias de aula: </label>
                        <select type= "text" class="form-control" name="dias" id="dias" value="<?= $info['dias'] ?>" required>
                            <option>Segunda e terça</option>
                            <option>Quarta e Quinta</option>
                            <option>Sexta e Sabado</option>
                            <option>Sabado</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="horario">Horario: </label>
                        <select type= "text" class="form-control" name="horario" id="horario" value="<?= $info['horario'] ?>" required>
                            <option>8h as 9h</option>
                            <option>9h as 10h</option>
                            <option>10h as 11h</option>
                            <option>11h as 12h</option>
                            <option>14h as 15h</option>
                            <option>15h as 16h</option>
                            <option>16h as 17h</option>
                            <option>17h as 18h</option>
                            <option>18h as 19h</option>
                            <option>19h as 20h</option>
                            <option>20h as 21h</option>
                        </select>
                    </div>

      <div class="form-group">
        <label for="observacao">Observações:</label>
        <textarea type="text" class="form-control" id="observacao" name="observacao" placeholder="Insira as observações" rows="3"><?= $info['observacao'] ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>
<?php
  include_once("templates/footer.php");
?>