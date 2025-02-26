<?php
require_once '../Modelo/ClassFuncionario.php';
require_once '../Modelo/DAO/ClassFuncDAO.php';

class ControleFuncionario
{
    public function processarFuncionario(
        $nome,
        $email,
        $CPF,
        $idade,
        $telefone,
        $formacao,
        $cargo,
        $numero_faltas,
        $metas_cumpridas,
        $departamento_id,
        $acao
    ) {
        $novoFuncionario = new ClassFuncionario();
        $novoFuncionario->setNome($nome);
        $novoFuncionario->setEmail($email);
        $novoFuncionario->setCPF($CPF);
        $novoFuncionario->setIdade($idade);
        $novoFuncionario->setTelefone($telefone);
        $novoFuncionario->setFormacao($formacao);
        $novoFuncionario->setCargo($cargo);
        $novoFuncionario->setNumeroFaltas($numero_faltas);
        $novoFuncionario->setMetasCumpridas($metas_cumpridas);
        $novoFuncionario->setDepartamentoID($departamento_id);
        $novoFuncionario->setVencimento();
        $novoFuncionario->setRemuneracao();

        $ClassFuncDAO = new ClassFuncDAO();
        
        switch ($acao) {
            case "cadastrarFuncionario":
                $resultado = $ClassFuncDAO->cadastrarFuncionario($novoFuncionario);
                if ($resultado) {
                    echo "<script type='text/javascript'>
                            alert('Cadastro Do Novo Funcionário Realizado Com Sucesso!');
                            window.location.href = '../Visao/Cad_Funcionario.php';
                          </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Não Foi Possível Realizar O Cadastro. Tente Novamente.');
                            window.location.href = '../Visao/Cad_Funcionario.php';
                          </script>";
                }
                break;
        
            case 'atualizarFuncionario':
                $resultado = $ClassFuncDAO->atualizarFuncionario($novoFuncionario);
                if ($resultado == 1) {
                    echo "<script type='text/javascript'>
                            alert('Atualização Realizada Com Sucesso!');
                            window.location.href = '../Visao/Listar_Func.php';
                          </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Não Foi Possível Realizar A Atualização!');
                            window.location.href = '../Visao/Listar_Func.php';
                          </script>";
                }
                break;
        
            case "excluirFuncionario":
                if (isset($_GET['CPF'])) {
                    $CPF = $_GET['CPF'];
                    $classFuncDAO = new ClassFuncDAO();
                    $resultado = $classFuncDAO->excluirFuncionario($CPF);
                    if ($resultado == true) {
                        echo "<script type='text/javascript'>
                                alert('Funcionário Foi Excluído Com Sucesso!');
                                window.location.href = '../Visao/Listar_Func.php';
                              </script>";
                    } else {
                        echo "<script type='text/javascript'>
                                alert('Não Foi Possível Realizar A Exclusão Do Funcionário!');
                                window.location.href = '../Visao/Listar_Func.php';
                              </script>";
                    }
                }
                break;
        
            default:
                break;
        }
    }
}
?>