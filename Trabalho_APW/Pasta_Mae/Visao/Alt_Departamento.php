<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
         <title>Alt_Departamento</title>
         <link rel="stylesheet" href="../Visao/css/style.css">
    </head>
    <body>

        <?php
            require '../Modelo/ClassDepartamento.php';
            require '../Modelo/DAO/ClassDepDAO.php';
            require_once '../Controle/ControleDepartamento.php';

			$id = @$_GET['idex'];
            $novoDep = new ClassDepartamento();
            $depDAO = new ClassDepDAO();
            $novoDep = $depDAO->buscarDEP($id);
        ?>
        
    <div class="principal">
        JDEVS.UPDATEDepartamento()
    </div>

        <form name="Alt_Departamento" method="post" action="">
        <input type="hidden" name="idex" value="<?php echo $novoDep->getID(); ?>">
            
             <div>
                <fieldset>
                    <div class="label_2">
                    <legend>Atualização de Departamento</legend>
                    <br><br>
                        <label> Novo Nome: <input type="text" name="nome" maxlength="255" class="input_2" value="<?php echo $novoDep->getNome();?>"/></label>
                        <br><br>
                        <label> Novo Andar: <input type="number" step="1" name="andar" class="input_2" value="<?php echo $novoDep->getAndar();?>" /></label>
                    </div>
                </fieldset>
            </div>
              
            <br><br><br>
            <div  class="buttons_2" id="menu">
                <button type="submit" name="acao2" value="atualizarDepartamento">Atualizar</button>
                <button type="reset">Limpar</button>
                <button type="submit" name="acao3" value="excluirDepartamento">Deletar</button>
                <a href="http://localhost/Trabalho_APW/index.php"><input type='button' value="Home"></a>
                </br></br> 
            </div>

        </form>
   
    <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao2']) && $_POST['acao2'] === 'atualizarDepartamento') {
    $erro = false;
    $mensagensErro = [];

    if (!$_POST['nome']) {
        $erro = true;
        $mensagensErro[] = "O campo Nome é obrigatório!\n";
    } elseif (!preg_match("/^[\p{L}\s]+$/u", $_POST['nome'])) {
        $erro = true;
        $mensagensErro[] = "O Nome só pode conter letras, com ou sem acento.\n";

    }

    if (!isset($_POST['andar']) || $_POST['andar'] === '') {
        $erro = true;
        $mensagensErro[] = "O campo Andar é obrigatório!\n";
    }
    
    if (!$erro) {
    
      $controleDepartamento = new ControleDepartamento();
      $controleDepartamento->processarDepartamento(
          $_POST['idex'],
          $_POST['nome'],
          $_POST['andar'],
          'atualizarDepartamento'   
      );

    }else {    
        echo "<div class='mensagens' style='position: fixed; top: 10px; right: 10px; background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);'>";
        foreach ($mensagensErro as $mensagem) {
            echo "<p>Erro: $mensagem</p>";
        }
        echo "</div>";
    }

          }else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao3']) && $_POST['acao3'] === 'excluirDepartamento') {
            $controleDepartamento = new ControleDepartamento();
            $controleDepartamento->processarDepartamento(
            $_POST['idex'],
            $_POST['nome'],
            $_POST['andar'],
            'excluirDepartamento'   
           );
  }
  ?>
    </body>
</html>
