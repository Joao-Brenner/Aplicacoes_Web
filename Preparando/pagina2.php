
<link href="style.css" rel="stylesheet">
<?php
function SalarioLiquido($salario,$desempenho){
  $salario2 = 0;
if($desempenho < 5){
  echo("<p> Este Profissional não tem direito a nenhum bônus salárial</p>");
    $salario2 = $salario;
    
}elseif($desempenho >= 5 && $desempenho <= 7){
    $bonus = $salario * 0.05;
    $salario2= $salario + $bonus;
    echo("<p> Este Profissional tem direito a um bônus no valor de: R$$bonus</p>");
    echo("<br><p>O salário deste profissional com bônus é: R$$salario2</p>");

  }elseif($desempenho >=8 && $desempenho <=10){
    $bonus = $salario * 0.1;
    $salario2= $salario + $bonus;
    echo("<p> Este Profissional tem direito a um bônus no valor de: R$$bonus</p>");   
    echo("<br><p> O salário deste profissional com bônus é: R$$salario2</p>");

  }else{
    echo("<br>ERRO");
  }

if($salario2 <= 2000){
   $desconto = $salario2 * 0.1;
   $salarioliquido = $salario2 - $desconto;
   echo("<br> <p> O desconto que o funcionário possui direito é o de 10%, que equivale a: R$$desconto</p>");
   echo("<br><p> O seu salário líquido é: R$$salarioliquido</p>");

}elseif($salario2 >= 2000.1 && $salario2 <=5000){
    $desconto = $salario2 * 0.15;
    $salarioliquido = $salario2 - $desconto;
    echo("<br><p> O desconto que o funcionário possui direito é o de 15%, que equivale a: R$$desconto</p>");
   echo("<br><p> O seu salário líquido é: R$$salarioliquido</p>");

 }elseif($salario2 > 5000){
    $desconto = $salario2 * 0.2;
    $salarioliquido = $salario2 - $desconto;
    echo("<br><p> O desconto que o funcionário possui direito é o de 20%, que equivale a: R$$desconto</p>");
   echo("<br><p> O seu salário líquido é: R$$salarioliquido</p>");

 }else{
    echo("ERRO!");
 }
}

function Maior ($salario){
  $maior = 0;  
if($salario > $maior){
$maior=$salario;
echo("<br><p> Maior salário digitado: R$$maior</p>");
}
} 
?>