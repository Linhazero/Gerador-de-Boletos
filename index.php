<?php
include_once("templates/header.php");
include_once("config/url.php");
?>

<script>
    var BASE_URL = "<?php echo $BASE_URL; ?>";
</script>
<script src="./templates/script.js"></script>

 <div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
      <p id="msg"><?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title">Alunos Matriculados</h1>
   
<body>
    <h1>Pesquisar Usuário</h1>

    <span id="msg"></span>

    <form id="form-pesquisar">
        <label>Pesquisar: </label>
        <input type="text" id = "cpf" name="texto_pesquisar" placeholder="Pesquisar pelo cpf"><br><br>

        <input type="submit" id="btn-pesquisar" value="Pesquisar" name="PesquisarUsuario"><br><br>
    </form>

  

    <span id="listar-usuarios"></span>

    <script src="js/custom.js"></script>
</body>

    <?php if(count($infos) > 0): ?>
        <table class="table" id="contacts-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($infos as $info): ?>
            <tr>
              <td scope="row" class="col-id"><?= $info["id"] ?></td>
              <td scope="row"><?= $info["nome"] ?></td>
              <td scope="row"><?= $info["telefone"] ?></td>
              <td class="actions">
                <a href="<?= $BASE_URL ?>show.php?id=<?= $info["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                <a href="<?= $BASE_URL ?>edit.php?id=<?= $info["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                  <input type="hidden" name="type" value="delete">
                  <input type="hidden" name="id" value="<?= $info["id"] ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>  
      <p id="empty-list-text">Ainda não há alunos matriculados, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
    <?php endif; ?>
  </div>
<?php
  include_once("templates/footer.php");
?>
