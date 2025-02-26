<?php
class ClassFuncionario
{
    private $nome;
    private $idade;
    private $cargo;
    private $CPF;
    private $telefone;
    private $email;
    private $formacao;
    private $vencimento;
    private $numero_faltas;
    private $metas_cumpridas;
    private $remuneracao;
    private $departamento_id;
    
    function getNome()
    {
        return $this->nome;
    }

    function getIdade()
    {
        return $this->idade;
    }

    function getCargo()
    {
        return $this->cargo;

    }

    function getCPF()
    {
        return $this->CPF;
    }

    function getTelefone()
    {
        return $this->telefone;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getFormacao()
    {
        return $this->formacao;
    }

    function getVencimento()
    {
        return $this->vencimento;
    }

    function getNumeroFaltas()
    {
        return $this->numero_faltas;
    }

    function getMetasCumpridas()
    {
        return $this->metas_cumpridas;
    }

    function getRemuneracao()
    {
        return $this->remuneracao;
    }

    function getDepartamentoID()
    {
        return $this->departamento_id;
    }
   
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function setIdade($idade)
    {
        $this->idade = $idade;
    }

    function setCargo($cargo)
    {
        $this->cargo = $cargo;

    }

    function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }

    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setFormacao($formacao)
    {
        $this->formacao = $formacao;
    }

    function setVencimento()
    {
         
         $vencimento = 0;
        if($this->cargo == "aprendiz"){
            $vencimento=  800;
        }else if($this->cargo== "estagio"){
            $vencimento=  1412.00;
        }else if($this->cargo == "junior"){
            $vencimento=  3000;
        }else if($this->cargo == "pleno"){
            $vencimento=  5000.00;
        }else if($this->cargo == "senior"){
            $vencimento=  7000.00;
        }

        if($this->formacao == "pos" ){
            $vencimento += 1000;
             }else if($this->formacao == "mestrado" ){
               $vencimento+= 2000;
              }else if($this->formacao == "doutorado" ){
               $vencimento+= 3000;
              }else{
               $vencimento = $vencimento;
              }

        $this->vencimento = $vencimento;
    }

    function setNumeroFaltas($numero_faltas)
    {
        $this->numero_faltas = $numero_faltas;
    }

    function setMetasCumpridas($metas_cumpridas)
    {
        $this->metas_cumpridas = $metas_cumpridas;
    }

    function setRemuneracao()
    {
        
        if($this->metas_cumpridas <=5  && $this->metas_cumpridas >=3 ){
            $remuneracao = $this->vencimento + 500;
        }else if($this->metas_cumpridas <=7  && $this->metas_cumpridas >=6 ){
            $remuneracao = $this->vencimento + 700;
        }else if($this->metas_cumpridas <=10  && $this->metas_cumpridas >=8 ){
            $remuneracao = $this->vencimento + 1000;
        }else if($this->metas_cumpridas > 10){
            $remuneracao = $this->vencimento + 1500;
        }else {
            $remuneracao = $this->vencimento;;
        }

        if($this->numero_faltas <=4  && $this->numero_faltas>=3 ){
            $remuneracao = $remuneracao - 100;
            }else if($this->numero_faltas <=6  && $this->numero_faltas >=5 ){
               $remuneracao = $remuneracao - 200;
            }else if($this->numero_faltas <=8  && $this->numero_faltas >=7  ){
               $remuneracao = $remuneracao - 300;
            }else if($this->numero_faltas <=10  && $this->numero_faltas >=9  ){
                $remuneracao = $remuneracao - 400;
            }else if($this->numero_faltas <=12 && $this->numero_faltas >=11  ){
                $remuneracao = $remuneracao - 700;
            }else if($this->numero_faltas >12  ){
                $remuneracao = $remuneracao - 1000;
              }else {
                $remuneracao = $remuneracao;
            }

        $this->remuneracao = $remuneracao;
    }

    function setDepartamentoID($departamento_id)
    {
        $this->departamento_id = $departamento_id;
    }
}
?>