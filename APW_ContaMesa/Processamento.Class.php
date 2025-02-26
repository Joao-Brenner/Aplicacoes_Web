<?php
class Processamento{
  public function CalcularConta(){
    @$mesa=$_POST['mesa'];
    @$clientes = $_POST['clientes'];
    if (isset($_POST['calcular'])) {
      @$resultado= $_POST['conta'] / $_POST['clientes'];
      echo("<br><br> <center><h2>O número da mesa é: $mesa</h2></center>");
        echo("<br><br><center><h2> O número de clientes é: $clientes</h2></center>");
        echo("<br><br><center><h2> O valor da conta dividia por cliente é de R$$resultado</h2></center>");
      }else{
        echo("");
      }
  }
}
?>
