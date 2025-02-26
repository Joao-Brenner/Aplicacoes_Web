<?php

class Controle {
    public function Calcular() {
        if (isset($_SESSION['item']) && isset($_SESSION['quantidade']) && isset($_SESSION['precounitario'])) {
           
            if ($_SESSION['precounitario'] > $_SESSION['maiorPreco']) {
                $_SESSION['maiorPreco'] = $_SESSION['precounitario'];
                $_SESSION['maiorItem'] = $_SESSION['item'];
            }

           
            $total = $_SESSION['quantidade'] * $_SESSION['precounitario'];
            @$_SESSION['soma']=$_SESSION['soma'] + $total; 
            
            $media = $_SESSION['soma'] / $_SESSION['qnt'];

            echo "<center><h2>Valor Total: R$ $total</h2></center><br><br>";
            echo "<center><h2>O item de maior valor é o(a) {$_SESSION['maiorItem']} que vale: R$ {$_SESSION['maiorPreco']}</h2></center><br><br>";
            echo "<center><h2>Média dos Valores Cadastrados: R$ $media</h2></center>";
        } else {
            echo "<center><h2>Por favor, insira todos os dados corretamente.</h2></center>";
        }
    }
}
?>
