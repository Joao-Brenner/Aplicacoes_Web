<?php
require_once 'Conexao.php';
class ClassDepDAO
{
    public function cadastrarDepartamento(ClassDepartamento $cadastrarDep)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO Departamento (nome,andar)
            values (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarDep->getNome());
            $stmt->bindValue(2, $cadastrarDep->getAndar());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarDepartamentos()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT id,nome,andar FROM Departamento";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $dep = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dep;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function buscarDEP($id)
    {
        try {
            $novoDep = new ClassDepartamento();
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM Departamento WHERE id =:id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $depAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $novoDep->setID(@$depAssoc['id']);
            $novoDep->setNome(@$depAssoc['nome']);
            $novoDep->setAndar(@$depAssoc['andar']);

            return $novoDep;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function buscarDEP2($nome)
    {
        try {
            $novoDep = new ClassDepartamento();
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM Departamento WHERE nome =:nome LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nome', $nome);

            $stmt->execute();
            $depAssoc = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $novoDep->setID(@$depAssoc['id']);
            $novoDep->setNome(@$depAssoc['nome']);
            $novoDep->setAndar(@$depAssoc['andar']);

            return $novoDep;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function atualizarDepartamento(ClassDepartamento $atualizarDepartamento)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE Departamento SET nome=?,andar=? WHERE id=? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1,$atualizarDepartamento->getNome());
            $stmt->bindValue(2, $atualizarDepartamento->getAndar());
            $stmt->bindValue(3, $atualizarDepartamento->getID());
    
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function excluirDepartamento($id)
    {
        try {
            $pdo = Conexao::getInstance();
            
            $sqlFuncionarios = "DELETE FROM Funcionario WHERE departamento_id = :id";
            $stmtFuncionarios = $pdo->prepare($sqlFuncionarios);
            $stmtFuncionarios->bindValue(':id', $id);
            $stmtFuncionarios->execute();
            
        
            $sqlDepartamento = "DELETE FROM Departamento WHERE id = :id";
            $stmtDepartamento = $pdo->prepare($sqlDepartamento);
            $stmtDepartamento->bindValue(':id', $id);
            $stmtDepartamento->execute();
            
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    }
?>