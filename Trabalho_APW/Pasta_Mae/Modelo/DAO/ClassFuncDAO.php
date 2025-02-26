<?php
require_once 'Conexao.php';
class ClassFuncDAO
{
    public function cadastrarFuncionario(ClassFuncionario $cadastrarFuncionario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO Funcionario (nome,idade,cargo,CPF,telefone,email,formacao,vencimento,numero_faltas,metas_cumpridas,remuneracao,departamento_id) 
            values (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarFuncionario->getNome());
            $stmt->bindValue(2, $cadastrarFuncionario->getIdade());
            $stmt->bindValue(3, $cadastrarFuncionario->getCargo());
            $stmt->bindValue(4, $cadastrarFuncionario->getCPF());
            $stmt->bindValue(5, $cadastrarFuncionario->getTelefone());
            $stmt->bindValue(6, $cadastrarFuncionario->getEmail());
            $stmt->bindValue(7, $cadastrarFuncionario->getFormacao());
            $stmt->bindValue(8, $cadastrarFuncionario->getVencimento());
            $stmt->bindValue(9, $cadastrarFuncionario->getNumeroFaltas());
            $stmt->bindValue(10, $cadastrarFuncionario->getMetasCumpridas());
            $stmt->bindValue(11, $cadastrarFuncionario->getRemuneracao());
            $stmt->bindValue(12, $cadastrarFuncionario->getDepartamentoID());
          
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionariosASC()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CPF,nome,formacao,cargo,vencimento,numero_faltas,metas_cumpridas,remuneracao,departamento_id FROM Funcionario order by (nome) asc";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionariosDESC()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CPF,nome,formacao,cargo,vencimento,numero_faltas,metas_cumpridas,remuneracao,departamento_id FROM Funcionario order by (nome) desc";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionariosMenorF()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CPF,nome,formacao,cargo,vencimento,numero_faltas,metas_cumpridas,remuneracao,departamento_id FROM Funcionario order by (numero_faltas) asc, (nome) ASC;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionariosMaiorM()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CPF,nome,formacao,cargo,vencimento,numero_faltas,metas_cumpridas,remuneracao,departamento_id FROM Funcionario order by (metas_cumpridas) desc, (nome) ASC;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionariosMaiorR()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT CPF,nome,formacao,cargo,vencimento,numero_faltas,metas_cumpridas,remuneracao,departamento_id FROM Funcionario order by (remuneracao) desc, (nome) ASC;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFuncionariosXDepartamentos()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT Funcionario.nome,Funcionario.cargo,Funcionario.formacao,Departamento.nome AS nome_departamento,Departamento.andar
                        FROM Funcionario INNER JOIN Departamento ON Funcionario.departamento_id = Departamento.id
                        ORDER BY Departamento.nome ASC,Funcionario.nome ASC;";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarFunc($CPF)
    {
        try {
            $novoFuncionario = new ClassFuncionario();
            $pdo = Conexao::getInstance();
            $sql = "SELECT* FROM Funcionario WHERE CPF =:CPF LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':CPF', $CPF);

            $stmt->execute();
            $funcAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $novoFuncionario->setNome(@$funcAssoc['nome']);
            $novoFuncionario->setEmail(@$funcAssoc['email']);
            $novoFuncionario->setCPF(@$funcAssoc['CPF']);
            $novoFuncionario->setIdade(@$funcAssoc['idade']);
            $novoFuncionario->setTelefone(@$funcAssoc['telefone']);
            $novoFuncionario->setFormacao(@$funcAssoc['formacao']);
            $novoFuncionario->setCargo(@$funcAssoc['cargo']);
            $novoFuncionario->setVencimento(@$funcAssoc['vencimento']);
            $novoFuncionario->setNumeroFaltas(@$funcAssoc['numero_faltas']);
            $novoFuncionario->setMetasCumpridas(@$funcAssoc['metas_cumpridas']);
            $novoFuncionario->setRemuneracao(@$funcAssoc['remuneracao']);
            $novoFuncionario->setDepartamentoID(@$funcAssoc['departamento_id']);

           
            return $novoFuncionario;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function atualizarFuncionario(ClassFuncionario $atualizarFuncionario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE Funcionario SET idade=?,cargo=?,telefone=?,email=?,formacao=?,vencimento=?,numero_faltas=?,metas_cumpridas=?,remuneracao=?,departamento_id=? WHERE CPF=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1,$atualizarFuncionario->getIdade());
            $stmt->bindValue(2, $atualizarFuncionario->getCargo());
            $stmt->bindValue(3, $atualizarFuncionario->getTelefone());
            $stmt->bindValue(4, $atualizarFuncionario->getEmail());
            $stmt->bindValue(5, $atualizarFuncionario->getFormacao());
            $stmt->bindValue(6, $atualizarFuncionario->getVencimento());
            $stmt->bindValue(7, $atualizarFuncionario->getNumeroFaltas());
            $stmt->bindValue(8, $atualizarFuncionario->getMetasCumpridas());
            $stmt->bindValue(9, $atualizarFuncionario->getRemuneracao());
            $stmt->bindValue(10, $atualizarFuncionario->getDepartamentoID());
            $stmt->bindValue(11, $atualizarFuncionario->getCPF());
    
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirFuncionario($CPF)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM Funcionario WHERE CPF =:CPF";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':CPF', $CPF);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
             echo $ex->getMessage();
        }
    }


    
    }
?>