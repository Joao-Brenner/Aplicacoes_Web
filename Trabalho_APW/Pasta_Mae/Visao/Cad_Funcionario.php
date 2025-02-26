<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cad_Funcionario</title>
    <link rel="stylesheet" href="../Visao/css/style.css">
</head>

<body>
    <?php
    require_once '../Controle/ControleFuncionario.php';
    require '../Modelo/ClassDepartamento.php';
    require '../Modelo/DAO/ClassDepDAO.php';

    $erro = false;
    $mensagensErro = [];
    ?>

    <div class="principal">
        JDEVS.setFuncionário()
    </div>

        <form name="Cad_Funcionario" method="post" action="">
            <div>
                <fieldset>
                    <div class="label_2">
                    <legend>Dados Pessoais</legend>
                    <br><br>
                        <label> Nome: <input type="text" name="nome" maxlength="255" placeholder="Digite o Nome" class="input_2" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" /></label>
                        <br><br>
                        <label> Email: <input type="email" name="email" maxlength="255" placeholder="Digite o Email" class="input_2" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"  /></label>
                        <br><br>
                        <label> CPF: <input type="text" name="cpf" maxlength="11" placeholder="Digite o CPF " class="input_2" value="<?= htmlspecialchars($_POST['cpf'] ?? '') ?>" /></label>
                        <br><br>
                        <label> Idade: <input type="number" step="1" name="idade" placeholder="Digite a Idade" class="input_2" value="<?= htmlspecialchars($_POST['idade'] ?? '') ?>" /></label>
                        <br><br>
                        <label> Telefone: <input type="text" maxlength="11" name="telefone" placeholder="Digite o Telefone" class="input_2" value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>" /></label>
                    </div>
                </fieldset>
        
       
            </div>
            <br><br>
            <div>
                <fieldset>
                    <div  class="label_2">
                    <legend><h3>Dados Profissionais</h3></legend>
                    <label>Departamento:<input type="text" name="nome_departamento" maxlength="255" placeholder="Digite o Nome do Departamento" class="input_2" value="<?= htmlspecialchars($_POST['nome_departamento'] ?? '') ?>" /></label>

                    <br><br>
                        <label class="input_2"> Formação: 
                            <select name="formacao" class="input_2">
                                
                            <option value="medio" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Ensino Médio</option>

                            <option value="superior" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'superior') ? 'selected' : '' ?>>Ensino Superior</option>

                            <option value="pos" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Pós-Graduação</option>

                              <option value="mestrado" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'superior') ? 'selected' : '' ?>>Mestrado</option>

                              <option value="doutorado" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Doutorado</option>
                             
                            </select>

                        </label>
                        <br><br>
                        <label class="input_2"> Cargo: 
                            <select name="cargo" class="input_2">
                            
                            <option value="aprendiz" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Menor Aprendiz</option>

                            <option value="estagio" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Estagiário</option>

                            <option value="junior" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Desenvolvedor Júnior</option>

                            <option value="pleno" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Desenvolvedor Pleno</option>
                      
                            <option value="senior" <?= (isset($_POST['formacao']) && $_POST['formacao'] === 'medio') ? 'selected' : '' ?>>Desenvolvedor Sênior</option>
                                
                            </select>
                        </label>
                    </div>
                </fieldset>
            </div>

            <br><br><br>
            <div class="buttons_2" id="menu">
                <button type="submit" name="acao" value="cadastrarFuncionario">Cadastrar</button>
                <button type="reset">Limpar</button>
                <a href="http://localhost/Trabalho_APW/index.php"><input type='button' value="Home"></a>
                </br></br> 

            </div>

        </form>
  
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'cadastrarFuncionario') {

        if (!$_POST['nome']) {
            $erro = true;
            $mensagensErro[] = "O campo Nome é obrigatório!\n";
        } elseif (!preg_match("/^[\p{L}\s]+$/u", $_POST['nome'])) {
            $erro = true;
            $mensagensErro[] = "O Nome só pode conter letras, com ou sem acento!\n";
        }

        if (!$_POST['email']) {
            $erro = true;
            $mensagensErro[] = "O campo Email é obrigatório!\n";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $erro = true;
            $mensagensErro[] = "Por favor, insira um endereço de Email válido!\n";
        }

        if (!$_POST['cpf']) {
            $erro = true;
            $mensagensErro[] = "O campo CPF é obrigatório!\n";
        } elseif (!preg_match("/^\d{11}$/", $_POST['cpf'])) {
            $erro = true;
            $mensagensErro[] = "O CPF deve conter exatamente 11 dígitos numéricos!\n";
        }

        if (!$_POST['idade']) {
            $erro = true;
            $mensagensErro[] = "O campo Idade é obrigatório!\n";
        } elseif (!is_numeric($_POST['idade']) || $_POST['idade'] <= 0) {
            $erro = true;
            $mensagensErro[] = "O campo Idade deve conter apenas números positivos!\n";
        }
        
        if (!$_POST['telefone']) {
            $erro = true;
            $mensagensErro[] = "O campo Telefone é obrigatório!\n";
        } elseif (!preg_match("/^\d{10,11}$/", $_POST['telefone'])) {
            $erro = true;
            $mensagensErro[] = "O Telefone deve conter entre 10 e 11 dígitos numéricos!\n";
        }



        if (!$_POST['nome_departamento']) {
            $erro = true;
            $mensagensErro[] = "O campo Departamento é obrigatório!\n";

        } elseif (!preg_match("/^[\p{L}\s]+$/u", $_POST['nome'])) {
            $erro = true;
            $mensagensErro[] = "O Departamento só pode conter letras, com ou sem acento!\n";

        }else {

            $nome = $_POST['nome_departamento'];
            $depDAO = new ClassDepDAO();
            $departamento = $depDAO->buscarDEP2($nome);

            if ($departamento) {
                $departamento_id = $departamento->getID();
            } else {
                $erro = true;
                $mensagensErro[] = "Departamento não encontrado!\n";
            }
        }
        
        if (!$erro) {
            $controleFuncionario = new ControleFuncionario();
            $controleFuncionario->processarFuncionario(
                $_POST['nome'],
                $_POST['email'],
                $_POST['cpf'],
                $_POST['idade'],
                $_POST['telefone'],
                $_POST['formacao'],
                $_POST['cargo'],
                0,
                0,
                $departamento_id,
                'cadastrarFuncionario'
            );
        } else {    
            echo "<div class='mensagens' style='position: fixed; top: 10px; right: 10px; background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);'>";
            foreach ($mensagensErro as $mensagem) {
                echo "<p>Erro: $mensagem</p>";
            }
            echo "</div>";
        }
    }
    ?>
</body>
</html>

