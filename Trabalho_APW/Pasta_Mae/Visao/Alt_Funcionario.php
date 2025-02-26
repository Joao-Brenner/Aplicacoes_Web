<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
         <title>Alt_Funcionario</title>
         <link rel="stylesheet" href="../Visao/css/style.css">
    </head>
    <body>
        <?php
            require '../Modelo/ClassFuncionario.php';
            require '../Modelo/DAO/ClassFuncDAO.php';
            require_once '../Controle/ControleFuncionario.php';
            require '../Modelo/ClassDepartamento.php';
            require '../Modelo/DAO/ClassDepDAO.php';

			$CPF = @$_GET['CPF'];
			$id = @$_GET['idex'];
            $novoFunc = new ClassFuncionario();
            $funcDAO = new ClassFuncDAO();
            $novoFunc = $funcDAO->buscarFunc($CPF);
            $erro = false;
            $mensagensErro = [];
            $depDAO = new ClassDepDAO();
            $departamento = $depDAO->buscarDEP($id);


        ?>

   <div class="principal">
   JDEVS.UPDATEFuncionário()
    </div>

        <form name="Alt_Funcionario" method="post" action="">
        <input type="hidden" name="nome" value="<?php echo $novoFunc->getNome();?>"/>
        <input type="hidden" name="CPF" value="<?php echo $novoFunc->getCPF();?>"/>

            <div>
           
                <fieldset class="fieldset_2">
               
                    <?php
                     echo "<table border='4' style='width: 110%; margin: 20px auto; border-collapse: collapse;'>";
                     echo "<tr style='background-color: #f2f2f2;'>";
                     echo "<td style='text-align: center; padding: 10px; border-right: 2px solid #000;'>Nome: " .$novoFunc->getNome() . "</td>";
                     echo "<td style='text-align: center; padding: 10px;'>CPF: " .$novoFunc->getCPF() . "</td>";
                     echo "</table>";
                    ?>


                   <br><br>
                    <div class="label_2">
                    <legend>Dados Pessoais</legend>
                    <br><br>
                        <label> Email: <input type="email" name="email" maxlength="255" value="<?php echo $novoFunc->getEmail();?>"class="input_2" /></label>
                        <br><br>
                        <label> Idade: <input type="number" step="1" name="idade" value="<?php echo $novoFunc->getIdade();?>" class="input_2" /></label>
                        <br><br>
                        <label> Telefone: <input type="text"maxlength="11" name="telefone" value="<?php echo $novoFunc->getTelefone();?>" class="input_2"/></label>
                    </div>

                </fieldset>

            </div>
            <br><br>
            <div>

                <fieldset class="fieldset_2">
                
                    <div class="label_2">
                    <legend>Dados Profissionais</legend>
                    <br><br>
                    <label> Número de Faltas: <input type="number" step="1" name="numero_faltas" value="<?php echo $novoFunc->getNumeroFaltas();?>" class="input_2"/></label>
                    <br><br>
                    <label> Metas Alcançadas: <input type="number" step="1" name="metas_cumpridas" value="<?php echo $novoFunc->getMetasCumpridas();?>" class="input_2"/></label>
                    <br><br>
                    <label>Departamento:<input type="text" name="nome_departamento" maxlength="255" value="<?php echo $departamento->getNome();?>" class="input_2" value="<?= htmlspecialchars($_POST['nome_departamento'] ?? '') ?>" /></label>
                    <br><br>
                   
                    <label class="input_2"> Formação: <?php echo $novoFunc->getFormacao();?> 

                            <select name="formacao" class="input_2">
                                
                            <option value="medio" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Ensino Médio</option>

                            <option value="superior" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'superior') ? 'selected' : '' ?>>Ensino Superior</option>

                            <option value="pos" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Pós-Graduação</option>

                              <option value="mestrado" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'superior') ? 'selected' : '' ?>>Mestrado</option>

                              <option value="doutorado" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Doutorado</option>
                             
                            </select>

                        </label>
                        <br><br>
            
                        <label class="input_2"> Cargo:<?php echo $novoFunc->getCargo();?> 
                        <br>
                            <select name="cargo" class="input_2">
                            
                            <option value="aprendiz" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Menor Aprendiz</option>

                            <option value="estagio" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Estagiário</option>

                            <option value="junior" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Desenvolvedor Júnior</option>

                            <option value="pleno" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Desenvolvedor Pleno</option>
                      
                            <option value="senior" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Desenvolvedor Sênior</option>
                                
                            </select>
                        </label>

                        <br><br><br>

                        <?php 
                     echo"<div>";
                              echo "<table  style='border: 2px solid black; text-align: center; width: 40%; float: left; margin-right: 10px;background-color: #e0f7fa;'>";
                              echo "<tr>";
                             echo "<td><p align='center'>Vencimento:  R$" . $novoFunc->getVencimento() . "</p></td>";     
                            echo "</tr>";
                           echo "</table>"; 
                           echo"<div>";
                    ?>
                         <?php 
                     echo"<div>";
                              echo "<table style='border: 2px solid black; text-align: center; width: 40%; float: right; margin-left: 10px;background-color: #e0f7fa;'>";
                              echo "<tr>";
                             echo "<td><p align='center'>Remuneracao: R$" . $novoFunc->getRemuneracao() . "</p></td>";     
                            echo "</tr>";
                           echo "</table>"; 
                           echo"<div>";
                    ?>
                    </div>
                </fieldset>
            </div>

            <br><br><br>
            <div class="buttons_2" id="menu">
                
                <button type="submit" name="acao2" value="atualizarFuncionario">Atualizar</button>
                <button type="reset">Limpar</button>
                <button type="submit" name="acao3" value="excluirFuncionario">Deletar</button>
                <a href="http://localhost/Trabalho_APW/index.php"><input type='button' value="Home"></a>
                </br></br> 
            </div>
        </form>
    </center>
    <?php
  
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao2']) && $_POST['acao2'] === 'atualizarFuncionario') {
   
    if (!$_POST['email']) {
        $erro = true;
        $mensagensErro[] = "O campo Email é obrigatório!";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erro = true;
        $mensagensErro[] = "Por favor, insira um endereço de Email válido!";
    }

    if (!$_POST['idade']) {
        $erro = true;
        $mensagensErro[] = "O campo Idade é obrigatório!";
    } elseif (!is_numeric($_POST['idade']) || $_POST['idade'] <= 0) {
        $erro = true;
        $mensagensErro[] = "O campo Idade deve conter apenas números positivos!";
    }

    if (!$_POST['telefone']) {
        $erro = true;
        $mensagensErro[] = "O campo Telefone é obrigatório!";
    } elseif (!preg_match("/^\d{10,11}$/", $_POST['telefone'])) {
        $erro = true;
        $mensagensErro[] = "O Telefone deve conter entre 10 e 11 dígitos numéricos!";
    }

    if (!is_numeric($_POST['numero_faltas']) || $_POST['numero_faltas'] < 0) {
        $erro = true;
        $mensagensErro[] = "O Número de Faltas deve ser 0 ou outro número positivo!";
    }

    if (!is_numeric($_POST['metas_cumpridas']) || $_POST['metas_cumpridas'] < 0) {
        $erro = true;
        $mensagensErro[] = "O Número de Metas deve ser 0 ou outro número positivo!";
    }

    if (!$_POST['nome_departamento']) {
        $erro = true;
        $mensagensErro[] = "O campo Departamento é obrigatório!";
    } elseif (!preg_match("/^[\p{L}\s]+$/u", $_POST['nome_departamento'])) {
        $erro = true;
        $mensagensErro[] = "O Departamento só pode conter letras, com ou sem acento!";
    } else {
        $nome = $_POST['nome_departamento'];
        $departamento = $depDAO->buscarDEP2($nome);
        if ($departamento) {
            $departamento_id = $departamento->getID();
        } else {
            $erro = true;
            $mensagensErro[] = "Departamento não encontrado!";
        }
    }

    if (!$erro) {
        $controleFuncionario = new ControleFuncionario();
        $controleFuncionario->processarFuncionario(
            $_POST['nome'],
            $_POST['email'],
            $_POST['CPF'],
            $_POST['idade'],
            $_POST['telefone'],
            $_POST['formacao'],
            $_POST['cargo'],
            $_POST['numero_faltas'],
            $_POST['metas_cumpridas'],
            $departamento_id,
            'atualizarFuncionario'
        );
    } else {
        echo "<div class='mensagens' style='position: fixed; top: 10px; right: 10px; background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);'>";
        foreach ($mensagensErro as $mensagem) {
            echo "<p>Erro: $mensagem</p>";
        }
        echo "</div>";
    }
        
  } else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao3']) && $_POST['acao3'] === 'excluirFuncionario') {
    $controleFuncionario = new ControleFuncionario();
      $controleFuncionario->processarFuncionario(
    $_POST['nome'],
    $_POST['email'],
    $_POST['CPF'],
    $_POST['idade'],
    $_POST['telefone'],
    $_POST['formacao'],
    $_POST['cargo'],
    $_POST['numero_faltas'],
    $_POST['metas_cumpridas'],
    $departamento_id,
    'excluirFuncionario'   
      );
  }
  ?>
    </body>
</html>
