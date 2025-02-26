<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Visao/css/style.css">
    <title>Listar_Func</title>
</head>
<body>

<div class='principal'>
    JDEVS.getFuncionários()
       </div>";

       <legend class="legend_f">Opções
       de Listagem</legend>
<fieldset class="fieldset_f">
    <div>
        <form method="POST">
       
            <select name="listagem" class="label_2" class="buttons_2" id="lista_f">
                <option value="asc">Ordem Ascendente(Nome)</option>
                <option value="dsc">Ordem Decrescente(Nome)</option>
                <option value="menorf">Menor Número de Faltas</option>
                <option value="maiorm">Maior Número de Metas Alcançadas</option>
                <option value="maiorr">Maior Remuneração</option>
                <option value="funcxdep">Funcionário X Departamento</option>
            </select>
            <div class="buttons_2" id="lista_f">
                <button type="submit" name="acao2" value="listar" class="buttons_2" id="lista">Listar</button>
            </div>
        </form>
    </div>
    <?php
    require '../Modelo/ClassFuncionario.php';
    require '../Modelo/DAO/ClassFuncDAO.php';

    if (isset($_POST['acao2']) && $_POST['acao2'] == 'listar') {
        $listagem = $_POST['listagem'];
        $classFuncDAO = new ClassFuncDAO();

        $metodos = [
            'asc' => 'listarFuncionariosASC',
            'dsc' => 'listarFuncionariosDESC',
            'menorf' => 'listarFuncionariosMenorF',
            'maiorm' => 'listarFuncionariosMaiorM',
            'maiorr' => 'listarFuncionariosMaiorR',
            'funcxdep' => 'listarFuncionariosXDepartamentos',
        ];

        if (array_key_exists($listagem, $metodos)) {
            $funcionarios = $classFuncDAO->{$metodos[$listagem]}();
            if ($funcionarios) {
                echo "<table style='border: 2px solid black; width: 100%; border-collapse: collapse; margin: 20px 0;'>";
                echo "<tr>";
                echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Nome</p></th>";
                echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Formação</p></th>";
                echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Cargo</p></th>";
                if ($listagem == 'funcxdep') {
                    echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Departamento</p></th>";
                    echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Andar</p></th>";
                } else {
                    echo "<th scope='col' style='padding: 10px;'><p align='center'>Vencimento</p></th>";
                    echo "<th scope='col'style='padding: 10px;'><p align='center'>Faltas</p></th>";
                    echo "<th scope='col' style='padding: 10px;'><p align='center'>Metas Alcançadas</p></th>";
                    echo "<th scope='col' style='padding: 10px;'><p align='center'>Remuneração</p></th>";
                }
                echo "</tr>";

                foreach ($funcionarios as $funcionario) {
                    echo "<tr>";
                    echo "<td scope='col'><p align='center'>" . $funcionario['nome'] . "</p></td>";
                    echo "<td scope='col'><p align='center'>" . $funcionario['formacao'] . "</p></td>";
                    echo "<td scope='col'><p align='center'>" . $funcionario['cargo'] . "</p></td>";
                    if ($listagem == 'funcxdep') {
                        echo "<td scope='col'><p align='center'>" . $funcionario['nome_departamento'] . "</p></td>";
                        echo "<td scope='col'><p align='center'>" . $funcionario['andar'] . "</p></td>";
                    } else {
                        echo "<td scope='col'><p align='center'>" . $funcionario['vencimento'] . "</p></td>";
                        echo "<td scope='col'><p align='center'>" . $funcionario['numero_faltas'] . "</p></td>";
                        echo "<td scope='col'><p align='center'>" . $funcionario['metas_cumpridas'] . "</p></td>";
                        echo "<td scope='col'><p align='center'>" . $funcionario['remuneracao'] . "</p></td>";
                        echo "<td scope='col' style='padding: 10px;' class='buttons_2' id='lista'><a href='Alt_Funcionario.php?CPF=" . $funcionario["CPF"] . "&idex=" . $funcionario['departamento_id'] . "'><input type='button' value='selecionar'></a></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum funcionário encontrado.</p>";
            }
        }
    }
    ?>


<br><br>
<div style="text-align:right;" class="buttons_2" id="lista" >
<a href="http://localhost/Trabalho_APW/index.php"><input type='button' value="Home"/></a>
</div>
</fieldset>
</body>
</html>