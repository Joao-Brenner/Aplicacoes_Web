<?php
class ClassDepartamento
{
    private $id;
    private $nome;
    private $andar;
  
    function getID()
    {
        return $this->id;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getAndar()
    {
        return $this->andar;

    }

    function setID($id)
    {
        $this->id = $id;
    }

    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setAndar($andar)
    {
        $this->andar = $andar;

    }

}
?>