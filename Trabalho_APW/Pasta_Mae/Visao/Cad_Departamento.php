<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cad_Departamento</title>
    <link rel="stylesheet" href="../Visao/css/style.css">
</head>

<body>
    <?php require_once '../Controle/ControleDepartamento.php'; ?>

    <div class="principal">
        JDEVS.setDepartamento()
    </div>

    
        <form name="Cad_Departamento" method="post" action="">
            <div>
                <fieldset>
                    <div class="label_2">
                    <legend>Cadastro de Departamento</legend>
                    <br><br>
                    <label> Nome: <input type="text" name="nome" maxlength="255" placeholder="Digite o Nome do Departamento" class="input_1" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" /></label>
                    <br><br>
                    <label> Andar: <input type="number" step="1" name="andar" placeholder="Digite o Andar" class="input_1" value="<?= htmlspecialchars($_POST['andar'] ?? '') ?>" /></label>
                </div>
                   </div>
                </fieldset>
            </div>

            <br><br><br>
            <div class="buttons_2" id="menu">
                <button type="submit" name="acao" value="cadastrarDepartamento">Cadastrar</button>
                <button type="reset">Limpar</button>
                <a href="http://localhost/Trabalho_APW/index.php"><input type='button' value="Home"></a>
            </div>
        </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'cadastrarDepartamento') {
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
                'cadastrarDepartamento'
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