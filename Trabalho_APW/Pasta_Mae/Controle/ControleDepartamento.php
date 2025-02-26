<?php
require_once '../Modelo/ClassDepartamento.php';
require_once '../Modelo/DAO/ClassDepDAO.php';

class ControleDepartamento
{
    public function processarDepartamento(
        $id,
        $nome,
        $andar,
        $acao
    ) {
        $novoDepartamento = new ClassDepartamento();
        $novoDepartamento->setID($id);
        $novoDepartamento->setNome($nome);
        $novoDepartamento->setAndar($andar);

        $ClassDepDAO = new ClassDepDAO();
        
        switch ($acao) {
            case "cadastrarDepartamento":
                $resultado = $ClassDepDAO->cadastrarDepartamento($novoDepartamento);
                if ($resultado) {
                    echo "<script type='text/javascript'>
                            alert('Cadastro Do Novo Departamento Realizado Com Sucesso!');
                            window.location.href = '../Visao/Cad_Departamento.php';
                          </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Não Foi Possível Realizar O Cadastro. Tente Novamente!');
                            window.location.href = '../Visao/Cad_Departamento.php';
                          </script>";
                }
                break;

            case 'atualizarDepartamento':
                $resultado = $ClassDepDAO->atualizarDepartamento($novoDepartamento);
                if ($resultado == 1) {
                    echo "<script type='text/javascript'>
                            alert('Atualização Realizada Com Sucesso!');
                            window.location.href = '../Visao/Listar_Dep.php';
                          </script>";
                } else {
                    echo "<script type='text/javascript'>
                            alert('Não Foi Possível Realizar A Atualização!');
                            window.location.href = '../Visao/Listar_Dep.php';
                          </script>";
                }
                break;
        
            case "excluirDepartamento":
                if (isset($_GET['idex'])) {
                    $id = $_GET['idex'];
                    $classDepDAO = new ClassDepDAO();
                    $resultado = $classDepDAO->excluirDepartamento($id);
                    if ($resultado == true) {
                        echo "<script type='text/javascript'>
                                alert('Departamento Foi Excluído Com Sucesso!');
                                window.location.href = '../Visao/Listar_Dep.php';
                              </script>";
                    } else {
                        echo "<script type='text/javascript'>
                                alert('Não Foi Possível Realizar A Exclusão Do Departamento!');
                                window.location.href = '../Visao/Listar_Dep.php';
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