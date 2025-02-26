<?php
function comparar($n1,$n2,$n3){
if($n1 > $n2 && $n1 > $n3){
   echo("O maior número digitado é $n1"); 
}elseif($n2 > $n1 && $n2 > $n3){
    echo("O maior número digitado é $n2"); 
}elseif($n3 > $n1 && $n3 > $n1){
    echo("O maior número digitado é $n3"); 
}
//echo("<center><a href= 'pagina1.php'>Voltar</center>");
}
